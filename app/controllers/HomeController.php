<?php
namespace Controllers;
use BaseController;
use Input;
use Mail;
use Session;

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
        if(Input::all()){
            $data['subject'] = Input::get('subject');
            $data['name'] = Input::get('name');
            $data['company'] = Input::get('company');
            $data['email'] = Input::get('email');
            $data['phone'] = Input::get('phone');
            $data['email_content'] = Input::get('message');
            Mail::send('emails.contact', $data, function($message)
            {
                $message->to(Input::get('email'), Input::get('name'))->subject('[Contact] '.Input::get('subject'));
            });
            Session::flash('notice', 'mail send success.');
        }
        $this->layout->nest('content', 'frontend.contact');
    }

    public function support()
    {
        $this->layout->nest('content', 'frontend.support');
    }
}
