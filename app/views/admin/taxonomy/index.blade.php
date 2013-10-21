@section('pageTitle')
    G-Star Admin Panel
@stop

@section('func_title')
    <i class="icon-sitemap"></i>
    分類設定管理
@stop

@section('func_subtitle')
    產品相關分類設定
@stop

@section('head')
    {{ HTML::style('components/jquery-file-upload/css/jquery.fileupload-ui.css') }}
    <!-- {{ HTML::script('components/angular/angular.min.js') }} -->
    <!-- {{ HTML::script('components/angular-route/angular-route.min.js') }} -->
    <!-- {{ HTML::script('components/angular-ui/build/angular-ui.js') }} -->
    <!-- {{ HTML::script('components/angular-bootstrap/ui-bootstrap.js') }} -->
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
    <!-- {{ HTML::script("components/jquery-file-upload/js/jquery.fileupload-angular.js") }} -->

    <!-- {{ HTML::script('assets/admin/js/ctrl.js') }} -->
@stop

@section('breadcrumbs')
    @include('admin.layouts.partial.breadcrumbs', array('bread' => $bread))
@stop

@section('script')
$(function(){
    $.uniform.restore("input[type=file]");
    $('.status_btn').iButton({
        'change':function(a){
            var tmp_obj = a;
            var pk = tmp_obj.attr('id').split('_')[1];
            var value = (tmp_obj[0].checked)?1:0;
            $.ajax({
                url: "{{ url('admin/product/taxonomy/updateStatus') }}",
                type: 'post',
                data: 'pk='+pk+'&value='+value
            });
        }
    });

    $('.edit_btns').click(function(){
        var ids = $(this).attr('id').split('_')[1];
        $.ajax({
            url: "{{ url('admin/product/taxonomy/getTaxonomy') }}",
            type: "post",
            data: "id="+ids,
            dataType: 'json',
            success: function(data){
                $('#form_name_txt').val(data.name);
                $('#form_parent_id_txt').val(data.parent_id);
                $('#form_id').val(data.id);
                $('#sub_btn').html('<nobr>儲存</nobr>');
                $('#sub_btn').removeClass('btn-blue');
                $('#sub_btn').addClass('btn-sea');
                $('#cancel_btn').show();

                $('#img_upload_block').hide();
                $('#img_link_block').show();
                $('#img_link').attr('href', '/upload/images/'+data.image);
                $('#form_image').val(data.name);
            }
        });
    });

    $('#cancel_btn').click(function(){
        $('#form_name_txt').val('');
        $('#form_parent_id_txt').val(0);
        $('#form_id').val('');
        $('#sub_btn').html('<nobr>新增</nobr>');
        $('#sub_btn').addClass('btn-blue');
        $('#sub_btn').removeClass('btn-sea');
        $(this).hide();
    });

    $('.delete_btn').click(function(){
        var ids = $(this).attr('id').split('_')[1];
        var flag = confirm('確定要刪除此比資料？');
        if(flag) {
            location.replace('/admin/product/taxonomy/delete/'+ids);
        }
    });

    $('#fileupload').fileupload({
        url: '/libraries/index.php',
        dataType: 'json',
        done: function (e, data) {
            $('#img_upload_block').hide();
            $('#img_link_block').show();
            $('#img_link').attr('href', '/upload/images/'+data.files[0].name);
            $('#form_image').val(data.files[0].name);
        }
    });

    $('#img_cancel').click(function(){
        $('#img_upload_block').show();
        $('#img_link_block').hide();
        $('#img_link').attr('href', '#');
        $('#form_image').val('');
    });
});
@stop

@section('content')
    <div class="container-fluid padded">
        <div class="row-fluid">
            @include('admin.taxonomy.list', array('model' => $model, 'parent_name' => $parent_name))
        </div>
    </div>
@stop
