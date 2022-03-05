<x-layouts.app>
    <x-slot:title>
        Create New Deal
    </x-slot:title>
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-40">
                    <h1 class="heading-2 mb-10">Post New Deal</h1>
                </div>
            </div>
            <livewire:scraper />
        </div>
    </main>
    @push('footer-scripts')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            window.onload = function() {
                Livewire.on('confirmScrape', () => {
                    Swal.fire(
                        'How did we do?!',
                        'We grabbed as much data as possible. Please give it a once over.',
                        'success'
                    )
                })
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/laravel-file-uploader"></script>
        <script>
            new Vue({
                el: '#app'
            })
        </script>
    @endpush
</x-layouts.app>
