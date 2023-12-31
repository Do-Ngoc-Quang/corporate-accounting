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

    /* Cấu hình hiển thị mã Phiếu thu, Phiếu chi */
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


    /* Cấu hình trọng tâm hiện thị phiếu chi */
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
        <h6 style="text-align:center; color: red;">PHIẾU CHI</h6>
        <div class="row" id="section1">
            <!-- Phần trái chiếm 1 col -->
            <div class="col-2" style="border-right: 1px solid #ccc; margin-top: 0px; padding-top: 0px">
                <div id="section1-1">
                    <table class="custom-table-showID" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Mã phiếu chi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($phieuchi as $pc)
                            <tr onclick="highlightRowandCollect(`<?= $pc->MaChungTu ?>`, this)">
                                <td><input style="width: 100%; text-align: center;" readonly type="text" id="MaChungTu" value="{{ $pc->MaChungTu }}"></td>
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
                        <tr data-id="trPhieuChi">
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
                                    <div class="label-col-10">Họ tên người nhận tiền:</div>
                                    <div class="input-col-10"><input style="width: 250px;" type="text" id="hoTen"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Địa chỉ:</div>
                                    <div class="input-col-10"><textarea style="margin-left: 115px;" id="diaChi" cols="35" rows="2"></textarea></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Diễn giải chứng từ:</div>
                                    <div class="input-col-10"><textarea style="margin-left: 34px;" id="dienGiai" cols="35" rows="2"></textarea></div>
                                </div>
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
                                    <div class="input-col-10"><input style="margin-left: 32px; width: 250px;" type="text" id="maSoThue" readonly></div>
                                </div>
                            </td>

                            <td>
                            <div class="row-col-10">
                                    <div class="label-col-10">Số chứng từ gốc:</div>
                                    <div class="input-col-10"><input style="margin-left: 0px; width: 200px;" type="text" id="soChungTuGoc"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Biểu thuế:</div>
                                    <div class="input-col-10"><input style="margin-left: 46px; width: 200px;" type="text" id="bieuThue"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Số seri:</div>
                                    <div class="input-col-10"><input style="margin-left: 66px; width: 200px;" type="text" id="soXeRy"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Số hóa đơn:</div>
                                    <div class="input-col-10"><input style="margin-left: 35px; width: 200px;" type="text" id="soHoaDon"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Ngày hóa đơn:</div>
                                    <div class="input-col-10"><input style="margin-left: 15px; text-align:center; width: 200px;" type="date" id="ngayHoaDon"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Thuế suất:</div>
                                    <div class="input-col-10"><input style="margin-left: 43px; width: 200px;" type="text" id="thueSuat"></div>
                                </div>
                                <div class="row-col-10">
                                    <div class="label-col-10">Mặt hàng:</div>
                                    <div class="input-col-10"><input style="margin-left: 48px; width: 200px;" type="text" id="matHang"></div>
                                </div>
                                <div style="margin-top: 50px;">
                                    <div>
                                        <label style="margin: 0 10px 10px 0;" for="edit">Chỉnh sửa</label><input type="checkbox" id="editPhieuChi" onchange="choPhepChinhSua()">
                                    </div>

                                    <div>
                                        <input type="hidden" id="id">
                                        <button class="btnAddnew" style=" width: 30%;" type="button" onclick="updatePhieuChi()" id="btnCapNhat" disabled>Cập nhật</button>
                                    </div>

                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div id="section1-2">
                    <button class="btnAddnew" style="margin: 7px 20px 0 35%; width: 10%;" type="button" onclick="resetAndSetupValue()" id="btnLamMoi">Thêm mới</button>
                    <button class="btnAddnew" style="margin-top: 7px; width: 10%;" type="button" onclick="addNewPhieuChi()" id="btnTaoPhieuChi">Lưu</button>
                </div>
            </div>
        </div>

        <div id="section2">
            <!-- <h6 style="text-align:center; color: red;"></h6> -->
            <table class="custom-table" id="dataTablePhieuChiChiTiet">
                <thead>
                    <tr>
                        <th style="width: 610px;">Diễn giải chi tiết</th>
                        <th style="width: 240px;">Số tiền</th>
                        <th style="width: 120px;">Tài khoản nợ</th>
                        <th style="width: 120px;">Tài khoản có</th>
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
    var btnTaoPhieuChi = document.getElementById("btnTaoPhieuChi");
    var btnCapNhat = document.getElementById("btnCapNhat");
    var btnLamMoi = document.getElementById("btnLamMoi");

    //Lấy thẻ input
    var txtsoChungTu = document.getElementById("soChungTu");
    var txtmaChungTu = document.getElementById("maChungTu");
    var txtngayChungTu = document.getElementById("ngayChungTu");
    var txtngayHoaDon = document.getElementById("ngayHoaDon");
    // var txttenKhachHang = document.getElementById("tenKhachHang");
    // var txtmaSoThue = document.getElementById("maSoThue");

    //Lấy thẻ checkbox cho phép chỉnh sửa
    var checkbox = document.getElementById("editPhieuChi");

    // Xử lý highlight cái dòng được click và hiện thị các tài khoản công nợ của khách hàng cho bảng thứ 2 (bảng phụ)
    function highlightRowandCollect(machungtu, row) {

        //Thiết lập các thẻ input ẩn đi
        txtsoChungTu.disabled = true;
        txtngayChungTu.disabled = true;
        txtngayHoaDon.disabled = true;
        checkbox.checked = false;

        //Thiết lập các button ẩn đi
        btnCapNhat.disabled = false;
        btnTaoPhieuChi.disabled = true;

        //Thiết lập lại thẻ select thành thẻ input để hiển thị thông tin mã khách hàng
        replaceSelectWithInput()

        // Bỏ lớp highlight ở tất cả các thẻ tr
        var allRows = document.querySelectorAll(".custom-table-showID tbody tr");
        allRows.forEach(function(r) {
            r.classList.remove("highlight");
        });

        // Thêm lớp highlight cho thẻ tr được click
        row.classList.add("highlight");

        // Xử lý hiện thị chi tiết phiếu chi
        const apiUrlPhieuChi = 'phieuchi/' + machungtu;
        fetch(apiUrlPhieuChi)

            .then(response => {
                if (!response.ok) {
                    throw new Error('Mạng không ổn định, không thể lấy dữ liệu');
                }
                return response.json();
            })
            .then(data => {

                //Đoạn code dưới đây thực thi sự cập nhật, tức hiển thị dữ liệu tức thì mà không tải lại trang
                data.forEach(phieuchi => {
                    $("tr[data-id='trPhieuChi'] td input#loaiChungTu").val(phieuchi.LoaiChungTu);
                    $("tr[data-id='trPhieuChi'] td input#soChungTu").val(phieuchi.SoChungTu);
                    $("tr[data-id='trPhieuChi'] td input#maChungTu").val(phieuchi.MaChungTu);
                    $("tr[data-id='trPhieuChi'] td input#ngayChungTu").val(phieuchi.NgayChungTu);
                    $("tr[data-id='trPhieuChi'] td input#hoTen").val(phieuchi.HoTen);
                    $("tr[data-id='trPhieuChi'] td textarea#diaChi").val(phieuchi.DiaChi);
                    $("tr[data-id='trPhieuChi'] td textarea#dienGiai").val(phieuchi.DienGiai);
                    $("tr[data-id='trPhieuChi'] td input#maKhachHang").val(phieuchi.MaKhachHang);
                    $("tr[data-id='trPhieuChi'] td input#tenKhachHang").val(phieuchi.TenKhachHang);
                    $("tr[data-id='trPhieuChi'] td input#maSoThue").val(phieuchi.MaSoThue);
                    $("tr[data-id='trPhieuChi'] td input#soChungTuGoc").val(phieuchi.SoChungTuGoc);
                    $("tr[data-id='trPhieuChi'] td input#bieuThue").val(phieuchi.BieuThue);
                    $("tr[data-id='trPhieuChi'] td input#soXeRy").val(phieuchi.SoXeRy);
                    $("tr[data-id='trPhieuChi'] td input#soHoaDon").val(phieuchi.SoHoaDon);
                    $("tr[data-id='trPhieuChi'] td input#ngayHoaDon").val(phieuchi.NgayHoaDon);
                    $("tr[data-id='trPhieuChi'] td input#thueSuat").val(phieuchi.ThueSuat);
                    $("tr[data-id='trPhieuChi'] td input#matHang").val(phieuchi.MatHang);
                    $("tr[data-id='trPhieuChi'] td input#id").val(phieuchi.id);

                });
            })
            .catch(error => {
                // Handle errors
                console.error('There was a problem with the fetch operation:', error);
            });


        // Xử lý hiện thị phiếu chi chi tiết
        const apiUrl = 'phieuchichitiet/' + machungtu;
        fetch(apiUrl)

            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {

                // Lấy thẻ tbody của dataTablePhieuChiChiTiet
                var tableBody = document.getElementById("dataTablePhieuChiChiTiet").getElementsByTagName("tbody")[0];

                // Xóa toàn bộ nội dung trong tbody
                tableBody.innerHTML = '';

                data.forEach(phieuchichitiet => {

                    // Thêm dữ liệu mới vào tbody
                    var newRow = tableBody.insertRow(tableBody.rows.length);

                    // Gắn giá trị từ đối tượng congno vào các ô input tương ứng
                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
                    var cell5 = newRow.insertCell(4);

                    cell1.innerHTML = `<textarea style="width: 580px" cols="30" rows="3" id="dienGiaiChiTiet">${phieuchichitiet.DienGiaiChiTiet}</textarea>`;
                    cell2.innerHTML = `<input style="width: 245px; text-align: center;" type="text" id="soTien" value="${phieuchichitiet.SoTien}">`;
                    cell3.innerHTML = `<input style="width: 110px; text-align: center;" type="text" id="taiKhoanNo" value="${phieuchichitiet.TaiKhoanNo}" readonly>`;
                    cell4.innerHTML = `<input style="width: 110px; text-align: center;" type="text" id="taiKhoanCo" value="${phieuchichitiet.TaiKhoanCo}" readonly>`;
                    cell5.innerHTML = `<button type="button" onclick="updatePhieuChiChiTiet( '${phieuchichitiet.id}')">Cập nhật</button>`;

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
        btnTaoPhieuChi.disabled = false;

        //Thiết lập thẻ input ẩn đi
        // txtmaChungTu.disabled = true;

        //Thiết lập các input được phép nhập liệu
        txtsoChungTu.disabled = false;
        txtngayChungTu.disabled = false;
        txtngayHoaDon.disabled = false;

        //Làm mới phiếu chi
        $("tr[data-id='trPhieuChi'] td input#loaiChungTu").val("PC");
        $("tr[data-id='trPhieuChi'] td input#soChungTu").val("");
        $("tr[data-id='trPhieuChi'] td input#maChungTu").val("");
        $("tr[data-id='trPhieuChi'] td input#ngayChungTu").val("");
        $("tr[data-id='trPhieuChi'] td input#hoTen").val("");
        $("tr[data-id='trPhieuChi'] td textarea#diaChi").val("");
        $("tr[data-id='trPhieuChi'] td textarea#dienGiai").val("");
        $("tr[data-id='trPhieuChi'] td input#maKhachHang").val("");
        $("tr[data-id='trPhieuChi'] td input#tenKhachHang").val("");
        $("tr[data-id='trPhieuChi'] td input#maSoThue").val("");
        $("tr[data-id='trPhieuChi'] td input#soChungTuGoc").val("");
        $("tr[data-id='trPhieuChi'] td input#bieuThue").val("");
        $("tr[data-id='trPhieuChi'] td input#soXeRy").val("");
        $("tr[data-id='trPhieuChi'] td input#soHoaDon").val("");
        $("tr[data-id='trPhieuChi'] td input#ngayHoaDon").val("");
        $("tr[data-id='trPhieuChi'] td input#thueSuat").val("");
        $("tr[data-id='trPhieuChi'] td input#matHang").val("");
        $("tr[data-id='trPhieuChi'] td input#id").val("");

        //Gọi hàm mở sẵn phiếu chi chi tiết
        addNewPhieuChiChiTiet();

        // Thay thế thẻ input bằng thẻ select
        replaceInputWithSelect();

    }

    // Hàm xử lý thẻ input soChungTu thay đổi text
    function handleInputChange() {
        var txtloaiChungTu = document.getElementById("loaiChungTu").value;
        var txtsoChungTu = document.getElementById("soChungTu").value;
        $("tr[data-id='trPhieuChi'] td input#maChungTu").val(txtloaiChungTu + "-" + txtsoChungTu);
    }

    // Hàm xử lý thay thế thẻ input thành select 
    function replaceInputWithSelect() {
        // Lấy giá trị hiện tại của thẻ input
        var inputValue = document.getElementById("maKhachHang").value;

        // Tạo một thẻ select
        var selectElement = document.createElement("select");
        selectElement.id = "maKhachHang";

        selectElement.style.marginLeft = "5px";

        // Fetch dữ liệu từ API
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
                        // console.log("Selected value:", selectedValue);
                        data.forEach(kh => {
                            if (kh.MaKhachHang == selectedValue) {
                                $("tr[data-id='trPhieuChi'] td input#tenKhachHang").val(kh.TenKhachHang);
                                $("tr[data-id='trPhieuChi'] td input#maSoThue").val(kh.MaSoThue);
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

    //Hàm xử lý xóa các thẻ có id là dataTablePhieuChiChiTiet trước khi nhập mới
    function removePreviousRows() {
        var tableBody = document.getElementById("dataTablePhieuChiChiTiet").getElementsByTagName("tbody")[0];

        // Lặp qua tất cả các dòng và xóa chúng
        while (tableBody.firstChild) {
            tableBody.removeChild(tableBody.firstChild);
        }
        isNewRow = false;
    }

    //Phiếu chi chi tiết - tạo không gian để nhập liệu
    function addNewPhieuChiChiTiet() {

        //Xóa các thẻ <tr> đang tồn tại trong dataTablePhieuChiChiTiet
        removePreviousRows();

        if (!isNewRow) {
            var tableBody = document
                .getElementById("dataTablePhieuChiChiTiet")
                .getElementsByTagName("tbody")[0];
            var newRow = tableBody.insertRow(tableBody.rows.length);

            // Các ô input cho dữ liệu mới
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);

            cell1.innerHTML = '<textarea style="width: 580px" cols="30" rows="3" id="dienGiaiChiTiet" placeholder="Diễn giải chi tiết"></textarea>';
            cell2.innerHTML = '<input style="width: 245px; text-align: center;" type="text" id="soTien" placeholder="Số tiền">';
            cell3.innerHTML = '<input style="width: 110px; text-align: center;" type="text" id="taiKhoanNo">';
            cell4.innerHTML = '<select style="width: 110px; text-align: center;" id="taiKhoanCo"><option value="111">111</option><option value="112">112</option></select>';

            // Gán sự kiện click cho dòng mới
            newRow.onclick = function() {
                highlightRow(this);
            };

            isNewRow = true;
        }
    }

    // ----------------------------------------------------------------------------------------------------------------------------------------------------- //
    // Hàm xử lý thêm mới Phiếu chi 
    function addNewPhieuChi() {

        //Phiếu chi
        var maChungTu = $("#maChungTu").val();
        var loaiChungTu = $("#loaiChungTu").val();
        var ngayChungTu = $("#ngayChungTu").val();
        var soChungTu = $("#soChungTu").val();
        var hoTen = $("#hoTen").val();
        var diaChi = $("#diaChi").val();
        var soChungTuGoc = $("#soChungTuGoc").val();
        var maKhachHang = $("#maKhachHang").val();
        var tenKhachHang = $("#tenKhachHang").val();
        var maSoThue = $("#maSoThue").val();
        var dienGiai = $("#dienGiai").val();
        var bieuThue = $("#bieuThue").val();
        var soXeRy = $("#soXeRy").val();
        var soHoaDon = $("#soHoaDon").val();
        var ngayHoaDon = $("#ngayHoaDon").val();
        var thueSuat = $("#thueSuat").val();
        var matHang = $("#matHang").val();

        //Chi tiết phiếu chi
        var dienGiaiChiTiet = $("#dienGiaiChiTiet").val();
        var soTien = $("#soTien").val();
        var taiKhoanNo = $("#taiKhoanNo").val();
        var taiKhoanCo = $("#taiKhoanCo").val();

        $.ajax({
            method: 'POST',
            url: "{{ route('phieuchi.store') }}",
            data: {
                //Các trường dữ liệu sẽ được lưu trong phiếu chi
                MaChungTu: maChungTu,
                LoaiChungTu: loaiChungTu,
                NgayChungTu: ngayChungTu,
                SoChungTu: soChungTu,
                HoTen: hoTen,
                DiaChi: diaChi,
                SoChungTuGoc: soChungTuGoc,
                MaKhachHang: maKhachHang,
                TenKhachHang: tenKhachHang,
                MaSoThue: maSoThue,
                DienGiai: dienGiai,
                BieuThue: bieuThue,
                SoXeRy: soXeRy,
                SoHoaDon: soHoaDon,
                NgayHoaDon: ngayHoaDon,
                ThueSuat: thueSuat,
                MatHang: matHang,

                //Các trường sẽ được lưu trong phiếu chi chi tiết
                //Mã chứng từ sẽ dược lấy chung với phiếu chi luôn - MaChungTu
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
                    toastr.success("Tạo phiếu chi thành công");
                    console.log(response);

                    setTimeout(function() {
                        location.reload();
                    }, 3100); // Đợi 3,1 giây trước khi reload
                }
            },
            error: function(error) {
                toastr.error("Mã phiếu chi không được trùng");
                console.log(error);
            }
        });

    }


    // Hàm xử lý cập nhật 
    function updatePhieuChi() {

        //Phiếu chi
        var id = $("#id").val();
        // var maChungTu = $("#maChungTu").val();
        // var loaiChungTu = $("#loaiChungTu").val();
        var ngayChungTu = $("#ngayChungTu").val();
        // var soChungTu = $("#soChungTu").val();
        var hoTen = $("#hoTen").val();
        var diaChi = $("#diaChi").val();
        var soChungTuGoc = $("#soChungTuGoc").val();
        var maKhachHang = $("#maKhachHang").val();
        var tenKhachHang = $("#tenKhachHang").val();
        var maSoThue = $("#maSoThue").val();
        var dienGiai = $("#dienGiai").val();
        var bieuThue = $("#bieuThue").val();
        var soXeRy = $("#soXeRy").val();
        var soHoaDon = $("#soHoaDon").val();
        var ngayHoaDon = $("#ngayHoaDon").val();
        var thueSuat = $("#thueSuat").val();
        var matHang = $("#matHang").val();


        console.log(id);
        // console.log(maChungTu);
        // console.log(loaiChungTu);
        console.log(ngayChungTu);
        // console.log(soChungTu);
        console.log(hoTen);
        console.log(diaChi);
        console.log(soChungTuGoc);
        console.log(maKhachHang);
        console.log(tenKhachHang);
        console.log(maSoThue);
        console.log(dienGiai);
        console.log(bieuThue);
        console.log(soXeRy);
        console.log(soHoaDon);
        console.log(ngayHoaDon);
        console.log(thueSuat);
        console.log(matHang);


        $.ajax({
            method: 'PUT',
            url: '/phieuchi_update/' + id,
            data: {
                // MaChungTu: maChungTu,
                // LoaiChungTu: loaiChungTu,
                NgayChungTu: ngayChungTu,
                // SoChungTu: soChungTu,
                HoTen: hoTen,
                DiaChi: diaChi,
                SoChungTuGoc: soChungTuGoc,
                MaKhachHang: maKhachHang,
                TenKhachHang: tenKhachHang,
                MaSoThue: maSoThue,
                DienGiai: dienGiai,
                BieuThue: bieuThue,
                SoXeRy: soXeRy,
                SoHoaDon: soHoaDon,
                NgayHoaDon: ngayHoaDon,
                ThueSuat: thueSuat,
                MatHang: matHang,

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
    //Hàm xử lý cập nhật Phiếu chi chi tiết
    function updatePhieuChiChiTiet(id) {

        //Lấy data
        var dienGiaiChiTiet = $("#dienGiaiChiTiet").val();
        var soTien = $("#soTien").val();
        var taiKhoanNo = $("#taiKhoanNo").val();
        var taiKhoanCo = $("#taiKhoanCo").val();

        $.ajax({
            method: 'PUT',
            url: '/phieuchichitiet_update/' + id,
            data: {
                DienGiaiChiTiet: dienGiaiChiTiet,
                SoTien: soTien,
                TaiKhoanNo: taiKhoanNo,
                TaiKhoanCo: taiKhoanCo
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