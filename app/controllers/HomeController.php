<?php
namespace Controllers;
use BaseController;

class HomeController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $layout = 'frontend.layouts.master';

    public function index()
    {
        $this->layout->nest('content', 'frontend.index');
    }
    public function about()
    {
        //
    }

    public function contact()
    {
        //
    }

    public function support()
    {
        //
    }
}
