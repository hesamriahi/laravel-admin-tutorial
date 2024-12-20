<?php

namespace App\Http\Controllers;

use Encore\Admin\Facades\Admin;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class testController extends Controller
{
    public function index()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
        dd(class_basename($this).".".__function__." HERE");
    }
}
