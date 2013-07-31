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
    $('.editable').editable();
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
});
@stop

@section('content')
    <div class="container-fluid padded" ng-controller="taxonomy">
        <div class="row-fluid" ng-view>

        </div>
    </div>
@stop
