<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\PhieuThu;

class PhanQuyenController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('content.quanlynguoidung.phanquyen', compact('users'));

        // $data = PhieuThu::get();
        // return view('content.baocao.baocao', compact('data'));       
    }
}
