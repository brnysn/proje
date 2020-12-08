<?php

namespace App\Http\Controllers\Admin;

class HomeController
{
    public function index()
    {
        return redirect()->route('admin.passwords.index');
    }
}
