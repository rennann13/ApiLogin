<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(1);
        return response()->json([
            'status' => true,
            'users'=> $users
        ], 200);
    }
}
