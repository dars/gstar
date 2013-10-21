@section('banner')
    {{ HTML::image('/upload/images/'.$banner_img) }}
@stop

@section('breadcrumb')
    <ul id="breadcrumb-2">
        <li><a href="{{ URL::route('frontend.index') }}" title="Home">Home</a></li>
        <li><a href="#" title="{{ $taxo1 }}">{{ $taxo1 }}</a></li>
        <li class="current">{{ $taxo2 }}</li>
    </ul>
@stop

@section('script')
<script>
$(function(){
    $('#taxo1_a_{{ $taxo1_id }}').addClass('active');
    $('#taxo1_{{ $taxo1_id }}').addClass('expand');
});
</script>
@stop

@section('content')
<div id="mainContent">
    @include('frontend.layouts.partial.main_menu')
    <div id="productListR">
        @if(count($new) > 0)
        <div class="p-box">
            <h3>{{ $taxo2 }} Products</h3>
            @foreach($new_items as $n)
            <ol>
                <p><a href="{{ url('/product/'.$n['id']) }}">
                    @if($n['image'])
                        <img src="/upload/images/{{ $n['image'] }}" width=120 height=120 />
                    @else
                        <img src="http://placehold.it/120x120&text=COMING SOON" />
                    @endif
                </a></p>
                <li><a href="{{ url('/product/'.$n['id']) }}">{{ $n['model'] }}</a></li>
            </ol>
            @endforeach
        </div>

        <div class="paginationBox">
            <ul class="pagination paginationA paginationA12">
                <li><a href="#" class="first">First</a></li>
                <li><a href="#" class="previous">Previous</a></li>
                @for($i = 1; $i<=$new->getLastPage(); $i++)
                    <li>
                    @if($i == $new->getCurrentPage())
                        <a href="javascript:void(0)" class="current">{{ $i }}</a>
                    @else
                        <a href="javascript:void(0)">{{ $i }}</a>
                    @endif
                    </li>
                @endfor
                <li><a href="#" class="next">Next</a></li>
                <li><a href="#" class="last">Last</a></li>
            </ul>
        </div>
        @endif

        @if(count($old) > 0)
        <div class="p-box">
            <h3>{{ $taxo2 }}'s Old Products</h3>
            @foreach($old_items as $o)
            <ol>
                <p><a href="{{ url('/product/'.$o['id']) }}">
                    @if($o['image'])
                        <img src="/upload/images/{{ $o['image'] }}" width=120 height=120 />
                    @else
                        <img src="http://placehold.it/120x120&text=COMING SOON" />
                    @endif
                </a></p>
                <li><a href="{{ url('/product/'.$o['id']) }}">{{ $o['model'] }}</a></li>
            </ol>
            @endforeach
        </div>
        <div class="paginationBox">
            <ul class="pagination paginationA paginationA12">
                <li><a href="#" class="first">First</a></li>
                <li><a href="#" class="previous">Previous</a></li>
                @for($i = 1; $i<=$old->getLastPage(); $i++)
                    <li>
                    @if($i == $old->getCurrentPage())
                        <a href="javascript:void(0)" class="current">{{ $i }}</a>
                    @else
                        <a href="javascript:void(0)">{{ $i }}</a>
                    @endif
                    </li>
                @endfor
                <li><a href="#" class="next">Next</a></li>
                <li><a href="#" class="last">Last</a></li>
            </ul>
        </div>
        @endif
    </div>
</div>
@stop
