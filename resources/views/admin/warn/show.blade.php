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
                    @role('admin')
                        <div class="card-footer">
                            <h5>Audit Trail</h5>
                            <!--begin::Accordion-->
                            <div class="accordion" id="kt_accordion_1">
                                @foreach ($warn->audits as $audit)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="kt_accordion_1_header_1">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#audit_{{ $audit->id }}" aria-expanded="true" aria-controls="audit_{{ $audit->id }}">
                                                Audit #{{ $audit->id }}
                                            </button>
                                        </h2>
                                        <div id="audit_{{ $audit->id }}" class="accordion-collapse collapsed show" aria-labelledby="kt_accordion_1_header_1" data-bs-parent="#kt_accordion_1">
                                            <div class="accordion-body">
                                               {{ $audit->user->displayName() }} - {{ $audit->event }} - this warning {{ $audit->created_at->diffForHumans() }}
                                                <div class="d-flex flex-column">
                                                    @if(!empty($audit->new_values['reason']))
                                                    <li class="d-flex align-items-center py-2">
                                                        <span class="bullet me-5"></span><strong>Old Reason:</strong> {{ $audit->old_values['reason'] }} <strong>New Reason:</strong> {{ $audit->new_values['reason'] }}
                                                    </li>
                                                    @endif
                                                    @if(!empty($audit->new_values['content']))
                                                    <li class="d-flex align-items-center py-2">
                                                        <span class="bullet me-5"></span><strong> Old Content:</strong> {{ $audit->old_values['content'] }} <strong>New Content:</strong> {{ $audit->new_values['content'] }}
                                                    </li>
                                                    @endif
                                                    @if(!empty($audit->new_values['expires']))
                                                    <li class="d-flex align-items-center py-2">
                                                        <span class="bullet me-5"></span> <strong> Old Expiration:</strong> {{ $audit->old_values['expires'] }} <strong>New Expiration:</strong> {{ $audit->new_values['expires'] }}
                                                    </li>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--end::Accordion-->
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
