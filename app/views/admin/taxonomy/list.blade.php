<div class="span12">
    <div class="box">
        <div class="box-header">
            @if($parent_name)
                <span class="title"><a href="{{ route('taxonomy') }}"><i class="icon-reply"></i></a>&nbsp; {{ $parent_name }}</span>
            @endif
            <ul class="box-toolbar">
                <li>
                    <span class="label label-green">
                        {{ count($model) }}
                        @if(!$parent_name)
                             項主分類
                        @else
                             項次分類
                        @endif
                    </span>
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
                <tbody>
                    @foreach($model as $t)
                        <tr class="status-info" id="taxo_{{ $t->id }}">
                            <td class="icon"><i class="icon-move"></i></td>
                            <td>
                                @if(!$t->parent_id)
                                    {{ link_to_route('sub_taxonomy', $t->name, $t->id) }}
                                @else
                                <span>
                                    {{ $t->name }}
                                </span>
                                @endif
                            </td>
                            <td>
                                {{ Form::checkbox('status_'.$t->id, 1, $t->status, array('class' => 'status_btn', 'id' => 'status_'.$t->id)) }}
                            </td>
                            <td>
                                <button class="btn btn-mini btn-default edit_btns" id="edit_{{ $t->id }}">
                                    <i class="icon-edit"></i>
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-mini btn-danger delete_btn" type="button" id="remove_{{ $t->id }}">
                                    <i class="icon-remove"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-actions">
                {{ Form::open(array('class'=>'fill-up')) }}
                    <div class="span8">
                        <input type="text" name="name" placeholder="分類名稱" required id="form_name_txt">
                    </div>
                    @if($parent_id)
                    <div class="span1" id="img_link_block" style="display:none">
                        <a href=javascript:void(0) id="img_cancel">x</a>&nbsp;
                        <a href="#" target="_blank" id="img_link">檢視圖片</a>
                    </div>
                    @endif

                    <div class="span1" id="img_upload_block">
                        @if($parent_id)
                            <span class="btn btn-brown btn-small fileinput-button">
                                <span>上傳圖片</span>
                                <input id="fileupload" type="file" name="files[]">
                            </span>
                        @endif
                    </div>
                    <div class="span2">
                        <button type="submit" class="btn btn-blue btn-small" id="sub_btn"><nobr>新增</nobr></button>
                        <button type="button" class="btn btn-gray btn-small" id="cancel_btn" style="display:none"><nobr>取消</nobr></button>
                    </div>
                    {{ Form::hidden('parent_id', $parent_id, array('id' => 'form_parent_id_txt')) }}
                    {{ Form::hidden('image', null, array('id' => 'form_image')) }}
                    {{ Form::hidden('id', null, array('id' => 'form_id')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
