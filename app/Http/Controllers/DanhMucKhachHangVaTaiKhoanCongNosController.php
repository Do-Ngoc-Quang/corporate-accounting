<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DanhMucKhachHang;
use App\Models\DanhMucTaiKhoanCongNoKhachHang;
use App\Models\DanhMucTaiKhoan;


class DanhMucKhachHangVaTaiKhoanCongNosController extends Controller
{
    // Hàm yêu lấy dữ liệu và yêu cầu hiển thị
    public function index()
    {
        $danhmuckhachhang = DanhMucKhachHang::get();

        return view('content.danhmuc.danhmuckhachhang', compact('danhmuckhachhang'));
    }

    // Hàm xử lý tạo mới một khách hàng
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'MaKhachHang' => 'required',
            'TenKhachHang' => 'required',
            'MaSoThue' => 'required',
            'DiaChi' => 'required',
            'TinhThanhPho' => 'required',
            'DienThoai' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        DanhMucKhachHang::create([
            'MaKhachHang' => $request->MaKhachHang,
            'TenKhachHang' => $request->TenKhachHang,
            'MaSoThue' => $request->MaSoThue,
            'DiaChi' => $request->DiaChi,
            'TinhThanhPho' => $request->TinhThanhPho,
            'DienThoai' => $request->DienThoai
        ]);

