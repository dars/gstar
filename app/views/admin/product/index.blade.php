@section('pageTitle')
    G-Star Admin Panel
@stop

@section('func_title')
    <i class="icon-headphones"></i>
    產品資料列表
@stop

@section('func_subtitle')
    產品資料列表檢視
@stop

@section('head')
    {{ HTML::style('components/jquery-file-upload/css/jquery.fileupload-ui.css') }}
@stop

@section('breadcrumbs')
    @include('admin.layouts.partial.breadcrumbs', array('bread' => $bread))
@stop

@section('script')
$(function(){
    $('.status_btn').iButton({
        'change':function(a){
            var tmp_obj = a;
            var pk = tmp_obj.attr('id').split('_')[1];
            var value = (tmp_obj[0].checked)?1:0;
            $.ajax({
                url: "{{ url('admin/product/updateStatus') }}",
                type: 'post',
                data: 'pk='+pk+'&value='+value
            });
        }
    });

    $('.delete_btn').click(function(){
        var pk = $(this).attr('id').split('_')[1];
        $.ajax({
            url: "{{ url('admin/product') }}/"+pk,
            type: 'delete',
            success: function(){
                $('#datarow_'+pk).remove();
            }
        });
    });
});
@stop

@section('content')
    <div class="container-fluid padded">
        <div class="row-fluid">
            <div class="span12">
                <div class="box">
                    <div class="box-header">
                        <span class="title">產品列表</span>
                        <ul class="box-toolbar">
                            <li>
                                <div><a class="btn btn-red" href="{{ URL::route('admin.product.create') }}">新增產品</a></div>
                            </li>
                        </ul>

                    </div>
                    <div class="box-content">
                        <div class="dataTables_wrapper form-inline" role="grid">
                            <!-- <div class="table-header">
                                <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                    <label>Search: <input type="text" aria-controls="DataTables_Table_0"></label>
                                </div>
                            </div> -->
                            <table class="table table-normal">
                                <thead>
                                    <tr>
                                        <td>產品型號</td>
                                        <td>產品名稱</td>
                                        <td style="width: 70px">上下架</td>
                                        <td style="width: 40px">刪除</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $item)
                                    <tr class="status-info" id="datarow_{{ $item['id'] }}">
                                        <td>
                                            <a href="#">
                                                @if($item['type'] == 2)
                                                    <span class="label label-green">舊</span>
                                                @endif
                                                {{ $item['model'] }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                {{ HTML::linkRoute('admin.product.edit', $item['name'], $item['id']) }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ Form::checkbox('status_'.$item['id'], '1', $item['status'], array('id' => 'status_'.$item['id'], 'class' => 'status_btn')) }}
                                        </td>
                                        <td>
                                            <button class="btn btn-mini btn-danger delete_btn" id="remove_{{ $item['id'] }}">
                                                <i class="icon-remove"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="table-footer">
                                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_0_paginate">
                                    <!-- start -->
                                    {{ $products->links() }}
                                    <!-- end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
