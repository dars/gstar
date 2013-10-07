@section('banner')
    @include('frontend.layouts.partial.index_banner')
@stop

@section('breadcrumb')
    @include('frontend.layouts.partial.index_news')
@stop

@section('content')
<div id="mainContent">
    @include('frontend.layouts.partial.main_menu')
    <div id="ContentR"><!-- InstanceBeginEditable name="ContentR" -->
        <h3>Search Result</h3>
        <h6>About <span class="findColor">" {{ $total }} "</span> results found for <span class="findColor">" {{ $keyword }} "</span></h6>
        <p>&nbsp;</p>
        <div id="resultBox">
            <table width="548" border="0" cellspacing="0" cellpadding="0">
                @foreach($model as $t)
                <tr>
                    <td width="142"><img src="/upload/images/{{ $t['image'] }}" width="120" height="120" /></td>
                    <td width="140"><a href="{{ URL::route('product.show', $t['id']) }}">{{ $t['model'] }}</a></td>
                    <td width="266">{{ $t['name'] }}</td>
                </tr>
                @endforeach
            </table>
            <div class="paginationBox">
                <ul class="pagination paginationA paginationA12">
                    <li><a href="#" class="first">First</a></li>
                    <li><a href="#" class="previous">Previous</a></li>
                    @for($i = 1; $i<=$model->getLastPage(); $i++)
                        <li>
                        @if($i == $model->getCurrentPage())
                            <a href="javascript:void(0)" class="current">{{ $i }}</a>
                        @else
                            <a href="{{ url('/product/search/?keyword='.$keyword.'&page='.$i) }}">{{ $i }}</a>
                        @endif
                        </li>
                    @endfor
                    <li><a href="#" class="next">Next</a></li>
                    <li><a href="#" class="last">Last</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    $("#resultBox tr:even").addClass("EEE");
    $("#resultBox tr").hover(function(){
        $(this).addClass("overM");
    },function(){
        $(this).removeClass("overM");
    })
});
</script>
@stop
