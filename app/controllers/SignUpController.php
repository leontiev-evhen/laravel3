<?php

use TinyUrl\Signup\SignupService\TinyUrlSignupServiceInterface;

class SignUpController extends BaseController
{
    protected $_model;
    public function __construct (TinyUrlSignupServiceInterface $_model)
    {
        $this->_model = $_model;
    }

    public function getLogin ()
    {
        return View::make('signup.login');
    }

    public function postLogin ()
    {
        if (Request::isMethod('post'))
        {
            Input::flash();
            
            $rules = [
                'name' => 'required|min:3|max:32',
                'email' => 'required|email',
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'min:6|same:password',
            ];

            $validator = Validator::make(
                [
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'password' => Input::get('password'),
                    'password_confirmation' => Input::get('password_confirmation'),
                ],
                $rules
            );

            if($validator->fails())
            {
                return Redirect::to('signup/login')->withErrors($validator)->withInput();;
            }

            if ($this->_model->create())
            {
                return Redirect::to('auth/login');
            }

        }
        else
        {
            throw new Exception('HTTP method should be POST');
        }
    }

 
}