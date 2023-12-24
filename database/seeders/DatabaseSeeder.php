<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '111',
            'TenTaiKhoan' => 'Tiền mặt',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1111',
            'TenTaiKhoan' => 'Tiền Việt Nam',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1112',
            'TenTaiKhoan' => 'Ngoại tệ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1113',
            'TenTaiKhoan' => 'Vàng tiền tệ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '112',
            'TenTaiKhoan' => 'Tiền gửi Ngân hàng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1121',
            'TenTaiKhoan' => 'Tiền Việt Nam',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1122',
            'TenTaiKhoan' => 'Ngoại tệ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1123',
            'TenTaiKhoan' => 'Vàng tiền tệ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '113',
            'TenTaiKhoan' => 'Tiền đang chuyển',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1131',
            'TenTaiKhoan' => 'Tiền Việt Nam',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1132',
            'TenTaiKhoan' => 'Ngoại tệ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '121',
            'TenTaiKhoan' => 'Chứng khoán kinh doanh',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1211',
            'TenTaiKhoan' => 'Cổ phiếu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1212',
            'TenTaiKhoan' => 'Trái phiếu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1218',
            'TenTaiKhoan' => 'Chứng khoán và các công cụ tài chính khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '128',
            'TenTaiKhoan' => 'Đầu tư nắm giữ đến ngày đáo hạn',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1281',
            'TenTaiKhoan' => 'Tiền gửi có kỳ hạn',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1282',
            'TenTaiKhoan' => 'Trái phiếu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1283',
            'TenTaiKhoan' => 'Cho vay',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1288',
            'TenTaiKhoan' => 'Các khoản đầu tư khác nắm giữ đến ngày đáo hạn',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '131',
            'TenTaiKhoan' => 'Phải thu của khách hàng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '133',
            'TenTaiKhoan' => 'Thuế GTGT được khấu trừ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1331',
            'TenTaiKhoan' => 'Thuế GTGT được khấu trừ của hàng hóa, dịch vụ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1332',
            'TenTaiKhoan' => 'Thuế GTGT được khấu trừ của Tài sản cố định',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '136',
            'TenTaiKhoan' => 'Phải thu nội bộ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1361',
            'TenTaiKhoan' => 'Vốn kinh doanh ở các đơn vị trực thuộc',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1362',
            'TenTaiKhoan' => 'Phải thu nội bộ về chênh lệch tỷ giá',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1363',
            'TenTaiKhoan' => 'Phải thu nội bộ về chi phí đi vay đủ điều kiện được vốn hoá',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1368',
            'TenTaiKhoan' => 'Phải thu nội bộ khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '138',
            'TenTaiKhoan' => 'Phải thu khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1381',
            'TenTaiKhoan' => 'Tài sản thiếu chờ xử lý',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1385',
            'TenTaiKhoan' => 'Phải thu về cổ phần hoá',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1388',
            'TenTaiKhoan' => 'Phải thu khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '141',
            'TenTaiKhoan' => 'Tạm ứng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '151',
            'TenTaiKhoan' => 'Hàng mua đang đi đường',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '152',
            'TenTaiKhoan' => 'Nguyên liệu, vật liệu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '153',
            'TenTaiKhoan' => 'Công cụ, dụng cụ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1531',
            'TenTaiKhoan' => 'Công cụ, dụng cụ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1532',
            'TenTaiKhoan' => 'Bao bì luân chuyển',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1533',
            'TenTaiKhoan' => 'Đồ dùng cho thuê',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1534',
            'TenTaiKhoan' => 'Thiết bị, phụ tùng thay thế',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '154',
            'TenTaiKhoan' => 'Chi phí sản xuất, kinh doanh dở dang',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1541',
            'TenTaiKhoan' => 'Xây lắp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1542',
            'TenTaiKhoan' => 'Sản phẩm khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1543',
            'TenTaiKhoan' => 'Dịch vụ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1544',
            'TenTaiKhoan' => 'Chi phí bảo hành xây lắp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '155',
            'TenTaiKhoan' => 'Thành phẩm',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1551',
            'TenTaiKhoan' => 'Thành phẩm nhập kho',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1557',
            'TenTaiKhoan' => 'Thành phẩm bất động sản',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '156',
            'TenTaiKhoan' => 'Hàng hóa',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1561',
            'TenTaiKhoan' => 'Giá mua hàng hóa',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1562',
            'TenTaiKhoan' => 'Chi phí thu mua hàng hóa',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1567',
            'TenTaiKhoan' => 'Hàng hóa bất động sản',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '157',
            'TenTaiKhoan' => 'Hàng gửi đi bán',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '158',
            'TenTaiKhoan' => 'Hàng hoá kho bảo thuế',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '161',
            'TenTaiKhoan' => 'Chi sự nghiệp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1611',
            'TenTaiKhoan' => 'Chi sự nghiệp năm trước',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '1612',
            'TenTaiKhoan' => 'Chi sự nghiệp năm nay',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '171',
            'TenTaiKhoan' => 'Giao dịch mua, bán lại trái phiếu Chính phủ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '211',
            'TenTaiKhoan' => 'Tài sản cố định hữu hình',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2111',
            'TenTaiKhoan' => 'Nhà cửa, vật kiến trúc',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2112',
            'TenTaiKhoan' => 'Máy móc, thiết bị',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2113',
            'TenTaiKhoan' => 'Phương tiện vận tải, truyền dẫn',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2114',
            'TenTaiKhoan' => 'Thiết bị, dụng cụ quản lý',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2115',
            'TenTaiKhoan' => 'Cây lâu năm, súc vật làm việc và cho sản phẩm',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2118',
            'TenTaiKhoan' => 'Tài sản cố định khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '212',
            'TenTaiKhoan' => 'Tài sản cố định thuê tài chính',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2121',
            'TenTaiKhoan' => 'TSCĐ hữu hình thuê tài chính',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2122',
            'TenTaiKhoan' => 'TSCĐ vô hình thuê tài chính',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '213',
            'TenTaiKhoan' => 'Tài sản cố định vô hình',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2131',
            'TenTaiKhoan' => 'Quyền sử dụng đất',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2132',
            'TenTaiKhoan' => 'Quyền phát hành',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2133',
            'TenTaiKhoan' => 'Bản quyền, bằng sáng chế',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2134',
            'TenTaiKhoan' => 'Nhãn hiệu, tên thương mại',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2135',
            'TenTaiKhoan' => 'Chương trình phần mềm',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2136',
            'TenTaiKhoan' => 'Giấy phép và giấy phép nhượng quyền ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2138',
            'TenTaiKhoan' => 'TSCĐ vô hình khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '214',
            'TenTaiKhoan' => 'Hao mòn tài sản cố định',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2141',
            'TenTaiKhoan' => 'Hao mòn TSCĐ hữu hình',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2142',
            'TenTaiKhoan' => 'Hao mòn TSCĐ thuê tài chính',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2143',
            'TenTaiKhoan' => 'Hao mòn TSCĐ vô hình',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2147',
            'TenTaiKhoan' => 'Hao mòn bất động sản đầu tư',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '217',
            'TenTaiKhoan' => 'Bất động sản đầu tư',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '221',
            'TenTaiKhoan' => 'Đầu tư vào công ty con',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '222',
            'TenTaiKhoan' => 'Đầu tư vào công ty liên doanh, liên kết',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '228',
            'TenTaiKhoan' => 'Đầu tư khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2281',
            'TenTaiKhoan' => 'Đầu tư góp vốn vào đơn vị khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2288',
            'TenTaiKhoan' => 'Đầu tư khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '229',
            'TenTaiKhoan' => 'Dự phòng tổn thất tài sản',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2291',
            'TenTaiKhoan' => 'Dự phòng giảm giá chứng khoán kinh doanh',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2292',
            'TenTaiKhoan' => 'Dự phòng tổn thất đầu tư vào đơn vị khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2293',
            'TenTaiKhoan' => 'Dự phòng phải thu khó đòi',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2294',
            'TenTaiKhoan' => 'Dự phòng giảm giá hàng tồn kho',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '241',
            'TenTaiKhoan' => 'Xây dựng cơ bản dở dang',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2411',
            'TenTaiKhoan' => 'Mua sắm TSCĐ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2412',
            'TenTaiKhoan' => 'Xây dựng cơ bản',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '2413',
            'TenTaiKhoan' => 'Sửa chữa lớn TSCĐ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '242',
            'TenTaiKhoan' => 'Chi phí trả trước',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '243',
            'TenTaiKhoan' => 'Tài sản thuế thu nhập hoãn lại',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '244',
            'TenTaiKhoan' => 'Cầm cố, thế chấp, ký quỹ, ký cược',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '331',
            'TenTaiKhoan' => 'Phải trả cho người bán',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '333',
            'TenTaiKhoan' => 'Thuế và các khoản phải nộp Nhà nước',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3331',
            'TenTaiKhoan' => 'Thuế giá trị gia tăng phải nộp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '33311',
            'TenTaiKhoan' => 'Thuế GTGT đầu ra',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '3',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '33312',
            'TenTaiKhoan' => 'Thuế GTGT hàng nhập khẩu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '3',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3332',
            'TenTaiKhoan' => 'Thuế tiêu thụ đặc biệt',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3333',
            'TenTaiKhoan' => 'Thuế xuất, nhập khẩu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3334',
            'TenTaiKhoan' => 'Thuế thu nhập doanh nghiệp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3335',
            'TenTaiKhoan' => 'Thuế thu nhập cá nhân',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3336',
            'TenTaiKhoan' => 'Thuế tài nguyên',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3337',
            'TenTaiKhoan' => 'Thuế nhà đất, tiền thuê đất',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3338',
            'TenTaiKhoan' => 'Thuế bảo vệ môi trường và các loại thuế khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '33381',
            'TenTaiKhoan' => 'Thuế bảo vệ môi trường',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '3',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '33382',
            'TenTaiKhoan' => 'Các loại thuế khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '3',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3339',
            'TenTaiKhoan' => 'Phí, lệ phí và các khoản phải nộp khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '334',
            'TenTaiKhoan' => 'Phải trả người lao động',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3341',
            'TenTaiKhoan' => 'Phải trả công nhân viên',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3348',
            'TenTaiKhoan' => 'Phải trả người lao động khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '335',
            'TenTaiKhoan' => 'Chi phí phải trả',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '336',
            'TenTaiKhoan' => 'Phải trả nội bộ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3361',
            'TenTaiKhoan' => 'Phải trả nội bộ về vốn kinh doanh',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3362',
            'TenTaiKhoan' => 'Phải trả nội bộ về chênh lệch tỷ giá',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3363',
            'TenTaiKhoan' => 'Phải trả nội bộ về chi phí đi vay đủ điều kiện được vốn hoá',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3368',
            'TenTaiKhoan' => 'Phải trả nội bộ khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '337',
            'TenTaiKhoan' => 'Thanh toán theo tiến độ kế hoạch hợp đồng xây dựng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '338',
            'TenTaiKhoan' => 'Phải trả, phải nộp khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3381',
            'TenTaiKhoan' => 'Tài sản thừa chờ giải quyết',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3382',
            'TenTaiKhoan' => 'Kinh phí công đoàn',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3383',
            'TenTaiKhoan' => 'Bảo hiểm xã hội',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3384',
            'TenTaiKhoan' => 'Bảo hiểm y tế',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3385',
            'TenTaiKhoan' => 'Phải trả về cổ phần hoá',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3386',
            'TenTaiKhoan' => 'Bảo hiểm thất nghiệp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3387',
            'TenTaiKhoan' => 'Doanh thu chưa thực hiện',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3388',
            'TenTaiKhoan' => 'Phải trả, phải nộp khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '341',
            'TenTaiKhoan' => 'Vay và nợ thuê tài chính',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3411',
            'TenTaiKhoan' => 'Các khoản đi vay',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3412',
            'TenTaiKhoan' => 'Nợ thuê tài chính',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '343',
            'TenTaiKhoan' => 'Trái phiếu phát hành',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3431',
            'TenTaiKhoan' => 'Trái phiếu thường',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '34311',
            'TenTaiKhoan' => 'Mệnh giá trái phiếu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '3',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '34312',
            'TenTaiKhoan' => 'Chiết khấu trái phiếu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '3',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '34313',
            'TenTaiKhoan' => 'Mệnh giá trái phiếu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '3',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3432',
            'TenTaiKhoan' => 'Trái phiếu chuyển đổi',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '344',
            'TenTaiKhoan' => 'Nhận ký quỹ, ký cược',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '347',
            'TenTaiKhoan' => 'Thuế thu nhập hoãn lại phải trả',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '352',
            'TenTaiKhoan' => 'Dự phòng phải trả',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3521',
            'TenTaiKhoan' => 'Dự phòng bảo hành sản phẩm hàng hóa',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3522',
            'TenTaiKhoan' => 'Dự phòng bảo hành công trình xây dựng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3523',
            'TenTaiKhoan' => 'Dự phòng tái cơ cấu doanh nghiệp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3524',
            'TenTaiKhoan' => 'Dự phòng phải trả khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '353',
            'TenTaiKhoan' => 'Quỹ khen thưởng, phúc lợi',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3531',
            'TenTaiKhoan' => 'Quỹ khen thưởng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3532',
            'TenTaiKhoan' => 'Quỹ phúc lợi',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3533',
            'TenTaiKhoan' => 'Quỹ phúc lợi đã hình thành tài sản cố định',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3534',
            'TenTaiKhoan' => 'Quỹ thưởng ban quản lý điều hành công ty',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '356',
            'TenTaiKhoan' => 'Quỹ phát triển khoa học và công nghệ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3561',
            'TenTaiKhoan' => 'Quỹ phát triển khoa học và công nghệ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '3562',
            'TenTaiKhoan' => 'Quỹ phát triển KH và CN đã hình thành TSCĐ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '357',
            'TenTaiKhoan' => 'Quỹ bình ổn giá',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '411',
            'TenTaiKhoan' => 'Vốn đầu tư của chủ sở hữu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '4111',
            'TenTaiKhoan' => 'Vốn góp của chủ sở hữu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '41111',
            'TenTaiKhoan' => 'Cổ phiếu phổ thông có quyền biểu quyết',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '3',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '41112',
            'TenTaiKhoan' => 'Cổ phiếu ưu đãi',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '3',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '4112',
            'TenTaiKhoan' => 'Thặng dư vốn cổ phần',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '4113',
            'TenTaiKhoan' => 'Quyền chọn chuyển đổi trái phiếu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '4118',
            'TenTaiKhoan' => 'Vốn khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '412',
            'TenTaiKhoan' => 'Chênh lệch đánh giá lại tài sản',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '413',
            'TenTaiKhoan' => 'Chênh lệch tỷ giá hối đoái',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '4131',
            'TenTaiKhoan' => 'Chênh lệch tỷ do giá đánh giá lại các khoản mục tiền tệ có gốc ngoại tệ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '4132',
            'TenTaiKhoan' => 'Chênh lệch tỷ giá hối đoái giai đoạn trước hoạt động',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '414',
            'TenTaiKhoan' => 'Quỹ đầu tư phát triển',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '417',
            'TenTaiKhoan' => 'Quỹ hỗ trợ sắp xếp doanh nghiệp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '418',
            'TenTaiKhoan' => 'Các quỹ khác thuộc vốn chủ sở hữu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '419',
            'TenTaiKhoan' => 'Cổ phiếu quỹ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '421',
            'TenTaiKhoan' => 'Lợi nhuận sau thuế chưa phân phố',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '4211',
            'TenTaiKhoan' => 'Lợi nhuận sau thuế chưa phân phối năm trước',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '4212',
            'TenTaiKhoan' => 'Lợi nhuận sau thuế chưa phân phối năm nay',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '441',
            'TenTaiKhoan' => 'Nguồn vốn đầu tư xây dựng cơ bản',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '461',
            'TenTaiKhoan' => 'Nguồn kinh phí sự nghiệp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '4611',
            'TenTaiKhoan' => 'Nguồn kinh phí sự nghiệp năm trước',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '4612',
            'TenTaiKhoan' => 'Nguồn kinh phí sự nghiệp năm nay',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '466',
            'TenTaiKhoan' => 'Nguồn kinh phí hình thành TSCĐ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '511',
            'TenTaiKhoan' => 'Doanh thu bán hàng và cung cấp dịch vụ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '5111',
            'TenTaiKhoan' => 'Doanh thu bán hàng hóa',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '5112',
            'TenTaiKhoan' => 'Doanh thu bán các thành phẩm',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '5113',
            'TenTaiKhoan' => 'Doanh thu cung cấp dịch vụ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '5114',
            'TenTaiKhoan' => 'Doanh thu trợ cấp, trợ giá',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '5117',
            'TenTaiKhoan' => 'Doanh thu kinh doanh bất động sản đầu tư',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '5118',
            'TenTaiKhoan' => 'Doanh thu khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '515',
            'TenTaiKhoan' => 'Doanh thu hoạt động tài chính',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '521',
            'TenTaiKhoan' => 'Các khoản giảm trừ doanh thu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '5211',
            'TenTaiKhoan' => 'Chiết khấu thương mại',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '5212',
            'TenTaiKhoan' => 'Hàng bán bị trả lại',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '5213',
            'TenTaiKhoan' => 'Giảm giá hàng bán',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '611',
            'TenTaiKhoan' => 'Mua hàng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6111',
            'TenTaiKhoan' => 'Mua nguyên liệu, vật liệu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6112',
            'TenTaiKhoan' => 'Mua hàng hóa',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '621',
            'TenTaiKhoan' => 'Chi phí nguyên liệu, vật liệu trực tiếp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '622',
            'TenTaiKhoan' => 'Chi phí nhân công trực tiếp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '623',
            'TenTaiKhoan' => 'Chi phí sử dụng máy thi công',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6231',
            'TenTaiKhoan' => 'Chi phí nhân công',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6232',
            'TenTaiKhoan' => 'Chi phí vật liệu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6233',
            'TenTaiKhoan' => 'Chi phí dụng cụ sản xuất',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6234',
            'TenTaiKhoan' => 'Chi phí khấu hao máy thi công',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6237',
            'TenTaiKhoan' => 'Chi phí dịch vụ mua ngoài',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6238',
            'TenTaiKhoan' => 'Chi phí bằng tiền khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '627',
            'TenTaiKhoan' => 'Chi phí sản xuất chung',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6271',
            'TenTaiKhoan' => 'Chi phí nhân viên phân xưởng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6272',
            'TenTaiKhoan' => 'Chi phí vật liệu',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6273',
            'TenTaiKhoan' => 'Chi phí dụng cụ sản xuất',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6274',
            'TenTaiKhoan' => 'Chi phí khấu hao TSCĐ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6277',
            'TenTaiKhoan' => 'Chi phí dịch vụ mua ngoài',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6278',
            'TenTaiKhoan' => 'Chi phí bằng tiền khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '631',
            'TenTaiKhoan' => 'Giá thành sản xuất',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '632',
            'TenTaiKhoan' => 'Giá vốn hàng bán',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '635',
            'TenTaiKhoan' => 'Chi phí tài chính',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '641',
            'TenTaiKhoan' => 'Chi phí bán hàng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6411',
            'TenTaiKhoan' => 'Chi phí nhân viên',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6412',
            'TenTaiKhoan' => 'Chi phí vật liệu, bao bì',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6413',
            'TenTaiKhoan' => 'Chi phí dụng cụ, đồ dùng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6414',
            'TenTaiKhoan' => 'Chi phí khấu hao TSCĐ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6415',
            'TenTaiKhoan' => 'Chi phí bảo hành',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6417',
            'TenTaiKhoan' => 'Chi phí dịch vụ mua ngoài',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6418',
            'TenTaiKhoan' => 'Chi phí bằng tiền khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '642',
            'TenTaiKhoan' => 'Chi phí quản lý doanh nghiệp  ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6421',
            'TenTaiKhoan' => 'Chi phí nhân viên quản lý',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6422',
            'TenTaiKhoan' => 'Chi phí vật liệu quản lý',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6423',
            'TenTaiKhoan' => 'Chi phí đồ dùng văn phòng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6424',
            'TenTaiKhoan' => 'Chi phí khấu hao TSCĐ',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6425',
            'TenTaiKhoan' => 'Thuế, phí và lệ phí',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6426',
            'TenTaiKhoan' => 'Chi phí dự phòng',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6427',
            'TenTaiKhoan' => 'Chi phí dịch vụ mua ngoài',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);
        
        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '6428',
            'TenTaiKhoan' => 'Chi phí bằng tiền khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '711',
            'TenTaiKhoan' => 'Thu nhập khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '811',
            'TenTaiKhoan' => 'Chi phí khác',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '821',
            'TenTaiKhoan' => 'Chi phí thuế thu nhập doanh nghiệp',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '8211',
            'TenTaiKhoan' => 'Chi phí thuế TNDN hiện hành',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '8212',
            'TenTaiKhoan' => 'Chi phí thuế TNDN hoãn lại',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '2',
            'NgaySoDu' => now(),
        ]);

        \App\Models\DanhMucTaiKhoan::factory()->create([
            'TaiKhoan' => '911',
            'TenTaiKhoan' => 'Xác định kết quả kinh doanh',
            'SoDuNoDau' => 0,
            'SoDuCoDau' => 0,
            'CoDinhKhoan' => false,
            'Cap' => '1',
            'NgaySoDu' => now(),
        ]);

    }
}
