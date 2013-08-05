<?php
namespace Controllers\Admin;

use BaseController;
use View;
use Product;
use Taxonomy;
use Tab;
use Input;
use stdClass;
use Auth;
use Image;
use Redirect;

class ProductController extends BaseController {

    protected $layout = 'admin.layouts.master';
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $data = array();
        $data['products'] = Product::orderby('weight','desc')->paginate(15);
        $data['bread'] = array(array(
            'name' => '商品資料維護',
            'icon_set' => 'icon-edit'
        ));
        $this->layout->nest('content', 'admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data['bread'] = array(array(
            'name' => '商品資料維護',
            'icon_set' => 'icon-edit'
        ));
        $this->layout->nest('content', 'admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if(Input::all()) {
            $model = new Product;
            $model->model = Input::get('model');
            $model->name = Input::get('name');
            $model->description = Input::get('description');
            $model->status = Input::get('status');
            $model->taxonomy_id = Input::get('taxo2');
            $model->weight = Input::get('weight');
            if($model->save()) {
                $tmp_title_ar = Input::get('tab_title');
                $tmp_content_ar = Input::get('tab_content');
                $length = count(Input::get('tab_key'));
                foreach(Input::get('tab_key') as $index => $key) {
                    $model2 = new Tab;
                    $model2->tab_key = $key;
                    $model2->title = $tmp_title_ar[$index];
                    $model2->content = $tmp_content_ar[$index];
                    $model2->product_id = $model->id;
                    $model2->weight = $length - $index;
                    $model2->save();
                }
                $imgs = expolde(',', Input::get('img_files'));
                foreach($imgs as $t){
                    $model3 = new Image;
                    $model3->product_id = $model->id;
                    $model3->name = $t;
                    $model3->save();
                }
            }
        }
        return Redirect::route('admin.product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $data = array();
        $data['id'] = $id;
        $data['bread'] = array(array(
            'name' => '商品資料維護',
            'icon_set' => 'icon-edit'
        ));
        $data['model'] = Product::find($id);
        $data['taxo1'] = Taxonomy::getTaxo1();
        $data['taxo1_id'] = Taxonomy::getParentId($data['model']['taxonomy_id']);
        $data['taxo2'] = Taxonomy::getTaxo2($data['model']['taxonomy_id']);
        $pix = Image::select(array('name'))->where('product_id', '=', $id)->get();
        $data['pix'] = array();
        foreach($pix as $t){
            array_push($data['pix'],$t['name']);
        }
        $this->layout->nest('content', 'admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $this->layout = null;
        if(Input::all()) {
            $model = Product::find($id);
            if($model){
                $model->model = Input::get('model');
                $model->name = Input::get('name');
                $model->description = Input::get('description');
                $model->status = Input::get('status');
                $model->taxonomy_id = Input::get('taxo2');
                $model->weight = Input::get('weight');
                if($model->save()) {
                    $tmp_title_ar = Input::get('tab_title');
                    $tmp_content_ar = Input::get('tab_content');
                    $length = count(Input::get('tab_key'));
                    foreach(Input::get('tab_key') as $index => $key) {

                        $model2 = new Tab;
                        $model2->tab_key = $key;
                        $model2->title = $tmp_title_ar[$index];
                        $model2->content = $tmp_content_ar[$index];
                        $model2->product_id = $model->id;
                        $model2->weight = $length - $index;
                        //$model2->save();
                    }
                    $imgs = explode(',', Input::get('img_files'));
                    foreach($imgs as $t){
                        if($t != ''){
                            $model3 = new Image;
                            $model3->product_id = $model->id;
                            $model3->name = $t;
                            $model3->save();
                        }
                    }
                }
            }
        }
        return Redirect::route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->layout = null;
        $model = Product::find($id);
        if($model) {
            $model->delete();
        }
        echo '{"success": true}';
    }

    public function updateStatus()
    {
        $this->layout = null;
        $model = Product::find(Input::get('pk'));
        if($model) {
            $model->status = Input::get('value');
            $model->save();
        }
    }

    public function getTabs($prod_id)
    {
        $this->layout = null;
        $model = Tab::where('product_id', '=', $prod_id)->orderby('weight','desc')->get();
        $res = array();
        foreach($model as $t){
            $tmp = array(
                         'tab_key' => $t->tab_key,
                         'title'   => $t->title,
                         'content' => $t->content
            );
            array_push($res, $tmp);
        }
        echo json_encode($res);
    }
}
