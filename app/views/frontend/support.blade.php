@section('banner')
    {{ HTML::image('assets/frontend/images/support_banner.jpg') }}
@stop

@section('breadcrumb')
    <ul id="breadcrumb-2">
        <li><a href="{{ URL::route('frontend.index') }}" title="Home">Home</a></li>
        <li class="current">Support</li>
    </ul>
@stop

@section('content')
<div id="mainContent02"><!-- InstanceBeginEditable name="mainContent" -->
    <h3>Download</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="supportTable">
        <tr class="supportTable">
            <th valign="middle">No.</th>
            <th valign="middle">File Description</th>
            <th valign="middle">File Type</th>
            <th valign="middle">File Size</th>
            <th valign="middle">Date</th>
        </tr>
        <tr>
            <td align="center" valign="middle">1</td>
            <td valign="middle"><a href="/upload/files/CM108AH.rar">UB-002</a><br />
              (Integrated driver compliant with Windows XP, Vista, Win7, Win8)</td>
            <td align="center" valign="middle"><img src="{{ asset('assets/frontend/images/rar.png') }}" width="32" height="32" /></td>
            <td align="center" valign="middle">19.1 MB</td>
            <td align="center" valign="middle">2013/04/15</td>
        </tr>
        <tr>
            <td align="center" valign="middle">2</td>
            <td valign="middle"><a href="/upload/files/CM6206LX.rar">UB-003、HS-692、HS-693、HS-694</a><br />
              (Integrated driver compliant with Windows XP, Vista, Win7, Win8)</td>
            <td align="center" valign="middle"><img src="{{ asset('assets/frontend/images/rar.png') }}" width="32" height="32" /></td>
            <td align="center" valign="middle">35.9 MB</td>
            <td align="center" valign="middle">2013/04/15</td>
        </tr>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>
@stop
