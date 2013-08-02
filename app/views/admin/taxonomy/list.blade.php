<div class="span12">
    <div class="box">
        <div class="box-header">
            <span class="title"><a href="#"><i class="icon-reply"></i></a>&nbsp;[[ parent_name ]]</span>
            <ul class="box-toolbar">
                <li><span class="label label-green">[[ taxonomies.length ]] 項次分類</span></li>
            </ul>
        </div>
        <div class="box-content">
            <table class="table table-normal">
                <thead>
                    <tr>
                        <td style="width: 40px"></td>
                        <td>分類名稱</td>
                        <td style="width: 70px">上下架</td>
                        <td style="width: 40px">修改</td>
                        <td style="width: 40px">刪除</td>
                    </tr>
                </thead>
                <tbody ui-sortable="{update:updateSort, axis:'y'}" ng-model="taxonomies">
                    <tr class="status-info" ng-repeat="item in taxonomies">
                        <td class="icon"><i class="icon-move"></i></td>
                        <td>
                            <a href="#/parent/[[ item.id ]]" id="item_[[ item.id ]]">
                                [[ item.name ]]
                            </a>
                        </td>
                        <td>
                            <input type="checkbox" ibutton ng-model=item.status ng-checked=item.status ng-change="chgStatus($index)">
                        </td>
                        <td>
                            <button class="btn btn-mini btn-default" ng-click="openDialog($index)">
                                <i class="icon-edit" id="edit_[[ item.id ]]"></i>
                            </button>
                        </td>
                        <td>
                            <button class="btn btn-mini btn-danger" type="button" ng-click="deleTaxonomy($index)">
                                <i class="icon-remove" id="remove_[[ item.id ]]"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-actions">
                <form action='' class='fill-up' enctype="multipart/form-data" ng-submit='addTaxonomy()' data-ng-controller="DemoFileUploadController" data-file-upload="options" data-ng-class="{'fileupload-processing': processing() || loadingFiles}">
                    <div class="span10">
                        <input type="text" placeholder="分類名稱" ng-model='new_item' required>
                    </div>
                    <div class="span1">
                        <button type="submit" class="btn btn-blue btn-small">新增</button>
                    </div>
                    <div ng-show="parent_name">
                    <div class="span7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-green fileinput-button" ng-class="{disabled: disabled}">
                            <i class="icon-plus icon-white"></i>
                            <span>新增檔案...</span>
                            <input type="file" name="files[]" multiple ng-disabled="disabled">
                        </span>
                        <button type="button" class="btn btn-lightblue start" data-ng-click="submit()">
                            <i class="icon-upload icon-white"></i>
                            <span>上傳</span>
                        </button>
                        <button type="button" class="btn btn-gray cancel" data-ng-click="cancel()">
                            <i class="icon-ban-circle icon-white"></i>
                            <span>取消</span>
                        </button>
                        <!-- The loading indicator is shown during file processing -->
                        <div class="fileupload-loading"></div>
                    </div>
                    <!-- The global progress information -->
                    <div class="span5 fade" data-ng-class="{in: active()}">
                        <!-- The global progress bar -->
                        <div class="progress progress-success progress-striped active" data-file-upload-progress="progress()"><div class="bar" data-ng-style="{width: num + '%'}"></div></div>
                        <!-- The extended global progress information -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                    </div>
                    {{ Form::hidden('parent_id', Input::get('parent_id', 0)) }}
                </form>
            </div>
        </div>
    </div>
</div>
