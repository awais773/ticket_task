<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\Utility;
use App\Models\Workspace;
use App\Models\TrackPhoto;
use App\Models\TimeTracker;
use App\Models\UserProject;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Models\UserWorkspace;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class apicontroller extends Controller
{
    use ApiResponser;

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
        $workspace_id =$user->currant_workspace ;
        $getworkspace=Workspace::where("id",$workspace_id)->first();

        $settings = [

            'shot_time'=> isset($getworkspace->interval_time)?$getworkspace->interval_time:10,
        ];

        return $this->success([
            'token' => auth()->user()->createToken('API Token')->plainTextToken,
            'user'=>auth()->user(),
            // 'settings' =>$settings,
        ],'Login successfully.');
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return $this->success([],'Tokens Revoked');
    }

    public function getworkspace(Request $request){

        $objUser = Auth::user();
        if($objUser && $objUser->currant_workspace)
        {
            $rs = Workspace::select([
                'workspaces.*',
                'user_workspaces.permission',
            ])->join('user_workspaces', 'workspaces.id', '=', 'user_workspaces.workspace_id')->where('user_id', '=', $objUser->id)->pluck('slug','id')->toArray();

        }

        return $this->success([
            'workspaces' =>  $rs,
        ],'Get Workspace successfully.');

    }

    public function getProjects(Request $request){

        $user = auth()->user();

        // \Log::info(json_encode( $request->all()));
        $rs = Workspace::select(['workspaces.*'])->join('client_workspaces', 'workspaces.id', '=', 'client_workspaces.workspace_id')->where('workspaces.id', '=', $user->currant_workspace)->where('client_id', '=', $user->id)->first();


        // $workspace_id = !isset($request->work_space) && !empty($request->work_space) ?$request->work_space: 1;
        $workspace_id = !isset($request->work_space) && !empty($request->work_space) ?$request->work_space: $user->currant_workspace;

        $user = auth()->user();


        if($user->type ="user")
        {
            $assign_pro_ids = UserProject::where('user_id',$user->id)->pluck('project_id');
            $project_s      = Project::with('task')->select(
                [
                    'name',
                    'id',
                    'workspace',
                ]
            )->whereIn('id', $assign_pro_ids)->where('workspace',$workspace_id)->get()->toArray();
        }
        else
        {
            $project_s = Project::with('task')->select(
                [
                    'name',
                    'id',
                    'workspace',
                ]
            )->where('created_by', $user->id)->where('workspace',$workspace_id)->get()->toArray();

        }

        return $this->success([
            'projects' => $project_s,
        ],'Get Project List successfully.');


    }


    public function addTracker(Request $request){

        $user = auth()->user();
        if($request->has('action') && $request->action == 'start'){

            $validatorArray = [
                'task_id' => 'required|integer',
            ];
            $validator      = \Validator::make(
                $request->all(), $validatorArray
            );
            if($validator->fails())
            {
                return $this->error($validator->errors()->first(), 401);
            }
            $task= Task::find($request->task_id);
            if(empty($task)){
                return $this->error('Invalid task', 401);
            }

            $project_id = isset($task->project_id)?$task->project_id:'';
            TimeTracker::where('created_by', '=', $user->id)->where('is_active', '=', 1)->update(['end_time' => date("Y-m-d H:i:s")]);

            $track['name']        = $request->has('workin_on') ? $request->input('workin_on') : '';
            $track['project_id']  = $project_id;
            $track['workspace_id']  = $request->workspaces_id;
            $track['start_time']  = $request->has('time') ?  date("Y-m-d H:i:s",strtotime($request->input('time'))) : date("Y-m-d H:i:s");
            $track['task_id']     = $request->has('task_id') ? $request->input('task_id') : '';

            // $track['created_by']  = $user->id;
            $track                = TimeTracker::create($track);
            $track->action        ='start';
            return $this->success( $track,'Track successfully create.');
        }else{
            $validatorArray = [
                'task_id' => 'required|integer',
                'traker_id' =>'required|integer',
            ];
            $validator      = Validator::make(
                $request->all(), $validatorArray
            );
            if($validator->fails())
            {
                return Utility::error_res($validator->errors()->first());
            }
            $tracker = TimeTracker::where('id',$request->traker_id)->first();

            if($tracker)
            {
                $tracker->end_time   = $request->has('time') ?  date("Y-m-d H:i:s",strtotime($request->input('time'))) : date("Y-m-d H:i:s");
                $tracker->is_active  = 0;
                $tracker->total_time = Utility::diffance_to_time($tracker->start_time, $tracker->end_time);
                $tracker->save();
                return $this->success( $tracker,'Stop time successfully.');
            }
        }

    }

    public function uploadImage(Request $request){

        
        
        $user = auth()->user();
        $image_base64 = base64_decode($request->img);
        $file =$request->imgName;
        $logo=Utility::get_file('uploads/traker_images/');
        $settings = Utility::getAdminPaymentSetting();

        if($request->has('tracker_id') && !empty($request->tracker_id)){
            //$app_path = storage_path('uploads/traker_images/').$request->tracker_id.'/';


            if($settings['storage_setting']=='local')
            {
                $app_path = storage_path('uploads/traker_images/').$request->tracker_id.'/';
            }
            else
            {
                $app_path = $logo.$request->tracker_id.'/';
            }

            if (!file_exists($app_path)) {
                mkdir($app_path, 0777, true);
            }

        }else{
            // $app_path = storage_path('uploads/traker_images/');

            if($settings['storage_setting']=='local')
            {
                $app_path = storage_path('uploads/traker_images/');
            }
            else
            {
                $app_path = $logo;
            }

            if (is_dir($app_path)) {
                mkdir($app_path, 0777, true);
            }
        }
        
        $file_name =  $app_path.$file;
        file_put_contents( $file_name, $image_base64);
        $new = new TrackPhoto();
        $new->track_id = $request->tracker_id;
        $new->user_id  = $user->id;
        $new->workspace_id =0;
        $new->img_path  = 'uploads/traker_images/'.$request->tracker_id.'/'.$file;
        $new->time  = $request->time;
        $new->status  = 1;
        $new->save();
        return $this->success( [],'Uploaded successfully.');
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
        $storage_limit = number_format( $storage_limit ,2 );
        
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
        if($currentWorkspace)
        {
            $users = User::select('users.*', 'user_workspaces.permission', 'user_workspaces.is_active')->join('user_workspaces', 'user_workspaces.user_id', '=', 'users.id');
            $users->where('user_workspaces.workspace_id', '=', $currentWorkspace->id);
            $users = $users->get();
        }
        else
        {
            $users = User::where('type', '!=', 'admin')->get();
        }
        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
              'date'  =>$users,
            //   'currentWorkspace'  =>$currentWorkspace,
        ], 200);
    }


    
    public function GroupDepartmenProject($slug = '')
    {
        $objUser = Auth::user();
        $currentWorkspace = Utility::getWorkspaceBySlug($slug);
        if ($objUser->getGuard() == 'client') {
            $projects = Project::select('projects.*')->join('client_projects', 'projects.id', '=', 'client_projects.project_id')->where('client_projects.client_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->get();
        } else {
            $projects = Project::select('projects.*')->join('user_projects', 'projects.id', '=', 'user_projects.project_id')->where('user_projects.user_id', '=', $objUser->id)->where('projects.workspace', '=', $currentWorkspace->id)->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Data Fetch successfull',
              'date'  =>$projects,
            //   'currentWorkspace'  =>$currentWorkspace,
        ], 200);    }
    

}
