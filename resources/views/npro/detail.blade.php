<h1>{{$product->product_name}}</h1>
<h2>Gia : </h2>

@foreach ($product->combinations as $productt)
<input type="hidden" name="combination_string" value="{{$productt->combination_string}}">
<input type="hidden" name="price" value="{{$productt->price}}">
@endforeach

<div>
    @foreach ($product->variations as $variation)
    <div>

        <label for="">{{$variation->variation_name}}</label>
        @php
        $variationsIsset = [];
        @endphp

        @foreach ($product->variation_value as $item)
        @if ($variation->variation_name === $item->variation_name)

        @if (!in_array($item->variation_value, $variationsIsset))

        <input type="radio" onchange="changeVariation(this)" name="{{$item->variation_name}}"
            id="{{$item->variation_value}}" value="{{$item->variation_value}}">
        <label for="{{$item->variation_value}}">{{$item->variation_value}}</label>

        @endif

        @php
        $variationsIsset[] = $item->variation_value;
        @endphp


        @endif
        @endforeach
    </div>

    @endforeach

</div>

<script>

</script>