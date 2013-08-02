@section('box_title')
    產品表單
@stop

@section('box_content')
    <div class="row-fluid">
        <div class="span6">
            <ul class="padded separate-sections">
                <li class="input">
                    {{ Form::text('model', null, array('placeholder'=>'型號')) }}
                </li>
                <li class="input">
                    {{ Form::text('name', null, array('placeholder'=>'品名')) }}
                </li>
                <li class="input">
                    {{ Form::textarea('description', null, array('placeholder'=>'說明')) }}
                </li>
            </ul>
        </div>
        <div class="span6">
            <ul class="padded separate-sections">
                <li class="clearfix">
                    <div class="span4">
                        <a href="#" class="thumbnail">
                            <img src="http://placehold.it/240x240" alt="">
                        </a>
                    </div>

                    <div class="span4">
                        <a href="#" class="thumbnail">
                            <img src="http://placehold.it/240x240" alt="">
                        </a>
                    </div>

                    <div class="span4">
                        <a href="#" class="thumbnail">
                            <img src="http://placehold.it/240x240" alt="">
                        </a>
                    </div>
                </li>
                <li class="input">
                    <div class="row-fluid">
                        <div class="span3">
                            <span class="btn btn-black fileinput-button">
                                <i class="icon-plus icon-white"></i>
                                <span>新增檔案</span>
                                <!-- The file input field used as target for the file upload widget -->
                                <input id="fileupload" type="file" name="files[]" multiple>
                            </span>
                        </div>
                        <div class="span9">
                            <!-- The global progress bar -->
                            <div id="progress" class="progress progress-success progress-striped">
                                <div class="bar"></div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <select name="status" class="uniform">
                        <option value="1">上架</option>
                        <option value="0">下架</option>
                    </select>
                </li>
                <li>
                    <select name="status" class="uniform">
                        <option value="1">類別一</option>
                        <option value="0">類別二</option>
                    </select>
                    <select name="status" class="uniform">
                        <option value="1">類別一</option>
                        <option value="0">類別二</option>
                    </select>
                </li>
                <li class="input">
                    {{ Form::text('weight', null, array('placeholder'=>'比重', 'class' => 'span2')) }}
                    <span class="help-block note"><i class="icon-warning-sign"></i> 數字越大越前面.</span>
                </li>
            </ul>
        </div>
        <div class="row-fluid" ng-controller="tab_ctrl">
            <div class="span12 padded">
                <div class="box">
                    <div class="box-header">
                        <ul class="nav nav-tabs nav-tabs-left">
                            <li ng-repeat="tab in tabList">
                                <a href="#tab_[[ tab ]]" data-toggle="tab">
                                    <i class="icon-file-alt"></i> <span>[[ models[tab] ]]</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" ng-click="addTab()" data-toggle="tab">
                                    <i class="icon-plus"></i>
                                </a>
                            </li>
                        </ul>
                        <div class="title">詳細資料</div>
                    </div>
                    <div class="box-content padded">
                        <div class="tab-content" id="prod_tab_body">
                            <div class="tab-pane" ng-repeat="tab in tabList" id="tab_[[ tab ]]">
                                <div>
                                    <input type="text" name="tab_title[]" ng-model="models[tab]" placeholder="頁籤名稱">
                                </div>
                                <div style="border:1px #CCC solid;border-radius:5px;margin-top:5px;margin-bottom:5px;">
                                    <textarea wysihtml name="tab_content[]" ng-model="content[tab]" id="content" placeholder="content.." class="content_ta" rows=7></textarea>
                                </div>
                                <div style="text-align:center;">
                                    <input type="hidden" name="tab_key[]" value="[[ tab ]]">
                                    <a href="javascript:void(0)" class="btn btn-red btn-mini" ng-click="closeTab()"><i class="icon-trash"></i> 刪除分頁</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue">儲存</button>
        <a href="{{ URL::route('admin.product.index') }}">取消</a>
    </div>

    <script id="tab-template" type="text/x-handlebars-template">
        <li>
            <a href="#tab_tmp_random" data-toggle="tab">
                <i class="icon-file-alt"></i> <span>[[ tmp_random ]]</span>
            </a>
        </li>
    </script>
    <script id="tab-body-template" type="text/x-handlebars-template">
        template content
    </script>
@stop
@include('admin.layouts.partial.form')
