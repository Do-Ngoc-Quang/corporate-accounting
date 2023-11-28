// Hàm thêm highlight cho thẻ <tr> được chọn
function highlightRow(row) {
    // Bỏ lớp highlight ở tất cả các thẻ tr
    var allRows = document.querySelectorAll(".custom-table tbody tr");
    allRows.forEach(function (r) {
        r.classList.remove("highlight");
    });

    // Thêm lớp highlight cho thẻ tr được click
    row.classList.add("highlight");
}

// Thư viện toastr tạo arlet thông báo chuyên nghiệp
toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: "slideDown",
    timeOut: 3000,
};
