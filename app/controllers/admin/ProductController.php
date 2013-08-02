<?php
namespace Controllers\Admin;
use BaseController;
use View;
use Product;
use Input;
use stdClass;
use Auth;

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
        $data['products'] = Product::where('status', '=', true)->get();
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
            $model->weight = Input::get('weight');
            if($model->save()) {
                $tmp_title_ar = Input::get('title');
                $tmp_content_ar = Input::get('content');
                $length = count(Input::get('tab_key'));
                foreach(Input::get('tab_key') as $index => $key) {
                    $model2 = new ProdTabs;
                    $model2->tab_key = $key;
                    $model2->title = $tmp_title_ar[$index];
                    $model2->content = $tmp_content_ar[$index];
                    $model2->product_id = $model->id;
                    $model2->weight = $length - $index;
                    $model2->save();
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        echo 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
