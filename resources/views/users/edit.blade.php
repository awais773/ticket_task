<form class="" method="post" action="{{ route('users.update',[$currentWorkspace->slug,$user->id]) }}">
    @csrf
    @method('post')
    <div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <label for="name" class="col-form-label">{{ __('Name')}}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}"/>
        </div>
         <div class="col-md-12">
            <label for="email" class="col-form-label">{{ __('Email')}}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"/>
        </div>
        <div class="col-md-12">
            <label for="name" class="col-form-label">{{ __('Project can complete in each month')}}</label>
            <input type="number" class="form-control" id="project_each_month" name="project_each_month" value="{{$user->project_each_month}}"/>
        </div>
        <div class="col-md-12">
            <label for="name" class="col-form-label">{{ __('Project can complete in Each Year')}}</label>
            <input type="number" class="form-control" id="project_each_year" name="project_each_year" value="{{$user->project_each_year}}"/>
        </div>
        <div class="col-md-12">
            <label for="name" class="col-form-label">{{ __('Employee Salary')}}</label>
            <input type="text" class="form-control" id="employee_salary" name="employee_salary" value="{{$user->employee_salary}}"/>
        </div>
        <div class="col-md-12">
            <label for="name" class="col-form-label">{{ __(' Employee Number')}}</label>
            <input type="text" class="form-control" id="employee_number" name="employee_number" value="{{$user->employee_number}}"/>
        </div>
        </div>
    </div>
        <div class="modal-footer">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close')}}</button>
            <input type="submit" value="{{ __('Save Changes' )}}" class="btn  btn-primary">
        </div>
    
</form>


