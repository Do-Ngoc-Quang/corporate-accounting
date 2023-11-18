<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ChungTuKetChuyen;
use App\Models\ChungTuKetChuyenChiTiet;

class ChungTuKetChuyenController extends Controller
{
    public function index()
    {
        $chungtuketchuyen = ChungTuKetChuyen::get();
        return view('content.giaodich.chungtuketchuyen', compact('chungtuketchuyen'));
    }

    // Lấy data của để hiển thị lên màn hình
    public function get_chungtuketchuyen($machungtu)
    {
        $chungtuketchuyen = ChungTuKetChuyen::where('MaChungTu', $machungtu)->get();
        return response()->json($chungtuketchuyen);
    }

    //Hàm xử lý tạo mới 
    public function store(Request $request)
    {
        $exist_chungtuketchuyen = ChungTuKetChuyen::where('MaChungTu', $request->MaChungTu)->value('MaChungTu');

        //Kiểm tra xem đã tồn tại trong database chưa
        if (!$exist_chungtuketchuyen) {

            $validator = Validator::make($request->all(), [
                //Phiếu nhập
                'MaChungTu' => 'required',
                'LoaiChungTu' => 'required',
                'NgayChungTu' => 'required',
                'SoChungTu' => 'required',
                'DienGiai' => 'required',

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


            ChungTuKetChuyen::create([
                'MaChungTu' => $request->MaChungTu,
                'LoaiChungTu' => $request->LoaiChungTu,
                'NgayChungTu' => $request->NgayChungTu,
                'SoChungTu' => $request->SoChungTu,
                'DienGiai' => $request->DienGiai,
            ]);

            ChungTuKetChuyenChiTiet::create([
                'MaChungTu' => $request->MaChungTu,
                'DienGiaiChiTiet' => $request->DienGiaiChiTiet,
                'SoTien' => $request->SoTien,
                'TaiKhoanNo' => $request->TaiKhoanNo,
                'TaiKhoanCo' => $request->TaiKhoanCo,
            ]);

            // // Kiểm thử dữ liệu
            // $data = [
            //     //------------------------------------//
            //     '$exist_Chungtughiso' => $exist_chungtuketchuyen,
            //     'Request' => $request->all(),

            // ];
            // return response()->json($data);


            return response()->json(['success']);
        } else {
            return response()->json(['error'], 400);
        }
    }

    //Hàm xử lý cập nhật
    public function update(Request $request, $id)
    {
        $chungtuketchuyen = ChungTuKetChuyen::find($id);

        if ($chungtuketchuyen) {

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
            $chungtuketchuyen->update([
          
                'NgayChungTu' => $request->NgayChungTu,
                'DienGiai' => $request->DienGiai,

            ]);

            // //Kiểm thử dữ liệu
            // $data = [
            //     '$chungtuketchuyen' => $chungtuketchuyen,
            //     'Request' => $request->all(),
            // ];
            // return response()->json($data);



            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }

    //------------------------------------------------------------------------------------------------------------------------------------------------- //
    // Lấy data của để hiển thị lên màn hình
    public function get_chungtuketchuyenchitiet($machungtu)
    {
        $chungtuketchuyenchitiet = ChungTuKetChuyenChiTiet::where('MaChungTu', $machungtu)->get();
        return response()->json($chungtuketchuyenchitiet);
    }

    public function chungtuketchuyenchitiet_update(Request $request, $id)
    {

        $chungtuketchuyenchitiet = ChungTuKetChuyenChiTiet::find($id);

        if ($chungtuketchuyenchitiet) {

            //Cập nhật
            $chungtuketchuyenchitiet->update([
                'DienGiaiChiTiet' => $request->DienGiaiChiTiet,
                'SoTien' => $request->SoTien,
                // 'TaiKhoanNo' => $request->TaiKhoanNo,
                // 'TaiKhoanCo' => $request->TaiKhoanCo,
            ]);


            // //Kiểm thử dữ liệu
            // $data = [
            //     '$chungtuketchuyenchitiet' => $chungtuketchuyenchitiet,
            //     'Request' => $request->all(),
            // ];
            // return response()->json($data);


            return response()->json(['success']);
        } else {
            return response()->json(['error']);
        }
    }
}
