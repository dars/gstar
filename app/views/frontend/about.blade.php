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
        <img src="{{ asset('assets/frontend/images/13626-go.jpg') }}" />
        <p>&nbsp;</p>
        <h5>Company Background</h5>
        <p>&nbsp;</p>
        <h4>gstar</h4>
        <p> has significantly broadened its products offering and aimed to provide unrivalled value to customers.
          The modern facilities offer the most advanced design and engineering to consistently raise the bar for productive line work.
          We established in 1996. We have extraordinary expertise at both Development and Manufacture. </p>
        <p>&nbsp;</p>
        <p>The strong R&D team, advance production facilities and stringent quality assurance to producing the finest headsets of PC,
          and Audio multimedia, into the market. We got the ISO 14001 and all products meet CE standards.
          Based on the cooperation with well known OEM/ODM
          and distributors, We are ready willing to serve your
          special application. We seek not only business
          relationship, but a lasting partnership for our
          world-wide customers. </p>
        <img class="aboutImg" src="{{ asset('assets/frontend/images/IMG_2180.JPG') }}" />
        <p>&nbsp;</p>
        <h4>gstar</h4>
        <p>provides an innovative, complete and affordable range of headsets for computers, Internet DVD players, CD players, game consoles and telecommunication. </p>
        <p>&nbsp;</p>
        <p>It is applying professional sound technology into the multimedia and consumer
          world, allowing users to experience a combination of aesthetics and technology, delivering excellent sound quality. </p>
        <p>&nbsp;</p>
        <p>Increase both the functionality and creativity,
          so create a high level of satisfaction, regardless of the use of the environment to users. </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <hr />
        <p>&nbsp;</p>
        <img class="aboutImgLeft" src="{{ asset('assets/frontend/images/_MG_3707.JPG') }}" />
        <p style="font-weight:bold;font-size:20px; line-height:30px;color:#a72126">Factory</p>
        <p>Total area of factory: 20000 square meter Build in 1996</p>
        <p>&nbsp;</p>
        <p style="font-weight:bold;font-size:20px; line-height:30px; color:#a72126";>Staff details</p>
        <p>-  Production staff: 800 <br />
          -   QC staff : 50 <br />
          -   R&D staff: 30<br />
          -   Production lines:13 <br />
          -   Marketing share:
          USA: 30% Europe: 40% Others: 30%
          Material/component: China, Taiwan, and Japan </p>
        <p>&nbsp;</p>
        <div class="nextBox"><a href="{{ url('about2') }}">Next</a></div>
    </div>
</div>
@stop
