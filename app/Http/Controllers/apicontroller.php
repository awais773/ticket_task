<?php

namespace App\Http\Controllers;

use Pusher\Pusher;
use App\Models\Note;
use App\Models\Plan;
use App\Models\Task;
use App\Models\User;
use App\Models\Stage;
use App\Models\Message;
use App\Models\Project;
use App\Models\Utility;
use Faker\Guesser\Name;
use App\Models\Milestone;
use App\Models\Workspace;
use App\Models\TrackPhoto;
use App\Models\ActivityLog;
use App\Models\ProjectFile;
use App\Models\TimeTracker;
use App\Models\UserProject;
use Illuminate\Support\Str;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\UserWorkspace;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Mail\SendLoginDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Validator;
use App\Models\Mail\SendWorkspaceInvication;
use App\Models\Notification;
use App\Models\SubTask;

class apicontroller extends Controller
{
    use ApiResponser;
    private $success = false;
    private $message = '';
    private $data = [];

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string'
        ]);

        if (!\Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }

        $user = Auth::user();
        $workspace_id = $user->currant_workspace;
        $companyName = User::where('currant_workspace', $workspace_id)->where('user_type', 'company')->pluck('name')->first();
        $getworkspace = Workspace::where("id", $workspace_id)->first();

        $settings = [

            'shot_time' => isset($getworkspace->interval_time) ? $getworkspace->interval_time : 10,
        ];
        $user->makeHidden(['storage_limit']);

        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken,
            'user' => array_merge(auth()->user()->toArray(), ['companyName' => $companyName]),
            // 'settings' =>$settings,
        ], 'Login successfully.');
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->success([], 'Tokens Revoked');
    }

    public function getworkspace(Request $request)
    {

        $objUser = Auth::user();
        if ($objUser && $objUser->currant_workspace) {
            $rs = Workspace::select([
                'workspaces.*',
                'user_workspaces.permission',
            ])->join('user_workspaces', 'workspaces.id', '=', 'user_workspaces.workspace_id')->where('user_id', '=', $objUser->id)->pluck('slug', 'id')->toArray();
        }

        return $this->success([
            'workspaces' =>  $rs,
        ], 'Get Workspace successfully.');
    }

    public function getProjects(Request $request)
    {

        $user = auth()->user();

        // \Log::info(json_encode( $request->all()));
        $rs = Workspace::select(['workspaces.*'])->join('client_workspaces', 'workspaces.id', '=', 'client_workspaces.workspace_id')->where('workspaces.id', '=', $user->currant_workspace)->where('client_id', '=', $user->id)->first();


        // $workspace_id = !isset($request->work_space) && !empty($request->work_space) ?$request->work_space: 1;
        $workspace_id = !isset($request->work_space) && !empty($request->work_space) ? $request->work_space : $user->currant_workspace;

        $user = auth()->user();


        if ($user->type = "user") {
            $assign_pro_ids = UserProject::where('user_id', $user->id)->pluck('project_id');
            $project_s      = Project::with('task')->select(
                [
                    'name',
                    'id',
                    'workspace',
                ]
            )->whereIn('id', $assign_pro_ids)->where('workspace', $workspace_id)->get()->toArray();
        } else {
            $project_s = Project::with('task')->select(
                [
                    'name',
                    'id',
                    'workspace',
                ]
            )->where('created_by', $user->id)->where('workspace', $workspace_id)->get()->toArray();
        }

        return $this->success([
            'projects' => $project_s,
        ], 'Get Project List successfully.');
    }


 
    public function delete(Request $request,$id){
        if(User::find($id)){
            User::find($id)->delete();
          return response()->json(['
          message' => 'Data deleted successfully !', 
          'success' => true,
          'code'=>200]);
        }else{
          return response()->json(['message' => 'Operation Failed !', 
          'success' => false,
          'code'=>501]);
        }
    }




    public function addTracker(Request $request)
    {

        $user = auth()->user();
        if ($request->has('action') && $request->action == 'start') {

            $validatorArray = [
                'task_id' => 'required|integer',
            ];
            $validator      = \Validator::make(
                $request->all(),
                $validatorArray
            );
            if ($validator->fails()) {
                return $this->error($validator->errors()->first(), 401);
            }
            $task = Task::find($request->task_id);
            if (empty($task)) {
                return $this->error('Invalid task', 401);
            }

            $project_id = isset($task->project_id) ? $task->project_id : '';
            TimeTracker::where('created_by', '=', $user->id)->where('is_active', '=', 1)->update(['end_time' => date("Y-m-d H:i:s")]);

            $track['name']        = $request->has('workin_on') ? $request->input('workin_on') : '';
            $track['project_id']  = $project_id;
            $track['workspace_id']  = $request->workspaces_id;
            $track['start_time']  = $request->has('time') ?  date("Y-m-d H:i:s", strtotime($request->input('time'))) : date("Y-m-d H:i:s");
            $track['task_id']     = $request->has('task_id') ? $request->input('task_id') : '';

            // $track['created_by']  = $user->id;
            $track                = TimeTracker::create($track);
            $track->action        = 'start';
            return $this->success($track, 'Track successfully create.');
        } else {
            $validatorArray = [
                'task_id' => 'required|integer',
                'traker_id' => 'required|integer',
            ];
            $validator      = Validator::make(
                $request->all(),
                $validatorArray
            );
            if ($validator->fails()) {
                return Utility::error_res($validator->errors()->first());
            }
            $tracker = TimeTracker::where('id', $request->traker_id)->first();

            if ($tracker) {
                $tracker->end_time   = $request->has('time') ?  date("Y-m-d H:i:s", strtotime($request->input('time'))) : date("Y-m-d H:i:s");
                $tracker->is_active  = 0;
                $tracker->total_time = Utility::diffance_to_time($tracker->start_time, $tracker->end_time);
                $tracker->save();
                return $this->success($tracker, 'Stop time successfully.');
            }
        }
    }

    public function uploadImage(Request $request)
    {



        $user = auth()->user();
        $image_base64 = base64_decode($request->img);
        $file = $request->imgName;
        $logo = Utility::get_file('uploads/traker_images/');
        $settings = Utility::getAdminPaymentSetting();

        if ($request->has('tracker_id') && !empty($request->tracker_id)) {
            //$app_path = storage_path('uploads/traker_images/').$request->tracker_id.'/';


            if ($settings['storage_setting'] == 'local') {
                $app_path = storage_path('uploads/traker_images/') . $request->tracker_id . '/';
            } else {
                $app_path = $logo . $request->tracker_id . '/';
            }

            if (!file_exists($app_path)) {
                mkdir($app_path, 0777, true);
            }
        } else {
            // $app_path = storage_path('uploads/traker_images/');

            if ($settings['storage_setting'] == 'local') {
                $app_path = storage_path('uploads/traker_images/');
            } else {
                $app_path = $logo;
            }

            if (is_dir($app_path)) {
                mkdir($app_path, 0777, true);
            }
        }

        $file_name =  $app_path . $file;
        file_put_contents($file_name, $image_base64);
        $new = new TrackPhoto();
        $new->track_id = $request->tracker_id;
        $new->user_id  = $user->id;
        $new->workspace_id = 0;
        $new->img_path  = 'uploads/traker_images/' . $request->tracker_id . '/' . $file;
        $new->time  = $request->time;
        $new->status  = 1;
        $new->save();
        return $this->success([], 'Uploaded successfully.');
    }

    public function dashboard($slug = '')
    {
        $userObj = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        $totalProject = UserProject::join("projects", "projects.id", "=", "user_projects.project_id")->where("user_id", "=", $userObj->id)->where('projects.workspace', '=', $currentWorkspace->id)->count();
        $workspace_owner = isset($currentWorkspace) ? $currentWorkspace->owner($currentWorkspace->id) : '';
        $users = User::find($workspace_owner->id);
        $plan = Plan::find($users->plan);
        $storage_limit = $plan->storage_limit > 0 ? (($users->storage_limit / $plan->storage_limit) * 100) : 0;
        $storage_limit = number_format($storage_limit, 2);

        if ($currentWorkspace->permission == 'Owner') {
            $totalBugs = UserProject::join("bug_reports", "bug_reports.project_id", "=", "user_projects.project_id")->join("projects", "projects.id", "=", "user_projects.project_id")->where("user_id", "=", $userObj->id)->where('projects.workspace', '=', $currentWorkspace->id)->count();
            $totalTask = UserProject::join("tasks", "tasks.project_id", "=", "user_projects.project_id")->join("projects", "projects.id", "=", "user_projects.project_id")->where("user_id", "=", $userObj->id)->where('projects.workspace', '=', $currentWorkspace->id)->count();
        } else {
            $totalBugs = UserProject::join("bug_reports", "bug_reports.project_id", "=", "user_projects.project_id")->join("projects", "projects.id", "=", "user_projects.project_id")->where("user_id", "=", $userObj->id)->where('projects.workspace', '=', $currentWorkspace->id)->where('bug_reports.assign_to', '=', $userObj->id)->count();
            $totalTask = UserProject::join("tasks", "tasks.project_id", "=", "user_projects.project_id")->join("projects", "projects.id", "=", "user_projects.project_id")->where("user_id", "=", $userObj->id)->where('projects.workspace', '=', $currentWorkspace->id)->whereRaw("find_in_set('" . $userObj->id . "',tasks.assign_to)")->count();
        }

        $totalMembers = UserWorkspace::where('workspace_id', '=', $currentWorkspace->id)->count();
        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'data' => [
                'totalProject' => $totalProject,
                'totalTask' => $totalTask,
                'totalMembers' => $totalMembers,
                'totalBugs' => $totalBugs,
            ]
        ], 200);
    }


    public function UserGet($slug = null)
    {
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        if ($currentWorkspace) {
            $users = User::select('users.*', 'user_workspaces.permission', 'user_workspaces.is_active')->join('user_workspaces', 'user_workspaces.user_id', '=', 'users.id');
            $users->where('user_workspaces.workspace_id', '=', $currentWorkspace->id);
            $users = $users->get();
            $users->makeHidden(['storage_limit']);
        } else {
            $users = User::where('type', '!=', 'admin')->get();
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'date'  => $users,
            //   'currentWorkspace'  =>$currentWorkspace,
        ], 200);
    }



    // public function GroupDepartmenProject($slug = '')
    // {
    //     $objUser = Auth::user();
    //     $currentWorkspace = Utility::getWorkspaceBySlug($slug);
    //     if ($objUser->getGuard() == 'client') {
    //         $projects = Project::select('projects.*')->join('client_projects', 'projects.id', '=', 'client_projects.project_id')->where('client_projects.client_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->get();
    //     } else {
    //         $projects = Project::select('projects.*')->join('user_projects', 'projects.id', '=', 'user_projects.project_id')->where('user_projects.user_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->get();
    //     }
    //     foreach ($projects as $project) {
    //         $project->commentsCount = $project->countTaskComments();
    //         $project->countTask = $project->countTask();
    //     }
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data Fetch successfull',
    //         'date'  => $projects,
    //         //   'currentWorkspace'  =>$currentWorkspace,
    //     ], 200);
    // }


    public function GroupDepartmenProject($slug = '')
    {
        $objUser = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        if ($objUser->getGuard() == 'client') {
            $projects = Project::with(['users' => function ($query) {
                $query->select('users.id', 'name', 'avatar');
            }])
                ->select('projects.*')
                ->join('client_projects', 'projects.id', '=', 'client_projects.project_id')
                ->where('client_projects.client_id', '=', $objUser->id)
                ->where('projects.workspace', '=', $currentWorkspace->id)
                ->get();
        } else {
            $projects = Project::with(['users' => function ($query) {
                $query->select('users.id', 'name', 'avatar');
            }])
                ->select('projects.*')
                ->join('user_projects', 'projects.id', '=', 'user_projects.project_id')
                ->where('user_projects.user_id', '=', $objUser->id)
                ->where('projects.workspace', '=', $currentWorkspace->id)
                ->get();
        }
        foreach ($projects as $project) {
            $project->commentsCount = $project->countTaskComments();
            $project->countTask = $project->countTask();
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successful',
            'projects'  => $projects,
            // 'currentWorkspace'  =>$currentWorkspace,
        ], 200);
    }


    public function requestedTask($slug = '')
    {
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);

        $personal_notes = Note::with('usersShow:id,name,avatar')->where('type', '=', 'personal')->where('workspace', '=', $currentWorkspace->id)->where('created_by', '=', Auth::user()->id)->get();
        $shared_notes = Note::with('usersShow:id,name,avatar')->where('type', '=', 'shared')->where('workspace', '=', $currentWorkspace->id)
            ->whereRaw("find_in_set('" . Auth::user()->id . "',notes.assign_to)")
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'date'  => $shared_notes,
            'personal_notes'  => $personal_notes,
            //   'currentWorkspace'  =>$currentWorkspace,
        ], 200);

        //  return view('notes.index',compact('currentWorkspace','personal_notes', 'shared_notes'));
    }


    
    public function requestedTaskId($id ,$slug = '')
    {
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);

        $shared_notes = Note::with('usersShow:id,name,avatar')->where('workspace', '=', $currentWorkspace->id)
            ->whereRaw("find_in_set('" . Auth::user()->id . "',notes.assign_to)")
            ->where('id', '=', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'date'  => $shared_notes,
            //   'currentWorkspace'  =>$currentWorkspace,
        ], 200);

        //  return view('notes.index',compact('currentWorkspace','personal_notes', 'shared_notes'));
    }


    public function NotesDelete(Request $request,$id){
        if(Note::find($id)){
            Note::find($id)->delete();
          return response()->json(['
          message' => 'Data deleted successfully !', 
          'success' => true,
          'code'=>200]);
        }else{
          return response()->json(['message' => 'Operation Failed !', 
          'success' => false,
          'code'=>501]);
        }
    }


    // public function requestedTaskStore(Request $request, $slug = '')
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'text' => 'required',
    //         'color' => 'required',
    //     ]);

    //     $currentWorkspace = Utility::getWorkspaceBySlug($slug);
    //     $objUser = Auth::user();
    //     $post = $request->all();
    //     $post['type'] = $request->type;

    //     $assign_to = $request->assign_to;
    //     // $assign_to[] = $objUser->id;
    //     $post['assign_to'] = implode(',', $assign_to);
    //     $post['workspace'] = $currentWorkspace->id;
    //     $post['created_by'] = $objUser->id;

    //     $note = Note::create($post);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Note created successfully',
    //         'data'    => $note,
    //     ], 201);
    // }


