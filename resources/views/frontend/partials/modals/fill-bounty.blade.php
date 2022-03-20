<div class="modal fade" tabindex="-1" id="fill_bounty">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                {!! Form::open(['route' => ['bounty.update', $bounty->id], 'method' => 'patch']) !!}
                <h5 class="modal-title">Fill Bounty: {{ $bounty->item_name }}</h5>
            </div>

            <div class="modal-body">
                {!! Form::label('deal_id', 'Enter URL of Deal', ['class' => 'control-label']) !!}
                {!! Form::text('deal_id', old('deal_id'), ['class' => 'form-control']) !!}
                @error('deal_id')
                <x-admin.alert type="danger" :message="$message"/>
                @enderror
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                {!! Form::submit('Submit', ['class' => 'btn btn-sm']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
