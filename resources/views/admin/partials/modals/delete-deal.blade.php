<div class="modal fade" tabindex="-1" id="delete_deal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Deal: {{ $deal->title }}</h5>
            </div>

            <div class="modal-body">
                <p>Are you sure??</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                {!! Form::open(['route' => ['admin.deal.destroy', $deal->id], 'method' => 'delete']) !!}
                <x-admin.button type="danger" text="Delete" />
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
