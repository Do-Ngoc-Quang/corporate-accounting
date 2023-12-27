<?php

namespace App\Http\Controllers;

use App\Models\DanhMucHangHoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PhieuNhapHangHoa;
use App\Models\PhieuNhapHangHoaChiTiet;
use App\Models\DanhMucTaiKhoan;


class PhieuNhapHangHoasController extends Controller
{
    // ------------------------------------------------------------------------------------------------------------------------------------------------ //
    public function index()
    {
        $phieunhaphanghoa = PhieuNhapHangHoa::get();
        return view('content.giaodich.phieunhaphanghoa', compact('phieunhaphanghoa'));
    }

    // Lấy data của Phiếu nhập để hiển thị lên màn hình
    public function get_PhieuNhapHangHoa($machungtu)
    {
        $phieunhaphanghoa = PhieuNhapHangHoa::where('MaChungTu', $machungtu)->get();
        return response()->json($phieunhaphanghoa);
    }

    //Hàm xử lý tạo mới 
    public function store(Request $request)
    {
        
        $exist_PhieuNhapHangHoa = PhieuNhapHangHoa::where('MaChungTu', $request->MaChungTu)->value('MaChungTu');

        //Kiểm tra xem đã tồn tại trong database chưa
        if (!$exist_PhieuNhapHangHoa) {

            $validator = Validator::make($request->all(), [
                //Phiếu nhập
                'MaChungTu' => 'required',
                'LoaiChungTu' => 'required',
                'NgayChungTu' => 'required',
                'SoChungTu' => 'required',
                'DienGiai' => 'required',
                'MaKhachHang' => 'required',
                'TenKhachHang' => 'required',
                'MaSoThue' => 'required',
                'TaiKhoanNo' => 'required',
                'TaiKhoanNoGTGT' => 'required',
                'TaiKhoanCo' => 'required',
                'MatHang' => 'required',
                'SoXeRy' => 'required',
                'SoHoaDon' => 'required',
                'NgayHoaDon' => 'required',
                'ThueSuat' => 'required',
                'ThueGTGT' => 'required',

                //Phiếu nhập chi tiết
                'MaHang' => 'required',
                'DonViTinh' => 'required',
                'SoLuong' => 'required',
                'DonGia' => 'required',
                'ThanhTien' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }


            PhieuNhapHangHoa::create([
                'MaChungTu' => $request->MaChungTu,
                'LoaiChungTu' => $request->LoaiChungTu,
                'NgayChungTu' => $request->NgayChungTu,
                'SoChungTu' => $request->SoChungTu,
                'DienGiai' => $request->DienGiai,
                'MaKhachHang' => $request->MaKhachHang,
                'TenKhachHang' => $request->TenKhachHang,
                'MaSoThue' => $request->MaSoThue,
                'TaiKhoanNo' => $request->TaiKhoanNo,
                'TaiKhoanNoGTGT' => $request->TaiKhoanNoGTGT,
                'TaiKhoanCo' => $request->TaiKhoanCo,
                'MatHang' => $request->MatHang,
                'SoXeRy' => $request->SoXeRy,
                'SoHoaDon' => $request->SoHoaDon,
                'NgayHoaDon' => $request->NgayHoaDon,
                'ThueSuat' => $request->ThueSuat,
                'ThueGTGT' => $request->ThueGTGT
            ]);

            PhieuNhapHangHoaChiTiet::create([
                'MaChungTu' => $request->MaChungTu,
                'MaHang' => $request->MaHang,
                'DonViTinh' => $request->DonViTinh,
                'SoLuong' => $request->SoLuong,
                'DonGia' => $request->DonGia,
                'ThanhTien' => $request->ThanhTien
            ]);


            //Cập nhật số dư cho tài khoản gốc
            $id_TaiKhoan_No = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoanNoGTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGTGT)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoan_Co = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('id'); // lấy id của tài khoản ghi nhận có

            $SoDuNoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('SoDuNoDau');
            $SoDuNoDau_GTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGTGT)->value('SoDuNoDau');
            $SoDuCoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('SoDuCoDau');


            $temp_SoDuNoDau = (float)$SoDuNoDau + (float)$request->ThanhTien;
            $temp_SoDuNoDau_GTGT = (float)$SoDuNoDau_GTGT + (float)$request->ThueGTGT;
            $temp_SoDuCoDau = (float)$SoDuCoDau + (float)$request->ThanhTien;


            //Cập nhật số dư nợ cho tài khoản ghi nhận tăng
            $taikhoanNO = DanhMucTaiKhoan::find($id_TaiKhoan_No);
            $taikhoanNO->update([
                'SoDuNoDau' => $temp_SoDuNoDau
            ]);

            //Cập nhật số dư nợ cho tài khoản GTGT ghi nhận tăng
            $taikhoanNO_GTGT = DanhMucTaiKhoan::find($id_TaiKhoanNoGTGT);
            $taikhoanNO_GTGT->update([
                'SoDuNoDau' => $temp_SoDuNoDau_GTGT
            ]);

            //Cập nhật số dư có cho tài khoản ghi nhận giảm
            $taikhoanCO = DanhMucTaiKhoan::find($id_TaiKhoan_Co);
            $taikhoanCO->update([
                'SoDuCoDau' => $temp_SoDuCoDau
            ]);


            //Cập nhật số lượng và thành tiền tồn đầu
            $id_HangHoa = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('id'); // lấy id của hàng hóa
            $SoLuongTonDau = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('SoLuongTonDau');
            $ThanhTienTonDau = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('ThanhTienTonDau');

            $temp_SoLuongTonDau = (float)$SoLuongTonDau + (float)$request->SoLuong;
            $temp_ThanhTienTonDau = (float)$ThanhTienTonDau + (float)$request->ThanhTien;

            $hanghoa = DanhMucHangHoa::find($id_HangHoa);
            $hanghoa->update([
                'SoLuongTonDau' => $temp_SoLuongTonDau,
                'ThanhTienTonDau' => $temp_ThanhTienTonDau
            ]);


            //Kiểm thử dữ liệu
            $data = [
                    '$id_TaiKhoan_No' => $id_TaiKhoan_No,
                    '$id_TaiKhoan_Co' => $id_TaiKhoan_Co,
                    '$id_TaiKhoanNoGTGT' => $id_TaiKhoanNoGTGT,
                    '$SoDuNoDau' => $SoDuNoDau,
                    '$SoDuNoDau_GTGT' => $SoDuNoDau_GTGT,
                    '$SoDuCoDau' => $SoDuCoDau,
                    '$temp_SoDuNoDau' => $temp_SoDuNoDau,
                    '$temp_SoDuNoDau_GTGT' => $temp_SoDuNoDau_GTGT,
                    '$temp_SoDuCoDau' => $temp_SoDuCoDau,


                '$id_HangHoa' => $id_HangHoa,
                '$SoLuongTonDau' => $SoLuongTonDau,
                '$ThanhTienTonDau' => $ThanhTienTonDau,
                '$request->SoLuong' => $request->SoLuong,
                '$request->ThanhTien' => $request->ThanhTien,
                '$temp_SoLuongTonDau' => $temp_SoLuongTonDau,
                '$temp_ThanhTienTonDau' => $temp_ThanhTienTonDau,
            ];
            return response()->json($data);


            return response()->json(['success']);
        } else {
            return response()->json(['error'], 400);
        }
    }

    //Hàm xử lý cập nhật
    public function update(Request $request, $id)
    {
        $phieunhaphanghoa = PhieuNhapHangHoa::find($id);

        if ($phieunhaphanghoa) {

            //Cập nhật lại số dư tài khoản
            $id_TaiKhoanNoGTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGTGT)->value('id'); // lấy id của tài khoản ghi nhận nợ

            $SoDuNoDau_GTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGTGT)->value('SoDuNoDau');

            //Lấy Thuế GTGT trong cơ sở dũ liệu để so sánh
            $ThueGTGT_in_database = PhieuNhapHangHoa::where('id', $id)->value('ThueGTGT');

            if ((float)$ThueGTGT_in_database > (float)$request->ThueGTGT) {
                $temp_SoDuNoDau_GTGT = (float)$SoDuNoDau_GTGT - ((float)$ThueGTGT_in_database - (float)$request->ThueGTGT);
            } else {
                $temp_SoDuNoDau_GTGT = (float)$SoDuNoDau_GTGT + ((float)$request->ThueGTGT - (float)$ThueGTGT_in_database);
            }

            // Cập nhật
            $phieunhaphanghoa->update([
                // 'MaChungTu' => $request->MaChungTu,
                // 'LoaiChungTu' => $request->LoaiChungTu,
                'NgayChungTu' => $request->NgayChungTu,
                // 'SoChungTu' => $request->SoChungTu,
                'DienGiai' => $request->DienGiai,
                'MaKhachHang' => $request->MaKhachHang,
                'TenKhachHang' => $request->TenKhachHang,
                'MaSoThue' => $request->MaSoThue,
                'TaiKhoanNo' => $request->TaiKhoanNo,
                'TaiKhoanNoGTGT' => $request->TaiKhoanNoGTGT,
                'TaiKhoanCo' => $request->TaiKhoanCo,
                'MatHang' => $request->MatHang,
                'SoXeRy' => $request->SoXeRy,
                'SoHoaDon' => $request->SoHoaDon,
                'NgayHoaDon' => $request->NgayHoaDon,
                'ThueSuat' => $request->ThueSuat,
                'ThueGTGT' => $request->ThueGTGT
            ]);


            //Cập nhật số dư nợ cho tài khoản GTGT ghi nhận tăng
            $taikhoanNO_GTGT = DanhMucTaiKhoan::find($id_TaiKhoanNoGTGT);
            $taikhoanNO_GTGT->update([
                'SoDuNoDau' => $temp_SoDuNoDau_GTGT
            ]);

            // //Kiểm thử dữ liệu
            // $data = [
            //     // '$id_TaiKhoan_No' => $id_TaiKhoan_No,
            //     // '$id_TaiKhoan_Co' => $id_TaiKhoan_Co,
            //     '$id_TaiKhoanNoGTGT' => $id_TaiKhoanNoGTGT,
            //     // '$SoDuNoDau' => $SoDuNoDau,
            //     '$SoDuNoDau_GTGT' => $SoDuNoDau_GTGT,
            //     // '$SoDuCoDau' => $SoDuCoDau,

            //     // '$temp_SoDuNoDau' => $temp_SoDuNoDau,
            //     '$temp_SoDuNoDau_GTGT' => $temp_SoDuNoDau_GTGT,
            //     // '$temp_SoDuCoDau' => $temp_SoDuCoDau,
            //     'ThueGTGT_in_database' => $ThueGTGT_in_database,
            //     'request->ThueGTGT' => $request->ThueGTGT
            // ];
            return response()->json($request);

            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }


    // --------------------------------------------------------------------------------------------------------------------------------------------------------- //

    //Lấy dữ liệu bảng phiếu nhập chi tiết để hiển thị ra màn hình
    public function get_PhieuNhapHangHoaChiTiet($machungtu)
    {
        $phieunhaphanghoachitiet = PhieuNhapHangHoaChiTiet::where('MaChungTu', $machungtu)->get();
        return response()->json($phieunhaphanghoachitiet);
    }

    //Hàm xử lý cập nhập chi tiết (bảng phụ)
    public function phieunhaphanghoachitiet_update(Request $request, $id)
    {
        $phieunhaphanghoachitiet = PhieuNhapHangHoaChiTiet::find($id);

        if ($phieunhaphanghoachitiet) {

            //Cập nhật lại số dư tài khoản
            $id_TaiKhoan_No = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoanNoGTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGTGT)->value('id'); // lấy id của tài khoản ghi nhận nợ
            $id_TaiKhoan_Co = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('id'); // lấy id của tài khoản ghi nhận có

            $SoDuNoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('SoDuNoDau');
            $SoDuNoDau_GTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGTGT)->value('SoDuNoDau');
            $SoDuCoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('SoDuCoDau');

            //Lấy Thuế GTGT trong cơ sở dũ liệu để so sánh
            $ThueGTGT_in_database = PhieuNhapHangHoa::where('id', $request->Id_PhieuNhapHangHoa)->value('ThueGTGT');

            if ((float)$ThueGTGT_in_database > (float)$request->ThueGTGT) {
                $temp_SoDuNoDau_GTGT = (float)$SoDuNoDau_GTGT - ((float)$ThueGTGT_in_database - (float)$request->ThueGTGT);
            } else {
                $temp_SoDuNoDau_GTGT = (float)$SoDuNoDau_GTGT + ((float)$request->ThueGTGT - (float)$ThueGTGT_in_database);
            }

            //Lấy ThanhTien trong cơ sở dữ liệu để so sánh
            $ThanhTien_in_database = PhieuNhapHangHoaChiTiet::where('id', $id)->value('ThanhTien');

            if ((float)$ThanhTien_in_database > (float)$request->ThanhTien) {
                $temp_SoDuNoDau = (float)$SoDuNoDau - ((float)$ThanhTien_in_database - (float)$request->ThanhTien);
                $temp_SoDuCoDau = (float)$SoDuCoDau - ((float)$ThanhTien_in_database - (float)$request->ThanhTien);
            } else {
                $temp_SoDuNoDau = (float)$SoDuNoDau + ((float)$request->ThanhTien - (float)$ThanhTien_in_database);
                $temp_SoDuCoDau = (float)$SoDuCoDau + ((float)$request->ThanhTien - (float)$ThanhTien_in_database);
            }

            // Cập nhật
            $phieunhaphanghoa = PhieuNhapHangHoa::find($request->Id_PhieuNhapHangHoa);
            $phieunhaphanghoa->update([
                'ThueGTGT' => $request->ThueGTGT
            ]);

            
            //Cập nhật số lượng và thành tiền tồn đầu ------------------------------------------------------------------------ //
            $id_HangHoa = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('id'); // lấy id của hàng hóa
            $SoLuongTonDau = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('SoLuongTonDau');
            $ThanhTienTonDau = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('ThanhTienTonDau');

            //Lấy SoLuong trong cơ sở dữ liệu để so sánh
            $SoLuong_in_database = PhieuNhapHangHoaChiTiet::where('id', $id)->value('SoLuong');
            //Lấy ThanhTien_in_database - Thành tiền đã được lấy ở trên - chỉ sử dụng lại

            if ((float)$SoLuong_in_database > (float)$request->SoLuong) {
                $temp_SoLuongTonDau = (float)$SoLuongTonDau - ((float)$SoLuong_in_database - (float)$request->SoLuong);
                $temp_ThanhTienTonDau = (float)$ThanhTienTonDau - ((float)$ThanhTien_in_database - (float)$request->ThanhTien);
            } else {
                $temp_SoLuongTonDau = (float)$SoLuongTonDau + ((float)$request->SoLuong - (float)$SoLuong_in_database);
                $temp_ThanhTienTonDau = (float)$ThanhTienTonDau + ((float)$request->ThanhTien - (float)$ThanhTien_in_database);
            }

            $hanghoa = DanhMucHangHoa::find($id_HangHoa);
            $hanghoa->update([
                'SoLuongTonDau' => $temp_SoLuongTonDau,
                'ThanhTienTonDau' => $temp_ThanhTienTonDau
            ]);
            // ---------------------------------------------------------------------------------------------------------------- //

            // Cập nhật chi tiết
            $phieunhaphanghoachitiet->update([
                'DonViTinh' => $request->DonViTinh,
                'SoLuong' => $request->SoLuong,
                'DonGia' => $request->DonGia,
                'ThanhTien' => $request->ThanhTien
            ]);

            //Cập nhật số dư nợ cho tài khoản ghi nhận tăng
            $taikhoanNO = DanhMucTaiKhoan::find($id_TaiKhoan_No);
            $taikhoanNO->update([
                'SoDuNoDau' => $temp_SoDuNoDau
            ]);

            //Cập nhật số dư nợ cho tài khoản GTGT ghi nhận tăng
            $taikhoanNO_GTGT = DanhMucTaiKhoan::find($id_TaiKhoanNoGTGT);
            $taikhoanNO_GTGT->update([
                'SoDuNoDau' => $temp_SoDuNoDau_GTGT
            ]);

            //Cập nhật số dư có cho tài khoản ghi nhận giảm
            $taikhoanCO = DanhMucTaiKhoan::find($id_TaiKhoan_Co);
            $taikhoanCO->update([
                'SoDuCoDau' => $temp_SoDuCoDau
            ]);

            //Kiểm thử dữ liệu
            $data = [
                // '$id_TaiKhoan_No' => $id_TaiKhoan_No,
                // '$id_TaiKhoan_Co' => $id_TaiKhoan_Co,
                // '$id_TaiKhoanNoGTGT' => $id_TaiKhoanNoGTGT,
                // '$SoDuNoDau' => $SoDuNoDau,
                // '$SoDuNoDau_GTGT' => $SoDuNoDau_GTGT,
                // '$SoDuCoDau' => $SoDuCoDau,

                // '$temp_SoDuNoDau' => $temp_SoDuNoDau,
                // '$temp_SoDuNoDau_GTGT' => $temp_SoDuNoDau_GTGT,
                // '$temp_SoDuCoDau' => $temp_SoDuCoDau,
                // 'ThueGTGT_in_database' => $ThueGTGT_in_database,
                // 'ThanhTien_in_database' => $ThanhTien_in_database,
                // 'request->ThueGTGT' => $request->ThueGTGT,
                // 'request->ThanhTien' => $request->ThanhTien,
                // 'Id_PhieuNhapHangHoa' => $request->Id_PhieuNhapHangHoa,

                // '$id_HangHoa' => $id_HangHoa,
                // '$SoLuongTonDau' => $SoLuongTonDau,
                // '$ThanhTienTonDau' => $ThanhTienTonDau,
                // '$request->SoLuong' => $request->SoLuong,
                // '$request->ThanhTien' => $request->ThanhTien,
                // '$temp_SoLuongTonDau' => $temp_SoLuongTonDau,
                // '$temp_ThanhTienTonDau' => $temp_ThanhTienTonDau,
                // '$SoLuong_in_database' => $SoLuong_in_database

            ];
            return response()->json($data);

            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }

    // ---------------------------------------------------------------------------------------------------- //
    //Lấy thông tin phiếu nhập hàng - MaChungTu
    // public function get_maPhieuNhapHang()
    // {
    //     $phieunhaphang = PhieuNhapHangHoa::pluck('MaChungTu');
    //     return response()->json($phieunhaphang);
    // }

    //Lấy toàn bộ thông tin
    function get_PhieuNhapHang(){
        $phieunhaphang = PhieuNhapHangHoaChiTiet::get();
        return response()->json($phieunhaphang);
    }

    // public function get_PhieuNhapHangChiTiet()
    // {
    //     $phieunhaphanghoachitiet = PhieuNhapHangHoaChiTiet::get();
    //     return response()->json($phieunhaphanghoachitiet);
    // }

    // Lấy đơn giá
    public function get_DonGia($machungtu)
    {
        $dongia = PhieuNhapHangHoaChiTiet::where('MaChungTu', $machungtu)->value('DonGia');
        return response()->json($dongia);
    }
}
