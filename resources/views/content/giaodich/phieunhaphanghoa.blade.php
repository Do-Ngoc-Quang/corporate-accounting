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
        /* border-bottom: none; */
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
        /* Khoảng cách giữa các dòng */
    }
</style>
@section('content')
<div class="container-fluid">
    <!-- Menu bên trái -->
    @include('menu.menu')

    <!-- Khung hiển thị thông tin bên phải -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content-main" id="main-content-subform">
        <h6 style="text-align:center; color: red;">PHIẾU NHẬP HÀNG HÓA</h6>
        <div class="row" id="section1">
            <!-- Phần trái chiếm 1 col -->
            <div class="col-2" style="border-right: 1px solid #ccc; margin-top: 0px; padding-top: 0px">
                <div id="section1-1">
                    <table class="custom-table-showID" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Mã phiếu nhập</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($phieunhaphanghoa as $phieunhap)
                            <tr onclick="highlightRowandCollect(`<?= $phieunhap->MaChungTu ?>`, this)">
                                <td><input style="width: 100%; text-align: center;" readonly type="text" id="MaChungTu" value="{{ $phieunhap->MaChungTu }}"></td>
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
                        <tr data-id="trPhieuNhapHangHoa">
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
                                    <div class="label-col-10">Mã người bán:</div>
                                    <div class="input-col-10"><input style="margin-left: 5px; width: 80px;" type="text" id="maKhachHang"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Tên người bán:</div>
                                    <div class="input-col-10"><input style="width: 250px;" type="text" id="tenKhachHang" readonly></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Mã số thuế:</div>
                                    <div class="input-col-10"><input style="margin-left: 22px; width: 250px;" type="text" id="maSoThue" readonly></div>
                                </div>
                                <hr>
                                <div style="margin: 0;">
                                    <div>
                                        <label style="margin: 0 5px 10px 0;" for="edit">Chỉnh sửa</label><input type="checkbox" id="edit" onchange="choPhepChinhSua()">
                                    </div>

                                    <div>
                                        <input type="hidden" id="id">
                                    </div>

                                </div>
                            </td>

                            <td>
                                <div class="row-col-10">
                                    <div class="label-col-10">Tài khoản nợ:</div>
                                    <div class="input-col-10"><input style="margin-left: 45px; width: 50px;" type="text" id="taiKhoanNo" readonly></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Tài khoản nợ GTGT:</div>
                                    <div class="input-col-10"><input style="width: 50px;" type="text" id="taiKhoanNoGTGT" readonly></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Tài khoản có:</div>
                                    <div class="input-col-10"><input style="margin-left: 46px; width: 50px;" type="text" id="taiKhoanCo" readonly></div>
                                </div>
                                <hr>

                                <div class="row-col-10">
                                    <div class="label-col-10">Mặt hàng:</div>
                                    <div class="input-col-10"><input style="margin-left: 34px; width: 210px;" type="text" id="matHang"></div>
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
                    <button class="btnAddnew" style="margin: 10px 20px 0 20px; width: 10%;" type="button" onclick="addNewPhieuNhapHangHoa()" id="btnTaoPhieu">Lưu</button>
                    <button class="btnAddnew" style="margin: 10px 20px 0 20px; width: 10%;" type="button" onclick="updatePhieuNhapHangHoa()" id="btnCapNhat" disabled>Cập nhật</button>
                </div>
            </div>
        </div>

        <div id="section2">
            <!-- <h6 style="text-align:center; color: red;">CHI TIẾT PHIẾU NHẬP</h6> -->
            <table class="custom-table" data-id="dataTableChiTiet" id="dataTableChiTiet">
                <thead>
                    <tr>
                        <th style="width: 200px;">Mã hàng</th>
                        <th style="width: 200px;">Đơn vị tính</th>
                        <th style="width: 200px;">Số lượng nhập</th>
                        <th style="width: 200px;">Đơn giá nhập</th>
                        <th style="width: 200px;">Thành tiền nhập</th>
                        <th>Tác vụ</th>
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
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#loaiChungTu").val(phieunhaphanghoa.LoaiChungTu);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#soChungTu").val(phieunhaphanghoa.SoChungTu);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#maChungTu").val(phieunhaphanghoa.MaChungTu);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#ngayChungTu").val(phieunhaphanghoa.NgayChungTu);
                    $("tr[data-id='trPhieuNhapHangHoa'] td textarea#dienGiai").val(phieunhaphanghoa.DienGiai);

                    $("tr[data-id='trPhieuNhapHangHoa'] td input#maKhachHang").val(phieunhaphanghoa.MaNguoiBan);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#tenKhachHang").val(phieunhaphanghoa.TenNguoiBan);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#maSoThue").val(phieunhaphanghoa.MaSoThueNguoiBan);

                    $("tr[data-id='trPhieuNhapHangHoa'] td input#taiKhoanNo").val(phieunhaphanghoa.TaiKhoanNo);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#taiKhoanNoGTGT").val(phieunhaphanghoa.TaiKhoanNoGTGT);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#taiKhoanCo").val(phieunhaphanghoa.TaiKhoanCo);

                    $("tr[data-id='trPhieuNhapHangHoa'] td input#matHang").val(phieunhaphanghoa.MatHang);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#soXeRy").val(phieunhaphanghoa.SoXeRy);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#soHoaDon").val(phieunhaphanghoa.SoHoaDon);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#ngayHoaDon").val(phieunhaphanghoa.NgayHoaDon);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#thueSuat").val(phieunhaphanghoa.ThueSuat);
                    $("tr[data-id='trPhieuNhapHangHoa'] td input#thueGTGT").val(phieunhaphanghoa.ThueGTGT);

                    $("tr[data-id='trPhieuNhapHangHoa'] td input#id").val(phieunhaphanghoa.id);

                });
            })
            .catch(error => {
                // Handle errors
                console.error('There was a problem with the fetch operation:', error);
            });


        // Xử lý hiện thị bảng chi tiết (phụ)
        fetch('phieunhaphanghoachitiet/' + machungtu)

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

                data.forEach(phieunhaphanghoachitiet => {

                    // Thêm dữ liệu mới vào tbody
                    var newRow = tableBody.insertRow(tableBody.rows.length);

                    // Gắn giá trị từ đối tượng congno vào các ô input tương ứng
                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
                    var cell5 = newRow.insertCell(4);
                    var cell6 = newRow.insertCell(5);

                    cell1.innerHTML = `<input style=" text-align: center;" type="text" id="maHang" value="${phieunhaphanghoachitiet.MaHang}" readonly>`;
                    cell2.innerHTML = `<input style=" text-align: center;" type="text" id="donViTinh" value="${phieunhaphanghoachitiet.DonViTinh}">`;
                    cell3.innerHTML = `<input style=" text-align: center;" type="text" id="soLuong" value="${phieunhaphanghoachitiet.SoLuong}"  oninput="ThueGTGT_InputChange()">`;
                    cell4.innerHTML = `<input style=" text-align: center;" type="text" id="donGia" value="${phieunhaphanghoachitiet.DonGia}" oninput="ThueGTGT_InputChange()">`;
                    cell5.innerHTML = `<input style=" text-align: center;" type="text" id="thanhTien" value="${phieunhaphanghoachitiet.ThanhTien}" readonly>`;
                    cell6.innerHTML = `<button type="button" onclick="updatePhieuNhapHangHoaChiTiet( '${phieunhaphanghoachitiet.id}')">Cập nhật</button>`;


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

    //Hàm xử lý cho phép chỉnh sửa
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

        //Làm mới
        $("tr[data-id='trPhieuNhapHangHoa'] td input#loaiChungTu").val("NH");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#soChungTu").val("");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#maChungTu").val("");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#ngayChungTu").val("");
        $("tr[data-id='trPhieuNhapHangHoa'] td textarea#dienGiai").val("");

        $("tr[data-id='trPhieuNhapHangHoa'] td input#maKhachHang").val("");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#tenKhachHang").val("");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#maSoThue").val("");

        $("tr[data-id='trPhieuNhapHangHoa'] td input#taiKhoanNo").val("156");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#taiKhoanNoGTGT").val("1331");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#taiKhoanCo").val("331");

        $("tr[data-id='trPhieuNhapHangHoa'] td input#matHang").val("");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#soXeRy").val("");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#soHoaDon").val("");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#ngayHoaDon").val("");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#thueSuat").val("");
        $("tr[data-id='trPhieuNhapHangHoa'] td input#thueGTGT").val("");

        $("tr[data-id='trPhieuNhapHangHoa'] td input#id").val("");

        //Gọi hàm 
        addNewPhieuNhapHangHoaChiTiet();

        // Thay thế thẻ input bằng thẻ select
        replaceInputWithSelect();

    }

    // Hàm xử lý thẻ input soChungTu thay đổi text
    function handleInputChange() {
        var txtloaiChungTu = document.getElementById("loaiChungTu").value;
        var txtsoChungTu = document.getElementById("soChungTu").value;
        $("tr[data-id='trPhieuNhapHangHoa'] td input#maChungTu").val(txtloaiChungTu + "-" + txtsoChungTu);
    }

    // Hàm xử lý tính toán tự động Thuế GTGT
    function ThueGTGT_InputChange() {

        var thueSuat = parseFloat(document.getElementById("thueSuat").value);

        var soLuong = parseFloat(document.getElementById("soLuong").value);
        var donGia = parseFloat(document.getElementById("donGia").value);

        $("input#thanhTien").val(soLuong * donGia);
        $("tr[data-id='trPhieuNhapHangHoa'] td input#thueGTGT").val((soLuong * donGia) / thueSuat);

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
                                $("tr[data-id='trPhieuNhapHangHoa'] td input#tenKhachHang").val(kh.TenKhachHang);
                                $("tr[data-id='trPhieuNhapHangHoa'] td input#maSoThue").val(kh.MaSoThue);
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
    function addNewPhieuNhapHangHoaChiTiet() {

        //Xóa các thẻ <tr> đang tồn tại trong dataTableChiTiet
        removePreviousRows();

        if (!isNewRow) {
            var tableBody = document.getElementById("dataTableChiTiet").getElementsByTagName("tbody")[0];
            var newRow = tableBody.insertRow(tableBody.rows.length);

            // Gán giá trị cho thuộc tính data-id
            // newRow.setAttribute('data-id', 'dataTableChiTiet');

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);

            // Liệt kê danh sách mã hàng hóa cho khách hàng lựa chọn
            fetch('get_HangHoa')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Mạng không ổn định, không thể lấy dữ liệu');
                    }
                    return response.json();
                })
                .then(data => {
                    // Tạo chuỗi HTML chứa thẻ select và các option
                    var selectMaHang = '<select style="width: 200px; text-align: center;" id="maHang"; max-height: 50px; overflow-y: auto; >';
                    for (var i = 0; i < data.length; i++) {
                        selectMaHang += `<option value="${data[i]}">${data[i]}</option>`;
                    }
                    selectMaHang += '</select>';
                    cell1.innerHTML = selectMaHang;
                })
                .catch(error => {
                    // Handle errors
                    console.error('There was a problem with the fetch operation:', error);
                });


            cell2.innerHTML = `<input style="width: 200px; text-align: center;" type="text" id="donViTinh" placeholder="Đơn vị tính">`;
            cell3.innerHTML = `<input style="width: 200px; text-align: center;" type="text" id="soLuong" placeholder="Số lượng" oninput="ThueGTGT_InputChange()">`;
            cell4.innerHTML = `<input style="width: 200px; text-align: center;" type="text" id="donGia" placeholder="Đơn giá" oninput="ThueGTGT_InputChange()">`;
            cell5.innerHTML = `<input style="width: 200px; text-align: center;" type="text" id="thanhTien" placeholder="Thành tiền" >`;

            // Gán sự kiện click cho dòng mới
            newRow.onclick = function() {
                highlightRow(this);
            };

            isNewRow = true;
        }
    }


    // ----------------------------------------------------------------------------------------------------------------------------------------------------- //
    // Hàm xử lý thêm mới Phiếu chính (bảng chính)
    function addNewPhieuNhapHangHoa() {

        //Phiếu nhập
        var maChungTu = $("#maChungTu").val();
        var loaiChungTu = $("#loaiChungTu").val();
        var ngayChungTu = $("#ngayChungTu").val();
        var soChungTu = $("#soChungTu").val();
        var dienGiai = $("#dienGiai").val();
        var maKhachHang = $("#maKhachHang").val();
        var tenKhachHang = $("#tenKhachHang").val();
        var maSoThue = $("#maSoThue").val();
        var taiKhoanNo = $("#taiKhoanNo").val();
        var taiKhoanNoGTGT = $("#taiKhoanNoGTGT").val();
        var taiKhoanCo = $("#taiKhoanCo").val();
        var matHang = $("#matHang").val();
        var soXeRy = $("#soXeRy").val();
        var soHoaDon = $("#soHoaDon").val();
        var ngayHoaDon = $("#ngayHoaDon").val();
        var thueSuat = $("#thueSuat").val();
        var thueGTGT = $("#thueGTGT").val();

        //Chi tiết phiếu nhập
        var maHang = $("#maHang").val();
        var donViTinh = $("#donViTinh").val();
        var soLuong = $("#soLuong").val();
        var donGia = $("#donGia").val();
        var thanhTien = $("#thanhTien").val();

        $.ajax({
            method: 'POST',
            url: "{{ route('phieunhaphanghoa.store') }}",
            data: {
                //Bảng chính
                MaChungTu: maChungTu,
                LoaiChungTu: loaiChungTu,
                NgayChungTu: ngayChungTu,
                SoChungTu: soChungTu,
                DienGiai: dienGiai,
                MaKhachHang: maKhachHang,
                TenKhachHang: tenKhachHang,
                MaSoThue: maSoThue,
                TaiKhoanNo: taiKhoanNo,
                TaiKhoanNoGTGT: taiKhoanNoGTGT,
                TaiKhoanCo: taiKhoanCo,
                MatHang: matHang,
                SoXeRy: soXeRy,
                SoHoaDon: soHoaDon,
                NgayHoaDon: ngayHoaDon,
                ThueSuat: thueSuat,
                ThueGTGT: thueGTGT,


                //Bảng phụ
                //Mã chứng từ đã tồn tại ở bảng chính, chỉ việc sử dụng - MaChungTu
                MaHang: maHang,
                DonViTinh: donViTinh,
                SoLuong: soLuong,
                DonGia: donGia,
                ThanhTien: thanhTien
            },
            success: function(response) {
                if (response.error) {
                    toastr.error("Vui lòng điền đầy đủ thông tin");
                    console.error("Error:", response.error);
                } else {
                    toastr.success("Tạo phiếu nhập hàng thành công");
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
    function updatePhieuNhapHangHoa() {

        var id = $("#id").val();
        // var maChungTu = $("#maChungTu").val();
        // var loaiChungTu = $("#loaiChungTu").val();
        var ngayChungTu = $("#ngayChungTu").val();
        // var soChungTu = $("#soChungTu").val();
        var dienGiai = $("#dienGiai").val();
        var maKhachHang = $("#maKhachHang").val();
        var tenKhachHang = $("#tenKhachHang").val();
        var maSoThue = $("#maSoThue").val();
        var taiKhoanNo = $("#taiKhoanNo").val();
        var taiKhoanNoGTGT = $("#taiKhoanNoGTGT").val();
        var taiKhoanCo = $("#taiKhoanCo").val();
        var matHang = $("#matHang").val();
        var soXeRy = $("#soXeRy").val();
        var soHoaDon = $("#soHoaDon").val();
        var ngayHoaDon = $("#ngayHoaDon").val();
        var thueSuat = $("#thueSuat").val();
        var thueGTGT = $("#thueGTGT").val();


        $.ajax({
            method: 'PUT',
            url: '/phieunhaphanghoa_update/' + id,
            data: {
                // MaChungTu: maChungTu,
                // LoaiChungTu: loaiChungTu,
                NgayChungTu: ngayChungTu,
                // SoChungTu: soChungTu,
                DienGiai: dienGiai,
                MaKhachHang: maKhachHang,
                TenKhachHang: tenKhachHang,
                MaSoThue: maSoThue,
                TaiKhoanNo: taiKhoanNo,
                TaiKhoanNoGTGT: taiKhoanNoGTGT,
                TaiKhoanCo: taiKhoanCo,
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
    function updatePhieuNhapHangHoaChiTiet(id) {

        var maHang = $("#maHang").val();
        var donViTinh = $("#donViTinh").val();
        var soLuong = $("#soLuong").val();
        var donGia = $("#donGia").val();
        var thanhTien = $("#thanhTien").val();

        //Lấy thông tin để cập nhật Thuế GTGT
        var id_PhieuNhapHangHoa = $("#id").val();
        var taiKhoanNo = $("#taiKhoanNo").val();
        var taiKhoanNoGTGT = $("#taiKhoanNoGTGT").val();
        var taiKhoanCo = $("#taiKhoanCo").val();
        var thueGTGT = $("#thueGTGT").val();

        // console.log(id_PhieuNhapHangHoa);
        // console.log(taiKhoanNo);
        // console.log(taiKhoanNoGTGT);
        // console.log(taiKhoanCo);
        // console.log(thueGTGT);

        
        $.ajax({
            method: 'PUT',
            url: '/phieunhaphanghoachitiet_update/' + id,
            data: {
                MaHang: maHang,
                DonViTinh: donViTinh,
                SoLuong: soLuong,
                DonGia: donGia,
                ThanhTien: thanhTien,

                //Gửi Thuế GTGT để cập nhật
                Id_PhieuNhapHangHoa: id_PhieuNhapHangHoa,
                TaiKhoanNo: taiKhoanNo,
                TaiKhoanNoGTGT: taiKhoanNoGTGT,
                TaiKhoanCo: taiKhoanCo,
                ThueGTGT: thueGTGT
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