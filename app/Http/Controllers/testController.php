<?php

namespace App\Http\Controllers;

use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class testController extends Controller
{
    public function index()
    {
        dd(class_basename($this).".".__function__." HERE");
    }
}
