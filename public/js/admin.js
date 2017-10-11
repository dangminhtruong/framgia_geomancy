$(document).ready(function() {
    $('#tableExample3').DataTable({
        dom: "<'row'<'col-sm-4 col-sm-offset-8'f>>tp",
        "language": {
            "search": "Tìm trong trang",
            "emptyTable": "Không có dữ liệu"
        },
        "bPaginate": false
    });

    //===== CATEGORY CHANGE =====//
    $('#_category').on('change', function(e){
        e.preventDefault();

        var categories_id = $(this).val();
        if (isNaN(parseInt(categories_id))) {
            toastr.warning('Có lỗi xảy ra, vui lòng thử lại');

            return false;
        }

        var data = {
            categories_id: categories_id,
            pageNo: 1,
            _token: $('meta[name="csrf-token"]').attr('content'),
        }
        var selectOption = $(this);
        selectOption.prop('disabled', true);
        $('#_product-table').html('<div class="text-center"><img src="' + SITE_URL + 'images/ajax-loader.svg"/></div>');
        ajaxSubmit('admin/product', 'POST', data, function(result) {
            $('#_product-table').html(result.data.view);
            $('#tableExample3').DataTable({
                dom: "<'row'<'col-sm-4 col-sm-offset-8'f>>tp",
                "language": {
                    "search": "Tìm trong trang",
                    "emptyTable": "Không có dữ liệu"
                },
                "bPaginate": false
            });
            selectOption.prop('disabled', false);
        }, null);
    });

    //===== PAGINATE =====//
    $('#_product-table').on('click', '.paginate_button a', function(e) {
        e.preventDefault();

        var categories_id = $('#_category').val();
        if (isNaN(parseInt(categories_id))) {
            toastr.warning('Có lỗi xảy ra, vui lòng thử lại');

            return false;
        }

        var pageNo = $(this).data('page');
        if (pageNo == '') {
            return false;
        }
        if (isNaN(parseInt(pageNo))) {
            toastr.warning('Có lỗi xảy ra, vui lòng thử lại');

            return false;
        }

        var data = {
            categories_id: categories_id,
            pageNo: pageNo,
            _token: $('meta[name="csrf-token"]').attr('content'),
        }

        $('#_product-table').html('<div class="text-center"><img src="' + SITE_URL + 'images/ajax-loader.svg"/></div>');
        ajaxSubmit('admin/product', 'POST', data, function(result) {
            $('#_product-table').html(result.data.view);
            $('#tableExample3').DataTable({
                dom: "<'row'<'col-sm-4 col-sm-offset-8'f>>tp",
                "language": {
                    "search": "Tìm trong trang",
                    "emptyTable": "Không có dữ liệu"
                },
                "bPaginate": false
            });
        }, null);
    });
});
