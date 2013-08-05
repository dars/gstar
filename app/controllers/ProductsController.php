<?php
namespace Controllers;
use BaseController;
use Tab;

class ProductsController extends \BaseController {

	protected $layout = 'frontend.layouts.master';

    public function index()
    {
        $this->layout->nest('content', 'frontend.product.index');
    }

	public function show($id)
	{
		//
	}
}
