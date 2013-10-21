@section('script')
<script>
$(function(){
    $('#big_image').hide();
    $('#tab-container').easytabs();
    $('#big_image').draggable({
        drag: function(){
            var top = parseInt($(this).css('top'));
        },
        stop: function(){
            canvas_width = $('#pBig').width();
            canvas_height = $('#pBig').height();
            img_width = $(this).width();
            img_height = $(this).height();
            var top = parseInt($(this).css('top'));
            if(top > 0) {
                $(this).css('top', 0);
            }
            if(top < (canvas_height-img_height+10)) {
                $(this).css('top', (canvas_height-img_height+10)+'px');
            }
            var left = parseInt($(this).css('left'));
            if(left > 0) {
                $(this).css('left', 0);
            }
            if(left < (canvas_width-img_width)) {
                $(this).css('left', (canvas_width-img_width)+'px');
            }
        }
    });
    $('#show_big_btn').click(function(){
        $('#big_image').toggle();
    });
    $('.pix_list').click(function(){
        var img_src = $(this).attr('src');
        $('#big_image').hide();
        $('#big_img').attr('src', img_src);
        $('#norm_img').attr('src', img_src);
    });
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
<div id="productMainContent">
    <div class="pBig" id="pBig" style="overflow:hidden;">
        @if($pix)
            <div id="big_image" style="position:absolute;">
                {{ HTML::image('upload/images/'.$pix[0]['name'], '', array('id'=>'big_img')) }}
            </div>
            {{ HTML::image('upload/images/'.$pix[0]['name'], '', array('id'=>'norm_img', 'width'=>400, 'height'=>400)) }}
            <div class="imgZoom"><a href="javascript:void(0)" id="show_big_btn">{{ HTML::image('assets/frontend/images/zoom.gif') }}</a></div>
        @else
            <img src="http://placehold.it/400x400&text=COMING SOON">
        @endif

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
                <li>{{ HTML::image('upload/images/'.$t['name'], null, array('style'=>'width:120px;height:120px;', 'class'=>'pix_list')) }}</li>
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
            <li><a href="{{ URL::route('frontend.products.inquiry') }}">Inquiry</a></li>
        </ul>
    </div>
</div>
@stop