        return response()->json(['success']);
    }

    // Hàm xử lý cập nhật khách hàng
    public function update(Request $request, $id)
    {
        $danhmuckhachhang = DanhMucKhachHang::find($id);

        if (!$danhmuckhachhang) {
            return response()->json(['error']);
        }

        $danhmuckhachhang->update([
            'TenKhachHang' => $request->TenKhachHang,
            'MaSoThue' => $request->MaSoThue,
            'DiaChi' => $request->DiaChi,
            'TinhThanhPho' => $request->TinhThanhPho,
            'DienThoai' => $request->DienThoai,
            'Fax' => $request->Fax,
        ]);

        return response()->json(['success']);
    }

    // Hàm xử lý xóa khách hàng
    public function delete($id)
    {
        DanhMucKhachHang::find($id)->delete();

        return response()->json(['success']);
    }



    // --------------------------------------------------- Công nợ -------------------------------------------------------------------//

    // Hàm xử lý lấy công nợ khi click vào một khách hàng
    public function collect_CongNo($makhachhang)
    {
        $congno = DanhMucTaiKhoanCongNoKhachHang::where('MaKhachHang', $makhachhang)->get();

        return response()->json($congno);
    }

    // Hàm xử lý lấy tất cả các mã tài khoản đang có trong cơ sở dữ liệu
    public function collect_TaiKhoan()
    {
        $taikhoans = DanhMucTaiKhoan::pluck('TaiKhoan');

        return response()->json($taikhoans);
    }

    public function congno_store(Request $request)
    {
        $exist_TaiKhoan_CongNo = DanhMucTaiKhoanCongNoKhachHang::where('MaKhachHang', $request->MaKhachHang)
            ->where('TaiKhoan', $request->TaiKhoan)
            ->value('TaiKhoan');

        // Kiểm tra xem có dòng dữ liệu nào tồn tại hay không
        if (!$exist_TaiKhoan_CongNo) {
            $validator = Validator::make($request->all(), [
                'TaiKhoan' => 'required',
                'MaKhachHang' => 'required',
                'SoDuNoDau' => 'required',
                'SoDuCoDau' => 'required',
                'NgaySoDu' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }

            DanhMucTaiKhoanCongNoKhachHang::create([
                'TaiKhoan' => $request->TaiKhoan,
                'MaKhachHang' => $request->MaKhachHang,
                'SoDuNoDau' => $request->SoDuNoDau,
                'SoDuCoDau' => $request->SoDuCoDau,
                'NgaySoDu' => $request->NgaySoDu
            ]);

            return response()->json(['success']);
        }
        // Nếu khách hàng này đã có tài khoản công nợ này thì trả về error để không được thêm công nợ
        return response()->json(['error'], 400);
    }


    // Hàm xử lý cập nhật công nợ
    public function congno_update(Request $request, $id)
    {
        $congno = DanhMucTaiKhoanCongNoKhachHang::find($id);

        if (!$congno) {
            return response()->json(['error']);
        }

        $congno->update([
            'SoDuNoDau' => $request->SoDuNoDau,
            'SoDuCoDau' => $request->SoDuCoDau
        ]);

        return response()->json(['success']);
    }

    //Hàm xử lý xóa công nợ
    public function congno_delete($id)
    {
        DanhMucTaiKhoanCongNoKhachHang::find($id)->delete();

        return response()->json(['success']);
    }


    // ---------------------------------------------------------------------- Update số dư tài khoản ---------------------------------------------------------//

    //Thêm số dư mới công nợ cho mỗi lần khách hàng được thêm mới công nợ
    function sodutaikhoan_add_first(Request $request, $taikhoan)
    {
        $id = DanhMucTaiKhoan::where('TaiKhoan', $taikhoan)->value('id');

        // Tính tổng SoDuNoDau và SoDuCoDau dựa trên mã tài khoản cho toàn bộ công nợ của tất cả khách hàng
        $tongSoDuNoDau = DanhMucTaiKhoanCongNoKhachHang::where('TaiKhoan', $taikhoan)->sum('SoDuNoDau');
        $tongSoDuCoDau = DanhMucTaiKhoanCongNoKhachHang::where('TaiKhoan', $taikhoan)->sum('SoDuCoDau');


        //Đóng gói dữ liệu để kiểm thử
        $data = [
            'sodunodau' => $request->SoDuNoDau,
            'soducodau' =>  $request->SoDuCoDau,
            'idTaiKhoan' => $id,
            'tongSoDuNoDau' => $tongSoDuNoDau,
            'tongSoDuCoDau' =>  $tongSoDuCoDau,
        ];

        $taikhoan = DanhMucTaiKhoan::find($id);
        $taikhoan->update([
            'SoDuNoDau' => $tongSoDuNoDau,
            'SoDuCoDau' => $tongSoDuCoDau
        ]);

        // Return kiểm thử
        return response()->json($data);
    }

    //Cập nhật số dư
    function sodutaikhoan_update(Request $request, $taikhoan)
    {
        $id = DanhMucTaiKhoan::where('TaiKhoan', $taikhoan)->value('id');

        $id_of_CongNo = $request->id;


        // Tính tổng SoDuNoDau và SoDuCoDau dựa trên mã tài khoản cho toàn bộ công nợ của tất cả khách hàng
        $tongSoDuNoDau = DanhMucTaiKhoanCongNoKhachHang::where('TaiKhoan', $taikhoan)->sum('SoDuNoDau');
        $tongSoDuCoDau = DanhMucTaiKhoanCongNoKhachHang::where('TaiKhoan', $taikhoan)->sum('SoDuCoDau');


        //Đóng gói dữ liệu để kiểm thử - không liên quan đến chức năng
        $data = [
            'sodunodau' => $request->SoDuNoDau,
            'soducodau' =>  $request->SoDuCoDau,
            'idTaiKhoan' => $id,
            'idTaiKhoanCongNo' => $id_of_CongNo,
            'tongSoDuNoDau' => $tongSoDuNoDau,
            'tongSoDuCoDau' =>  $tongSoDuCoDau,
        ];


        $congno = DanhMucTaiKhoanCongNoKhachHang::find($id_of_CongNo);
        $congno->update([
            'SoDuNoDau' => $request->SoDuNoDau,
            'SoDuCoDau' => $request->SoDuCoDau
        ]);

        $taikhoan = DanhMucTaiKhoan::find($id);
        $taikhoan->update([
            'SoDuNoDau' => $tongSoDuNoDau,
            'SoDuCoDau' => $tongSoDuCoDau
        ]);


        // Return kiểm thử
        return response()->json($data);
    }


    // Cập nhật số dư
    function sodutaikhoan_delete(Request $request, $taikhoan)
    {
        $id = DanhMucTaiKhoan::where('TaiKhoan', $taikhoan)->value('id');

        // Tính tổng SoDuNoDau và SoDuCoDau dựa trên mã tài khoản cho toàn bộ công nợ của tất cả khách hàng
        $tongSoDuNoDau = DanhMucTaiKhoanCongNoKhachHang::where('TaiKhoan', $taikhoan)->sum('SoDuNoDau');
        $tongSoDuCoDau = DanhMucTaiKhoanCongNoKhachHang::where('TaiKhoan', $taikhoan)->sum('SoDuCoDau');


        // //Đóng gói dữ liệu để kiểm thử - không liên quan đến chức năng
        // $data = [
        //     'idTaiKhoan' => $id,
        //     'tongSoDuNoDau' => $tongSoDuNoDau,
        //     'tongSoDuCoDau' =>  $tongSoDuCoDau,
        // ];
        // Return kiểm thử
        // return response()->json($data);

        $taikhoan = DanhMucTaiKhoan::find($id);
        $taikhoan->update([
            'SoDuNoDau' => $tongSoDuNoDau,
            'SoDuCoDau' => $tongSoDuCoDau
        ]);

    }


    // ----------------------------------------------------------------------- GET thông tin Khách hàng -----------------------------------------------------------//
    function get_KhachHang(){
        $khachhang = DanhMucKhachHang::get();

        return response()->json($khachhang);
    }
}
