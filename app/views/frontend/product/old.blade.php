@section('script')
<script>
$(function(){
});
</script>
@stop

@section('banner')
    {{ HTML::image('upload/images/'.$taxo2_img) }}
@stop

@section('breadcrumb')
    <ul id="breadcrumb-2">
        <li><a href="{{ URL::route('frontend.index') }}" title="Home">Home</a></li>
        <li><a href="#" title="Products">Products</a></li>
        <li><a href="#" title="{{ $taxo1 }}">{{ $taxo1 }}</a></li>
        <li><a href="#" title="{{ $taxo2 }}">{{ $taxo2 }}</a></li>
        <li class="current">{{ $model['model'] }}</li>
    </ul>
@stop

@section('content');
<div id="mainContent">
        <div class="oldProductImg">
            {{ HTML::image('upload/old_prod/'.strtolower($pix[0]['name']), null, array('width'=>250, 'height'=>250)) }}
        </div>
        <div class="oldProductR">
            <div class="productTitle">
                <h4>{{ $model['model'] }}</h4>
                <h5>{{ $model['name'] }}</h5>
            </div>
            {{ $model['description'] }}
            <div class="backpage"><a href="../products_second.html">
                {{ HTML::image('assets/frontend/images/back.png', null, array('width'=>52, 'height'=>18)) }}
            </a></div>
        </div>
</div>
@stop;
