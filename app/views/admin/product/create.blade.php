@section('pageTitle')
    G-Star Admin Panel
@stop

@section('func_title')
    <i class="icon-headphones"></i>
    新增產品
@stop

@section('func_subtitle')
    新增產品資料
@stop

@section('head')
    {{ HTML::style('components/jquery-file-upload/css/jquery.fileupload-ui.css') }}
    {{ HTML::script('components/angular/angular.min.js') }}
    {{ HTML::script('components/angular-ui/build/angular-ui.js') }}
    {{ HTML::script('components/angular-bootstrap/ui-bootstrap.js') }}
    {{ HTML::script('http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js') }}
    <!-- The basic File Upload plugin -->
    {{ HTML::script("components/jquery-file-upload/js/jquery.fileupload.js") }}
    <!-- The File Upload processing plugin -->
    {{ HTML::script("components/jquery-file-upload/js/jquery.fileupload-process.js") }}
    <!-- The File Upload image preview & resize plugin -->
    {{ HTML::script("components/jquery-file-upload/js/jquery.fileupload-image.js") }}
    <!-- The File Upload validation plugin -->
    {{ HTML::script("components/jquery-file-upload/js/jquery.fileupload-validate.js") }}
    <!-- The File Upload Angular JS module -->
    {{ HTML::script("components/jquery-file-upload/js/jquery.fileupload-angular.js") }}

    {{ HTML::script('assets/admin/js/ctrl.js') }}
@stop

@section('breadcrumbs')
    @include('admin.layouts.partial.breadcrumbs', array('bread' => $bread))
@stop

@section('script')
$(function(){
    $.uniform.restore("input[type=file]");
    $('#fileupload').fileupload({
        url: '{{ URL::route('upload.image') }}',
        dataType: 'json',
        done: function (e, data) {
            console.log(data.result.files);
            return;
            $.each(data.result.files, function (index, file) {
                <!-- $('<p/>').text(file.name).appendTo('#files'); -->
                <!-- console.log(file.name); -->
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
@stop

@section('content')
    @include('admin.product.form')
@stop
