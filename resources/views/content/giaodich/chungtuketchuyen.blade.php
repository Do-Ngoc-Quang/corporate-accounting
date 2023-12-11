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
        <h6 style="text-align:center; color: red;">CHỨNG TỪ KẾT CHUYỂN</h6>
        <div class="row" id="section1">
            <!-- Phần trái chiếm 1 col -->
            <div class="col-2" style="border-right: 1px solid #ccc; margin-top: 0px; padding-top: 0px">
                <div id="section1-1">
                    <table class="custom-table-showID" style="width: 100%;" id="dataTable_LoaiChungTu">
                        <thead>
                            <tr>
                                <th>Mã chứng từ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chungtuketchuyen as $ctketchuyen)
                            <tr onclick="highlightRowandCollect(`<?= $ctketchuyen->MaChungTu ?>`, this)">
                                <td><input style="width: 100%; text-align: center;" readonly type="text" id="MaChungTu" value="{{ $ctketchuyen->MaChungTu }}"></td>
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
                        <tr data-id="trChungTu">
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
                                    <div class="input-col-10"><textarea style="margin-left: 42px;" id="dienGiai" cols="40" rows="2"></textarea></div>
                                </div>
                                <hr>
                                <div style="margin: 0;">
                                    <div>
                                        <label style="margin: 0 10px 10px 30px;" for="edit">Chỉnh sửa</label><input type="checkbox" id="edit" onchange="choPhepChinhSua()">
                                    </div>
                                    <div>
                                        <input type="hidden" id="id">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div id="section1-2">

                    <button class="btnAddnew" style="margin: 10px 20px 0 25%; width: 10%;" type="button" onclick="resetAndSetupValue()" id="btnLamMoi">Thêm mới</button>
                    <button class="btnAddnew" style="margin: 10px 20px 0 20px; width: 10%;" type="button" onclick="addNewChungTu()" id="btnTaoPhieu">Lưu</button>
                    <button class="btnAddnew" style="margin: 10px 20px 0 20px; width: 10%;" type="button" onclick="updateChungTu()" id="btnCapNhat" disabled>Cập nhật</button>

                </div>
            </div>
        </div>

        <div id="section2">
            <!-- <h6 style="text-align:center; color: red;"></h6> -->
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

    //Lấy thẻ checkbox cho phép chỉnh sửa
    var checkbox = document.getElementById("edit");

    // Xử lý highlight dòng được click và hiện thị bảng thứ 2 (bảng phụ)
    function highlightRowandCollect(machungtu, row) {

        //Thiết lập các thẻ input ẩn đi
        txtsoChungTu.disabled = true;
        txtngayChungTu.disabled = true;
        checkbox.checked = false;

        //Thiết lập các button ẩn đi
        btnCapNhat.disabled = false;
        btnTaoPhieu.disabled = true;

        // Bỏ lớp highlight ở tất cả các thẻ tr
        var allRows = document.querySelectorAll(".custom-table-showID tbody tr");
        allRows.forEach(function(r) {
            r.classList.remove("highlight");
        });

        // Thêm lớp highlight cho thẻ tr được click
        row.classList.add("highlight");

        // Xử lý hiện thị chi tiết phiếu chi
        fetch('chungtuketchuyen/' + machungtu)

            .then(response => {
                if (!response.ok) {
                    throw new Error('Mạng không ổn định, không thể lấy dữ liệu');
                }
                return response.json();
            })
            .then(data => {

                //Đoạn code dưới đây thực thi sự cập nhật, tức hiển thị dữ liệu tức thì mà không tải lại trang
                data.forEach(chungtuketchuyen => {
                    $("tr[data-id='trChungTu'] td input#loaiChungTu").val(chungtuketchuyen.LoaiChungTu);
                    $("tr[data-id='trChungTu'] td input#soChungTu").val(chungtuketchuyen.SoChungTu);
                    $("tr[data-id='trChungTu'] td input#maChungTu").val(chungtuketchuyen.MaChungTu);
                    $("tr[data-id='trChungTu'] td input#ngayChungTu").val(chungtuketchuyen.NgayChungTu);
                    $("tr[data-id='trChungTu'] td textarea#dienGiai").val(chungtuketchuyen.DienGiai);
                    $("tr[data-id='trChungTu'] td input#id").val(chungtuketchuyen.id);
                });
            })
            .catch(error => {
                // Handle errors
                console.error('There was a problem with the fetch operation:', error);
            });


        // Xử lý hiện thị phiếu chi chi tiết
        fetch('chungtuketchuyenchitiet/' + machungtu)

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

                data.forEach(chungtuketchuyenchitiet => {

                    // Thêm dữ liệu mới vào tbody
                    var newRow = tableBody.insertRow(tableBody.rows.length);

                    // Gắn giá trị từ đối tượng congno vào các ô input tương ứng
                    var cell1 = newRow.insertCell(0);
                    var cell2 = newRow.insertCell(1);
                    var cell3 = newRow.insertCell(2);
                    var cell4 = newRow.insertCell(3);
                    var cell5 = newRow.insertCell(4);

                    cell1.innerHTML = `<textarea style="width: 580px" cols="30" rows="3" id="dienGiaiChiTiet">${chungtuketchuyenchitiet.DienGiaiChiTiet}</textarea>`;
                    cell2.innerHTML = `<input style="width: 245px; text-align: center;" type="text" id="soTien" value="${chungtuketchuyenchitiet.SoTien}">`;
                    cell3.innerHTML = `<input style="width: 110px; text-align: center;" type="text" id="taiKhoanNo" value="${chungtuketchuyenchitiet.TaiKhoanNo}" readonly>`;
                    cell4.innerHTML = `<input style="width: 110px; text-align: center;" type="text" id="taiKhoanCo" value="${chungtuketchuyenchitiet.TaiKhoanCo}" readonly>`;
                    cell5.innerHTML = `<button type="button" onclick="updateChungTuChiTiet('${chungtuketchuyenchitiet.id}')">Cập nhật</button>`;

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

        } else {

            txtngayChungTu.disabled = true;

        }
    }


    //Hàm xử lý setup và làm mới các thẻ input
    function resetAndSetupValue() {

        //Thiết lập button
        btnCapNhat.disabled = true;
        btnTaoPhieu.disabled = false;

        //Thiết lập các input được phép nhập liệu
        txtsoChungTu.disabled = false;
        txtngayChungTu.disabled = false;

        //Làm mới bảng chính
        $("tr[data-id='trChungTu'] td input#loaiChungTu").val("KC");
        $("tr[data-id='trChungTu'] td input#soChungTu").val("");
        $("tr[data-id='trChungTu'] td input#maChungTu").val("");
        $("tr[data-id='trChungTu'] td input#ngayChungTu").val("");
        $("tr[data-id='trChungTu'] td textarea#dienGiai").val("");
        $("tr[data-id='trChungTu'] td input#id").val("");

        // Gọi hàm mở sẵn bảng phụ khi thêm mới
        addNewChungTuChiTiet();

    }

    // Hàm xử lý thẻ input soChungTu thay đổi text
    function handleInputChange() {
        var txtloaiChungTu = document.getElementById("loaiChungTu").value;
        var txtsoChungTu = document.getElementById("soChungTu").value;
        $("tr[data-id='trChungTu'] td input#maChungTu").val(txtloaiChungTu + "-" + txtsoChungTu);
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
    function addNewChungTuChiTiet() {

        //Xóa các thẻ <tr> đang tồn tại trong dataTableChiTiet
        removePreviousRows("dataTableChiTiet");

        if (!isNewRow) {
            var tableBody = document
                .getElementById("dataTableChiTiet")
                .getElementsByTagName("tbody")[0];
            var newRow = tableBody.insertRow(tableBody.rows.length);

            // Các ô input cho dữ liệu mới
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);

            cell1.innerHTML = '<textarea style="width: 580px" cols="30" rows="3" id="dienGiaiChiTiet" placeholder="Diễn giải chi tiết"></textarea>';
            cell2.innerHTML = '<input style="width: 245px; text-align: center;" type="text" id="soTien" placeholder="Số tiền">';
            cell3.innerHTML = '<input style="width: 110px; text-align: center;" type="text" id="taiKhoanNo" value="1121">';
            cell4.innerHTML = '<input style="width: 110px; text-align: center;" type="text" id="taiKhoanCo" value="131">';

            // Gán sự kiện click cho dòng mới
            newRow.onclick = function() {
                highlightRow(this);
            };

            isNewRow = true;
        }
    }

    // ----------------------------------------------------------------------------------------------------------------------------------------------------- //
    // Hàm xử lý thêm mới Phiếu chính (bảng chính)
    function addNewChungTu() {

        // Bảng chính
        var maChungTu = $("#maChungTu").val();
        var loaiChungTu = $("#loaiChungTu").val();
        var ngayChungTu = $("#ngayChungTu").val();
        var soChungTu = $("#soChungTu").val();
        var dienGiai = $("#dienGiai").val();

        //Chi tiết 
        var dienGiaiChiTiet = $("#dienGiaiChiTiet").val();
        var soTien = $("#soTien").val();
        var taiKhoanNo = $("#taiKhoanNo").val();
        var taiKhoanCo = $("#taiKhoanCo").val();

        console.log(maChungTu);
        console.log(loaiChungTu);
        console.log(ngayChungTu);
        console.log(soChungTu);
        console.log(dienGiai);

        console.log(dienGiaiChiTiet);
        console.log(soTien);
        console.log(taiKhoanNo);
        console.log(taiKhoanCo);


        $.ajax({
            method: 'POST',
            url: "{{ route('chungtuketchuyen.store') }}",
            data: {
                // Bảng chính
                MaChungTu: maChungTu,
                LoaiChungTu: loaiChungTu,
                NgayChungTu: ngayChungTu,
                SoChungTu: soChungTu,
                DienGiai: dienGiai,

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
                    toastr.success("Tạo chứng từ thành công");
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
    function updateChungTu() {

        //Phiếu xuất
        var id = $("#id").val();
        var ngayChungTu = $("#ngayChungTu").val();
        var dienGiai = $("#dienGiai").val();

        console.log(id);
        console.log(ngayChungTu);
        console.log(dienGiai);

        $.ajax({
            method: 'PUT',
            url: '/chungtuketchuyen_update/' + id,
            data: {

                NgayChungTu: ngayChungTu,
                DienGiai: dienGiai

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
    function updateChungTuChiTiet(id) {

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

        // console.log(id_chungtughiso);
        // console.log(taiKhoanNoGiaVon);
        // console.log(taiKhoanCoGiaVon);
        // console.log(taiKhoanNoGiaBan);
        // console.log(taiKhoanCoGiaBan);
        // console.log(taiKhoanCoGTGT);


        $.ajax({
            method: 'PUT',
            url: '/chungtuketchuyenchitiet_update/' + id,
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