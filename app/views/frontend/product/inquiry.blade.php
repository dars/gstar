@section('script')
<script>
$(function(){
    $('#tab-container').easytabs();
    $('#form1').submit(function(){
        if ($('input[name=name]').val().length < 1) {
            showWarningToast('please fill in your name');
            return false;
        }
        if ($('input[name=company]').val().length < 1) {
            showWarningToast('please fill in your company name');
            return false;
        }
        if ($('input[name=email]').val().length < 1) {
            showWarningToast('please fill in your email');
            return false;
        }
        if ($('.prods:checked').length < 1) {
            showWarningToast('please select your product');
            return false;
        }
        return true;
    });
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
    <form method="post" name="form1" id="form1" action="">
        <div id="inquiryBox">
            <h3>Inquiry</h3>
            <div class="inquiryL">
                <p>This is the list of your inquiry, </p>
                <p>One of our sales or technical representatives will contact you soon with the information you require.</p>
                <p>&nbsp;</p>
                <p style="font-size:14px; color:#09F">( Fields marked with * are required )</p>
            </div>
            <div id="inquiry_form">
                <ul>
                    <li> <span class="field_name">*Name</span> <span class="field_value">
                        <input class="width_m_input" name="name" type="text" />
                    </span> </li>
                    <li><span class="field_name">*Company</span> <span class="field_value">
                        <input class="width_m_input" name="company" type="text" />
                    </span></li>
                    <li><span class="field_name">TEL</span> <span class="field_value">
                        <input class="width_m_input" name="tel" type="text" />
                    </span></li>
                    <li><span class="field_name">*E-mail</span> <span class="field_value">
                        <input class="width_m_input" name="email" type="text" />
                    </span></li>
                </ul>
            </div>
        </div>
        <div id="inquiryList">
            <ul>
                @foreach($model as $t)
                <li>
                    <input name="products[]" class="prods" type="checkbox" value="{{ $t->model }}" />
                    <span class="productName">
                        <a class="lightbox" href="{{ URL::route('product.show', $t->id) }}">{{ $t->model }}</a></span>
                        {{ $t->name }}
                </li>
                @endforeach
            </ul>
            <input type="image" class="submitBtn" src="{{ asset('assets/frontend/images/inquiryBtn01.gif') }}"/>
        </div>
    </form>
</div>
@stop
