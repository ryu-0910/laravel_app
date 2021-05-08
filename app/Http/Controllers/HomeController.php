<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $userId = $request->user()->id; // リクエストユーザーのidを取得
        $users = User::where('id', '!=', $userId)->paginate(10); // 自分以外のユーザーを取得

        return view('home', ['users' => $users]);
    }
}
