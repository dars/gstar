<?php
namespace Controllers;
use BaseController;
use Tab;
use Taxonomy;
use Product;
use Image;

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
        $data['new'] = Product::select(array('id', 'name'))->where('taxonomy_id', '=', $taxo_2)->where('type', '=', 1)->paginate(12);
        $data['old'] = Product::select(array('id', 'name'))->where('taxonomy_id', '=', $taxo_2)->where('type', '=', 2)->paginate(12);

        $this->layout->nest('content', 'frontend.product.second', $data);
    }

    public function show($id)
    {
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
            $this->layout->nest('content', 'frontend.product.old', $data);
        }
    }
}
