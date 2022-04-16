<div>
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
