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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
