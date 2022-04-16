<div>
    <button wire:click="watchlist({{ $deal->product_id }})" class="btn"><i class="fi-rs-heart"></i></button>
    <button wire:click="follow({{ $deal->product_id }})" class="btn"><i class="fi-rs-add"></i></button>
</div>
