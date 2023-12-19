<form class="" method="post" action="{{ route('users.addPromotion',[$currentWorkspace->slug,$user->id]) }}">
    @csrf
    @method('post')
    <div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <label for="name" class="col-form-label">{{ __('Employee Salary')}}</label>
            <input type="text" class="form-control" id="employee_salary" name="employee_salary" required/>
        </div>
        </div>
    </div>
        <div class="modal-footer">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close')}}</button>
            <input type="submit" value="{{ __('Save Changes' )}}" class="btn  btn-primary">
        </div>
    
</form>


