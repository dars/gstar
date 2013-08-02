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
                            <div class="table-header">
                                <div class="dataTables_filter" id="DataTables_Table_0_filter">
                                    <label>Search: <input type="text" aria-controls="DataTables_Table_0"></label>
                                </div>
                            </div>
                            <table class="table table-normal">
                                <thead>
                                    <tr>
                                        <td style="width: 40px"></td>
                                        <td>產品型號</td>
                                        <td>產品名稱</td>
                                        <td style="width: 70px">上下架</td>
                                        <td style="width: 40px">刪除</td>
                                    </tr>
                                </thead>
                                <tbody ui-sortable ng-model="taxonomies">
                                    @foreach($products as $item)
                                    <tr class="status-info" ng-repeat="item in taxonomies">
                                        <td class="icon"><i class="icon-move"></i></td>
                                        <td>
                                            <a href="#">
                                                {{ $item['model'] }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                {{ $item['name'] }}
                                            </a>
                                        </td>
                                        <td>
                                            <input type="checkbox" ibutton ng-model=item.status ng-checked=item.status>
                                        </td>
                                        <td>
                                            <button class="btn btn-mini btn-danger">
                                                <i class="icon-remove" id="remove_{{ $item['id'] }}"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="table-footer">
                                <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_0_paginate">
                                    <a tabindex="0" class="first paginate_button paginate_button_disabled" id="DataTables_Table_0_first">First</a>
                                    <a tabindex="0" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_0_previous">Previous</a>
                                    <span>
                                        <a tabindex="0" class="paginate_active">1</a>
                                        <a tabindex="0" class="paginate_button">2</a>
                                        <a tabindex="0" class="paginate_button">3</a>
                                        <a tabindex="0" class="paginate_button">4</a>
                                        <a tabindex="0" class="paginate_button">5</a>
                                    </span>
                                    <a tabindex="0" class="next paginate_button" id="DataTables_Table_0_next">Next</a>
                                    <a tabindex="0" class="last paginate_button" id="DataTables_Table_0_last">Last</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
