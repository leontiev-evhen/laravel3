<?php

class AuthController extends BaseController
{
    public function getLogin ()
    {
        return View::make('auth.login');
    }

    public function postLogin ()
    {
        if (Request::isMethod('post'))
        {

            Input::flash();

            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];

            $validator = Validator::make(
                [
                    'email' => Input::get('email'),
                    'password' => Input::get('password'),
                ],
                $rules
            );

            if($validator->fails())
            {
                return Redirect::to('auth/login')->withErrors($validator)->withInput();;
            }
            
            $data = [
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ];

            $remember = (Input::has('remember')) ? true : false;

            if (Auth::attempt($data, $remember))
            {
                return Redirect::intended('/');
            }
            else
            {
                return Redirect::to('auth/login')->withErrors(['loginError' =>  Lang::get('auth.error')]);
            }
        }
        else
        {
            throw new Exception('HTTP method should be POST');
        }
    }

    public function getLogout ()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    
}
