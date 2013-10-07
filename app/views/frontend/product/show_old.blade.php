@section('script')
<script>
$(function(){
    $('#tab-container').easytabs();
});
</script>
@stop

@section('banner')
    {{ HTML::image('upload/images/'.$taxo2_img) }}
@stop

@section('breadcrumb')
    <ul id="breadcrumb-2">
        <li><a href="{{ URL::route('frontend.index') }}" title="Home">Home</a></li>
        <li><a href="{{ URL::route('product.index') }}" title="Products">Products</a></li>
        <li><a href="{{ URL::route('product.index') }}" title="{{ $taxo1 }}">{{ $taxo1 }}</a></li>
        <li><a href="{{ URL::route('frontend.products.second', $model['taxonomy_id']) }}" title="{{ $taxo2 }}">{{ $taxo2 }}</a></li>
        <li class="current">{{ $model['model'] }}</li>
    </ul>
@stop

@section('content')
<div id="mainContent">
    <div class="oldProductImg">
        @if(count($pix) > 0)
            <img src="{{ asset('/upload/images/'.$pix[0]['name']) }}" width="250" height="250" />
        @else
            <img src="http://placehold.it/250x250&text=COMING SOON" width="250" height="250" />
        @endif
    </div>
    <div class="oldProductR">
        <div class="productTitle">
            <h4>{{ $model['model'] }}</h4>
            <h5>{{ $model['name'] }}</h5>
        </div>
        {{ $model['description'] }}
        <div class="backpage"><a href="{{ URL::route('frontend.products.second', $model['taxonomy_id']) }}">
            <img src="{{ asset('assets/frontend/images/back.png') }}" width="52" height="18" />
        </a></div>
    </div>
</div>
@stop
