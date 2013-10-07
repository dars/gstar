@section('banner')
    @include('frontend.layouts.partial.index_banner')
@stop

@section('breadcrumb')
    <ul id="breadcrumb-2">
        <li><a href="{{ URL::route('frontend.index') }}" title="Home">Home</a></li>
        <li class="current">About</li>
    </ul>
@stop

@section('content')
<div id="mainContent3"><!-- InstanceBeginEditable name="mainContent" -->
    <div id="aboutBox">
        <h3>About Gstar</h3>
        <span class="aboutChang"><a href="{{ url('about') }}" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image7','','{{ asset('assets/frontend/images/aboutp1_2.png') }}',1)"><img src="{{ asset('assets/frontend/images/aboutp1.png') }}" alt="Company Background" width="184" height="34" id="Image7" /></a><a href="{{ url('about2') }}" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image8','','{{ asset('assets/frontend/images/aboutp2_2.png') }}',1)"><img src="{{ asset('assets/frontend/images/aboutp2.png') }}" alt="Management" width="122" height="34" id="Image8" /></a><a href="{{ url('about3') }}" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image9','','{{ asset('assets/frontend/images/aboutp3_2.png') }}',1)"><img src="{{ asset('assets/frontend/images/aboutp3.png') }}" alt="OEM" width="70" height="34" id="Image9" /></a></span>
        <h5><strong>OEM</strong></h5>
        <div class="oemWrap">
            <div class="oemBox">
                <p style="font-weight:bold;font-size:20px; line-height:30px;color:#a72126">OEM capability</p>
                OEM and ODM are welcome. We are ready willing to
                serve your special application whether it is adding custom logo,
                special cabinet or electronic specification. Since G-Star has
                their own individual plants covering manufacture factory,
                tooling, plastic injection, cable assembly & driver unit factorys,
                our experienced R&D engineering is ready to custom design
                and inquiry. We seek not only business relationship,
                but a lasting partnership for our worldwide customers.</div>
        </div>
        <p>&nbsp;</p>
        <div class="nextBox"><a href="{{ url('about2') }}">Pre.</a></div>
    </div>
</div>
@stop
