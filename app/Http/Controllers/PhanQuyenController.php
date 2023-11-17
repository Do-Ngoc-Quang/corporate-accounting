<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PhanQuyenController extends Controller
{
    public function index(){
        $users = User::get();
        return view('content.quanlynguoidung.phanquyen', compact('users'));
    }
}
