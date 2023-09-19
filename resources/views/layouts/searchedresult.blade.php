<style>
/* search-link{
    float: left;
    background-color: white;
} */
.search_result{
    background-color: white;
}

</style>
<ul>
@foreach ($matches as $match)
    <li>
        <a class="search-link" href="/#/single-product/{{$match->id}}/{{$match->name}}">
            <img src="{{ $match->image_link1 }}" style="height: 50px; float: left;" alt="">   
            <p>{{ $match->name }} <br> ₦{{ number_format($match->price_list->normalPrice) }}/<sub>{{ $match->price_list->quantity }} piece(s)</sub></p>
        </a>
    </li>
@endforeach
</ul>
