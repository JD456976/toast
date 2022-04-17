<div>
    <div class="row justify-content-center mb-30">
        <div class="col">
            <strong class="mr-10">Rate This Deal: </strong>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <button wire:click="up({{ $deal->id }})"><img
                            src="{{ asset('assets/frontend/imgs/theme/icons/thumbs-up-regular.svg') }}"
                            alt="" height="40" width="40">
                    </button>

                </li>
                <li class="list-inline-item">
                    <button wire:click="down({{ $deal->id }})"><img
                            src="{{ asset('assets/frontend/imgs/theme/icons/thumbs-down-regular.svg') }}"
                            alt="" height="40" width="40">
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="attr-detail attr-size mb-30">
        <strong class="mr-10">Average Rating: </strong>
        <h6>{{ $rating }}</h6>
    </div>
</div>
