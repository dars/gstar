@section('banner')
    {{ HTML::image('assets/frontend/images/all_products_banner.jpg') }}
@stop

@section('breadcrumb')
    <ul id="breadcrumb-2">
        <li><a href="{{ URL::route('frontend.index') }}" title="Home">Home</a></li>
        <li class="current">Products</li>
    </ul>
@stop

@section('content')
<div id="mainContent">
    <div class="allProductsWrap">
        @foreach($data as $t)
        <div class="p-box">
            <h3>{{ $t['name'] }}</h3>
            @if($t['child'])
            @foreach($t['child'] as $t2)
            <ol>
                <p>
                    <a href="{{ url('/product/second/'.$t2['id']) }}">
                        @if(!empty($t2['image']))
                            {{ HTML::image('upload/images/'.$t2['image'], null, array('width' => 120, 'height' => 120)) }}
                        @else
                            <img src="http://placehold.it/120x120&text=COMING SOON" />
                        @endif
                    </a>
                </p>
                <li><a href="{{ url('/product/second/'.$t2['id']) }}">{{ $t2['name'] }}</a></li>
            </ol>
            @endforeach
            @endif
        </div>
        @endforeach
    </div>
</div>
@stop
