@section('pageTitle')
    G-Star Admin Panel
@stop

@section('func_title')
    <i class="icon-headphones"></i>
    修改產品
@stop

@section('func_subtitle')
    修改產品資料
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
    $('.content_ta').wysihtml5({
        "font-styles": true,
        "emphasis": true,
        "lists": true,
        "html": false,
        "link": true,
        "image": true,
        "color": false,
    });
    $.uniform.restore("input[type=file]");
    $('#fileupload').fileupload({
        url: '{{ URL::route('upload.image') }}',
        dataType: 'json',
        done: function (e, data) {
            var files_str = $('#files').val();
            if(files_str != ''){
                var files_ar = files_str.split(',');
            } else {
                var files_ar = [];
            }

            $.each(data.result.files, function (index, file) {
                if(files_ar.length < 4) {
                    var dom = '<div class="span3">'+
                              '<a href="javascript:void(0)" class="thumbnail" id="thumb_'+file+'">'+
                              '<img src="/upload/images/'+file+'" alt="" style="width:100px;height:100px;">'+
                              '</a>'+
                              '</div>';
                    $(dom).appendTo('#thumb_block');

                    files_ar.push(file);
                    $('#files').val(files_ar.join(','));
                }
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

    $(document).on('click', '.thumbnail', function(){
        var flag = confirm('確定要刪除此張照片？');
        var filename = $(this).attr('id').split('_')[1];
        console.log(filename);
        if(flag) {
            $(this).parent().fadeOut();
            var files_str = $('#files').val();
            var files_ar = files_str.split(',');
            var res = [];
            $.each(files_ar, function(index, value){
                if(value != filename) {
                    res.push(value);
                }
            });
            $('#files').val(res.join(','));
        }
    });

    $('#taxo1').change(function(){
        $('#taxo2').html('').uniform();
        $('#taxo2').prev().html('');
        if($(this).val() != ''){
            $.ajax({
                url: '{{ url('taxonomy/get_taxo2') }}/'+$(this).val(),
                dataType: 'json',
                success: function (data) {
                    $('#taxo2').html(data.html).uniform();
                }
            });
        }
    });

});
@stop

@section('content')
    {{ Form::open(array('route' => array('admin.product.update', $id), 'method' => 'put', 'class' => 'form-horizontal fill-up', 'ng-controller' => 'product')) }}
        @include('admin.product.form', array('model' => $model,'taxo1' => $taxo1, 'taxo2' => $taxo2, 'taxo1_id' => $taxo1_id, 'pix' => $pix))
    {{ Form::close() }}
@stop
