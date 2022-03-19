<div class="modal fade" tabindex="-1" id="delete_blog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Deleting Blog Post: {{ $blog->title }}</h5>
            </div>

            <div class="modal-body">
                <p>Are you sure??</p>
            </div>

            <div class="modal-footer">
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    {!! Form::open(['route' => ['admin.blog.destroy', $blog->id], 'method' => 'delete']) !!}
                    {!! Form::submit('Delete Blog Post', ['class' => 'btn btn-sm btn-danger']) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>
