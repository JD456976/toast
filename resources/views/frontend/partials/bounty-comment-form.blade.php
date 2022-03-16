<div class="row">
    <div class="col-lg-8 col-md-12">
        {!! Form::open(['route' => ['bounty.comment.store', $bounty->id], 'method' => 'post', 'class' => 'form-contact comment_form']) !!}
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    {!! Form::textarea('comment', old('comment'), ['class' => 'form-control w-100', 'style' => 'height:150px;', 'placeholder' => 'Leave a comment...']) !!}
                    @error('comment')
                    <x-admin.alert type="danger" :message="$message"/>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                {!! Form::submit('Submit Comment', ['class' => 'btn btn-sm btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
