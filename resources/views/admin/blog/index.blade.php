<x-layouts.admin>
    <x-slot:title>
        Blog Post List
    </x-slot:title>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
                <livewire:post-table/>
            </div>
        </div>
    </div>
</x-layouts.admin>
