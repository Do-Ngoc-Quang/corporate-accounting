@extends('layouts.app')
<style>
    #main-content-subform {
        display: flex;
        flex-direction: column;
        height: 93vh;
    }

    #section1 {
        height: 73vh;
        border: 1px solid #333;
        /* border-bottom: none; */
        padding: 6px;
        overflow-y: auto;
        max-width: 100%;
        overflow-x: auto;
        width: 100%;
    }

    #section1-1 {
        height: 61vh;
        border: 1px solid #333;
        max-height: 100%;
        overflow-y: auto;
    }

    #section2 {
        height: 20vh;
        border: 1px solid #333;
        padding: 6px;
        overflow-y: auto;
        width: 100%;
    }

    .custom-table-showID {
        color: #212529;
    }

    .custom-table-showID th,
    .custom-table-showID td {
        padding: 0.1rem;
        vertical-align: top;
        border: 1px solid #dee2e6;
        text-align: center;
    }

    .custom-table-showID th {
        background-color: #e1e1ea;
    }

    .custom-table-showID tbody tr.highlight {
        background-color: #d2f9f7;
    }

    #dataTable {
        width: 100%;
    }

    .label-col-10 {
        margin-right: 10px;
    }

    .row-col-10 {
        display: flex;
        margin-bottom: 8px;
    }

    option[value="default"][disabled] {
        display: none;
    }
</style>
@section('content')
<div class="container-fluid">
    <!-- Menu bên trái -->
    @include('menu.menu')

    <!-- Khung hiển thị thông tin bên phải -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-main" id="main-content-subform">
        <h6 style="text-align:center; color: red;">CHỨNG TỪ GHI SỔ</h6>
        <div class="row" id="section1">
            <!-- Phần trái chiếm 1 col -->
            <div class="col-2" style="border-right: 1px solid #ccc; margin-top: 0px; padding-top: 0px">
                <div id="section1-1">
                    <table class="custom-table-showID" style="width: 100%;" id="dataTable_LoaiChungTu">
                        <thead>
                            <tr>
                                <th>
                                    <select name="" id="select_loaiChungTu" style="width: 100%; text-align:center;" onfocus="select_loaiChungTu()">
                                        <option value="default" disabled selected>Chọn loại chứng từ</option>
                                        <option value="phieunhap">Phiếu nhập</option>
                                        <option value="phieuxuat">Phiếu xuất</option>
                                        <option value="phieunhaphangtralai">Phiếu nhập hàng trả lại</option>
                                        <option value="phieuxuathangtralai">Phiếu xuất hàng trả lại</option>
                                    </select>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- @foreach($chungtughiso as $ghiso) -->
                            <tr onclick="highlightRowandCollect(`<?= $ghiso->MaChungTu ?>`, this)">
                                <!-- <td><input style="width: 100%; text-align: center;" readonly type="text" id="MaChungTu" value="{{ $ghiso->MaChungTu }}"></td> -->
                            </tr>
                            <!-- @endforeach -->
                        </tbody>
                    </table>
                </div>

            </div>


            <!-- Phần phải chiếm 11 col -->
            <div class="col-10">
                <table class="custom-table" id="dataTable">
                    <tbody>
                        <tr data-id="trChungTuGhiSo">
                            <td>
                                <div class="row-col-10">
                                    <div class="label-col-10">Loại chứng từ:</div>
                                    <div class="input-col-10"><input style="margin-left: 8px; width: 80px; text-align:center;" type="text" id="loaiChungTu" disabled></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Số chứng từ:</div>
                                    <div class="input-col-10"><input style="margin-left: 18px; width: 80px;" type="text" id="soChungTu" oninput="handleInputChange()"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Mã chứng từ:</div>
                                    <div class="input-col-10"><input style="margin-left: 15px; width: 200px;" type="text" id="maChungTu" disabled></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Ngày chứng từ:</div>
                                    <div class="input-col-10"><input style="text-align:center; width: 200px;" type="date" id="ngayChungTu"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Họ tên:</div>
                                    <div class="input-col-10"><input style="margin-left: 56px; width: 200px;" type="text" id="hoTen"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Diễn giải:</div>
                                    <div class="input-col-10"><textarea style="margin-left: 42px;" id="dienGiai" cols="35" rows="2"></textarea></div>
                                </div>
                                <hr>

                                <div class="row-col-10">
                                    <div class="label-col-10">Mã khách hàng nợ:</div>
                                    <div class="input-col-10"><input style="margin-left: 5px; width: 80px;" type="text" id="maKhachHangNo"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Tên khách hàng nợ:</div>
                                    <div class="input-col-10"><input style="width: 250px;" type="text" id="tenKhachHangNo" readonly></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Mã số thuế KH nợ:</div>
                                    <div class="input-col-10"><input style="margin-left: 7px; width: 250px;" type="text" id="maSoThueNo" readonly></div>
                                </div>

                                <hr>

                                <div style="margin: 0;">
                                    <div>
                                        <label style="margin: 0 10px 0px 0;" for="isghiso">Ghi nhận ghi sổ</label><input type="checkbox" id="isghiso">
                                        <label style="margin: 0 10px 0px 30px;" for="edit">Chỉnh sửa</label><input type="checkbox" id="edit" onchange="choPhepChinhSua()">
                                    </div>
                                    <div>
                                        <input type="hidden" id="id">
                                    </div>
                                    <label></label>
                                </div>
                            </td>

                            <td>
                                <div class="row-col-10">
                                    <div class="label-col-10">Mã khách hàng có:</div>
                                    <div class="input-col-10"><input style="margin-left: 5px; width: 80px;" type="text" id="maKhachHangCo"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Tên khách hàng có:</div>
                                    <div class="input-col-10"><input style="width: 250px;" type="text" id="tenKhachHangCo" readonly></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Mã số thuế KH có:</div>
                                    <div class="input-col-10"><input style="margin-left: 7px; width: 250px;" type="text" id="maSoThueCo" readonly></div>
                                </div>
                                <hr>

                                <div class="row-col-10">
                                    <div class="label-col-10">Mặt hàng:</div>
                                    <div class="input-col-10"><input style="margin-left: 34px; width: 210px;" type="text" id="matHang"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Biểu thuế:</div>
                                    <div class="input-col-10"><input style="margin-left: 33px; width: 210px;" type="text" id="bieuThue"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Số seri:</div>
                                    <div class="input-col-10"><input style="margin-left: 52px; width: 210px;" type="text" id="soXeRy"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Số hóa đơn:</div>
                                    <div class="input-col-10"><input style="margin-left: 20px; width: 210px;" type="text" id="soHoaDon"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Ngày hóa đơn:</div>
                                    <div class="input-col-10"><input style="text-align:center; width: 210px;" type="date" id="ngayHoaDon"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Thuế suất:</div>
                                    <div class="input-col-10"><input style="margin-left: 28px; width: 210px;" type="text" id="thueSuat" oninput="ThueGTGT_InputChange()"></div>
                                </div>
                                <hr>
                                <div class="row-col-10">
                                    <div class="label-col-10">Thuế GTGT:</div>
                                    <div class="input-col-10"><input style="margin-left: 18px; width: 210px;" type="text" id="thueGTGT" readonly></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div id="section1-2">
                    <button class="btnAddnew" style="margin: 10px 30px 0 20px; width: 30%;" type="button" onclick="addNewChungTuGhiSo()" id="btnTaoPhieu">Tạo phiếu nhập</button>
                    <button class="btnAddnew" style="margin: 10px 30px 0 20px; width: 30%;" type="button" onclick="updateChungTuGhiSo()" id="btnCapNhat" disabled>Cập nhật</button>
                    <button class="btnAddnew" style="margin: 10px 30px 0 20px; width: 20%;" type="button" onclick="resetAndSetupValue()" id="btnLamMoi">Làm mới</button>

                </div>
            </div>
        </div>

        <div id="section2">
            <!-- <h6 style="text-align:center; color: red;">CHỨNG TỪ GHI SỔ CHI TIẾT</h6> -->
            <table class="custom-table" data-id="dataTableChiTiet" id="dataTableChiTiet">
                <thead>
                    <tr>
                        <th style="width: 600px;">Diễn giải chi tiết</th>
                        <th style="width: 200px;">Số tiền</th>
                        <th style="width: 130px;">Tài khoản nợ</th>
                        <th style="width: 130px;">Tài khoản có</th>
                        <th style="width: 100px;">Tác vụ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </main>

