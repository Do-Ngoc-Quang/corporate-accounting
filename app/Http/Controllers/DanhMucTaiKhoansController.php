<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DanhMucTaiKhoan;

class DanhMucTaiKhoansController extends Controller
{

    public function index()
    {
        $danhmuctaikhoan = DanhMucTaiKhoan::get();

        return view('content.danhmuc.danhmuctaikhoan', compact('danhmuctaikhoan'));
    }


    public function store(Request $request)
    {
        $exist_TaiKhoan = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoan)->value('TaiKhoan');

        if (!$exist_TaiKhoan) {
            $validator = Validator::make($request->all(), [
                'TaiKhoan' => 'required',
                'TenTaiKhoan' => 'required',
                'SoDuNoDau' => 'required',
                'SoDuCoDau' => 'required',
                'CoDinhKhoan' => 'required',
                'Cap' => 'required',
                'NgaySoDu' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }

            DanhMucTaiKhoan::create([
                'TaiKhoan' => $request->TaiKhoan,
                'TenTaiKhoan' => $request->TenTaiKhoan,
                'SoDuNoDau' => $request->SoDuNoDau,
                'SoDuCoDau' => $request->SoDuCoDau,
                'CoDinhKhoan' => $request->CoDinhKhoan,
                'Cap' => $request->Cap,
                'NgaySoDu' => $request->NgaySoDu,
            ]);
            return response()->json(['success']);
        } else {
            return response()->json(['error'], 400);
        }
    }


    public function update(Request $request, $id)
    {

        $danhmuctaikhoan = DanhMucTaiKhoan::find($id);

        if (!$danhmuctaikhoan) {
            return response()->json(['error']);
        }

        $danhmuctaikhoan->update([
            'TenTaiKhoan' => $request->TenTaiKhoan,
            // 'SoDuNoDau' => $request->SoDuNoDau,
            // 'SoDuCoDau' => $request->SoDuCoDau,
            'CoDinhKhoan' => $request->CoDinhKhoan,
            'Cap' => $request->Cap,
            'NgaySoDu' => $request->NgaySoDu,
        ]);

        return response()->json(['success']);
    }


    public function delete($id)
    {
        DanhMucTaiKhoan::find($id)->delete();

        return response()->json(['success']);
    }
}
