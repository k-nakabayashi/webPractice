<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

trait AdminGuardBroker {

    public function broker()
    {
        return Password::broker('admins');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
