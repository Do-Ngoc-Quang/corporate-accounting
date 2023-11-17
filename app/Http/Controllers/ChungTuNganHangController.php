<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ChungTuNganHang;
use App\Models\ChungTuNganHangChiTiet;


class ChungTuNganHangController extends Controller
{
    public function index()
    {
        $chungtunganhang = ChungTuNganHang::get();
        return view('content.giaodich.chungtunganhang', compact('chungtunganhang'));
    }

    // Lấy data của để hiển thị lên màn hình
    public function get_Chungtunganhang($machungtu)
    {
        $chungtunganhang = ChungTuNganHang::where('MaChungTu', $machungtu)->get();
        return response()->json($chungtunganhang);
    }

    //Hàm xử lý tạo mới 
    public function store(Request $request)
    {
        $exist_Chungtunganhang = ChungTuNganHang::where('MaChungTu', $request->MaChungTu)->value('MaChungTu');

        //Kiểm tra xem đã tồn tại trong database chưa
        if (!$exist_Chungtunganhang) {

            $validator = Validator::make($request->all(), [
                //Phiếu nhập
                'MaChungTu' => 'required',
                'LoaiChungTu' => 'required',
                'NgayChungTu' => 'required',
                'SoChungTu' => 'required',
                'HoTen' => 'required',
                'DienGiai' => 'required',
                'MaKhachHang' => 'required',
                'TenKhachHang' => 'required',
                'MaSoThue' => 'required',
                'ThuChi' => 'required',

                //Phiếu nhập chi tiết
                'DienGiaiChiTiet' => 'required',
                'SoTien' => 'required',
                'TaiKhoanNo' => 'required',
                'TaiKhoanCo' => 'required'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->errors()->all()
                ]);
            }


            ChungTuNganHang::create([
                'MaChungTu' => $request->MaChungTu,
                'LoaiChungTu' => $request->LoaiChungTu,
                'NgayChungTu' => $request->NgayChungTu,
                'SoChungTu' => $request->SoChungTu,
                'HoTen' => $request->HoTen,
                'DienGiai' => $request->DienGiai,

                'MaKhachHang' => $request->MaKhachHang,
                'TenKhachHang' => $request->TenKhachHang,
                'MaSoThue' => $request->MaSoThue,

                'ThuChi' => $request->ThuChi
            ]);

            ChungTuNganHangChiTiet::create([
                'MaChungTu' => $request->MaChungTu,
                'DienGiaiChiTiet' => $request->DienGiaiChiTiet,
                'SoTien' => $request->SoTien,
                'TaiKhoanNo' => $request->TaiKhoanNo,
                'TaiKhoanCo' => $request->TaiKhoanCo,
            ]);




            // //Cập nhật số dư cho tài khoản gốc
            // $id_TaiKhoan_No = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('id'); // lấy id của tài khoản ghi nhận nợ
            // $id_TaiKhoanNoGTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGTGT)->value('id'); // lấy id của tài khoản ghi nhận nợ
            // $id_TaiKhoan_Co = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('id'); // lấy id của tài khoản ghi nhận có

            // $SoDuNoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNo)->value('SoDuNoDau');
            // $SoDuNoDau_GTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGTGT)->value('SoDuNoDau');
            // $SoDuCoDau = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanCo)->value('SoDuCoDau');


            // $temp_SoDuNoDau = (float)$SoDuNoDau + (float)$request->ThanhTien;
            // $temp_SoDuNoDau_GTGT = (float)$SoDuNoDau_GTGT + (float)$request->ThueGTGT;
            // $temp_SoDuCoDau = (float)$SoDuCoDau + (float)$request->ThanhTien;


            // //Cập nhật số dư nợ cho tài khoản ghi nhận tăng
            // $taikhoanNO = DanhMucTaiKhoan::find($id_TaiKhoan_No);
            // $taikhoanNO->update([
            //     'SoDuNoDau' => $temp_SoDuNoDau
            // ]);

            // //Cập nhật số dư nợ cho tài khoản GTGT ghi nhận tăng
            // $taikhoanNO_GTGT = DanhMucTaiKhoan::find($id_TaiKhoanNoGTGT);
            // $taikhoanNO_GTGT->update([
            //     'SoDuNoDau' => $temp_SoDuNoDau_GTGT
            // ]);

            // //Cập nhật số dư có cho tài khoản ghi nhận giảm
            // $taikhoanCO = DanhMucTaiKhoan::find($id_TaiKhoan_Co);
            // $taikhoanCO->update([
            //     'SoDuCoDau' => $temp_SoDuCoDau
            // ]);


            // //Cập nhật số lượng và thành tiền tồn đầu
            // $id_HangHoa = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('id'); // lấy id của hàng hóa
            // $SoLuongTonDau = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('SoLuongTonDau');
            // $ThanhTienTonDau = DanhMucHangHoa::where('MaHang', $request->MaHang)->value('ThanhTienTonDau');

            // $temp_SoLuongTonDau = (float)$SoLuongTonDau + (float)$request->SoLuong;
            // $temp_ThanhTienTonDau = (float)$ThanhTienTonDau + (float)$request->ThanhTien;

            // $hanghoa = DanhMucHangHoa::find($id_HangHoa);
            // $hanghoa->update([
            //     'SoLuongTonDau' => $temp_SoLuongTonDau,
            //     'ThanhTienTonDau' => $temp_ThanhTienTonDau
            // ]);


            // Kiểm thử dữ liệu
            $data = [
                //------------------------------------//
                '$exist_Chungtughiso' => $exist_Chungtunganhang,
                'Request' => $request->all(),

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
        $chungtunganhang = ChungTuNganHang::find($id);

        if ($chungtunganhang) {

            // //Cập nhật lại số dư tài khoản
            // $id_TaiKhoanNoGTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGTGT)->value('id'); // lấy id của tài khoản ghi nhận nợ

            // $SoDuNoDau_GTGT = DanhMucTaiKhoan::where('TaiKhoan', $request->TaiKhoanNoGTGT)->value('SoDuNoDau');

            // //Lấy Thuế GTGT trong cơ sở dũ liệu để so sánh
            // $ThueGTGT_in_database = PhieuNhapHangHoa::where('id', $id)->value('ThueGTGT');

            // if ((float)$ThueGTGT_in_database > (float)$request->ThueGTGT) {
            //     $temp_SoDuNoDau_GTGT = (float)$SoDuNoDau_GTGT - ((float)$ThueGTGT_in_database - (float)$request->ThueGTGT);
            // } else {
            //     $temp_SoDuNoDau_GTGT = (float)$SoDuNoDau_GTGT + ((float)$request->ThueGTGT - (float)$ThueGTGT_in_database);
            // }

            // Cập nhật
            $chungtunganhang->update([
          
                'NgayChungTu' => $request->NgayChungTu,
                'HoTen' => $request->HoTen,
                'DienGiai' => $request->DienGiai,

                'MaKhachHang' => $request->MaKhachHang,
                'TenKhachHang' => $request->TenKhachHang,
                'MaSoThue' => $request->MaSoThue,

                'ThuChi' => $request->ThuChi
            ]);


            // //Cập nhật số dư nợ cho tài khoản GTGT ghi nhận tăng
            // $taikhoanNO_GTGT = DanhMucTaiKhoan::find($id_TaiKhoanNoGTGT);
            // $taikhoanNO_GTGT->update([
            //     'SoDuNoDau' => $temp_SoDuNoDau_GTGT
            // ]);

            //Kiểm thử dữ liệu
            $data = [
                '$chungtunganhang' => $chungtunganhang,
                'Request' => $request->all(),
            ];
            return response()->json($data);



            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------- //
    // Lấy data của để hiển thị lên màn hình
    public function get_Chungtunganhangchitiet($machungtu)
    {
        $chungtunganhangchitiet = ChungTuNganHangChiTiet::where('MaChungTu', $machungtu)->get();
        return response()->json($chungtunganhangchitiet);
    }

    public function chungtunganhangchitiet_update(Request $request, $id)
    {

        $chungtunganhangchitiet = ChungTuNganHangChiTiet::find($id);

        if ($chungtunganhangchitiet) {

            //Cập nhật
            $chungtunganhangchitiet->update([
                'DienGiaiChiTiet' => $request->DienGiaiChiTiet,
                'SoTien' => $request->SoTien,
                // 'TaiKhoanNo' => $request->TaiKhoanNo,
                // 'TaiKhoanCo' => $request->TaiKhoanCo,
            ]);


            //Kiểm thử dữ liệu
            $data = [
                '$chungtunganhangchitiet' => $chungtunganhangchitiet,
                'Request' => $request->all(),
            ];
            return response()->json($data);


            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }
}
