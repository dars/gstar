@section('script')
<script>
$(function(){
    $('#tab-container').easytabs();
});
</script>
@stop

@section('banner')
    {{ HTML::image('assets/frontend/images/inquiry_banner.jpg') }}
@stop

@section('breadcrumb')
    <ul id="breadcrumb-2">
        <li><a href="{{ URL::route('frontend.index') }}" title="Home">Home</a></li>
        <li class="current">Inquiry</li>
    </ul>
@stop

@section('content')
<div id="mainContent02"><!-- InstanceBeginEditable name="mainContent" -->
    <div id="inquiryBox">
        <h3>Inquiry</h3>
        <div class="inquiryL">
            <p>This is the list of your inquiry, </p>
            <p>One of our sales or technical representatives will contact you soon with the information you require.</p>
            <p>&nbsp;</p>
            <p style="font-size:14px; color:#09F">( Fields marked with * are required )</p>
        </div>
        <div id="inquiry_form">
            <form>
                <ul>
                    <li> <span class="field_name">*Name</span> <span class="field_value">
                        <input class="width_m_input" name="" type="text" />
                    </span> </li>
                    <li><span class="field_name">*Company</span> <span class="field_value">
                        <input class="width_m_input" name="" type="text" />
                    </span></li>
                    <li><span class="field_name">TEL</span> <span class="field_value">
                        <input class="width_m_input" name="" type="text" />
                    </span></li>
                    <li><span class="field_name">*E-mail</span> <span class="field_value">
                        <input class="width_m_input" name="" type="text" />
                    </span></li>
                </ul>
            </form>
        </div>
    </div>
    <div id="inquiryList">
        <form>
            <ul>
                @foreach($model as $t)
                <li>
                    <input name="" type="checkbox" value="" />
                    <span class="productName">
                        <a class="lightbox" href="{{ URL::route('product.show', $t->id) }}">{{ $t->model }}</a></span>
                        {{ $t->name }}
                </li>
                @endforeach
            </ul>
            <input type="image" class="submitBtn" onClick="document.formname.submit();" src="{{ asset('assets/frontend/images/inquiryBtn01.gif') }}"/>
        </form>
    </div>
</div>
@stop
