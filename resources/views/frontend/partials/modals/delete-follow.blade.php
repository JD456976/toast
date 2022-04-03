<div class="modal fade" tabindex="-1" id="delete_follow">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove: {{ $follow->user->displayName() }}</h5>
            </div>

            <div class="modal-body">
                <p>Are you sure??</p>
            </div>

            <div class="modal-footer">
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    {!! Form::open(['route' => ['follow.destroy', $follow->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Remove', ['class' => 'btn btn-sm btn-danger']) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
