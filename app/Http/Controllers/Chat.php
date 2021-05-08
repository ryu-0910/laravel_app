<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Chat extends Controller
{
    public function index(Request $request, $userId)
    {
        var_dump($userId);exit;
    }

    public function post(Request $request)
    {
        var_dump($request->all()); exit;
        return view('chat');
    }
}
