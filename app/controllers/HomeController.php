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
        $this->layout->nest('content', 'frontend.about');
    }

    public function about2()
    {
        $this->layout->nest('content', 'frontend.about2');
    }

    public function about3()
    {
        $this->layout->nest('content', 'frontend.about3');
    }

    public function contact()
    {
        $this->layout->nest('content', 'frontend.contact');
    }

    public function support()
    {
        $this->layout->nest('content', 'frontend.support');
    }
}
