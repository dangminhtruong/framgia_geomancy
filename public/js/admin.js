$(document).ready(function() {
    $('#tableExample3').DataTable({
        dom: "<'row'<'col-sm-4 col-sm-offset-8'f>>tp",
        "aaSorting": [],
        "language": {
            "search": "Tìm trong trang",
            "emptyTable": "Không có dữ liệu"
        },
        "bPaginate": false
    });

    $(window).on('load', function() {
        $('#_search_type').val($('#_user_category').val());
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
                "aaSorting": [],
                "language": {
                    "search": "Tìm trong trang",
                    "emptyTable": "Không có dữ liệu"
                },
                "bPaginate": false
            });
            selectOption.prop('disabled', false);
        }, function() {
            selectOption.prop('disabled', false);
        });
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
                "aaSorting": [],
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
                "aaSorting": [],
                "language": {
                    "search": "Tìm trong trang",
                    "emptyTable": "Không có dữ liệu"
                },
                "bPaginate": false
            });
        }, null);
    })

    //===== USER TYPE CHANGE =====//
    $('#_user_category').on('change', function(e) {
        e.preventDefault();

        var user_type = $(this).val();
        if (isNaN(parseInt(user_type))) {
            toastr.warning('Có lỗi xảy ra, vui lòng thử lại');

            return false;
        }

        var data = {
            user_type: user_type,
            pageNo: 1,
            _token: $('meta[name="csrf-token"]').attr('content'),
        }
        var selectOption = $(this);
        selectOption.prop('disabled', true);
        $('#_user-table').html('<div class="text-center"><img src="' + SITE_URL + 'images/ajax-loader.svg"/></div>');
        ajaxSubmit('admin/user', 'POST', data, function(result) {
            $('#_user-table').html(result.data.view);
            $('#_search_type').val($('#_user_category').val());
            $('#tableExample3').DataTable({
                dom: "<'row'<'col-sm-4 col-sm-offset-8'f>>tp",
                "aaSorting": [],
                "language": {
                    "search": "Tìm trong trang",
                    "emptyTable": "Không có dữ liệu"
                },
                "bPaginate": false
            });
            selectOption.prop('disabled', false);
        }, function() {
            selectOption.prop('disabled', false);
        });
    });

    //===== USER PAGINATE =====//
    $('#_user-table').on('click', '.paginate_button a', function(e) {
        e.preventDefault();

        var user_type = $('#_user_category').val();
        if (isNaN(parseInt(user_type))) {
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
            user_type: user_type,
            pageNo: pageNo,
            _token: $('meta[name="csrf-token"]').attr('content'),
        }

        $('#_user-table').html('<div class="text-center"><img src="' + SITE_URL + 'images/ajax-loader.svg"/></div>');
        ajaxSubmit('admin/user', 'POST', data, function(result) {
            $('#_user-table').html(result.data.view);
            $('#tableExample3').DataTable({
                dom: "<'row'<'col-sm-4 col-sm-offset-8'f>>tp",
                "aaSorting": [],
                "language": {
                    "search": "Tìm trong trang",
                    "emptyTable": "Không có dữ liệu"
                },
                "bPaginate": false
            });
        }, null);
    });

    //===== LOCK ACCOUNT =====//
    $('#_user-table').on('click', '._lock_account', function(e) {
        e.preventDefault();
        var email = $(this).data('email');
        var confirmLock = confirm('Xác nhận khóa tài khoản: ' + email);
        if (!confirmLock) {
            toastr.info('Đã hủy thao tác');
            return false;
        }

        var reason = prompt('Lý do khóa tài khoản: ' + email);
        var isTrue = confirm('Xác nhận khóa tài khoản: ' + email + '\n' + 'Lý do: ' + reason);

        if (!isTrue) {
            toastr.info('Đã hủy thao tác');
            return false;
        }

        var userId = $(this).data('user');
        var data = {
            userId: userId,
            reason: reason,
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        $('#load_scr').css('display', 'table');
        ajaxSubmit('admin/user/lock', 'POST', data, function(result) {
            if (result.code == 200) {
                $('#user' + userId).remove();
                toastr.success(result.message);

                return true;
            }
            toastr.warning(result.message);

            return false;
        }, null);
    });

    //===== UNLOCK ACCOUNT =====//
    $('#_user-table').on('click', '._unlock_account', function(e) {
        e.preventDefault();
        var email = $(this).data('email');
        var confirmLock = confirm('Xác nhận mở khóa tài khoản: ' + email);
        if (!confirmLock) {
            toastr.info('Đã hủy thao tác');
            return false;
        }

        var userId = $(this).data('user');
        var data = {
            userId: userId,
            _token: $('meta[name="csrf-token"]').attr('content')
        };

        $('#load_scr').css('display', 'table');
        ajaxSubmit('admin/user/unlock', 'POST', data, function(result) {
            if (result.code == 200) {
                $('#user' + userId).remove();
                toastr.success(result.message);

                return true;
            }
            toastr.warning(result.message);

            return false;
        }, null);
    });

    //===== PAGINATE REQUEST =====//
    $('#_request-table').on('click', '.paginate_button a', function(e) {
        e.preventDefault();

        var url = window.location.href
        var type = url[url.length - 1];
        if (isNaN(parseInt(type))) {
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
            type: type,
            pageNo: pageNo,
            _token: $('meta[name="csrf-token"]').attr('content'),
        }

        $('#_request-table').html('<div class="text-center"><img src="' + SITE_URL + 'images/ajax-loader.svg"/></div>');
        ajaxSubmit('admin/request', 'POST', data, function(result) {
            $('#_request-table').html(result.data.view);
            $('#tableExample3').DataTable({
                dom: "<'row'<'col-sm-4 col-sm-offset-8'f>>tp",
                "aaSorting": [],
                "language": {
                    "search": "Tìm trong trang",
                    "emptyTable": "Không có dữ liệu"
                },
                "bPaginate": false
            });
        }, null);
    });

    //===== APPROVE REQUEST =====//
    $('#_approve_request').on('click', function(e) {
        e.preventDefault();

        var isTrue = confirm('Phê duyệt yêu cầu này?');

        if (!isTrue) {
            toastr.info('Đã hủy thao tác');

            return false;
        }
        $('#_approve_form').submit();
    })
});
