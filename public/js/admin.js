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

    //===== PAGINATE PRODUCT =====//
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

    //===== DELETE PRODUCT =====//
    $('#_product-table').on('click', '._delete_product', function(e) {
        e.preventDefault();
        var isTrue = confirm('Bạn có chắc muốn xóa sản phẩm này');
        if (isTrue) {
            var productId = $(this).data('product');
            if (isNaN(parseInt(productId))) {
                toastr.warning('Có lỗi xảy ra, vui lòng thử lại');

                return false;
            }
            var data = {
                id: productId,
                _token: $('meta[name="csrf-token"]').attr('content'),
            };
            $('#load_scr').css('display', 'table');
            ajaxSubmit('admin/product/delete', 'POST', data, function(result) {
                if (result.code == 200) {
                    $('#productNo' + productId).remove();
                    $('#load_scr').css('display', 'none');
                    toastr.success(result.message);

                    return true;
                }
                $('#load_scr').css('display', 'none');
                toastr.warning(result.message);

                return false;
            }, function() {
                toastr.warning('Có lỗi xảy ra, vui lòng thử lại');
                return false;
            });
            return true;
        }
        toastr.info('Đã hủy thao tác');
        return false;
    });

    //===== PAGINATE CATEGORY =====//
    $('#_category-table').on('click', '.paginate_button a', function(e) {
        e.preventDefault();

        var pageNo = $(this).data('page');
        if (pageNo == '') {
            return false;
        }
        if (isNaN(parseInt(pageNo))) {
            toastr.warning('Có lỗi xảy ra, vui lòng thử lại');

            return false;
        }

        var data = {
            pageNo: pageNo,
            _token: $('meta[name="csrf-token"]').attr('content'),
        }

        $('#_category-table').html('<div class="text-center"><img src="' + SITE_URL + 'images/ajax-loader.svg"/></div>');
        ajaxSubmit('admin/category', 'POST', data, function(result) {
            $('#_category-table').html(result.data.view);
            $('#tableExample3').DataTable({
                dom: "<'row'<'col-sm-4 col-sm-offset-8'f>>tp",
                "language": {
                    "search": "Tìm trong trang",
                    "emptyTable": "Không có dữ liệu"
                },
                "bPaginate": false
            });
        }, null);
    })
});
