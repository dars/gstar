@section('box_title')
    產品表單
@stop

@section('box_content')
    <div class="row-fluid">
        <div class="span6">
            <ul class="padded separate-sections">
                <li class="input">
                    {{ Form::text('model', Input::get('model', @$model?$model->model:''), array('placeholder'=>'型號','required')) }}
                </li>
                <li class="input">
                    {{ Form::text('name', Input::get('model', @$model?$model->name:''), array('placeholder'=>'品名','required')) }}
                </li>
                <li class="input description">
                    {{ Form::textarea('description', Input::get('model', @$model?$model->description:''), array('placeholder'=>'說明', 'id'=>'description')) }}
                </li>
            </ul>
        </div>
        <div class="span6">
            <ul class="padded separate-sections">
                <li class="clearfix" id="thumb_block">
                    @if(@$pix)
                        @foreach($pix as $t)
                        <div class="span3">
                            <a href="javascript:void(0)" class="thumbnail" id="thumb_{{ $t }}">
                                {{ HTML::image('upload/images/'.$t) }}
                            </a>
                        </div>
                        @endforeach
                    @endif
                </li>
                <li class="input">
                    <div class="row-fluid">
                        <div class="span3">
                            <span class="btn btn-black fileinput-button">
                                <i class="icon-plus icon-white"></i>
                                <span>新增檔案</span>
                                <!-- The file input field used as target for the file upload widget -->
                                <input id="fileupload" type="file" name="files[]" multiple>
                                {{ Form::hidden('img_files', Input::get('files', @$pix?join(',',$pix):''), array('id' => 'files')) }}
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
                    {{ Form::select('status', array(1=>'上架', 0=>'下架'), Input::get('status', @$model?$model->status:0), array('class'=>'uniform')) }}
                </li>
                <li>
                    {{ Form::select('taxo1', $taxo1, isset($taxo1_id)?$taxo1_id:'', array('class'=>'uniform', 'id' => 'taxo1', 'required')) }}
                    {{ Form::select('taxo2', isset($taxo2)?$taxo2:array(), Input::get('taxo2', @$model?$model->taxonomy_id:''), array('class'=>'uniform', 'id' => 'taxo2', 'required')) }}
                </li>
                <li class="input">
                    {{ Form::text('weight', Input::get('weight', @$model?$model->weight:0), array('placeholder'=>'比重', 'class' => 'span2')) }}
                    <span class="help-block note"><i class="icon-warning-sign"></i> 數字越大排序越前面.</span>
                </li>
            </ul>
        </div>
        @if((!isset($model) || $model->type == 1) && Input::get('type') != '2' )
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
                                    <a href="javascript:void(0)" class="btn btn-red btn-mini" ng-click="closeTab(tab)"><i class="icon-trash"></i> 刪除分頁</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="form-actions">
        {{ Form::hidden('id', Input::get('id', @$model?$model->id:''), array('id' => 'id')) }}
        {{ Form::hidden('type', Input::get('type', @$model?$model->type:1), array('id' => 'type')) }}
        <button type="submit" class="btn btn-blue">儲存</button>
        <a href="{{ URL::route('admin.product.index') }}">取消</a>
    </div>
@stop
@include('admin.layouts.partial.form')

