<?php

namespace TinyUrl\Signup\SignupService;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class DbSignup implements TinyUrlSignupServiceInterface
{
    protected $_model;
    public function __construct ($model)
    {
        $this->_model = $model;
    }

    public function create()
    {
        $user = $this->_model;
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        return true;
    }
}