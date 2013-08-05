@section('banner')
    {{ HTML::image('assets/frontend/images/all_products_banner.jpg') }}
@stop

@section('breadcrumb')
    <ul id="breadcrumb-2">
        <li><a href="{{ URL::route('frontend.index') }}" title="Home">Home</a></li>
        <li><a href="#" title="{{ $taxo1 }}">{{ $taxo1 }}</a></li>
        <li class="current">{{ $taxo2 }}</li>
    </ul>
@stop

@section('script')
$(function(){
    $('#taxo1_a_{{ $taxo1_id }}').addClass('active');
    $('#taxo1_{{ $taxo1_id }}').addClass('expand');
});
@stop

@section('content')
<div id="mainContent">
    @include('frontend.layouts.partial.main_menu')
    <div id="productListR">
        <div class="p-box">
            <h3>{{ $taxo2 }} Products</h3>
            <ol>
                <p><a href="detail.html">
                    <img src="images/productsImg/smail_120x120/coming_soon.png" />
                </a></p>
                <li><a href="detail.html">HS-305</a></li>
            </ol>
        </div>

        <div class="paginationBox">
            <ul class="pagination paginationA paginationA12">
                <li><a href="#" class="first">First</a></li>
                <li><a href="#" class="previous">Previous</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#" class="current">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#" class="next">Next</a></li>
                <li><a href="#" class="last">Last</a></li>
            </ul>
        </div>
        <div class="p-box">
            <h3>{{ $taxo2 }}'s Old Products</h3>
            <ol>
                <p><a href="detail.html"><img src="images/productsImg/smail_120x120/coming_soon.png" /></a></p>
                <li><a href="detail.html">HS-305</a></li>
            </ol>
        </div>
        <div class="paginationBox">
            <ul class="pagination paginationA paginationA12">
                <li><a href="#" class="first">First</a></li>
                <li><a href="#" class="previous">Previous</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#" class="current">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#" class="next">Next</a></li>
                <li><a href="#" class="last">Last</a></li>
            </ul>
        </div>
    </div>
</div>
@stop
