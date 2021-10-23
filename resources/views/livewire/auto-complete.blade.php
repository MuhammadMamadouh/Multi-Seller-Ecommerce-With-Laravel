<div>
    <form class="big-deal-form ">
        <div class="input-group ">
            <div class="input-group-text">
                <span class="search"><i class="fa fa-search"></i></span>
            </div>
            <input type="search" class="form-control" placeholder="Search a Product"
                   wire:model="query"
                   wire:keydown.escape="resetForm"
                   wire:keydown.tab="resetForm"
                   wire:keydown.ArrowUp="decrementHighlight"
                   wire:keydown.ArrowDown="incrementHighlight"
                   wire:keydown.enter="selectContact"
            >
        </div>
    </form>

    <div wire:loading class="position-absolute z-10 w-full bg-white rounded-t-none shadow-lg list-group">
        <div class="list-item">Searching...</div>
    </div>

    @if(!empty($query))
        <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="resetForm"></div>

        <div class="absolute z-10 w-full bg-white rounded -t-none shadow-lg list-group ">
            @if(!empty($products))
                @foreach($products as $i => $product)
                    <a
                        href="{{route('product.details', $product->id)}}"
                        class="list-item list-group-item p-3 text-black-50 text-lg-start"
{{--{{ $highlightIndex === $i ? 'highlight' : '' }}"--}}
                    >{{ $product->name}}</a>
                @endforeach
            @else
                <div class="list-item p-5 ">No results!</div>
            @endif
        </div>

    @endif
</div>
