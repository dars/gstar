@section('script')
<script>
$(function(){
    $('#form1').submit(function(){
        if ($('input[name=subject]').val() == '') {
            showWarningToast('please fill in your subject');
            return false;
        }
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
        if ($('input[name=phone]').val().length < 1) {
            showWarningToast('please fill in your phone');
            return false;
        }
        if ($('input[name=message]').val().length < 1) {
            showWarningToast('please fill in your message');
            return false;
        }
        return true;
    });
});
</script>
@stop

@section('banner')
    {{ HTML::image('assets/frontend/images/contact_banner.jpg') }}
@stop

@section('breadcrumb')
    <ul id="breadcrumb-2">
        <li><a href="{{ URL::route('frontend.index') }}" title="Home">Home</a></li>
        <li class="current">Contact</li>
    </ul>
@stop

@section('content')
<div id="mainContent02"><!-- InstanceBeginEditable name="mainContent" -->
    <div id="contactBox">
        <div id="contactL">
            <div class="contactLInfoBox">
                <h6>Head Office<br />
                    G-STAR INDUSTRIAL CO., LTD.</h6>
                <ul>
                    <li>ADD： 3F, No.646, Sec. 5, Chung Hsin Road, San Chung City, Taipei, Taiwan, R.O.C. </li>
                    <li>TEL： 886-2-22783655</li>
                    <li>FAX： 886-2-22782206</li>
                    <li>MAIL：gstar@gstar.com.tw</li>
                </ul>
                <p>&nbsp;</p>
                <h6>Hong Kong Branch Office<br />
                    <strong>G-STAR INTERNATIONAL CO., LTD.</strong></h6>
                <ul>
                    <li>ADD： Room 905, 9/F, Two Grand Tower, No. 625 Nathan Road, Mongkok, Kowloon, Hong Kong </li>
                    <li>TEL： 852-2947-7011</li>
                    <li>FAX： 852-2796-2774</li>
                    <li>MAIL：gstar@wharftthk.com</li>
                </ul>
                <p>&nbsp;</p>
                <h6>China Factory<br />
                    HE GUANG PLASTIC ELECTRONIC CO.,LTD. </h6>
                <ul>
                    <li>ADD： HenLi Town Shan Xia Industrial District,Dongguan City,
                        Guang Dong Province,China </li>
                    <li>TEL： 86-769-83735088</li>
                    <li>FAX： 86-769-83735008</li>
                </ul>
            </div>
        </div>
        <div id="contactR">
            <p>Please complete the fields below.
               More specific information from you allows us to provide a quick, accurate response.
               ( * Must be filled in. )</p>
            <p>&nbsp;</p>
            <form id="form1" name="form1" method="post" action="">
                <table width="450" border="0" align="left" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="220"><span class="inputTitle">Subject*</span><br />
                            <label for="select"></label>
                            <select name="subject" id="select">
                                <option selected="selected" value=''>--Select Subject--</option>
                                <option value="Sales Contacts">Sales Contacts</option>
                                <option value="Procucts Questions">Procucts Questions</option>
                                <option value="Others">Others</option>
                            </select></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td><span class="inputTitle">Name*</span><br />
                            <label for="textfield"></label>
                            <input type="text" name="name" id="textfield" /></td>
                        <td><span class="inputTitle">Company Name*</span><br />
                            <input type="text" name="company" id="textfield2" /></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="inputTitle">Email*<br />
                            <input type="text" name="email" id="textfield3" /></td>
                        <td class="inputTitle">Phone*<br />
                            <input type="text" name="phone" id="textfield4" /></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="inputTitle">Message*<br />
                            <label for="textarea"></label>
                            <textarea name="message" id="textarea" cols="45" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" class="inputTitle">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" class="inputTitle"><input type="submit" name="button" id="button" value="Submit" />&nbsp;<input type="reset" name="button" id="button" value="Reset" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
@stop
