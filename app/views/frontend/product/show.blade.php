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
        <li><a href="#" title="Products">Products</a></li>
        <li><a href="#" title="{{ $taxo1 }}">{{ $taxo1 }}</a></li>
        <li><a href="#" title="{{ $taxo2 }}">{{ $taxo2 }}</a></li>
        <li class="current">{{ $model['model'] }}</li>
    </ul>
@stop

@section('content')
<div id="productMainContent"><!-- InstanceBeginEditable name="productsMainContent" -->
    <div class="pBig">
        @if($pix)
            {{ HTML::image('upload/images/'.$pix[0]['name'], '', array('width'=>400, 'height'=>400)) }}
        @else
            <img src="http://placehold.it/400x400&text=COMING SOON">
        @endif
        <div class="imgZoom"><a href="#">{{ HTML::image('assets/frontend/images/zoom.gif') }}</a></div>
    </div>
    <div class="productDetailR">
        <span class="productStyle01">{{ $taxo1 }}</span>
        <h4>{{ $model['model'] }}</h4>
        <h5>{{ $model['name'] }}</h5>
        <p>&nbsp;</p>
        <p class="productDescription">{{ $model['description'] }}</p>
        <div id="detailImgSBox">
            @if($pix)
            <ul>
                @foreach($pix as $t)
                <li>{{ HTML::image('upload/images/'.$t['name'], null, array('style'=>'width:120px;height:120px;')) }}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>

    <div id="tab_wrap">
        <div id="tab-container" class='tab-container'>
            @if($tab)
            <ul class='etabs'>
                @foreach($tab as $t)
                    <li class='tab'><a href="#{{ $t['tab_key'] }}">{{ $t['title'] }}</a></li>
                @endforeach
            </ul>
            @endif
            <div class='panel-container'>
                @foreach($tab as $t)
                <div id="{{ $t['tab_key'] }}">
                    {{ $t['content'] }}
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="inquiry">
        <ul>
            <li><a href="inquiry.html">Inquiry</a></li>
        </ul>
    </div>
</div>
@stop
