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
        <h5><strong>Management</strong></h5>
        <p>&nbsp;</p>
        <img  class="aboutImgLeft" src="{{ asset('assets/frontend/images/IMG_2172.jpg') }}" width="250" height="333" />
        <h4>gstar</h4>
        <p>Gstar can offer wide range of 3C and multimedia accessories at  competitive price.</p>
        <p><br />
          We established in 1996. With many years  experience at both marketing and Manufacture.<br />
          The strong R&amp;D team, advance production  facilities and stringent quality assurance.<br />
          We can guarantee punctual delivery to Serve  all our clients. We got the ISO 14001.<br />
          Both OEM and ODM requests from buyers are  welcome.</p>
        <p>&nbsp;</p>
        <h4>gstar</h4>
        <p> priority has always been to improve products quality in order to meet
          buyer's need. To maintain Our high standard of quality, all products undergo stringent
          quality control before shipment. </p>
        <hr />
        <p><img src="{{ asset('assets/frontend/images/about002.png') }}" width="510" height="150" class="aboutImg" /> </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p style="font-weight:bold;font-size:20px; line-height:30px;color:#a72126">Research and development</p>
        <p>R&D staff: 30</p>
        <p>&nbsp;</p>
        <p style="font-weight:bold;font-size:20px; line-height:30px;color:#a72126">Machinery/equipment for R&D </p>
        <p>Color plotter & printer, oscilloscope, Signal generator, attenuator, distortion meter,
          sound check....
          With an annual budget running into 3% of selling amount,
          our R&D can offer a Complete series design work ranging from conceptual outline layout, prototype Mock-up sample and all mass production samples. </p>
        <p>&nbsp;</p>
        <hr />
        <p>&nbsp;</p>
        <p style="font-weight:bold;font-size:20px; line-height:30px;color:#a72126">Quality Control & Reliability</p>
        <p>QC staff: 50 </p>
        <p>Standards and approval: CE for Europe </p>
        <p>ISO 14001 Material and components: China </p>
        <p>Quality System: ISO 9001, ISO 14001 </p>
        <p>Standard and approval: CE, FCC, RoHS, REACH </p>
        <img src="{{ asset('assets/frontend/images/_MG_3473.jpg') }}" class="aboutImgO" />
        <p>&nbsp;</p>
        <p style="font-weight:bold;font-size:20px; line-height:30px;color:#a72126">Procedures/testing details</p>
        <p>New product development is obligated to pass through the strict reliability test. and we follow up sample inspection according to
          MIL-STD-105DII-A as AQL standard. IQC, OPQC, OQC staffs are allocated to strictly control the quality from incoming materials,
          in-process production, to finished good packing. </p>
        <p><img src="{{ asset('assets/frontend/images/_MG_3474.jpg') }}" class="aboutImgO" /></p>
        <p>&nbsp; </p>
        <div class="nextBox"><a href="{{ url('about') }}">Pre.</a><a href="{{ url('about3') }}">Next</a></div>
    </div>
</div>
@stop
