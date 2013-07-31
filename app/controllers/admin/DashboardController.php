<?php
namespace Controllers\Admin;
use BaseController;
use View;

class DashboardController extends BaseController
{
    protected $layout = 'admin.layouts.master';

    public function index()
    {
        $this->layout->content = View::make('hello', array('name'=>'Dars'));
    }
}
