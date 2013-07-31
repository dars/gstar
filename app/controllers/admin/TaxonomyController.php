<?php
namespace Controllers\Admin;
use BaseController;
use View;
use Taxonomy;
use Input;
use stdClass;
use Response;

class TaxonomyController extends BaseController
{
    protected $layout = 'admin.layouts.master';

    // 主頁
    public function index()
    {
        $data['bread'] = array(array(
            'name' => '商品分類設定',
            'icon_set' => 'icon-sitemap'
        ));
        $this->layout->nest('content', 'admin.taxonomy.index', $data);
    }

    // 取得列表資料
    public function getItems($parent_id = 0)
    {
        $this->layout = null;
        $model = Taxonomy::where('parent_id', '=', $parent_id)->get();
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
}
