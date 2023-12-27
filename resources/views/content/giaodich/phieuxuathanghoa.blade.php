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
        text-align: right;
    }

    .row-col-10 {
        display: flex;
        margin-bottom: 9px;
    }
</style>
@section('content')
<div class="container-fluid">
    <!-- Menu bên trái -->
    @include('menu.menu')

    <!-- Khung hiển thị thông tin bên phải -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-main" id="main-content-subform">
        <h6 style="text-align:center; color: red;">PHIẾU XUẤT HÀNG HÓA</h6>
        <div class="row" id="section1">
            <!-- Phần trái chiếm 1 col -->
            <div class="col-2" style="border-right: 1px solid #ccc; margin-top: 0px; padding-top: 0px">
                <div id="section1-1">
                    <table class="custom-table-showID" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Mã phiếu xuất</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($phieuxuathanghoa as $phieuxuat)
                            <tr onclick="highlightRowandCollect(`<?= $phieuxuat->MaChungTu ?>`, this)">
                                <td><input style="width: 100%; text-align: center;" readonly type="text" id="MaChungTu" value="{{ $phieuxuat->MaChungTu }}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>


            <!-- Phần phải chiếm 11 col -->
            <div class="col-10">
                <table class="custom-table" id="dataTable">
                    <tbody>
                        <tr data-id="trPhieuXuatHangHoa">
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
                                    <div class="label-col-10">Diễn giải:</div>
                                    <div class="input-col-10"><textarea style="margin-left: 42px;" id="dienGiai" cols="35" rows="2"></textarea></div>
                                </div>
                                <hr>

                                <div class="row-col-10">
                                    <div class="label-col-10">Tài khoản nợ giá vốn:</div>
                                    <div class="input-col-10"><input readonly style="margin-left: 1px; width: 50px;" type="text" id="taiKhoanNoGiaVon"></div>

                                    <div class="label-col-10" style="margin-left: 50px;">Tài khoản có giá vốn:</div>
                                    <div class="input-col-10"><input readonly style="margin-left: 1px; width: 50px;" type="text" id="taiKhoanCoGiaVon"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Tài khoản nợ giá bán:</div>
                                    <div class="input-col-10"><input readonly style="margin-left: 0px; width: 50px;" type="text" id="taiKhoanNoGiaBan"></div>

                                    <div class="label-col-10" style="margin-left: 50px;">Tài khoản có giá bán:</div>
                                    <div class="input-col-10"><input readonly style="margin-left: 0px; width: 50px;" type="text" id="taiKhoanCoGiaBan"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10" style="margin-left: 262px;">Tài khoản có GTGT:</div>
                                    <div class="input-col-10"><input readonly style="margin-left: 12px; width: 50px;" type="text" id="taiKhoanCoGTGT"></div>
                                </div>

                                <hr>

                                <div style="margin: 0;">
                                    <div>
                                        <label style="margin: 0 5px 10px 0;" for="edit">Chỉnh sửa</label><input type="checkbox" id="edit" onchange="choPhepChinhSua()">
                                    </div>
                                    <div>
                                        <input type="hidden" id="id">
                                    </div>
                                    <label></label>
                                </div>
                            </td>

                            <td>
                                <div class="row-col-10">
                                    <div class="label-col-10">Mã khách hàng:</div>
                                    <div class="input-col-10"><input style="margin-left: 5px; width: 80px;" type="text" id="maKhachHang"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Tên khách hàng:</div>
                                    <div class="input-col-10"><input style="width: 250px;" type="text" id="tenKhachHang" readonly></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Mã số thuế:</div>
                                    <div class="input-col-10"><input style="margin-left: 33px; width: 250px;" type="text" id="maSoThue" readonly></div>
                                </div>
                                <hr>

                                <div class="row-col-10">
                                    <div class="label-col-10">Mặt hàng:</div>
                                    <div class="input-col-10"><input style="margin-left: 34px; width: 210px;" type="text" id="matHang" readonly></div>
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

                    <button class="btnAddnew" style="margin: 10px 20px 0 25%; width: 10%;" type="button" onclick="resetAndSetupValue()" id="btnLamMoi">Thêm mới</button>
                    <button class="btnAddnew" style="margin: 10px 20px 0 20px; width: 10%;" type="button" onclick="addNewPhieuXuatHangHoa()" id="btnTaoPhieu">Lưu</button>
                    <button class="btnAddnew" style="margin: 10px 20px 0 20px; width: 10%;" type="button" onclick="updatePhieuXuatHangHoa()" id="btnCapNhat" disabled>Cập nhật</button>
                </div>
            </div>
        </div>

        <div id="section2">
            <!-- <h6 style="text-align:center; color: red;">CHI TIẾT PHIẾU XUẤT</h6> -->
            <table class="custom-table" data-id="dataTableChiTiet" id="dataTableChiTiet">
                <thead>
                    <tr>
                        <th style="width: 100px;">Mã hàng</th>
                        <th style="width: 90px;">Đơn vị tính</th>
                        <th style="width: 80px;">Số lượng</th>
                        <th style="width: 150px;">Mã chứng từ nhập</th>
                        <th style="width: 150px;">Đơn giá vốn</th>
                        <th style="width: 150px;">Thành tiền giá vốn</th>
                        <th style="width: 150px;">Đơn giá bán</th>
                        <th style="width: 150px;">Thành tiền giá bán</th>
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

    // Xử lý highlight dòng được click và hiện thị bảng thứ 2 (bảng phụ)
    function highlightRowandCollect(machungtu, row) {

        //Thiết lập các thẻ input ẩn đi
        txtsoChungTu.disabled = true;
        txtngayChungTu.disabled = true;
        txtngayHoaDon.disabled = true;
        checkbox.checked = false;

        //Thiết lập các button ẩn đi
        btnCapNhat.disabled = false;
        btnTaoPhieu.disabled = true;

        //Thiết lập lại thẻ select thành thẻ input để hiển thị thông tin mã khách hàng
        replaceSelectWithInput()

        // Bỏ lớp highlight ở tất cả các thẻ tr
        var allRows = document.querySelectorAll(".custom-table-showID tbody tr");
        allRows.forEach(function(r) {
            r.classList.remove("highlight");
        });

        // Thêm lớp highlight cho thẻ tr được click
        row.classList.add("highlight");

        // Xử lý hiện thị bảng chính
        fetch('phieuxuathanghoa/' + machungtu)

            .then(response => {
                if (!response.ok) {
                    throw new Error('Mạng không ổn định, không thể lấy dữ liệu');
                }
                return response.json();
            })
            .then(data => {

                //Đoạn code dưới đây thực thi sự cập nhật, tức hiển thị dữ liệu tức thì mà không tải lại trang
                data.forEach(phieuxuathanghoa => {
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#loaiChungTu").val(phieuxuathanghoa.LoaiChungTu);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#soChungTu").val(phieuxuathanghoa.SoChungTu);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#maChungTu").val(phieuxuathanghoa.MaChungTu);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#ngayChungTu").val(phieuxuathanghoa.NgayChungTu);
                    $("tr[data-id='trPhieuXuatHangHoa'] td textarea#dienGiai").val(phieuxuathanghoa.DienGiai);

                    $("tr[data-id='trPhieuXuatHangHoa'] td input#taiKhoanNoGiaVon").val(phieuxuathanghoa.TaiKhoanNoGiaVon);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#taiKhoanCoGiaVon").val(phieuxuathanghoa.TaiKhoanCoGiaVon);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#taiKhoanNoGiaBan").val(phieuxuathanghoa.TaiKhoanNoGiaBan);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#taiKhoanCoGiaBan").val(phieuxuathanghoa.TaiKhoanCoGiaBan);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#taiKhoanCoGTGT").val(phieuxuathanghoa.TaiKhoanCoGTGT);

                    $("tr[data-id='trPhieuXuatHangHoa'] td input#maKhachHang").val(phieuxuathanghoa.MaKhachHang);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#tenKhachHang").val(phieuxuathanghoa.TenKhachHang);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#maSoThue").val(phieuxuathanghoa.MaSoThue);

                    $("tr[data-id='trPhieuXuatHangHoa'] td input#matHang").val(phieuxuathanghoa.MatHang);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#soXeRy").val(phieuxuathanghoa.SoXeRy);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#soHoaDon").val(phieuxuathanghoa.SoHoaDon);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#ngayHoaDon").val(phieuxuathanghoa.NgayHoaDon);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#thueSuat").val(phieuxuathanghoa.ThueSuat);
                    $("tr[data-id='trPhieuXuatHangHoa'] td input#thueGTGT").val(phieuxuathanghoa.ThueGTGT);

                    $("tr[data-id='trPhieuXuatHangHoa'] td input#id").val(phieuxuathanghoa.id);

                });
            })
            .catch(error => {
                // Handle errors
                console.error('There was a problem with the fetch operation:', error);
            });


        // Xử lý hiện thị bảng chi tiết (phụ)
        fetch('phieuxuathanghoachitiet/' + machungtu)

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

                data.forEach(phieuxuathanghoachitiet => {

                    // Thêm dữ liệu mới vào tbody
                    var newRow = tableBody.insertRow(tableBody.rows.length);

                    // Gắn giá trị từ đối tượng congno vào các ô input tương ứng
                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
                    var cell5 = newRow.insertCell(4);
                    var cell6 = newRow.insertCell(5);
                    var cell7 = newRow.insertCell(6);
                    var cell8 = newRow.insertCell(7);
                    var cell9 = newRow.insertCell(8);

                    cell1.innerHTML = `<input style="width: 100px; text-align: center;" type="text" id="maHang" value="${phieuxuathanghoachitiet.MaHang}" readonly>`;
                    cell2.innerHTML = `<input style="width: 90px; text-align: center;" type="text" id="donViTinh" value="${phieuxuathanghoachitiet.DonViTinh}">`;
                    cell3.innerHTML = `<input style="width: 80px; text-align: center;" type="text" id="soLuong" value="${phieuxuathanghoachitiet.SoLuong}" oninput="ThueGTGT_InputChange()">`;
                    cell4.innerHTML = `<input style="width: 150px; text-align: center;" type="text" id="donGiaVon" value="${phieuxuathanghoachitiet.DonGiaVon}" oninput="ThueGTGT_InputChange()">`;
                    cell5.innerHTML = `<input style="width: 150px; text-align: center;" type="text" id="thanhTienGiaVon" value="${phieuxuathanghoachitiet.ThanhTienGiaVon}" readonly>`;
                    cell6.innerHTML = `<input style="width: 150px; text-align: center;" type="text" id="donGiaBan" value="${phieuxuathanghoachitiet.DonGiaBan}" oninput="ThueGTGT_InputChange()">`;
                    cell7.innerHTML = `<input style="width: 150px; text-align: center;" type="text" id="thanhTienGiaBan" value="${phieuxuathanghoachitiet.ThanhTienGiaBan}" readonly>`;
                    cell8.innerHTML = `<input style="width: 150px; text-align: center;" type="text" id="maChungTuNhap" value="${phieuxuathanghoachitiet.MaChungTuNhap}" readonly>`;
                    cell9.innerHTML = `<button style="width: 100px;" type="button" onclick="updatePhieuXuatHangHoaChiTiet( '${phieuxuathanghoachitiet.id}')">Cập nhật</button>`;

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
            replaceInputWithSelect();
        } else {

            txtngayChungTu.disabled = true;
            txtngayHoaDon.disabled = true;

            replaceSelectWithInput()
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
        $("tr[data-id='trPhieuXuatHangHoa'] td input#loaiChungTu").val("XH");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#soChungTu").val("");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#maChungTu").val("");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#ngayChungTu").val("");
        $("tr[data-id='trPhieuXuatHangHoa'] td textarea#dienGiai").val("");

        $("tr[data-id='trPhieuXuatHangHoa'] td input#taiKhoanNoGiaVon").val("632");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#taiKhoanCoGiaVon").val("156");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#taiKhoanNoGiaBan").val("131");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#taiKhoanCoGiaBan").val("511");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#taiKhoanCoGTGT").val("3331");

        $("tr[data-id='trPhieuXuatHangHoa'] td input#maKhachHang").val("");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#tenKhachHang").val("");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#maSoThue").val("");

        $("tr[data-id='trPhieuXuatHangHoa'] td input#matHang").val("");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#soXeRy").val("");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#soHoaDon").val("");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#ngayHoaDon").val("");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#thueSuat").val("");
        $("tr[data-id='trPhieuXuatHangHoa'] td input#thueGTGT").val("");

        $("tr[data-id='trPhieuXuatHangHoa'] td input#id").val("");

        // Gọi hàm mở sẵn bảng phụ khi thêm mới
        addNewPhieuXuatHangHoaChiTiet();

        // Thay thế thẻ input bằng thẻ select
        replaceInputWithSelect();
    }

    // Hàm xử lý thẻ input soChungTu thay đổi text
    function handleInputChange() {
        var txtloaiChungTu = document.getElementById("loaiChungTu").value;
        var txtsoChungTu = document.getElementById("soChungTu").value;
        $("tr[data-id='trPhieuXuatHangHoa'] td input#maChungTu").val(txtloaiChungTu + "-" + txtsoChungTu);
    }

    // Hàm xử lý tính toán tự động Thuế GTGT
    function ThueGTGT_InputChange() {

        var thueSuat = parseFloat(document.getElementById("thueSuat").value);

        var soLuong = parseFloat(document.getElementById("soLuong").value);
        var donGiaVon = parseFloat(document.getElementById("donGiaVon").value);
        var donGiaBan = parseFloat(document.getElementById("donGiaBan").value);

        $("input#thanhTienGiaVon").val(soLuong * donGiaVon);
        $("input#thanhTienGiaBan").val(soLuong * donGiaBan);
        $("tr[data-id='trPhieuXuatHangHoa'] td input#thueGTGT").val((soLuong * donGiaBan) / thueSuat);

    }


    // Hàm xử lý thay thế thẻ input thành select 
    function replaceInputWithSelect() {
        // Lấy giá trị hiện tại của thẻ input
        var inputValue = document.getElementById("maKhachHang").value;

        // Tạo một thẻ select
        var selectElement = document.createElement("select");
        selectElement.id = "maKhachHang";

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
                    var inputElement = document.getElementById("maKhachHang");
                    inputElement.parentNode.replaceChild(selectElement, inputElement);


                    // Thêm xử lý sự kiện change cho thẻ select
                    selectElement.addEventListener("change", function() {
                        var selectedValue = this.value;
                        data.forEach(kh => {
                            if (kh.MaKhachHang == selectedValue) {
                                $("tr[data-id='trPhieuXuatHangHoa'] td input#tenKhachHang").val(kh.TenKhachHang);
                                $("tr[data-id='trPhieuXuatHangHoa'] td input#maSoThue").val(kh.MaSoThue);
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


    //Hàm xử lý thẻ select maKhachHang thành thẻ input
    function replaceSelectWithInput() {
        // Lấy giá trị hiện tại của thẻ select
        var selectedValue = document.getElementById("maKhachHang").value;

        // Tạo một thẻ input
        var inputElement = document.createElement("input");
        inputElement.type = "text";
        inputElement.id = "maKhachHang";
        inputElement.value = selectedValue;

        // Thêm thuộc tính CSS vào thẻ input
        inputElement.style.marginLeft = "5px";
        inputElement.style.width = "80px";

        // Thay thế thẻ select bằng thẻ input
        var selectElement = document.getElementById("maKhachHang");
        selectElement.parentNode.replaceChild(inputElement, selectElement);
    }


    var isNewRow = false; // Biến để đánh dấu trạng thái

    //Hàm xử lý xóa các thẻ có id là dataTableChiTiet trước khi nhập mới
    function removePreviousRows() {
        var tableBody = document.getElementById("dataTableChiTiet").getElementsByTagName("tbody")[0];

        // Lặp qua tất cả các dòng và xóa chúng
        while (tableBody.firstChild) {
            tableBody.removeChild(tableBody.firstChild);
        }
        isNewRow = false;
    }

    //Tạo không gian nhập liệu bảng chi tiết (phụ)
    function addNewPhieuXuatHangHoaChiTiet() {

        //Xóa các thẻ <tr> đang tồn tại trong dataTableChiTiet
        removePreviousRows();

        if (!isNewRow) {
            var tableBody = document.getElementById("dataTableChiTiet").getElementsByTagName("tbody")[0];
            var newRow = tableBody.insertRow(tableBody.rows.length);

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);
            var cell7 = newRow.insertCell(6);
            var cell8 = newRow.insertCell(7);
            var cell9 = newRow.insertCell(8);

            var newRow2 = tableBody.insertRow(tableBody.rows.length);
            var cell2_1 = newRow2.insertCell(0);
            var cell2_2 = newRow2.insertCell(1);
            cell2_2.colSpan = 3;
            cell2_1.innerHTML = `<label>Mặt hàng:</lable>`;

                //---
                var mahang;

            // Fetch dữ liệu, lấy toàn bộ thông tin của hàng hóa
            fetch('get_HangHoa')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log(data);

                    //Vào từng object 
                    data.forEach(hanghoa => {

                        //Tạo chuỗi HTML chứa thẻ select và các option
                        var selectMaHang = '<select style="width: 100px; text-align: center;" id="maHang"; max-height: 50px; overflow-y: auto; >';
                        selectMaHang += `<option value="#" selected disabled>Mã hàng</option>`;
                        data.forEach(hh => {
                            selectMaHang += `<option value="${hh.MaHang}">${hh.MaHang}</option>`;
                        });
                        selectMaHang += '</select>';
                        cell1.innerHTML = selectMaHang;

                        var selectElement = document.getElementById('maHang');

                        // Thêm xử lý sự kiện change cho thẻ select
                        selectElement.addEventListener("change", function() {
                            var selectedValue = this.value;
                            data.forEach(hh => {
                                if (hh.MaHang == selectedValue) {
                                    // --
                                    mahang = hh.MaHang;

                                    cell2.innerHTML = `<input style="width: 90px; text-align: center;" type="text" id="donViTinh" value="${hh.DonViTinh}" readonly>`;
                                    cell3.innerHTML = `<input style="width: 100px; text-align: center;" type="text" id="soLuong" placeholder="${hh.SoLuongTonDau}" oninput="ThueGTGT_InputChange()">`;
                                    cell2_2.innerHTML = `<label>${hh.TenHang}</lable>`;

                                    $("tr[data-id='trPhieuXuatHangHoa'] td input#matHang").val(hh.TenHang);

                                    //--
                                    // Liệt kê danh sách mã chứng từ nhập hàng
                                    fetch('get_PhieuNhapHang')
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Network response was not ok');
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            console.log(data);
                                            //Vào từng object 
                                            data.forEach(phieunhap => {

                                                //Tạo chuỗi HTML chứa thẻ select và các option
                                                var selectMaHang = '<select style="width: 150px; text-align: center;" id="maChungTuNhap"; max-height: 50px; overflow-y: auto; >';
                                                selectMaHang += `<option value="#" selected disabled>Chứng từ nhập</option>`;
                                                data.forEach(pn => {

                                                    if (pn.MaHang == mahang) {
                                                        selectMaHang += `<option value="${pn.MaChungTu}">${pn.MaChungTu}</option>`;
                                                    }
                                                });
                                                selectMaHang += '</select>';
                                                cell4.innerHTML = selectMaHang;

                                                var selectElement = document.getElementById('maChungTuNhap');




                                                // Thêm xử lý sự kiện change cho thẻ select
                                                selectElement.addEventListener("change", function() {
                                                    var selectedValue = this.value;
                                                    data.forEach(pn => {
                                                        if (pn.MaChungTu == selectedValue) {

                                                            cell5.innerHTML = `<input style="width: 150px; text-align: center;" type="text" id="donGiaVon" value="${pn.DonGia}" readonly>`;

                                                            // fetch('get_DonGia/' + selectedValue)
                                                            //     .then(response => {
                                                            //         if (!response.ok) {
                                                            //             throw new Error('Mạng không ổn định, không thể lấy dữ liệu');
                                                            //         }
                                                            //         return response.json();
                                                            //     })
                                                            //     .then(data => {
                                                            //         cell5.innerHTML = `<input style="width: 150px; text-align: center;" type="text" id="donGiaVon" value="${data}" readonly>`;
                                                            //     })
                                                            //     .catch(error => {
                                                            //         // Handle errors
                                                            //         console.error('There was a problem with the fetch operation:', error);
                                                            //     });
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
                            });
                        });
                    });
                })
                .catch(error => {
                    // Xử lý lỗi
                    console.error('There was a problem with the fetch operation:', error);
                });




            cell6.innerHTML = `<input style="width: 150px; text-align: center;" type="text" id="thanhTienGiaVon" readonly>`;
            cell7.innerHTML = `<input style="width: 150px; text-align: center;" type="text" id="donGiaBan" placeholder="Đơn giá bán" oninput="ThueGTGT_InputChange()">`;
            cell8.innerHTML = `<input style="width: 150px; text-align: center;" type="text" id="thanhTienGiaBan" readonly>`;

            // Gán sự kiện click cho dòng mới
            newRow.onclick = function() {
                highlightRow(this);
            };

            isNewRow = true;
        }
    }



    // ----------------------------------------------------------------------------------------------------------------------------------------------------- //
    // Hàm xử lý thêm mới Phiếu chính (bảng chính)
    function addNewPhieuXuatHangHoa() {

        //Phiếu xuất
        var maChungTu = $("#maChungTu").val();
        var loaiChungTu = $("#loaiChungTu").val();
        var ngayChungTu = $("#ngayChungTu").val();
        var soChungTu = $("#soChungTu").val();
        var dienGiai = $("#dienGiai").val();

        var taiKhoanNoGiaVon = $("#taiKhoanNoGiaVon").val();
        var taiKhoanCoGiaVon = $("#taiKhoanCoGiaVon").val();
        var taiKhoanNoGiaBan = $("#taiKhoanNoGiaBan").val();
        var taiKhoanCoGiaBan = $("#taiKhoanCoGiaBan").val();
        var taiKhoanCoGTGT = $("#taiKhoanCoGTGT").val();

        var maKhachHang = $("#maKhachHang").val();
        var tenKhachHang = $("#tenKhachHang").val();
        var maSoThue = $("#maSoThue").val();

        var matHang = $("#matHang").val();
        var soXeRy = $("#soXeRy").val();
        var soHoaDon = $("#soHoaDon").val();
        var ngayHoaDon = $("#ngayHoaDon").val();
        var thueSuat = $("#thueSuat").val();
        var thueGTGT = $("#thueGTGT").val();

        //Chi tiết phiếu xuất
        var maHang = $("#maHang").val();
        var donViTinh = $("#donViTinh").val();
        var soLuong = $("#soLuong").val();

        var donGiaVon = $("#donGiaVon").val();
        var thanhTienGiaVon = $("#thanhTienGiaVon").val();
        var donGiaBan = $("#donGiaBan").val();
        var thanhTienGiaBan = $("#thanhTienGiaBan").val();
        var maChungTuNhap = $("#maChungTuNhap").val();

        $.ajax({
            method: 'POST',
            url: "{{ route('phieuxuathanghoa.store') }}",
            data: {
                // Bảng chính
                MaChungTu: maChungTu,
                LoaiChungTu: loaiChungTu,
                NgayChungTu: ngayChungTu,
                SoChungTu: soChungTu,
                DienGiai: dienGiai,

                MaKhachHang: maKhachHang,
                TenKhachHang: tenKhachHang,
                MaSoThue: maSoThue,

                TaiKhoanNoGiaVon: taiKhoanNoGiaVon,
                TaiKhoanCoGiaVon: taiKhoanCoGiaVon,
                TaiKhoanNoGiaBan: taiKhoanNoGiaBan,
                TaiKhoanCoGiaBan: taiKhoanCoGiaBan,
                TaiKhoanCoGTGT: taiKhoanCoGTGT,

                MatHang: matHang,
                SoXeRy: soXeRy,
                SoHoaDon: soHoaDon,
                NgayHoaDon: ngayHoaDon,
                ThueSuat: thueSuat,
                ThueGTGT: thueGTGT,

                // Bảng phụ
                //Mã chứng từ đã tồn tại ở bảng chính, chỉ việc sử dụng - MaChungTu
                MaHang: maHang,
                DonViTinh: donViTinh,
                SoLuong: soLuong,

                DonGiaVon: donGiaVon,
                ThanhTienGiaVon: thanhTienGiaVon,
                DonGiaBan: donGiaBan,
                ThanhTienGiaBan: thanhTienGiaBan,
                MaChungTuNhap: maChungTuNhap
            },
            success: function(response) {
                if (response.error) {
                    toastr.error("Vui lòng điền đầy đủ thông tin");
                    console.error("Error:", response.error);
                } else {
                    toastr.success("Tạo phiếu thành công");
                    console.log(response);

                    setTimeout(function() {
                        location.reload();
                    }, 3100); // Đợi 3,1 giây trước khi reload
                }
            },
            error: function(error) {
                toastr.error("Số chứng từ hoặc số lượng xuất không hợp lệ");
                console.log(error);
            }
        });
    }


    // Hàm xử lý cập nhật Phiếu chính (bảng chính)
    function updatePhieuXuatHangHoa() {

        //Phiếu xuất
        var id = $("#id").val();
        var ngayChungTu = $("#ngayChungTu").val();
        var dienGiai = $("#dienGiai").val();

        var taiKhoanNoGiaVon = $("#taiKhoanNoGiaVon").val();
        var taiKhoanCoGiaVon = $("#taiKhoanCoGiaVon").val();
        var taiKhoanNoGiaBan = $("#taiKhoanNoGiaBan").val();
        var taiKhoanCoGiaBan = $("#taiKhoanCoGiaBan").val();
        var taiKhoanCoGTGT = $("#taiKhoanCoGTGT").val();

        var maKhachHang = $("#maKhachHang").val();
        var tenKhachHang = $("#tenKhachHang").val();
        var maSoThue = $("#maSoThue").val();

        var matHang = $("#matHang").val();
        var soXeRy = $("#soXeRy").val();
        var soHoaDon = $("#soHoaDon").val();
        var ngayHoaDon = $("#ngayHoaDon").val();
        var thueSuat = $("#thueSuat").val();
        var thueGTGT = $("#thueGTGT").val();

        $.ajax({
            method: 'PUT',
            url: '/phieuxuathanghoa_update/' + id,
            data: {
                NgayChungTu: ngayChungTu,
                DienGiai: dienGiai,

                MaKhachHang: maKhachHang,
                TenKhachHang: tenKhachHang,
                MaSoThue: maSoThue,

                TaiKhoanNoGiaVon: taiKhoanNoGiaVon,
                TaiKhoanCoGiaVon: taiKhoanCoGiaVon,
                TaiKhoanNoGiaBan: taiKhoanNoGiaBan,
                TaiKhoanCoGiaBan: taiKhoanCoGiaBan,
                TaiKhoanCoGTGT: taiKhoanCoGTGT,

                MatHang: matHang,
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
    function updatePhieuXuatHangHoaChiTiet(id) {

        var maHang = $("#maHang").val();
        var donViTinh = $("#donViTinh").val();
        var soLuong = $("#soLuong").val();

        var donGiaVon = $("#donGiaVon").val();
        var thanhTienGiaVon = $("#thanhTienGiaVon").val();
        var donGiaBan = $("#donGiaBan").val();
        var thanhTienGiaBan = $("#thanhTienGiaBan").val();
        var maChungTuNhap = $("#maChungTuNhap").val();

        //Lấy thông tin để cập nhật Thuế GTGT
        var id_phieuxuathanghoa = $("#id").val();
        var taiKhoanNoGiaVon = $("#taiKhoanNoGiaVon").val();
        var taiKhoanCoGiaVon = $("#taiKhoanCoGiaVon").val();
        var taiKhoanNoGiaBan = $("#taiKhoanNoGiaBan").val();
        var taiKhoanCoGiaBan = $("#taiKhoanCoGiaBan").val();
        var taiKhoanCoGTGT = $("#taiKhoanCoGTGT").val();
        var thueGTGT = $("#thueGTGT").val();

        $.ajax({
            method: 'PUT',
            url: '/phieuxuathanghoachitiet_update/' + id,
            data: {
                MaHang: maHang,
                DonViTinh: donViTinh,
                SoLuong: soLuong,

                DonGiaVon: donGiaVon,
                ThanhTienGiaVon: thanhTienGiaVon,
                DonGiaBan: donGiaBan,
                ThanhTienGiaBan: thanhTienGiaBan,
                MaChungTuNhap: maChungTuNhap,

                //Gửi Thuế GTGT để cập nhật
                Id_phieuxuathanghoa: id_phieuxuathanghoa,
                TaiKhoanNoGiaVon: taiKhoanNoGiaVon,
                TaiKhoanCoGiaVon: taiKhoanCoGiaVon,
                TaiKhoanNoGiaBan: taiKhoanNoGiaBan,
                TaiKhoanCoGiaBan: taiKhoanCoGiaBan,
                TaiKhoanCoGTGT: taiKhoanCoGTGT,
                ThueGTGT: thueGTGT
            },
            success: function(response) {
                console.log(response);
                toastr.success("Cập nhật chi tiết thành công");
            },
            error: function(error) {
                toastr.error("Số lượng xuất vượt quá tồn kho");
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