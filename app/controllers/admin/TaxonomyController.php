<?php
namespace Controllers\Admin;
use Controllers\BaseController;
use View;
use Taxonomy;
use Input;
use stdClass;
use Response;
use Redirect;

class TaxonomyController extends BaseController
{
    protected $layout = 'admin.layouts.master';

    // 主頁
    public function index($parent_id = 0)
    {
        if(Input::all()) {
            if(Input::get('id')) {
                $model = Taxonomy::find(Input::get('id'));
            } else {
                $model = new Taxonomy;
            }
            $model->name = Input::get('name');
            $model->user_id = 0;
            $model->parent_id = Input::get('parent_id');
            $model->image = Input::get('image');
            $model->save();
        }
        $data['bread'] = array(array(
            'name' => '商品分類設定',
            'icon_set' => 'icon-sitemap'
        ));
        if($parent_id != 0) {
            $data['parent_id'] = $parent_id;
            $parent = Taxonomy::find($parent_id);
            $data['parent_name'] = $parent->name;
        } else {
            $data['parent_id'] = 0;
            $data['parent_name'] = null;
        }
        $data['model'] = Taxonomy::where('parent_id', '=', $parent_id)->get();
        $this->layout->nest('content', 'admin.taxonomy.index', $data);
    }

    // 取得列表資料
    public function getItems($parent_id = 0)
    {
        $this->layout = null;
        $model = Taxonomy::where('parent_id', '=', $parent_id)->orderBy('weight', 'desc')->get();
        $res = new stdClass;
        $res->parent_name = '';
        $res->list = array();
        foreach($model as $t) {
            array_push($res->list, $t->toArray());
        }
        if($parent_id != 0) {
            $parent = Taxonomy::find($parent_id);
            $res->parent_name = $parent->name;
        }
        echo json_encode($res);
    }

    // 編輯
    public function edit()
    {
        $this->layout = null;

        $model = Taxonomy::find(Input::get('pk'));
        if($model) {
            $model->name = Input::get('value');
            $model->save();
        }
        echo '{"success": true}';
    }

    // 更新狀態
    public function updateStatus()
    {
        $this->layout = null;
        $model = Taxonomy::find(Input::get('pk'));
        if($model) {
            $model->status = Input::get('value');
            $model->save();
        }
    }

    // 產生樣板
    public function taxo_list()
    {
        $this->layout = null;
        return View::make('admin.taxonomy.list');
    }

    // 新增分類
    public function add_taxonomy()
    {
        $this->layout = null;
        $model = new Taxonomy;
        $model->name = Input::get('new_item');
        $model->parent_id = (int)Input::get('parent_id');
        $model->image = Input::get('files');
        $model->user_id = 1;
        $model->status = 1;
        $model->save();

        $res = new stdClass();
        $res->success = true;
        $res->id = $model->id;
        $res->name = $model->name;
        $res->parent_id = $model->parent_id;
        $res->status = $model->status;
        echo json_encode($res);
    }

    // 刪除分類
    public function delete($pk)
    {
        $this->layout = null;
        $model = Taxonomy::find($pk);
        if($model) {
            $model->delete();
        }
        return Redirect::route('taxonomy');
    }

    // 更新排序
    public function updateSort()
    {
        $this->layout = null;
        $ids = explode(',', Input::get('ids'));
        $length = count($ids);
        foreach($ids as $index => $t) {
            $model = Taxonomy::find($t);
            $model->weight = $length - $index;
            $model->save();
        }
        echo '{"success": true}';
    }

    // 取得taxonomy
    public function getTaxonomy()
    {
        $this->layout = null;
        $model = Taxonomy::find(Input::get('id'))->toJSON();
        echo $model;
    }
}
