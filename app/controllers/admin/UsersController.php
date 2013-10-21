<?php namespace Controllers\Admin;

use Cartalyst\Sentry\Users\LoginRequiredException;
use Cartalyst\Sentry\Users\PasswordRequiredException;
use Cartalyst\Sentry\Users\WrongPasswordException;
use Cartalyst\Sentry\Users\UserExistsException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Cartalyst\Sentry\Throttling\UserSuspendedException;
use Controllers\BaseController;
use View;
use Taxonomy;
use Input;
use stdClass;
use Response;
use Validator;
use Redirect;
use Auth;
use Sentry;

class UsersController extends BaseController {
    protected $layout = 'admin.layouts.master';
    public function login()
    {
        if(Input::all()) {
            $rules = array(
                'email' => 'required',
                'password' => 'required|between:6,50',
            );
            // Create a new validator instance from our validation rules
            $validator = Validator::make(Input::all(), $rules);
            if($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            } else {
                try {
                    $credentials = array(
                        'email'    => Input::get('email'),
                        'password' => Input::get('password')
                    );
                    $user = Sentry::authenticate($credentials, false);
                    var_dump($user);
                    return Redirect::route('admin.product.index');
                } catch (LoginRequiredException $e) {
                    return Redirect::back()->withInput()->withErrors($validator);
                } catch (PasswordRequiredException $e) {
                    return Redirect::back()->withInput()->withErrors($validator);
                } catch (WrongPasswordException $e) {
                    return Redirect::back()->withInput()->withErrors($validator);
                } catch (UserNotFoundException $e) {
                    return Redirect::back()->withInput()->withErrors($validator);
                } catch (UserNotActivatedException $e) {
                    return Redirect::back()->withInput()->withErrors($validator);
                } catch (UserSuspendedException $e) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
            }
        }
        $this->layout->nest('content', 'admin.login');
    }

    public function logout()
    {
        Sentry::logout();
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
        $group = Sentry::createGroup(array(
            'name' => 'Admin'
        ));
        $user = Sentry::createUser(array(
            'email'    => 'admin@djstudio.biz',
            'password' => 'password'
        ));
        $adminGroup = Sentry::findGroupById(1);
        $user->addGroup($adminGroup);
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
