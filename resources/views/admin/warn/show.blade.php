<x-layouts.admin>
    <x-slot:title>
        Viewing Warning For: {{ $warn->user->displayName() }}
    </x-slot:title>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title">Viewing Warning For: {{ $warn->user->displayName() }}</h3>
                        <div class="card-toolbar">
                            <div class="d-flex">
                                <a href="{{ route('admin.warn.edit', $warn->id) }}"><x-admin.button type="warning" text="Edit Warning" /></a>
                                {!! Form::open(['route' => ['admin.warn.destroy', $warn->id], 'method' => 'delete']) !!}
                                <x-admin.button type="danger" text="Delete Warning" />
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $warn->content }}
                    </div>
                    <div class="card-footer">
                        <div class="d-flex flex-column">
                            <li class="d-flex align-items-center py-2">
                                <span class="bullet me-5"></span>Warned By: <a href="{{ route('admin.user.show', $warn->staff_id) }}">{{ $warn->staff->displayName() }}</a>
                            </li>
                            <li class="d-flex align-items-center py-2">
                                <span class="bullet me-5"></span> Reason: {{ $warn->reason }}
                            </li>
                            <li class="d-flex align-items-center py-2">
                                <span class="bullet me-5"></span> Issued: {{ $warn->created_at->diffForHumans() }}
                            </li>
                            <li class="d-flex align-items-center py-2">
                                <span class="bullet me-5"></span> Expires: {{ $warn->expireDate() }}
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
