<?php

namespace TinyUrl\Signup;
use Illuminate\Support\ServiceProvider;

class TinyUrlSignupProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('TinyUrl\Signup\SignupService\TinyUrlSignupServiceInterface', function(){
            return new \TinyUrl\Signup\SignupService\DbSignup(new \User);
        });
    }
}