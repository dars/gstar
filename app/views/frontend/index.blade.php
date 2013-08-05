@section('banner')
    @include('frontend.layouts.partial.index_banner')
@stop

@section('breadcrumb')
    @include('frontend.layouts.partial.index_news')
@stop

@section('content')
<div id="mainContent">
    @include('frontend.layouts.partial.main_menu')
    <div id="ContentR">
        <div id="indexR">
            <ul>
                <li><img src="{{ asset('assets/frontend/images/pimg01.jpg') }}" width="180" height="204" /></li>
                <li><img src="{{ asset('assets/frontend/images/pimg02.jpg') }}" width="180" height="204" /></li>
                <li><img src="{{ asset('assets/frontend/images/pimg03.jpg') }}" width="180" height="204" /></li>
                <li><img src="{{ asset('assets/frontend/images/pimg04.jpg') }}" width="180" height="204" /></li>
                <li><img src="{{ asset('assets/frontend/images/pimg05.jpg') }}" width="180" height="204" /></li>
                <li><img src="{{ asset('assets/frontend/images/pimg06.jpg') }}" width="180" height="204" /></li>
            </ul>
        </div>
    </div>
</div>
@stop
