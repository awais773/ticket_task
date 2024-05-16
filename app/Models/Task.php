<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'priority',
        'description',
        'start_date',
        'due_date',
        'assign_to',
        'project_id',
        'milestone_id',
        'status',
        'order',
        'created_by',
        'updated_status',
    ];

    public function project()
    {
        return $this->hasOne('App\Models\Project', 'id', 'project_id');
    }

    public function taskCreate(){
        return $this->hasOne('App\Models\User', 'id', 'created_by');

    }

    public function updated_status(){
        return $this->hasOne('App\Models\User', 'id', 'updated_status');

    }

    public function assignees()
    {
        $userIds = explode(',', $this->assign_to);
        return User::whereIn('id', $userIds)->get();
    }

    public function users()
    {
        return User::whereIn('id',explode(',',$this->assign_to))->get();
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'task_id', 'id')->orderBy('id', 'DESC');
    }

    public function taskFiles()
    {
        return $this->hasMany('App\Models\TaskFile', 'task_id', 'id')->orderBy('id', 'DESC');
    }

    public function milestone()
    {
        return $this->milestone_id ? Milestone::find($this->milestone_id) : null;
    }

    public function sub_tasks()
    {
        return $this->hasMany('App\Models\SubTask', 'task_id', 'id')->orderBy('id', 'DESC');
    }

    public function taskCompleteSubTaskCount()
    {
        return $this->sub_tasks->where('status', '=', '1')->count();
    }

    public function taskTotalSubTaskCount()
    {
        return $this->sub_tasks->count();
    }

    public function subTaskPercentage()
    {
        $completedChecklist = $this->taskCompleteSubTaskCount();
        $allChecklist = max($this->taskTotalSubTaskCount(), 1);

        $percentageNumber = ceil(($completedChecklist / $allChecklist) * 100);
        $percentageNumber = $percentageNumber > 100 ? 100 : ($percentageNumber < 0 ? 0 : $percentageNumber);

        return (int) number_format($percentageNumber);
    }

}
