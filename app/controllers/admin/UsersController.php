<?php
namespace Controllers\Admin;
use BaseController;
use View;
use Taxonomy;
use Input;
use stdClass;
use Response;
use Validator;
use Redirect;
use Auth;

class UsersController extends \BaseController {
    protected $layout = 'admin.layouts.master';
    public function login()
    {
        if(Input::all()) {
            $rules = array(
                'username' => 'required',
                'password' => 'required|between:6,50',
            );
            // Create a new validator instance from our validation rules
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails()) {
                // Ooops.. something went wrong
                return Redirect::back()->withInput()->withErrors($validator);
            } else {
                if(Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
                    // return Redirect::intended('dashboard');
                    return Redirect::route('admin.product.index');
                }
            }
        }
        $this->layout->nest('content', 'admin.login');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('user.login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
