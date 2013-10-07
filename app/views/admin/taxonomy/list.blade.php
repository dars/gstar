<div class="span12">
    <div class="box">
        <div class="box-header">
            <span class="title"><a href="#"><i class="icon-reply"></i></a>&nbsp;[[ parent_name ]]</span>
            <ul class="box-toolbar">
                <li>
                    <span class="label label-green" ng-hide="parent_name">[[ taxonomies.length ]] 項主分類</span>
                    <span class="label label-green" ng-show="parent_name">[[ taxonomies.length ]] 項次分類</span>
                </li>
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
                            <a href="#/parent/[[ item.id ]]" id="item_[[ item.id ]]" ng-hide="parent_name">
                                [[ item.name ]]
                            </a>
                            <span ng-show="parent_name">
                                [[ item.name ]]
                            </span>
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
                <form action='' class='fill-up' method="post" ng-submit='addTaxonomy()'>
                    <div class="span11">
                        <input type="text" placeholder="分類名稱" ng-model='new_item' required>
                    </div>
                    <div class="span1">
                        <button type="submit" class="btn btn-blue btn-small"><nobr>新增</nobr></button>
                    </div>
                    <div ng-show="parent_name" style="clear:both;" class="clearfix">
                        <div class="span3">
                            <img src="http://placehold.it/207x73" id="tmp_upload_img" style="width:207px;height:73.31px;">
                        </div>
                        <div class="span9">
                            <span class="btn btn-black fileinput-button">
                                <i class="icon-plus icon-white"></i>
                                <span>新增檔案</span>
                                <!-- The file input field used as target for the file upload widget -->
                                <input id="fileupload" type="file" name="files[]">
                                {{ Form::hidden('img_files', null, array('id' => 'files', 'ng-model'=>'img_file')) }}
                            </span>
                            <!-- The global progress bar -->
                            <div id="progress" class="progress progress-success progress-striped" style="margin-top:15px">
                                <div class="bar"></div>
                            </div>
                        </div>
                    </div>
                    {{ Form::hidden('parent_id', Input::get('parent_id', 0)) }}
                </form>
            </div>
        </div>
    </div>
</div>
