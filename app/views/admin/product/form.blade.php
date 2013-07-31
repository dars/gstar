@extends('admin.layouts.partial.form')

@section('box_title')
    產品表單
@stop

@section('box_content')
    {{ Form::open(array('class' => 'form-horizontal fill-up')) }}
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
                            <img src="http://placehold.it/240x100" alt="">
                        </a>
                    </div>

                    <div class="span4">
                        <a href="#" class="thumbnail">
                            <img src="http://placehold.it/240x100" alt="">
                        </a>
                    </div>

                    <div class="span4">
                        <a href="#" class="thumbnail">
                            <img src="http://placehold.it/240x100" alt="">
                        </a>
                    </div>
                </li>
                <li class="input">
                    <div class="row-fluid">
                        <div class="span3">
                            <span class="btn btn-red fileinput-button">
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
                    <label>上下架：</label>
                    <select name="status" class="uniform">
                        <option value="1">上架</option>
                        <option value="0">下架</option>
                    </select>
                </li>
                <li class="input">
                    {{ Form::text('weight', null, array('placeholder'=>'比重', 'class' => 'span2')) }}
                    <span class="help-block note"><i class="icon-warning-sign"></i> 數字越大越前面.</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn btn-blue">儲存</button>
        <a href="{{ URL::route('product') }}">取消</a>
    </div>
    {{ Form::close() }}
@stop

@section('box_title')
    無駄無駄無駄無駄無駄
@stop

@include('admin.layouts.partial.box')
