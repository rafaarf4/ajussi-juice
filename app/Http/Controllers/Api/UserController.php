<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'users' => \App\Models\User::select('id', 'nama', 'email')->get()
        ]);
    }
}
