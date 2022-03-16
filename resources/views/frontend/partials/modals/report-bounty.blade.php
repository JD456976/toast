<div class="modal fade" tabindex="-1" id="report_bounty">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                {!! Form::open(['route' => ['report.bounty', $bounty->id], 'method' => 'post']) !!}
                <h5 class="modal-title">Report Bounty: {{ $bounty->item_name }}</h5>
            </div>

            <div class="modal-body">
                {!! Form::label('reason', 'Select a Reason', ['class' => 'control-label']) !!}
                {!! Form::select('reason', ['test' => 'test'] , null , ['class' => 'form-control mb-20']) !!}

                {!! Form::label('comment', 'Comment', ['class' => 'control-label']) !!}
                {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'style' => 'height:100px;']) !!}
                @error('comment')
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
