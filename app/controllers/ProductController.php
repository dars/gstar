<?php
namespace Controllers;
use BaseController;
use Tab;
use Taxonomy;
use Product;
use Image;
use Session;
use Redirect;
use DB;
use Input;

class ProductController extends BaseController {

    protected $layout = 'frontend.layouts.master';

    public function index()
    {
        $data = array();
        $data = Taxonomy::getMenu(true);
        $this->layout->nest('content', 'frontend.product.index', array('data' => $data));
    }

    public function second($taxo_2)
    {
        $data = array();
        $data['taxo1_id'] = Taxonomy::getParentId($taxo_2);
        $data['taxo1'] = Taxonomy::getName($data['taxo1_id']);
        $data['taxo2'] = Taxonomy::getName($taxo_2);
        $data['new'] = Product::select(array('id', 'name', 'model'))->where('taxonomy_id', '=', $taxo_2)->where('type', '=', 1)->orderby('weight','desc')->paginate(12);
        $data['old'] = Product::select(array('id', 'name', 'model'))->where('taxonomy_id', '=', $taxo_2)->where('type', '=', 2)->orderby('weight','desc')->paginate(12);
        $data['old_items'] = array();
        $data['new_items'] = array();
        foreach($data['new'] as $n) {
            $n['image'] = Product::getImages($n['id']);
            array_push($data['new_items'], $n);
        }
        foreach($data['old'] as $o) {
            $o['image'] = Product::getImages($o['id']);
            array_push($data['old_items'], $o);
        }
        $this->layout->nest('content', 'frontend.product.second', $data);
    }

    public function show($id)
    {
        if(Session::has('inquiry')) {
            $inquiry = Session::get('inquiry');
        } else {
            $inquiry = array();
        }
        if(array_search($id, $inquiry) === false){
            array_push($inquiry, $id);
            Session::put('inquiry', $inquiry);
        }
        $data = array();
        $data['model'] = Product::find($id);
        $data['taxo1_id'] = Taxonomy::getParentId($data['model']['taxonomy_id']);
        $data['taxo1'] = Taxonomy::getName($data['taxo1_id']);
        $data['taxo2'] = Taxonomy::getName($data['model']['taxonomy_id']);
        $data['taxo2_img'] = Taxonomy::getImage($data['model']['taxonomy_id']);
        $data['pix'] = Image::where('product_id', '=', $data['model']['id'])->orderBy('id', 'asc')->get()->toArray();
        $data['tab'] = Tab::where('product_id', '=', $data['model']['id'])->orderBy('weight', 'desc')->get()->toArray();
        if($data['model']['type'] == 1) {
            $this->layout->nest('content', 'frontend.product.show', $data);
        } else {
            $this->layout->nest('content', 'frontend.product.show_old', $data);
        }
    }

    public function inquiry()
    {
        $inquiry = Session::get('inquiry');
        if(count($inquiry) < 1) {
            return Redirect::route('product.index');
        } else {
            $model = DB::table('products')->whereIn('id', $inquiry)->get();
            $this->layout->nest('content', 'frontend.product.inquiry', array('model' => $model));
        }
    }

    public function search()
    {
        $data = array();
        $data['keyword'] = Input::get('keyword');
        $keyword = '%'.Input::get('keyword').'%';
        $data['total'] = Product::where('name', 'like', $keyword)->orWhere('model', 'like', $keyword)->count();
        $data['model'] = Product::where('name', 'like', $keyword)->orWhere('model', 'like', $keyword)->paginate(5);
        foreach($data['model'] as $index=>$t){
            $data['model'][$index]['image'] = Product::getImages($t['id']);
        }
        $this->layout->nest('content', 'frontend.product.search', $data);
    }
}
