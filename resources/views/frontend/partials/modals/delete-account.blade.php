<div class="modal fade" tabindex="-1" id="delete_account">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Account</h5>
            </div>

            <div class="modal-body">
                <p>Are you sure??</p>
                <p>This action is irreversible and all of your data will be deleted!</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                {!! Form::open(['route' => ['user.destroy', $currentUser->id], 'method' => 'delete']) !!}
                {!! Form::submit('Delete Account', ['class' => 'btn btn-sm btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
