<div class="container">
    @foreach ($products as $product)
    <div class="item" style="border : 1px solid blue; display : inline-block; margin : 20px">
        <h2>{{$product->product_name}}</h2>
        <p>{{$product->category_id}}</p>
        <a href="{{url('/nproduct/detail',[$product->id])}}">Chi tiet</a>
    </div>

    @endforeach
</div>