</div>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Lấy thẻ button thông qua id
    var btnTaoPhieu = document.getElementById("btnTaoPhieu");
    var btnCapNhat = document.getElementById("btnCapNhat");
    var btnLamMoi = document.getElementById("btnLamMoi");

    //Lấy thẻ input
    var txtsoChungTu = document.getElementById("soChungTu");
    var txtmaChungTu = document.getElementById("maChungTu");
    var txtngayChungTu = document.getElementById("ngayChungTu");
    var txtngayHoaDon = document.getElementById("ngayHoaDon");

    //Lấy thẻ checkbox cho phép chỉnh sửa
    var checkbox = document.getElementById("edit");


    //Phân loại chứng từ theo lựa chọn option
    function select_loaiChungTu() {
        removePreviousRows("dataTable_LoaiChungTu");
        //dataTable hiện thị loại chứng từ
        var tableBody = document.getElementById("dataTable_LoaiChungTu").getElementsByTagName("tbody")[0];

        //Thẻ select chọn lại chứng từ
        var select_loaiChungTu = document.getElementById("select_loaiChungTu");
        select_loaiChungTu.addEventListener("change", function() {
            var selectedValue = this.value;

            switch (selectedValue) {

                case 'phieunhap':

                    //Xóa các mã đang hiển thị trước khi tải mã chứng từ mới
                    removePreviousRows("dataTable_LoaiChungTu");

                    // Liệt kê danh sách mã chứng từ nhập hàng
                    fetch('get_PhieuNhapHang')
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Mạng không ổn định, không thể lấy dữ liệu');
                            }
                            return response.json();
                        })
                        .then(data => {
                            for (var i = 0; i < data.length; i++) {

                                var newRow = tableBody.insertRow();
                                var cell = newRow.insertCell(0);
                                cell.innerHTML = `<input style="width: 100%; text-align: center;" readonly type="text" id="MaChungTu" value="${data[i]}" onclick="highlightRowandCollect('${data[i]}', this, 'phieunhap')">`;
                            }

                            console.log(data);
                        })
                        .catch(error => {
                            // Handle errors
                            console.error('There was a problem with the fetch operation:', error);
                        });


                    break;

                case 'phieuxuat':
                    //Xóa các mã đang hiển thị trước khi tải mã chứng từ mới
                    removePreviousRows("dataTable_LoaiChungTu");

                    // Liệt kê danh sách mã chứng từ xuất hàng
                    fetch('get_PhieuXuatHang')
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Mạng không ổn định, không thể lấy dữ liệu');
                            }
                            return response.json();
                        })
                        .then(data => {
                            for (var i = 0; i < data.length; i++) {

                                var newRow = tableBody.insertRow();
                                var cell = newRow.insertCell(0);
                                cell.innerHTML = `<input style="width: 100%; text-align: center;" readonly type="text" id="MaChungTu" value="${data[i]}">`;
                            }
                            console.log(data);
                        })
                        .catch(error => {
                            // Handle errors
                            console.error('There was a problem with the fetch operation:', error);
                        });

                    break;

                case '3':
                    break;
                case '4':
                    break;

                default:
                    break;
            }


        });
    }

    // Xử lý highlight dòng được click và hiện thị bảng thứ 2 (bảng phụ)
    function highlightRowandCollect(machungtu, row, loaichungtu) {

        //Thiết lập các thẻ input ẩn đi
        txtsoChungTu.disabled = true;
        txtngayChungTu.disabled = true;
        txtngayHoaDon.disabled = true;
        checkbox.checked = false;

        //Thiết lập các button ẩn đi
        btnCapNhat.disabled = false;
        btnTaoPhieu.disabled = true;

        //Thiết lập lại thẻ select thành thẻ input để hiển thị thông tin mã khách hàng
        replaceSelectWithInput_NO();
        replaceSelectWithInput_CO();

        // Bỏ lớp highlight ở tất cả các thẻ tr
        var allRows = document.querySelectorAll(".custom-table-showID tbody tr");
        allRows.forEach(function(r) {
            r.classList.remove("highlight");
        });

        // Thêm lớp highlight cho thẻ tr được click
        row.classList.add("highlight");


        switch (loaichungtu) {
            case 'phieunhap':

                // Xử lý hiện thị bảng chính
                fetch('phieunhaphanghoa/' + machungtu)

                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Mạng không ổn định, không thể lấy dữ liệu');
                        }
                        return response.json();
                    })
                    .then(data => {

                        //Đoạn code dưới đây thực thi sự cập nhật, tức hiển thị dữ liệu tức thì mà không tải lại trang
                        data.forEach(phieunhaphanghoa => {
                            $("tr[data-id='trChungTuGhiSo'] td input#loaiChungTu").val(phieunhaphanghoa.LoaiChungTu);
                            $("tr[data-id='trChungTuGhiSo'] td input#soChungTu").val(phieunhaphanghoa.SoChungTu);
                            $("tr[data-id='trChungTuGhiSo'] td input#maChungTu").val(phieunhaphanghoa.MaChungTu);
                            $("tr[data-id='trChungTuGhiSo'] td input#ngayChungTu").val(phieunhaphanghoa.NgayChungTu);
                            $("tr[data-id='trChungTuGhiSo'] td textarea#dienGiai").val(phieunhaphanghoa.DienGiai);

                            $("tr[data-id='trChungTuGhiSo'] td input#maKhachHangCo").val(phieunhaphanghoa.MaNguoiBan);
                            $("tr[data-id='trChungTuGhiSo'] td input#tenKhachHangCo").val(phieunhaphanghoa.TenNguoiBan);
                            $("tr[data-id='trChungTuGhiSo'] td input#maSoThueCo").val(phieunhaphanghoa.MaSoThueNguoiBan);

                            $("tr[data-id='trChungTuGhiSo'] td input#taiKhoanNo").val(phieunhaphanghoa.TaiKhoanNo);
                            $("tr[data-id='trChungTuGhiSo'] td input#taiKhoanNoGTGT").val(phieunhaphanghoa.TaiKhoanNoGTGT);
                            $("tr[data-id='trChungTuGhiSo'] td input#taiKhoanCo").val(phieunhaphanghoa.TaiKhoanCo);

                            $("tr[data-id='trChungTuGhiSo'] td input#matHang").val(phieunhaphanghoa.MatHang);
                            $("tr[data-id='trChungTuGhiSo'] td input#soXeRy").val(phieunhaphanghoa.SoXeRy);
                            $("tr[data-id='trChungTuGhiSo'] td input#soHoaDon").val(phieunhaphanghoa.SoHoaDon);
                            $("tr[data-id='trChungTuGhiSo'] td input#ngayHoaDon").val(phieunhaphanghoa.NgayHoaDon);
                            $("tr[data-id='trChungTuGhiSo'] td input#thueSuat").val(phieunhaphanghoa.ThueSuat);
                            $("tr[data-id='trChungTuGhiSo'] td input#thueGTGT").val(phieunhaphanghoa.ThueGTGT);

                            $("tr[data-id='trChungTuGhiSo'] td input#id").val(phieunhaphanghoa.id);

                        });
                    })
                    .catch(error => {
                        // Handle errors
                        console.error('There was a problem with the fetch operation:', error);
                    });

                break;
            case 'phieuxuat':

                break;
            default:
                break;

        }

        // Xử lý hiện thị bảng chính
        fetch('chungtughiso/' + machungtu)

            .then(response => {
                if (!response.ok) {
                    throw new Error('Mạng không ổn định, không thể lấy dữ liệu');
                }
                return response.json();
            })
            .then(data => {

                //Đoạn code dưới đây thực thi sự cập nhật, tức hiển thị dữ liệu tức thì mà không tải lại trang
                data.forEach(chungtughiso => {
                    $("tr[data-id='trChungTuGhiSo'] td input#loaiChungTu").val(chungtughiso.LoaiChungTu);
                    $("tr[data-id='trChungTuGhiSo'] td input#soChungTu").val(chungtughiso.SoChungTu);
                    $("tr[data-id='trChungTuGhiSo'] td input#maChungTu").val(chungtughiso.MaChungTu);
                    $("tr[data-id='trChungTuGhiSo'] td input#ngayChungTu").val(chungtughiso.NgayChungTu);
                    $("tr[data-id='trChungTuGhiSo'] td input#hoTen").val(chungtughiso.HoTen);
                    $("tr[data-id='trChungTuGhiSo'] td textarea#dienGiai").val(chungtughiso.DienGiai);

                    $("tr[data-id='trChungTuGhiSo'] td input#maKhachHangNo").val(chungtughiso.MaKhachHangNo);
                    $("tr[data-id='trChungTuGhiSo'] td input#tenKhachHangNo").val(chungtughiso.TenKhachHangNo);
                    $("tr[data-id='trChungTuGhiSo'] td input#maSoThueNo").val(chungtughiso.MaSoThueNo);

                    $("tr[data-id='trChungTuGhiSo'] td input#maKhachHangCo").val(chungtughiso.MaKhachHangCo);
                    $("tr[data-id='trChungTuGhiSo'] td input#tenKhachHangCo").val(chungtughiso.TenKhachHangCo);
                    $("tr[data-id='trChungTuGhiSo'] td input#maSoThueCo").val(chungtughiso.MaSoThueCo);

                    $("tr[data-id='trChungTuGhiSo'] td input#matHang").val(chungtughiso.MatHang);
                    $("tr[data-id='trChungTuGhiSo'] td input#bieuThue").val(chungtughiso.BieuThue);
                    $("tr[data-id='trChungTuGhiSo'] td input#soXeRy").val(chungtughiso.SoXeRy);
                    $("tr[data-id='trChungTuGhiSo'] td input#soHoaDon").val(chungtughiso.SoHoaDon);
                    $("tr[data-id='trChungTuGhiSo'] td input#ngayHoaDon").val(chungtughiso.NgayHoaDon);
                    $("tr[data-id='trChungTuGhiSo'] td input#thueSuat").val(chungtughiso.ThueSuat);
                    $("tr[data-id='trChungTuGhiSo'] td input#thueGTGT").val(chungtughiso.ThueGTGT);

                    $("tr[data-id='trChungTuGhiSo'] td input#id").val(chungtughiso.id);

                });
            })
            .catch(error => {
                // Handle errors
                console.error('There was a problem with the fetch operation:', error);
            });


        // Xử lý hiện thị bảng chi tiết (phụ)
        fetch('chungtughisochitiet/' + machungtu)

            .then(response => {
                if (!response.ok) {
                    throw new Error('Mạng không ổn định, không thể lấy dữ liệu');
                }
                return response.json();
            })
            .then(data => {

                // Lấy thẻ tbody của dataTableChiTiet
                var tableBody = document.getElementById("dataTableChiTiet").getElementsByTagName("tbody")[0];

                // Xóa toàn bộ nội dung trong tbody
                tableBody.innerHTML = '';

                data.forEach(chungtughisochitiet => {

                    // Thêm dữ liệu mới vào tbody
                    var newRow = tableBody.insertRow(tableBody.rows.length);

                    // Gắn giá trị từ đối tượng congno vào các ô input tương ứng
                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
                    var cell5 = newRow.insertCell(4);

                    cell1.innerHTML = `<input style="width: 600px; text-align: center;" type="text" id="dienGiaiChiTiet" value="${chungtughisochitiet.DienGiaiChiTiet}">`;
                    cell2.innerHTML = `<input style="width: 200px; text-align: center;" type="text" id="soTien" value="${chungtughisochitiet.SoTien}" oninput="ThueGTGT_InputChange()">`;
                    cell3.innerHTML = `<input style="width: 120px; text-align: center;" type="text" id="taiKhoanNo" value="${chungtughisochitiet.TaiKhoanNo}" readonly>`;
                    cell4.innerHTML = `<input style="width: 120px; text-align: center;" type="text" id="taiKhoanCo" value="${chungtughisochitiet.TaiKhoanCo}" readonly>`;
                    cell5.innerHTML = `<button style="width: 100px;" type="button" onclick="updateChungTuGhiSoChiTiet( '${chungtughisochitiet.id}')">Cập nhật</button>`;

                    // oninput="ThueGTGT_InputChange()"

                    // Thêm sự kiện cho sự kiện click vào dòng
                    newRow.onclick = function() {
                        highlightRow(this);
                    };
                });

            })
            .catch(error => {
                // Handle errors
                console.error('There was a problem with the fetch operation:', error);
            });

    }

    //Hàm xử lý cho phép chỉnh sửa phiếu chi
    function choPhepChinhSua() {

        if (checkbox.checked) {

            //Thiết lập button
            btnCapNhat.disabled = false;

            //Thiết lập input
            txtngayChungTu.disabled = false;
            txtngayHoaDon.disabled = false;

            //Cho phép đổi khách hàng khác
            replaceInputWithSelect_NO();
            replaceInputWithSelect_CO();
        } else {

            txtngayChungTu.disabled = true;
            txtngayHoaDon.disabled = true;

            replaceSelectWithInput_NO();
            replaceSelectWithInput_CO();
        }
    }


    //Hàm xử lý setup và làm mới các thẻ input
    function resetAndSetupValue() {

        //Thiết lập button
        btnCapNhat.disabled = true;
        btnTaoPhieu.disabled = false;

        //Thiết lập thẻ input ẩn đi
        // txtmaChungTu.disabled = true;

        //Thiết lập các input được phép nhập liệu
        txtsoChungTu.disabled = false;
        txtngayChungTu.disabled = false;
        txtngayHoaDon.disabled = false;

        //Làm mới bảng chính
        $("tr[data-id='trChungTuGhiSo'] td input#loaiChungTu").val("GS");
        $("tr[data-id='trChungTuGhiSo'] td input#soChungTu").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#maChungTu").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#ngayChungTu").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#hoTen").val("");
        $("tr[data-id='trChungTuGhiSo'] td textarea#dienGiai").val("");

        $("tr[data-id='trChungTuGhiSo'] td input#maKhachHangNo").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#tenKhachHangNo").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#maSoThueNo").val("");

        $("tr[data-id='trChungTuGhiSo'] td input#maKhachHangCo").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#tenKhachHangCo").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#maSoThueCo").val("");

        $("tr[data-id='trChungTuGhiSo'] td input#matHang").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#bieuThue").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#soXeRy").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#soHoaDon").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#ngayHoaDon").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#thueSuat").val("");
        $("tr[data-id='trChungTuGhiSo'] td input#thueGTGT").val("");

        $("tr[data-id='trChungTuGhiSo'] td input#id").val("");

        // Gọi hàm mở sẵn bảng phụ khi thêm mới
        addNewChungTuGhiSoChiTiet();

        // Thay thế thẻ input bằng thẻ select
        replaceInputWithSelect_NO();
        replaceInputWithSelect_CO();

    }

    // Hàm xử lý thẻ input soChungTu thay đổi text
    function handleInputChange() {
        var txtloaiChungTu = document.getElementById("loaiChungTu").value;
        var txtsoChungTu = document.getElementById("soChungTu").value;
        $("tr[data-id='trChungTuGhiSo'] td input#maChungTu").val(txtloaiChungTu + "-" + txtsoChungTu);
    }

    // Hàm xử lý tính toán tự động Thuế GTGT
    function ThueGTGT_InputChange() {

        var thueSuat = parseFloat(document.getElementById("thueSuat").value);

        var soTien = parseFloat(document.getElementById("soTien").value);

        $("tr[data-id='trChungTuGhiSo'] td input#thueGTGT").val(soTien / thueSuat);

    }


    // Hàm xử lý thay thế thẻ input thành select cho KHÁCH HÀNG NỢ
    function replaceInputWithSelect_NO() {
        // Lấy giá trị hiện tại của thẻ input
        var inputValue = document.getElementById("maKhachHangNo").value;

        // Tạo một thẻ select
        var selectElement = document.createElement("select");
        selectElement.id = "maKhachHangNo";

        selectElement.style.marginLeft = "5px";

        // Fetch dữ liệu
        fetch('get_KhachHang')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);

                //Vào từng object chứa khách hàng
                data.forEach(khachhang => {

                    //Duyệt qua các thuộc tính của một khách hàng và tạo các option
                    var option = document.createElement("option");
                    option.value = khachhang.MaKhachHang;
                    option.text = khachhang.MaKhachHang;
                    selectElement.appendChild(option);

                    // Đặt giá trị của thẻ select
                    selectElement.value = inputValue;

                    // Thay thế thẻ input bằng thẻ select
                    var inputElement = document.getElementById("maKhachHangNo");
                    inputElement.parentNode.replaceChild(selectElement, inputElement);


                    // Thêm xử lý sự kiện change cho thẻ select
                    selectElement.addEventListener("change", function() {
                        var selectedValue = this.value;
                        data.forEach(kh => {
                            if (kh.MaKhachHang == selectedValue) {
                                $("tr[data-id='trChungTuGhiSo'] td input#tenKhachHangNo").val(kh.TenKhachHang);
                                $("tr[data-id='trChungTuGhiSo'] td input#maSoThueNo").val(kh.MaSoThue);
                            }
                        });
                    });
                });

            })
            .catch(error => {
                // Xử lý lỗi
                console.error('There was a problem with the fetch operation:', error);
            });
    }

    // Hàm xử lý thay thế thẻ input thành select cho KHÁCH HÀNG CÓ
    function replaceInputWithSelect_CO() {
        // Lấy giá trị hiện tại của thẻ input
        var inputValue = document.getElementById("maKhachHangCo").value;

        // Tạo một thẻ select
        var selectElement = document.createElement("select");
        selectElement.id = "maKhachHangCo";

        selectElement.style.marginLeft = "5px";

        // Fetch dữ liệu
        fetch('get_KhachHang')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log(data);

                //Vào từng object chứa khách hàng
                data.forEach(khachhang => {

                    //Duyệt qua các thuộc tính của một khách hàng và tạo các option
                    var option = document.createElement("option");
                    option.value = khachhang.MaKhachHang;
                    option.text = khachhang.MaKhachHang;
                    selectElement.appendChild(option);

                    // Đặt giá trị của thẻ select
                    selectElement.value = inputValue;

                    // Thay thế thẻ input bằng thẻ select
                    var inputElement = document.getElementById("maKhachHangCo");
                    inputElement.parentNode.replaceChild(selectElement, inputElement);


                    // Thêm xử lý sự kiện change cho thẻ select
                    selectElement.addEventListener("change", function() {
                        var selectedValue = this.value;
                        data.forEach(kh => {
                            if (kh.MaKhachHang == selectedValue) {
                                $("tr[data-id='trChungTuGhiSo'] td input#tenKhachHangCo").val(kh.TenKhachHang);
                                $("tr[data-id='trChungTuGhiSo'] td input#maSoThueCo").val(kh.MaSoThue);
                            }
                        });
                    });
                });

            })
            .catch(error => {
                // Xử lý lỗi
                console.error('There was a problem with the fetch operation:', error);
            });
    }


    //Hàm xử lý thẻ select maKhachHang thành thẻ input cho KHÁCH HÀNG NỢ
    function replaceSelectWithInput_NO() {
        // Lấy giá trị hiện tại của thẻ select
        var selectedValue = document.getElementById("maKhachHangNo").value;

        // Tạo một thẻ input
        var inputElement = document.createElement("input");
        inputElement.type = "text";
        inputElement.id = "maKhachHangNo";
        inputElement.value = selectedValue;

        // Thêm thuộc tính CSS vào thẻ input
        inputElement.style.marginLeft = "5px";
        inputElement.style.width = "80px";

        // Thay thế thẻ select bằng thẻ input
        var selectElement = document.getElementById("maKhachHangNo");
        selectElement.parentNode.replaceChild(inputElement, selectElement);
    }

    //Hàm xử lý thẻ select maKhachHang thành thẻ input cho KHÁCH HÀNG CÓ
    function replaceSelectWithInput_CO() {
        // Lấy giá trị hiện tại của thẻ select
        var selectedValue = document.getElementById("maKhachHangCo").value;

        // Tạo một thẻ input
        var inputElement = document.createElement("input");
        inputElement.type = "text";
        inputElement.id = "maKhachHangCo";
        inputElement.value = selectedValue;

        // Thêm thuộc tính CSS vào thẻ input
        inputElement.style.marginLeft = "5px";
        inputElement.style.width = "80px";

        // Thay thế thẻ select bằng thẻ input
        var selectElement = document.getElementById("maKhachHangCo");
        selectElement.parentNode.replaceChild(inputElement, selectElement);
    }


    var isNewRow = false; // Biến để đánh dấu trạng thái

    //Hàm xử lý xóa các thẻ có id là dataTableChiTiet trước khi nhập mới
    function removePreviousRows($dataTable) {
        var tableBody = document.getElementById($dataTable).getElementsByTagName("tbody")[0];

        // Lặp qua tất cả các dòng và xóa chúng
        while (tableBody.firstChild) {
            tableBody.removeChild(tableBody.firstChild);
        }
        isNewRow = false;
    }

    //Tạo không gian nhập liệu bảng chi tiết (phụ)
    function addNewChungTuGhiSoChiTiet() {

        //Xóa các thẻ <tr> đang tồn tại trong dataTableChiTiet
        removePreviousRows("dataTableChiTiet");

        if (!isNewRow) {
            var tableBody = document.getElementById("dataTableChiTiet").getElementsByTagName("tbody")[0];
            var newRow = tableBody.insertRow(tableBody.rows.length);

            // Gán giá trị cho thuộc tính data-id
            // newRow.setAttribute('data-id', 'dataTableChiTiet');

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);

            cell1.innerHTML = `<input style="width: 600px; " type="text" id="dienGiaiChiTiet">`;
            cell2.innerHTML = `<input style="width: 200px; text-align: center;" type="text" id="soTien" oninput="ThueGTGT_InputChange()">`;
            cell3.innerHTML = `<input style="width: 130px; text-align: center;" type="text" id="taiKhoanNo">`;
            cell4.innerHTML = `<input style="width: 130px; text-align: center;" type="text" id="taiKhoanCo">`;


            // Gán sự kiện click cho dòng mới
            newRow.onclick = function() {
                highlightRow(this);
            };

            isNewRow = true;
        }
    }

    // ----------------------------------------------------------------------------------------------------------------------------------------------------- //
    // Hàm xử lý thêm mới Phiếu chính (bảng chính)
    function addNewChungTuGhiSo() {

        //Phiếu xuất
        var maChungTu = $("#maChungTu").val();
        var loaiChungTu = $("#loaiChungTu").val();
        var ngayChungTu = $("#ngayChungTu").val();
        var soChungTu = $("#soChungTu").val();
        var hoTen = $("#hoTen").val();
        var dienGiai = $("#dienGiai").val();

        var maKhachHangNo = $("#maKhachHangNo").val();
        var tenKhachHangNo = $("#tenKhachHangNo").val();
        var maSoThueNo = $("#maSoThueNo").val();

        var maKhachHangCo = $("#maKhachHangCo").val();
        var tenKhachHangCo = $("#tenKhachHangCo").val();
        var maSoThueCo = $("#maSoThueCo").val();

        var matHang = $("#matHang").val();
        var bieuThue = $("#bieuThue").val();
        var soXeRy = $("#soXeRy").val();
        var soHoaDon = $("#soHoaDon").val();
        var ngayHoaDon = $("#ngayHoaDon").val();
        var thueSuat = $("#thueSuat").val();
        var thueGTGT = $("#thueGTGT").val();

        //Chi tiết phiếu xuất
        var dienGiaiChiTiet = $("#dienGiaiChiTiet").val();
        var soTien = $("#soTien").val();
        var taiKhoanNo = $("#taiKhoanNo").val();
        var taiKhoanCo = $("#taiKhoanCo").val();

        $.ajax({
            method: 'POST',
            url: "{{ route('chungtunganhang.store') }}",
            data: {
                // Bảng chính
                MaChungTu: maChungTu,
                LoaiChungTu: loaiChungTu,
                NgayChungTu: ngayChungTu,
                SoChungTu: soChungTu,
                HoTen: hoTen,
                DienGiai: dienGiai,

                MaKhachHangNo: maKhachHangNo,
                TenKhachHangNo: tenKhachHangNo,
                MaSoThueNo: maSoThueNo,

                MaKhachHangCo: maKhachHangCo,
                TenKhachHangCo: tenKhachHangCo,
                MaSoThueCo: maSoThueCo,

                MatHang: matHang,
                BieuThue: bieuThue,
                SoXeRy: soXeRy,
                SoHoaDon: soHoaDon,
                NgayHoaDon: ngayHoaDon,
                ThueSuat: thueSuat,
                ThueGTGT: thueGTGT,

                // Bảng phụ
                //Mã chứng từ đã tồn tại ở bảng chính, chỉ việc sử dụng - MaChungTu
                DienGiaiChiTiet: dienGiaiChiTiet,
                SoTien: soTien,
                TaiKhoanNo: taiKhoanNo,
                TaiKhoanCo: taiKhoanCo
            },
            success: function(response) {
                if (response.error) {
                    toastr.error("Vui lòng điền đầy đủ thông tin");
                    console.error("Error:", response.error);
                } else {
                    toastr.success("Tạo chứng từ ghi sổ thành công");
                    console.log(response);

                    // setTimeout(function() {
                    //     location.reload();
                    // }, 3100); // Đợi 3,1 giây trước khi reload
                }
            },
            error: function(error) {
                toastr.error("Mã chứng từ không được trùng");
                console.log(error);
            }
        });

    }


    // Hàm xử lý cập nhật Phiếu chính (bảng chính)
    function updateChungTuGhiSo() {

        //Phiếu xuất
        var id = $("#id").val();

        // var maChungTu = $("#maChungTu").val();
        // var loaiChungTu = $("#loaiChungTu").val();
        var ngayChungTu = $("#ngayChungTu").val();
        // var soChungTu = $("#soChungTu").val();
        var hoTen = $("#hoTen").val();
        var dienGiai = $("#dienGiai").val();

        var maKhachHangNo = $("#maKhachHangNo").val();
        var tenKhachHangNo = $("#tenKhachHangNo").val();
        var maSoThueNo = $("#maSoThueNo").val();

        var maKhachHangCo = $("#maKhachHangCo").val();
        var tenKhachHangCo = $("#tenKhachHangCo").val();
        var maSoThueCo = $("#maSoThueCo").val();

        var matHang = $("#matHang").val();
        var bieuThue = $("#bieuThue").val();
        var soXeRy = $("#soXeRy").val();
        var soHoaDon = $("#soHoaDon").val();
        var ngayHoaDon = $("#ngayHoaDon").val();
        var thueSuat = $("#thueSuat").val();
        var thueGTGT = $("#thueGTGT").val();

        $.ajax({
            method: 'PUT',
            url: '/chungtughiso_update/' + id,
            data: {
                // MaChungTu: maChungTu,
                // LoaiChungTu: loaiChungTu,
                NgayChungTu: ngayChungTu,
                // SoChungTu: soChungTu,
                HoTen: hoTen,
                DienGiai: dienGiai,

                MaKhachHangNo: maKhachHangNo,
                TenKhachHangNo: tenKhachHangNo,
                MaSoThueNo: maSoThueNo,

                MaKhachHangCo: maKhachHangCo,
                TenKhachHangCo: tenKhachHangCo,
                MaSoThueCo: maSoThueCo,

                MatHang: matHang,
                BieuThue: bieuThue,
                SoXeRy: soXeRy,
                SoHoaDon: soHoaDon,
                NgayHoaDon: ngayHoaDon,
                ThueSuat: thueSuat,
                ThueGTGT: thueGTGT,
            },
            success: function(response) {
                console.log(response);
                // Xử lý phản hồi
                toastr.success("Cập nhật thành công");

            },
            error: function(error) {
                toastr.error("Lỗi cập nhật");
                console.log(error);
            }
        });
    }


    // ------------------------------------------------------------------------------------------------------------------------------------------------------//
    //Hàm xử lý cập nhật (bảng phụ)
    function updateChungTuGhiSoChiTiet(id) {

        var dienGiaiChiTiet = $("#dienGiaiChiTiet").val();
        var soTien = $("#soTien").val();
        var taiKhoanNo = $("#taiKhoanNo").val();
        var taiKhoanCo = $("#taiKhoanCo").val();

        //Lấy thông tin để cập nhật Thuế GTGT
        // var id_chungtughiso = $("#id").val();
        // var taiKhoanNoGiaVon = $("#taiKhoanNoGiaVon").val();
        // var taiKhoanCoGiaVon = $("#taiKhoanCoGiaVon").val();
        // var taiKhoanNoGiaBan = $("#taiKhoanNoGiaBan").val();
        // var taiKhoanCoGiaBan = $("#taiKhoanCoGiaBan").val();
        // var taiKhoanCoGTGT = $("#taiKhoanCoGTGT").val();
        // var thueGTGT = $("#thueGTGT").val();

        // console.log(id_chungtughiso);
        // console.log(taiKhoanNoGiaVon);
        // console.log(taiKhoanCoGiaVon);
        // console.log(taiKhoanNoGiaBan);
        // console.log(taiKhoanCoGiaBan);
        // console.log(taiKhoanCoGTGT);
        // console.log(thueGTGT);


        $.ajax({
            method: 'PUT',
            url: '/chungtughisochitiet_update/' + id,
            data: {

                DienGiaiChiTiet: dienGiaiChiTiet,
                SoTien: soTien,
                TaiKhoanNo: taiKhoanNo,
                TaiKhoanCo: taiKhoanCo

                // //Gửi Thuế GTGT để cập nhật
                // Id_chungtughiso: id_chungtughiso,
                // TaiKhoanNoGiaVon: taiKhoanNoGiaVon,
                // TaiKhoanCoGiaVon: taiKhoanCoGiaVon,
                // TaiKhoanNoGiaBan: taiKhoanNoGiaBan,
                // TaiKhoanCoGiaBan: taiKhoanCoGiaBan,
                // TaiKhoanCoGTGT: taiKhoanCoGTGT,
                // ThueGTGT: thueGTGT
            },
            success: function(response) {
                console.log(response);
                toastr.success("Cập nhật chi tiết thành công");
            },
            error: function(error) {
                toastr.error("Lỗi cập nhật");
                console.log(error);
            }
        })
    }

    // Hàm hủy thêm mới
    function cancelAdd(row) {
        // Xóa dòng khi hủy thêm mới
        row.parentNode.parentNode.remove();
    }
</script>
@endsection

<!-- Load các phiếu nhập theo ngày -->