//     public function requestedTaskStore(Request $request, $slug = '')
// {
//     $request->validate([
//         'title' => 'required',
//         'text' => 'required',
//         'color' => 'required',
//     ]);

//     $currentWorkspace = Utility::getWorkspaceBySlug($slug);
//     $objUser = Auth::user();
//     $post = $request->all();
//     $post['type'] = $request->type;

//     $assign_to = $request->assign_to;
//     // $assign_to[] = $objUser->id;
//     $post['assign_to'] = implode(',', $assign_to);
//     $post['workspace'] = $currentWorkspace->id;
//     $post['created_by'] = $objUser->id;

//     if ($request->has('note_id')) {
//         // If note_id is provided, it means we're updating an existing note
//         $note = Note::findOrFail($request->note_id);
//         $note->update($post);
//         $message = 'Note updated successfully';
//     } else {
//         // If note_id is not provided, create a new note
//         $note = Note::create($post);
//         $message = 'Note created successfully';
//     }

//     return response()->json([
//         'success' => true,
//         'message' => $message,
//         'data'    => $note,
//     ], 201);
// }


public function requestedTaskStore(Request $request, $slug = '')
{
    $request->validate([
        'title' => 'required',
        'text' => 'required',
        'color' => 'required',
    ]);

    $currentWorkspace = Utility::getWorkspaceBySlug($slug);
    $objUser = Auth::user();
    $post = $request->all();
    $post['type'] = $request->type;

    $assign_to = $request->assign_to;
    // $assign_to[] = $objUser->id;
    $post['assign_to'] = !empty($assign_to) ? implode(',', $assign_to) : '';
    $post['workspace'] = $currentWorkspace->id;
    $post['created_by'] = $objUser->id;

    if ($request->has('note_id')) {
        // If note_id is provided, it means we're updating an existing note
        $note = Note::findOrFail($request->note_id);
        $note->update($post);
        $message = 'Note updated successfully';
    } else {
        // If note_id is not provided, create a new note
        $note = Note::create($post);
        $message = 'Note created successfully';
    }

    return response()->json([
        'success' => true,
        'message' => $message,
        'data'    => $note,
    ], 201);
}



    public function requestedTaskUser($slug = '')
    {
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        if ($currentWorkspace) {
            $users = User::select('users.*', 'user_workspaces.permission', 'user_workspaces.is_active')
                ->join('user_workspaces', 'user_workspaces.user_id', '=', 'users.id')
                ->where('user_workspaces.workspace_id', '=', $currentWorkspace->id)
                ->where('users.id', '!=', Auth::user()->id)
                ->get();
                $users->makeHidden(['storage_limit']);
            } else {
            $users = User::where('type', '!=', 'admin')->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'date'  => $users,
            //   'currentWorkspace'  =>$currentWorkspace,
        ], 200);
    }

    public function employeeEvaluation($slug = '')
    {
        $objUser = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);

        if ($objUser && $currentWorkspace) {

            $users = User::select('users.*')
                ->join('user_workspaces', 'user_workspaces.user_id', '=', 'users.id')
                ->where('user_workspaces.workspace_id', '=', $currentWorkspace->id)
                ->get();

            // Loop through users and calculate counts
            foreach ($users as $user) {
                $user->project_each_total_month = $user->projects()
                    ->join('projects as p', 'user_projects.project_id', '=', 'p.id')
                    ->where('p.status', 'Finished')
                    ->whereMonth('p.created_at', now()->month)
                    ->count();

                $user->project_each_total_year = $user->projects()
                    ->join('projects as p', 'user_projects.project_id', '=', 'p.id')
                    ->where('p.status', 'Finished')
                    ->whereYear('p.created_at', now()->year)
                    ->count();
            }

            return response()->json([
                'success' => true,
                'message' => 'Data Fetch successfull',
                'date'  => $users,
                //   'currentWorkspace'  =>$currentWorkspace,
            ], 200);
        }
    }

    public function addPromotion($id, Request $request)
    {
        $user = User::find($id);
        $user->employee_salary = $request->employee_salary;
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'addPromotion created successfully',
            'data'    => $user,
        ], 201);
        // return view('users_report.addPermotion', compact('currentWorkspace', 'user'));
    }



    public function chatIndex($slug = '')
    { {
            $objUser          = Auth::user();
            $currentWorkspace = Utility::getWorkspaceBySlug($slug);
            if ($currentWorkspace) {
                $users = User::select('users.*', 'user_workspaces.permission', 'user_workspaces.is_active')->join('user_workspaces', 'user_workspaces.user_id', '=', 'users.id');
                $users->where('user_workspaces.workspace_id', '=', $currentWorkspace->id)->where('users.id', '!=', $objUser->id);
                $users = $users->get('user_id', 'name', 'avatar');
            } else {
                $users = User::where('type', '!=', 'admin')->get();
            }

            return response()->json([
                'success' => true,
                'message' => 'Data Fetch successfull',
                'date'  => $users,
                //   'currentWorkspace'  =>$currentWorkspace,
            ], 200);
            // return view('chats.index', compact('currentWorkspace', 'users'));
        }
    }


    public function getMessage($user_id)
    {
        $my_id = Auth::id();

        // Make read all unread message
        Message::where(
            [
                'from_id' => $user_id,
                'to_id' => $my_id,
                'seen' => 0,
            ]
        )->update(['seen' => 1]);

        // Get all message from selected user
        $messages = Message::where(
            function ($query) use ($user_id, $my_id) {
                $query->where('from_id', $user_id)->where('to_id', $my_id);
            }
        )->oRwhere(
            function ($query) use ($user_id, $my_id) {
                $query->where('from_id', $my_id)->where('to_id', $user_id);
            }
        )->get();

        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'date'  => $messages,
            //   'currentWorkspace'  =>$currentWorkspace,
        ], 200);
    }


    public function sendMessage(Request $request, $slug = '')
    {
        $from             = Auth::id();
        // $currentWorkspace = Workspace::find($request->workspace_id);
        $to               = $request->receiver_id;
        $message          = $request->message;
        $data               = new Message();
        // $data->workspace_id = $currentWorkspace->id;
        $data->from_id         = $from;
        $data->to_id           = $to;
        $data->body      = $message;
        $data->seen      = 0; // message will be unread when sending message
        if ($file = $request->file('attachment')) {
            $video_name = md5(rand(1000, 10000));
            $ext = strtolower($file->getClientOriginalExtension());
            $video_full_name = $video_name . '.' . $ext;
            $upload_path = 'chatFile/';
            $video_url = $upload_path . $video_full_name;
            $file->move($upload_path, $video_url);
            $data->attachment = $video_url;
        }

        $data->save();

        // pusher
        // $options = array(
        //     'cluster' => env('PUSHER_APP_CLUSTER'),
        //     'useTLS' => true,
        // );

        // $pusher = new Pusher(
        //     env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), $options
        // );

        $data = [
            'from_id' => $from,
            'to_id' => $to,
        ]; // sending from and to user id when pressed enter
        // $pusher->trigger($slug, 'chat', $data);

        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'date'  => $data,
        ], 200);
    }


    public function destroyProject($projectID)
    {
        $objUser = Auth::user();
        $project = Project::find($projectID);

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found',
            ], 404);
        }

        // if ($project->created_by != $objUser->id) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Unauthorized to delete this project',
        //     ], 403);
        // }

        try {
            // Delete related records first to avoid foreign key constraint issues
            UserProject::where('project_id', $projectID)->delete();
            ProjectFile::where('project_id', $projectID)->delete();

            // Then delete the project
            $project->delete();

            return response()->json([
                'success' => true,
                'message' => 'Project deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error deleting project: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to delete project',
            ], 500);
        }
    }


    public function showProject($projectID, $slug = '')
    {
        $objUser = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        $project = Project::select('projects.*')->join('user_projects', 'projects.id', '=', 'user_projects.project_id')->where('user_projects.user_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->where('projects.id', '=', $projectID)->first();

        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'date'  => $project,
        ], 200);
    }

    public function updateProject(Request $request, $projectID, $slug = '')
    {
        $request->validate(
            [
                'name' => 'required',
            ]
        );
        $objUser = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        $project = Project::select('projects.*')->join('user_projects', 'projects.id', '=', 'user_projects.project_id')->where('user_projects.user_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->where('projects.id', '=', $projectID)->first();
        $project->update($request->all());


        return response()->json([
            'success' => true,
            'message' => 'Data Update successfull',
            'date'  => $project,
        ], 200);
    }



    public function ProjectReport($slug = '')
    {
        $objUser = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);

        if ($objUser && $currentWorkspace) {
            if ($objUser->getGuard() == 'client') {
                $projects = Project::select('projects.*')->join('client_projects', 'projects.id', '=', 'client_projects.project_id')->where('client_projects.client_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->get();
            } else {
                $projects = Project::select('projects.*')->join('user_projects', 'projects.id', '=', 'user_projects.project_id')->where('user_projects.user_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->get();
            }
            foreach ($projects as $project) {
                $project->progress = $project->project_progress();
            }

            $stages = Stage::where('workspace_id', '=', $currentWorkspace->id)->orderBy('order')->get();
            $users = User::select('users.*')->join('user_workspaces', 'user_workspaces.user_id', '=', 'users.id')->where('user_workspaces.workspace_id', '=', $currentWorkspace->id)->select('name', 'avatar')->get();

            $data = [
                'projects'  => $projects,
                // 'stages' => $stages,
                'users' => $users,
                // 'currentWorkspace' => $currentWorkspace
            ];

            return response()->json([
                'success' => true,
                'message' => 'Data Update successful',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Permission Denied'
            ], 403);
        }
    }


    public function ProjectReportShow(Request $request, $id, $slug = '',)
    {
        $objUser = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);


        if ($objUser && $currentWorkspace) {
            if ($objUser->getGuard() == 'client') {
                $project = Project::select('projects.*')->join('client_projects', 'projects.id', '=', 'client_projects.project_id')->where('client_projects.client_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->where('projects.id', '=', $id)->first();
            } else {
                $project = Project::select('projects.*')->join('user_projects', 'projects.id', '=', 'user_projects.project_id')->where('user_projects.user_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->where('projects.id', '=', $id)->first();
            }
        }
        if ($project) {
            $stages = Stage::where('workspace_id', '=', $currentWorkspace->id)->orderBy('order')->get();
            $users = User::select('users.*')->join('user_workspaces', 'user_workspaces.user_id', '=', 'users.id')->where('user_workspaces.workspace_id', '=', $currentWorkspace->id)->select('name', 'avatar')->get();

            $milestones = Milestone::where('project_id', $id)->get();

            $data = [
                'projects'  => $project,
                // 'stages' => $stages,
                'users' => $users,
                'milestones' => $milestones
            ];

            return response()->json([
                'success' => true,
                'message' => 'Data Update successful',
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Permission Denied'
            ], 403);
        }
    }



    // public function allTasks($slug='')
    // {
    //     $userObj = Auth::user();
    //     $currentWorkspace = Utility::getWorkspaceBySlug($slug);

    //     if ($userObj->getGuard() == 'client') {
    //         $projects = Project::select('projects.*')->join('client_projects', 'projects.id', '=', 'client_projects.project_id')->where('client_projects.client_id', '=', $userObj->id)->where('projects.workspace', '=', $currentWorkspace->id)->get();
    //     } else {
    //         $projects = Project::select('projects.*')->join('user_projects', 'projects.id', '=', 'user_projects.project_id')->where('user_projects.user_id', '=', $userObj->id)->where('projects.workspace', '=', $currentWorkspace->id)->get();
    //     }
    //     $stages = Stage::where('workspace_id', '=', $currentWorkspace->id)->orderBy('order')->get();
    //     $users = User::select('users.*')->join('user_workspaces', 'user_workspaces.user_id', '=', 'users.id')->where('user_workspaces.workspace_id', '=', $currentWorkspace->id)->select('name', 'avatar')->get();

    //     $data = [
    //         'projects'  => $projects,
    //         // 'stages' => $stages,
    //         'users' => $users,
    //     ];

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data Update successful',
    //         'data' => $data,
    //     ], 200);
    // }


    public function allTasks(Request $request, $slug = '')
    {
        $userObj = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);

        if ($currentWorkspace->permission == 'Owner') {
            $tasks = Task::select(
                [
                    'tasks.*',
                    'stages.name as stage',
                    'stages.complete',
                ]
            )->join("user_projects", "tasks.project_id", "=", "user_projects.project_id")->join("projects", "projects.id", "=", "user_projects.project_id")->join("stages", "stages.id", "=", "tasks.status")->where("user_id", "=", $userObj->id)->where('projects.workspace', '=', $currentWorkspace->id);
        } else {
            $tasks = Task::select(
                [
                    'tasks.*',
                    'stages.name as stage',
                    'stages.complete',
                ]
            )->join("user_projects", "tasks.project_id", "=", "user_projects.project_id")->join("projects", "projects.id", "=", "user_projects.project_id")->join("stages", "stages.id", "=", "tasks.status")->where("user_id", "=", $userObj->id)->where('projects.workspace', '=', $currentWorkspace->id)->whereRaw("find_in_set('" . $userObj->id . "',tasks.assign_to)");
        }
        if ($request->project) {
            $tasks->where('tasks.project_id', '=', $request->project);
        }
        if ($request->assign_to) {
            $tasks->whereRaw("find_in_set('" . $request->assign_to . "',assign_to)");
        }
        if ($request->due_date_order) {
            if ($request->due_date_order == 'today') {
                $tasks->whereDate('due_date', Carbon::today());
            } else if ($request->due_date_order == 'expired') {
                $tasks->whereDate('due_date', '<', Carbon::today());
            } else if ($request->due_date_order == 'in_7_days') {
                $tasks->whereBetween('due_date', [Carbon::now(), Carbon::now()->addDays(7)]);
            } else {
                $sort = explode(',', $request->due_date_order);
                $tasks->orderBy($sort[0], $sort[1]);
            }
        }
        if ($request->priority) {
            $tasks->where('priority', '=', $request->priority);
        }
        if ($request->status) {
            $tasks->where('tasks.status', '=', $request->status);
        }
        if ($request->start_date && $request->end_date) {
            $tasks->whereBetween(
                'tasks.due_date',
                [
                    $request->start_date,
                    $request->end_date,
                ]
            );
        }
        $tasks = $tasks->get();
        $data = [];
        foreach ($tasks as $task) {
            $tmp = [
                'id' => $task->id,
                'title' => $task->title,
                'project_name' => $task->project->name,
                'milestone' => ($milestone = $task->milestone()) ? $milestone->title : '',
                'due_date' => date('Y-m-d', strtotime($task->due_date)),
                'status' => __($task->stage),
                'priority' => __($task->priority),
            ];
            $data[] = $tmp;
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'Data Update successful',
                'data' => $data
            ],
            200
        );
    }

    public function getTaskShow($project_id, $slug = '')
    {
        if ($project_id) {
            $currentWorkspace = Utility::getWorkspaceBySlug($slug);
            $objUser = Auth::user();
            if ($currentWorkspace->permission == 'Owner') {
                $tasks = Task::with(['taskCreate:id,name,avatar'])->where('project_id', '=', $project_id)->get();
            } else {
                $tasks = Task::with(['taskCreate:id,name,avatar'])->where('project_id', '=', $project_id)->whereRaw("find_in_set('" . $objUser->id . "', assign_to)")->get();
            }
    
           $tasks->transform(function ($task) {
                $userIds = explode(',', $task->assign_to);
                $assignees = User::whereIn('id', $userIds)->select('id', 'name','avatar')->get();
                $task->setAttribute('assignees', $assignees);
                return $task;
            });
            
            return response()->json([
                'success' => true,
                'message' => 'Data Update successful',
                'data' => $tasks
            ], 200);
        }
    }
    


    public function taskStore(Request $request, $projectID, $slug = '')
    {
        $rules = [
            'project_id' => 'required',
            'title' => 'required',
            'priority' => 'required',
            'assign_to' => 'required',
            'start_date' => 'required',
            'due_date' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            // Collect all error messages
            $errors = [];
            foreach ($messages->all() as $message) {
                $errors[] = $message;
            }

            // Return JSON response with errors
            return new JsonResponse([
                'success' => false,
                'errors' => $errors
            ], 422);
        }

        $objUser = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        $user = $currentWorkspace->id;

        $project_name = Project::where('id', $request->project_id)->first();

        if ($objUser->getGuard() == 'client') {
            $project = Project::where('projects.workspace', '=', $currentWorkspace->id)->where('projects.id', '=', $projectID)->first();
        } else {
            $project = Project::select('projects.*')->join('user_projects', 'user_projects.project_id', '=', 'projects.id')->where('user_projects.user_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->where('projects.id', '=', $request->project_id)->first();
        }

        if ($project) {
            $post = $request->all();
            $stage = Stage::where('workspace_id', '=', $currentWorkspace->id)->orderBy('order')->first();
            if ($stage) {
                $post['milestone_id'] = !empty($request->milestone_id) ? $request->milestone_id : 0;
                $post['status'] = $stage->id;
                $post['assign_to'] = implode(",", $request->assign_to);
                $post['created_by'] = $objUser->id;
                $task = Task::create($post);
                $google_msg = '';

                if ($request->get('synchronize_type') == 'google_calender') {

                    $type = 'task';
                    $request1 = new Task();
                    $request1->title = $request->title;
                    $request1->start_date = $request->start_date;
                    $request1->end_date = $request->due_date;

                    $google_msg =  Utility::addCalendarData($request1, $type, $slug);
                }
                ActivityLog::create(
                    [
                        'user_id' => \Auth::user()->id,
                        'user_type' => get_class(\Auth::user()),
                        'project_id' => $projectID,
                        'log_type' => 'Create Task',
                        'remark' => json_encode(['title' => $task->title]),
                    ]
                );

                $settings = Utility::getPaymentSetting($user);
                $uArr = [
                    // 'user_name' => $user->name,
                    'project_name' => $project_name->name,
                    'user_name' => \Auth::user()->name,
                    'task_title' => $task->title,
                ];

                if (isset($settings['task_notificaation']) && $settings['task_notificaation'] == 1) {
                    Utility::send_slack_msg('New Task', $user, $uArr);
                }

                if (isset($settings['telegram_task_notificaation']) && $settings['telegram_task_notificaation'] == 1) {
                    Utility::send_telegram_msg('New Task', $uArr, $user);
                }

                Utility::sendNotification('task_assign', $currentWorkspace, $request->assign_to, $task);


                //webhook
                $module = 'New Task';
                $webhook =  Utility::webhookSetting($module, $user);

                // $webhook=  Utility::webhookSetting($module);
                if ($webhook) {
                    $parameter = json_encode($task);
                    // 1 parameter is  URL , 2 parameter is data , 3 parameter is method
                    $status = Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);
                    if ($status == true) {
                        // $webhook_msg = '';
                    } else {
                        $webhook_msg = 'Webhook call failed!';
                    }
                }
                if ($objUser->getGuard() == 'client') {
                    return response()->json([
                        'success' => true,
                        'message' => 'Task Create Successfully!' . $google_msg . '',
                        'data' => $task
                    ], 201);
                } else {
                    return response()->json([
                        'success' => true,
                        'message' => 'Task Create Successfully!' . $google_msg . '',
                        'data' => $task
                    ], 201);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Please add stages first.',
                ], 403);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'You cant Add Task!',
            ], 403);
        }
    }


    public function taskUpdate(Request $request, $projectID, $taskID, $slug = '')
    {
        $rules = [
                'project_id' => 'required',
                'title' => 'required',
                'priority' => 'required',
                'assign_to' => 'required',
                'start_date' => 'required',
                'due_date' => 'required',
            ];

        $validator = \Validator::make($request->all(), $rules);

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $objUser = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);

        if ($objUser->getGuard() == 'client') {
            $project = Project::where('projects.workspace', '=', $currentWorkspace->id)->where('projects.id', '=', $projectID)->first();
        } else {
            $project = Project::select('projects.*')->join('user_projects', 'user_projects.project_id', '=', 'projects.id')->where('user_projects.user_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->where('projects.id', '=', $request->project_id)->first();
        }
        if ($project) {
            $post = $request->all();
            $post['assign_to'] = implode(",", $request->assign_to);
            $task = Task::find($taskID);
            $task->update($post);

            return response()->json([
                'success' => true,
                'message' => 'Task updated Successfully!',
                'data' => $task
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'You cant Edit Task!',
            ], 403);        
        }
    }

    public function taskDestroy($slug, $projectID, $taskID)
    {
        $objUser = Auth::user();
        $task = Task::where('id', $taskID)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Task deleted Successfully!',
        ], 201);
    }


    public function updateTaskOrder(Request $request, $projectID, $slug = '')
    {
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        $project_name = Project::where('id', $projectID)->first();
        $user1 = $currentWorkspace->id;

        if (isset($request->sort)) {
            foreach ($request->sort as $index => $taskID) {
                $task = Task::find($taskID);
                $task->order = $index;
                $task->save();
            }
        }

        if ($request->new_status != $request->old_status) {
            $new_status = Stage::find($request->new_status);
            $old_status = Stage::find($request->old_status);
            $user = Auth::user();
            $task = Task::find($request->id);
            $task->status = $request->new_status;
            $task->updated_status = $user->name;
            $task->save();

            $name = $user->name;
            $id = $user->id;

            ActivityLog::create([
                'user_id' => $id,
                'user_type' => get_class($user),
                'project_id' => $projectID,
                'log_type' => 'Move',
                'remark' => json_encode([
                    'title' => $task->title,
                    'old_status' => $old_status->name,
                    'new_status' => $new_status->name,
                ]),
            ]);

            $settings = Utility::getPaymentSetting($user1);

            $uArr = [
                'project_name' => $project_name->name,
                'user_name' => Auth::user()->name,
                'task_title' => $task->title,
                'old_stage' => $old_status->name,
                'new_stage' => $new_status->name,
            ];

            if (isset($settings['taskmove_notificaation']) && $settings['taskmove_notificaation'] == 1) {
                Utility::send_slack_msg('Task Stage Updated', $user1, $uArr);
            }

            if (isset($settings['telegram_taskmove_notificaation']) && $settings['telegram_taskmove_notificaation'] == 1) {
                Utility::send_telegram_msg('Task Stage Updated', $uArr, $user1);
            }

            //webhook
            $module = 'Task Stage Updated';
            $webhook =  Utility::webhookSetting($module, $user1);

            if ($webhook) {
                $parameter = json_encode($task);
                // Make webhook call here if needed
            }

            return response()->json([
                'success' => true,
                'message' => 'Task Stage Updated Successfully!',
                'data' => $task
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No changes made'
        ]);
    }



    public function ProjectStore(Request $request, $slug = '')
    {
        $objUser = Auth::user();
        $plan = Plan::find($objUser->plan);
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        $user = $currentWorkspace->id;
        if ($plan) {
            $totalWS = $objUser->countWorkspaceProject($currentWorkspace->id);
            if ($totalWS < $plan->max_projects || $plan->max_projects == -1) {
                $request->validate(['name' => 'required']);

                $post = $request->all();

                $post['start_date'] = $post['end_date'] = date('Y-m-d');
                $post['workspace'] = $currentWorkspace->id;
                $post['created_by'] = $objUser->id;
                $userList = [];
                // if (isset($post['users_list'])) {
                //     $userList = $post['users_list'];
                // }
                if (isset($post['users_list'])) {
                    if (is_string($post['users_list'])) {
                        // Explode the string by comma and trim each email
                        $userList = array_map('trim', explode(',', $post['users_list']));
                    } elseif (is_array($post['users_list'])) {
                        // If it's already an array, just assign it after trimming each element
                        $userList = array_map('trim', $post['users_list']);
                    }
                }
                $userList[] = $objUser->email;
                $userList = array_filter($userList);
                $objProject = Project::create($post);

                $data = [];
                $data['basic_details']  = 'on';
                $data['member']  = 'on';
                $data['client']  = 'on';
                $data['attachment']  = 'on';
                $data['bug_report']  = 'on';
                $data['task']  = 'on';
                $data['password_protected']  = 'off';
                $objProject->copylinksetting =  json_encode($data);
                $objProject->save();

                foreach ($userList as $email) {
                    $permission = 'Member';
                    $registerUsers = User::where('email', $email)->first();
                    if ($registerUsers) {
                        if ($registerUsers->id == $objUser->id) {
                            $permission = 'Owner';
                        }
                    } else {
                        $arrUser = [];
                        $arrUser['name'] = 'No Name';
                        $arrUser['email'] = $email;
                        $password = Str::random(8);
                        $arrUser['password'] = Hash::make($password);
                        $arrUser['currant_workspace'] = $objProject->workspace;
                        $arrUser['lang'] = $currentWorkspace->lang;
                        $registerUsers = User::create($arrUser);
                        $registerUsers->password = $password;

                        $assignPlan = $registerUsers->assignPlan(1);

                        try {
                            Mail::to($email)->send(new SendLoginDetail($registerUsers));
                        } catch (\Exception $e) {
                            $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                        }
                    }
                    $this->inviteUser($registerUsers, $objProject, $permission);
                }

                $settings = Utility::getPaymentSetting($user);
                $uArr = [
                    // 'user_name' => $user->name,
                    'user_name' => Auth::user()->name,
                    'project_name' => $objProject->name,
                ];
                if (isset($settings['project_notificaation']) && $settings['project_notificaation'] == 1) {

                    // $msg = $objProject->name . " created by " . \Auth::user()->name . '.';
                    Utility::send_slack_msg('New Project', $user, $uArr);
                }

                if (isset($settings['telegram_project_notificaation']) && $settings['telegram_project_notificaation'] == 1) {
                    // $msg = $objProject->name . " created by " . \Auth::user()->name . '.';
                    Utility::send_telegram_msg('New Project', $uArr, $user);
                }

                //webhook
                $module = 'New Project';
                $webhook =  Utility::webhookSetting($module, $user);

                // $webhook=  Utility::webhookSetting($module);
                if ($webhook) {
                    $parameter = json_encode($objProject);
                    // 1 parameter is  URL , 2 parameter is data , 3 parameter is method
                    $status = Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);
                    // if($status == true)
                    // {
                    //     return redirect()->back()->with('success', __('Project successfully created!'));
                    // }
                    // else
                    // {
                    //     $webhook_error = __('Webhook call failed');
                    //     // return redirect()->back()->with('error', __('Webhook call failed.'));
                    // }
                }
                return response()->json([
                    'success' => true,
                    'message' => 'Project created successfully',
                    'data' => $objProject,
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Your project limit is over, Please upgrade plan.',
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Default plan is deleted.',
            ], 404);
        }
    }


    public function inviteUser(User $user, Project $project, $permission)
    {
        // assign workspace first
        $authuser = Auth::user();
        $authusername  = User::where('id', '=', $authuser->id)->first();
        $is_assigned = false;
        foreach ($user->workspace as $workspace) {
            if ($workspace->id == $project->workspace) {
                $is_assigned = true;
            }
        }

        if (!$is_assigned) {
            UserWorkspace::create(
                [
                    'user_id' => $user->id,
                    'workspace_id' => $project->workspace,
                    'permission' => $permission,
                ]
            );

            try {
                Mail::to($user->email)->send(new SendWorkspaceInvication($user, $project->workspaceData));
            } catch (\Exception $e) {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }
        }

        // assign project
        $arrData = [];
        $arrData['user_id'] = $user->id;
        $arrData['project_id'] = $project->id;
        $is_invited = UserProject::where($arrData)->first();
        if (!$is_invited) {
            $arrData['permission'] = json_encode(Utility::getAllPermission());
            UserProject::create($arrData);
            if ($permission != 'Owner') {

                try {

                    $uArr = [
                        'user_name' => $user->name,
                        'app_name'  => env('APP_NAME'),
                        'owner_name' => $authusername->name,
                        'project_name' => $project->name,
                        'project_status' => $project->status,
                        'app_url' => env('APP_URL'),
                    ];




                    // Send Email
                    $resp = Utility::sendEmailTemplate('Project Assigned', $user->id, $uArr);
                    // Mail::to($user->email)->send(new SendInvication($user, $project));
                } catch (\Exception $e) {
                    $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                }
            }
        }
    }



    public function taskBoard($projectID, $slug = '')
    {
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);

        $objUser = Auth::user();
        if ($objUser->getGuard() == 'client') {
            $project = Project::select('projects.*')->join('user_projects', 'projects.id', '=', 'user_projects.project_id')->where('projects.workspace', '=', $currentWorkspace->id)->where('projects.id', '=', $projectID)->first();
        } else {
            $project = Project::select('projects.*')->join('user_projects', 'projects.id', '=', 'user_projects.project_id')->where('user_projects.user_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->where('projects.id', '=', $projectID)->first();
        }

        if ($project) {

            $stages = $statusClass = [];

            $permissions = Auth::user()->getPermission($projectID);

            if ($project && (isset($permissions) && in_array('show task', $permissions)) || (isset($currentWorkspace) && $currentWorkspace->permission == 'Owner')) {
                $stages = Stage::where('workspace_id', '=', $currentWorkspace->id)->orderBy('order')->get();

                foreach ($stages as &$status) {
                    $statusClass[] = 'task-list-' . str_replace(' ', '_', $status->id);
                    $task = Task::where('project_id', '=', $projectID);
                    if ($currentWorkspace->permission != 'Owner' && $objUser->getGuard() != 'client') {
                        if (isset($objUser) && $objUser) {
                            $task->whereRaw("find_in_set('" . $objUser->id . "',assign_to)");
                        }
                    }
                    $task->orderBy('order');
                    $status['tasks'] = $task->where('status', '=', $status->id)->get();
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Data Fetch successfull',
                'data' => $stages
            ]);

            // return view('projects.taskboard', compact('currentWorkspace', 'project', 'stages', 'statusClass'));
        } else {

            return response()->json([
                'success' => false,
                'message' => 'Data Fetch failed',

            ]);
            // return redirect()->back()->with('error', __('Task Not Found.'));
        }
    }


    public function commentsAdd(Request $request, $taskID, $clientID = '', $slug = '')
    {

        $task = Task::find($taskID);
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        // $project_name = Project::where('id', $projectID)->first();

        $user1 = $currentWorkspace->id;
        $post = [];
        $post['task_id'] = $taskID;
        $post['comment'] = $request->comment;
        if ($clientID) {
            $post['created_by'] = $clientID;
            $post['user_type'] = 'Client';
        } else {
            $post['created_by'] = Auth::user()->id;
            $post['user_type'] = 'User';
        }
        $comment = Comment::create($post);
        if ($comment->user_type == 'Client') {
            $user = $comment->client;
        } else {
            $user = $comment->user;
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'data' => $comment
        ]);
    }


    public function getComments($id)
    {
        $comments = Comment::where('task_id', $id)->with('user:id,name,avatar')->get();
        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'data' => $comments
        ]);
    }


    // public function notificationSeen($slug='')
    // {
    //     $currentWorkspace = Utility::getWorkspaceBySlug($slug);
    //     $user             = Auth::user();
    //     Notification::where('workspace_id', '=', $currentWorkspace->id)->where('user_id', '=', $user->id)->update(['is_read' => 1]);

    //     dd($user);
    //     return response()->json(['is_success' => true], 200);
    // }

    public function notificationSeen($slug = '')
    {
        // Retrieve the current workspace based on the provided slug
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
    
        // Retrieve the authenticated user
        $user = Auth::user();
    
        // Ensure user is authenticated
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        Notification::where('workspace_id', $currentWorkspace->id)
            ->where('user_id', $user->id)
            ->update(['is_read' => 1]);
    
        $notifications = Notification::where('workspace_id', $currentWorkspace->id)
            ->where('user_id', $user->id)
            ->get();
    
        // Decode the 'data' field of each notification
        $decodedNotifications = $notifications->map(function ($notification) {
            $notification->data = json_decode($notification->data, true);
            return $notification;
        });
    
        // Return the notifications with decoded 'data' field as JSON
        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successful',
            'data' => $decodedNotifications
        ]);
    }
    

    
    public function notificationcount($slug = '')
    {
        // Retrieve the current workspace based on the provided slug
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Ensure user is authenticated
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }


        $notifications = Notification::where('workspace_id', $currentWorkspace->id)
            ->where('user_id', $user->id)
            ->where('is_read', 0)
            ->count();
        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
            'data' => ['unread_notification_count' => $notifications]
        ]);
    }


    public function projectStatus($slug = '')
    {
        // Retrieve the current workspace based on the provided slug
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
    
        // Retrieve the authenticated user
        $user = Auth::user();
    
        // Ensure user is authenticated
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    
        // Count projects based on status and user
        $ongoingCount = Project::where('workspace', $currentWorkspace->id)
                               ->where('created_by', $user->id)
                               ->where('status', 'Ongoing')
                               ->count();
    
        $finishedCount = Project::where('workspace', $currentWorkspace->id)
                                ->where('created_by', $user->id)
                                ->where('status', 'Finished')
                                ->count();
    
        $onHoldCount = Project::where('workspace', $currentWorkspace->id)
                               ->where('created_by', $user->id)
                               ->where('status', 'OnHold')
                               ->count();
    
        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successful',
            'data' => [
                'ongoing_count' => $ongoingCount,
                'finished_count' => $finishedCount,
                'on_hold_count' => $onHoldCount
            ]            
        ]);
    }


    public function scanTasks(Request $request, $slug = '')
    {
        $barcode = $request->barcode;
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        
        $shared_notes = Note::where('type', '=', 'shared')
                            ->where('workspace', '=', $currentWorkspace->id)
                            ->where('barcode', $barcode)
                            ->whereRaw("find_in_set('" . Auth::user()->id . "', notes.assign_to)")
                            ->get();
        
        if ($shared_notes->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No shared notes found for the provided barcode.',
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Data fetch successful',
            'data'  => $shared_notes,
        ], 200);
    }


    public function updateProfile(Request $request,$id)
    {
        // $id = $request->user()->id;
        $obj = User::find($id);
        $dir = 'users-avatar/';
        $logo=Utility::get_file('users-avatar/');
        if ($obj) {
            if($request->has('avatar'))
            {               
                $logoName = uniqid() . '.png';
                $path = Utility::upload_file($request,'avatar',$logoName,$dir,[]);
                if($path['flag'] == 1){
                    $avatar = $path['url'];
                }else{
                    return redirect()->back()->with('error', __($path['msg']));
                }
                // $request->avatar->storeAs('avatars', $logoName);
                $obj->avatar = $logoName;
            }
            
            if (!empty($request->input('email'))) {
                $obj->email = $request->input('email');
            }
            if (!empty($request->input('password'))) {
                $obj->password = Hash::make($request->input('password'));
            }

            if ($obj->save()) {
                $this->data = $obj;
                $this->success = true;
                $this->message = 'Profile is updated successfully';
            }
        }

        return response()->json(['success' => $this->success, 'message' => $this->message, 'data' => $this->data,]);
    }
    


    
    public function subTaskStore(Request $request, $taskID, $clientID = '', $slug = '')
    {
        $post = [];
        $post['task_id'] = $taskID;
        $post['name'] = $request->name;
        $post['due_date'] = $request->due_date;
        $post['status'] = 0;
        $objUser         = Auth::user();
        $client_keyword = $objUser->getGuard() == 'client' ? 'client.' : '';

        if ($clientID) {
            $post['created_by'] = $clientID;
            $post['user_type'] = 'Client';
        } else {
            $post['created_by'] = Auth::user()->id;
            $post['user_type'] = 'User';
        }
        $subtask = SubTask::create($post);
        if ($subtask->user_type == 'Client') {
            $user = $subtask->client;
        } else {
            $user = $subtask->user;
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Add successful',
            'data' => $subtask
        ]);
    }

    public function subTaskUpdate($subtaskID)
    {
        $subtask = SubTask::find($subtaskID);
        $subtask->status = (int) !$subtask->status;
        $subtask->save();

        return response()->json([
            'success' => true,
            'message' => 'Data update successful',
            'data' => $subtask
        ]);   
     }

    public function subTaskDestroy($subtaskID)
    {
        $subtask = SubTask::find($subtaskID);
        $subtask->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data delete successful',
        ]);      
    }


    public function subTaskGet($subtaskID)
    {
        $subtask = SubTask::where( 'id' ,$subtaskID)->get();
        return response()->json([
            'success' => true,
            'message' => 'Data delete successful',
            'data' => $subtask
        ]);      
    }


    public function getProjectActivities($projectID, $slug = '')
    {
        $objUser = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);

        if ($objUser->getGuard() == 'client') {
            $project = Project::select('projects.*')
                ->join('client_projects', 'projects.id', '=', 'client_projects.project_id')
                ->where('client_projects.client_id', '=', $objUser->id)
                ->where('projects.workspace', '=', $currentWorkspace->id)
                ->where('projects.id', '=', $projectID)
                ->first();
        } else {
            $project = Project::select('projects.*')
                ->join('user_projects', 'projects.id', '=', 'user_projects.project_id')
                ->where('user_projects.user_id', '=', $objUser->id)
                ->where('projects.workspace', '=', $currentWorkspace->id)
                ->where('projects.id', '=', $projectID)
                ->first();
        }

        if ($project) {
            $activities = $project->activities;

            // if (!((isset($permissions) && in_array('show activity', $permissions)) || $currentWorkspace->permission == 'Owner')) {
            //     return response()->json([
            //         'success' => false,
            //         'message' => 'orPermission denied',
            //     ]); 
            // }

            $activityData = $activities->map(function ($activity) {
                return [
                    'log_type' => $activity->log_type,
                    'log_type_description' => $activity->logType($activity->log_type),
                    'remark' => $activity->getRemark(),
                    'created_at' => $activity->created_at->diffForHumans(),
                ];
            });
            return response()->json([
                'success' => true,
                'message' => 'Data delete successful',
                'data' => $activityData
            ]);  
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Project not found or permission denied.',
            ]);  
        }
    }


    public function createUser( Request $request,$slug = '')
    {
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        $post = $request->all();
        $name = $post['username'];
        $email = $post['useremail'];
        $user_type = $post['user_type'];
        $password = $post['userpassword'];
        $verify = date('Y-m-d i:h:s');
        $registerUsers = User::where('email', $email)->first();

        if ($registerUsers) {
            return response()->json(
                [
                    'success' => false,
                    'code' => 400,
                    'status' => 'Error',
                    'message' => 'Email is Already Exists.',
                ],
                400
            );
        } else {
            $objUser = Auth::user();
            $plan = Plan::find($objUser->plan);
            if ($plan) {
                $totalWS = $objUser->countUsers($currentWorkspace->id);
                if ($totalWS < $plan->max_users || $plan->max_users == -1) {
                    $arrUser = [
                        'name' => $name,
                        'email' => $email,
                        'user_type' => $user_type,
                        'password' => Hash::make($password),
                        'currant_workspace' => $currentWorkspace->id,
                        'email_verified_at' => $verify,
                        'lang' => $currentWorkspace->lang,
                    ];
                    $registerUsers = User::create($arrUser);
                    $assignPlan = $registerUsers->assignPlan(1);
                    $registerUsers->password = $password;
                    if (!$assignPlan['is_success']) {
                        return response()->json(
                            [
                                'success' => false,
                                'code' => 400,
                                'status' => 'Error',
                                'message' => ($assignPlan['error']),
                            ],
                            400
                        );
                    }
                    try {
                        Mail::to($email)->send(new SendLoginDetail($registerUsers));
                    } catch (\Exception $e) {
                        $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
                    }
                } else {
                    return response()->json(
                        [
                            'success' => false,
                            'code' => 400,
                            'status' => 'Error',
                            'message' => 'Your user limit is over, Please upgrade plan.',
                        ],
                        400
                    );
                }
            } else {
                return response()->json(
                    [
                        'success' => false,
                        'code' => 400,
                        'status' => 'Error',
                        'message' => 'Default plan is deleted.',
                    ],
                    400
                );
            }
        }

        // Assign workspace
        $is_assigned = false;
        foreach ($registerUsers->workspace as $workspace) {
            if ($workspace->id == $currentWorkspace->id) {
                $is_assigned = true;
            }
        }

        if (!$is_assigned) {
            $permission = ($user_type == 'head_department') ? 'Head Department' : 'Member';
            UserWorkspace::create(
                [
                    'user_id' => $registerUsers->id,
                    'workspace_id' => $currentWorkspace->id,
                    'permission' => $permission,
                ]
            );

            try {
                Mail::to($registerUsers->email)->send(new SendWorkspaceInvication($registerUsers, $currentWorkspace));
            } catch (\Exception $e) {
                $smtp_error = __('E-Mail has been not sent due to SMTP configuration');
            }
        }

        return response()->json(
            [
                'success' => true,
                'code' => 200,
                'data' =>$registerUsers,
                'message' =>'Users Invited Successfully!',
            ]
        );
    }

    
    
}
