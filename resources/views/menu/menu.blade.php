<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link navlink" href="{{ url('/home') }}">
                    TỔNG QUAN
                </a>
            </li>
            <li class="nav-item dropdown-submenu">
                <a class="nav-link navlink" href="#" data-bs-toggle="collapse" data-bs-target="#submenuDanhMuc" aria-expanded="false">
                    <span class="fw-bold">DANH MỤC</span>
                    <i class="fa-duotone fa-caret-down"></i>
                </a>
                <!-- Dropdown menu -->
                <ul class="collapse list-unstyled submenu-padding" id="submenuDanhMuc">
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/danhmuctaikhoan') }}">
                            Tài khoản
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/danhmuckhachhang') }}">
                            Khách hàng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/danhmuchanghoa') }}">
                            Hàng hóa
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown-submenu">
                <a class="nav-link navlink" href="#" data-bs-toggle="collapse" data-bs-target="#submenuGiaoDich" aria-expanded="false">
                    <span class="fw-bold">GIAO DỊCH</span>
                    <i class="fa-duotone fa-caret-down"></i>
                </a>
                <!-- Dropdown menu -->
                <ul class="collapse list-unstyled submenu-padding" id="submenuGiaoDich">
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/phieuthu') }}">
                            Phiếu thu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/phieuchi') }}">
                            Phiếu chi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/phieunhaphanghoa') }}">
                            Phiếu nhập hàng hóa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/phieuxuathanghoa') }}">
                            Phiếu xuất hàng hóa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/chungtughiso') }}">
                            Chứng từ ghi sổ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/chungtunganhang') }}">
                            Chứng từ ngân hàng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/chungtuketchuyen') }}">
                            Chứng từ kết chuyển
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/phieunhaphangtralai') }}">
                            Phiếu nhập hàng trả lại
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/phieuxuathangtralai') }}">
                            Phiếu xuất hàng trả lại
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown-submenu">
                <a class="nav-link navlink" href="#" data-bs-toggle="collapse" data-bs-target="#submenuBaoCao" aria-expanded="false">
                    <span class="fw-bold">BÁO CÁO</span>
                    <i class="fa-duotone fa-caret-down"></i>
                </a>
                <!-- Dropdown menu -->
                <ul class="collapse list-unstyled submenu-padding" id="submenuBaoCao">
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/baocaotaichinh') }}">
                            Tài chính
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/baocaotonkho') }}">
                            Tồn kho
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/baocaocongno') }}">
                            Công nợ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/baocaodoanhsobanhang') }}">
                            Doanh số bán hàng
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown-submenu">
                <a class="nav-link navlink" href="#" data-bs-toggle="collapse" data-bs-target="#submenuKetChuyen" aria-expanded="false">
                    <span class="fw-bold">KẾT CHUYỂN</span>
                    <i class="fa-duotone fa-caret-down"></i>
                </a>
                <!-- Dropdown menu -->
                <ul class="collapse list-unstyled submenu-padding" id="submenuKetChuyen">
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/ketchuyencuoiky') }}">
                            Cuối kỳ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/ketchuyenloinhuan') }}">
                            Lợi nhuận
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown-submenu">
                <a class="nav-link navlink" href="#" data-bs-toggle="collapse" data-bs-target="#submenuCongCu" aria-expanded="false">
                    <span class="fw-bold">CÔNG CỤ</span>
                    <i class="fa-duotone fa-caret-down"></i>
                </a>
                <!-- Dropdown menu -->
                <ul class="collapse list-unstyled submenu-padding" id="submenuCongCu">
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/saoluvaphuchoi') }}">
                            Sao lưu và phục hồi dữ liệu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/caidat') }}">
                            Cài đặt hệ thống
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown-submenu">
                <a class="nav-link navlink" href="#" data-bs-toggle="collapse" data-bs-target="#submenuQuanLyNguoiDung" aria-expanded="false">
                    <span class="fw-bold">QUẢN LÝ NGƯỜI DÙNG</span>
                    <i class="fa-duotone fa-caret-down"></i>
                </a>
                <!-- Dropdown menu -->
                <ul class="collapse list-unstyled submenu-padding" id="submenuQuanLyNguoiDung">
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/phanquyen') }}">
                            Phân quyền
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown-submenu">
                <a class="nav-link navlink" href="#" data-bs-toggle="collapse" data-bs-target="#submenuTroGiup" aria-expanded="false">
                    <span class="fw-bold">TRỢ GIÚP VÀ HỖ TRỢ</span>
                    <i class="fa-duotone fa-caret-down"></i>
                </a>
                <!-- Dropdown menu -->
                <ul class="collapse list-unstyled submenu-padding" id="submenuTroGiup">
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/huongdansudung') }}">
                            Hướng dẫn sử dụng
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink" href="{{ url('/lienhehotro') }}">
                            Liên hệ hỗ trợ
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>