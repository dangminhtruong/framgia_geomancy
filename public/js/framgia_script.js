$('.file').hide();
$(document).on('click', '.browse', function() {
    var file = $(this).parent().parent().parent().find('.file');
    file.trigger('click');
});

$(document).on('change', '.file', function() {
    $(this).parent().find('.form-control').val($(this).val().replace(/fakepath\\/i, ''));
});

$(document).ready(function() {
    $('.gallery1').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });

    if (document.getElementById("DescriptionsTextArea") != undefined) {
        CKEDITOR.replace('DescriptionsTextArea', {
            height: 800
        });
    }

    if (document.getElementById("edit_description") != undefined) {
        CKEDITOR.replace('edit_description', {
            height: 800
        });
    }

    var file = $(this).parent().parent().parent().find('.file');
    file.trigger('click');

    $(this).parent().find('.form-control').val($(this).val().replace(/fakepath\\/i, ''));

    $('#add_more_img').click(function() {
        $('#add_more_img').before('<div class="form-group">' +
            '<input type="file" name="img[]" class="file">' +
            '<div class="input-group col-xs-12"><span class="input-group-addon">' +
            '<i class="glyphicon glyphicon-picture"></i>' +
            '</span><input type="text" class="form-control input-lg" disabled placeholder="Upload Image">' +
            '<span class="input-group-btn"><button class="browse btn btn-primary input-lg" type="button">' +
            '<i class="glyphicon glyphicon-search"></i> Browse</button></span></div></div>');
        $('.file').hide();
    });

    $('#search_product').keyup(function() {
        var url = "/blueprint/search-product";
        var keyWord = $('#search_product').val();
        var data = {
            "keyWord": keyWord
        };
        var success = function(result) {
            if (result.length != 0) {
                html = '';
                for (i in result) {
                    html += '<li><button type="button" class="btn btn-link product-name" value=' + result[i].id + '>' +
                        result[i].name + '</a></li>';
                    $('#search-drop-result').html(html);
                };
                $('.product-name').click(function() {
                    var id = $(this).val();
                    var url = "/blueprint/search-product/" + id;
                    var success = function(respon) {
                        $('#blueprint-prd').append(respon);
                    }
                    var dataType = 'html';
                    $.get(url, success, dataType);
                });
            } else {
                html = '';
                html += '<li><button type="button" class="btn btn-link" data-toggle="modal" data-target="#suggestModalx">' +
                    'Không tìm thấy ? Đề xuất sản phẩm</a' +
                    '></li>';
                $('#search-drop-result').html(html);
            }
        }
        var dataType = 'json';
        $.get(url, data, success, dataType);
    });

    $('.btn-change-img').click(function() {

        var id = $(this).val();
        var url = "/blueprint/update-blueprint/remove-gallery/" + id;
        var data = {
            "imageId": id
        }
        var success = function(result) {
            $("#gallery" + id).remove();
            $(".galleryDetail .btn-change-img").click(function() {
                var $this = $(this).parent();
                $this.children().animate({
                    "width": "toggle"
                }, 1000, function() {
                    $this.hide();
                });
            });
        }
        var dataType = 'text';
        swal({
                title: "Bạn muốn xóa ?",
                text: "Hình ảnh này sẽ bị loại bỏ !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Thành công! Hình ảnh đã được xóa !", {
                        icon: "success",
                    });
                    $.get(url, data, success, dataType);
                } else {
                    swal("Hình ảnh đã được giữ lại !");
                }
            });
    });

    $('#btn-add-attr').click(function() {
        var id = $(this).val();
        var url = '/blueprint/create-blueprint/add-attribute/' + id;
        var success = function(result) {
            $('#add-more-attr').before(result);
            $('.remove-more-attr').click(function() {
                $(this).parents(".wrap-attr").remove();
            });
        };
        var dataType = 'html';
        $.get(url, success, dataType);
    });

    $('.delete-request').click(function() {
        var requestId = $(this).val();
        var url = "/blueprint/request-blueprint/delete/" + requestId;
        var success = function(result) {
            $('#' + requestId).remove();
        }
        var dataType = 'text';
        swal({
                title: "Bạn muốn xóa ?",
                text: "Yêu cầu thiết kế của bạn sẽ bị xóa bỏ!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Thành công! Yêu cầu thiết kế cảu bạn đã được xóa!", {
                        icon: "success",
                    });
                    $.get(url, success, dataType);
                } else {
                    swal("Hủy xóa thành công!");
                }
            });
    });

    $('#btn-add-suggest').click(function() {

        function checkNullAtribute(attribute) {
            for (i in attribute) {
                if (attribute[i] == '') {
                    return i;
                }
            }
            return 'Not null';
        }
        var name = $('#suggestName').val();
        var price = $('#suggestPrice').val();
        var categoryId = $('#categoryId').val();
        var descript = $('#suggestDescript').val();
        var attri = $('input[name="atrribute[]"]').map(function() {
            return this.value;
        }).get();

        var url = '/blueprint/suggest-product';
        var data = {
            "name": name,
            "price": Number(price),
            "categoryId": categoryId,
            "descript": descript,
            "attri": attri
        }
        var success = function(result) {
            if (result == 'existed') {
                $('#sugget_name_danger').html('Sản phẩm đã được ai đó gợi ý');
            } else {
                $('#suggest-list').append(result);
                $('#btn-suggest-reset').trigger('click');
                $('#suggestModalx').modal('hide');
                swal("Success!", "Suggested product!", "success");
                $('.remove-more-attr').trigger("click");
                $('.suggest-text').trigger("click");
            }
        }
        var dataType = 'html';

        if (name == '') {
            $('#sugget_name_danger').html('Không để trống');
        } else if (price == '' || price < 0) {
            $('#sugget_price_danger').html('Giá không hợp lệ');
        } else if (checkNullAtribute(attri) != 'Not null') {
            $('#sugget_attribute_danger').html('Không để trống');
        } else {
            $.get(url, data, success, dataType);
        }
    });

    $('.delete-blueprint').click(function() {
        var id = $(this).val();
        var url = '/blueprint/delete-blueprint/' + id;
        var data = {
            "blueprintId": id
        }
        var success = function(res) {
            if (res === 'deleted') {
                $('#blueprint' + id).remove();
            }
        }
        var dataType = 'text';

        swal({
                title: "Bạn muốn xóa ?",
                text: "Bản thiết kế này sẽ bị xóa bỏ !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Thành công! Bản thiết kế đã được xóa !", {
                        icon: "success",
                    });
                    $.get(url, data, success, dataType);
                } else {
                    swal("Hủy xóa thành công !");
                }
            });
    });

    $('.pusblish_status').change(function() {
        var id = $(this).val();
        var url = '/post/change-publish/' + id;
        var data = {
            'postId': id
        }
        var success = function(res) {
            $('#publish' + id).html(res);
        }
        var dataType = 'text';
        $.get(url, data, success, dataType);
    });

    $('.btn-fork').click(function() {
        var blueprintId = $(this).val();
        var url = '/blueprint/fork-blueprint/' + blueprintId;
        var data = {
            'id': blueprintId
        }
        var success = function(res) {
            swal("Đã sao chép !", "Bây giờ nó là của bạn!", "success");
            setTimeout(function() {
                location.replace("/blueprint/update-blueprint/" + res);
            }, 1500);
        }
        var dataType = "text";
        $.get(url, data, success, dataType);
    });

    $('.btn-message').click(function() {
        var message_id = $(this).val();
        var url = '/blueprint/update-message/' + message_id;
        var success = function(res) {
            $('#btn-mess' + message_id).html('Seen message');
        }
        var dataType = 'text';
        $.get(url, success, dataType);
    });

    $('.delete-improve-blueprint').click(function() {
        var improve_id = $(this).val();
        var url = '/blueprint/del-improve/' + improve_id;
        var success = function(res) {
            $('#improveBlueprint' + improve_id).remove();
        }
        var dataType;
        swal({
                title: "Bạn muốn xóa ?",
                text: "Bản sao thiết kế này sẽ bị xóa bỏ !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Thành công ! Đã xóa bản sao thiết kế !", {
                        icon: "success",
                    });
                    $.get(url, success, dataType);
                } else {
                    swal("Hủy xóa thành công !");
                }
            });
    });
});

$('.remove-blueprint-suggest').click(function() {
    var suggestId = $(this).val();
    var url = '/blueprint/remove-sugest/' + suggestId;
    var data = {
        'suggestId': suggestId
    }
    var success = function(res) {
        $('#suggestProduct' + suggestId).remove();
    }
    var dataType = 'text';

    swal({
            title: "Bạn muốn xóa ?",
            text: "Sản phẩm đề xuất này sẽ bị loại bỏ !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Thành công! Sản phẩm đề xuất đã được xóa !", {
                    icon: "success",
                });
                $.get(url, data, success, dataType);
            } else {
                swal("Sản phẩm đề xuất đã được giữ lại !");
            }
        });

});

$('.btn-reply').click(function() {
    var requestId = $(this).val();
    var message = $('#request-reply').val();
    var url = '/user/send-request-message';
    var data = {
        'requestId': requestId,
        'message': message
    }
    var success = function(res) {
        $('#buble-me').append(res);
        $('#request-reply').val('');
    };
    var dataType = 'html';
    $.get(url, data, success, dataType);
});

$('.remove-blueprint-product').click(function() {
    var productId = $(this).val();
    var url = '/blueprint/update-blueprint/remove-product/' + productId;
    var data = {
        'productId': productId
    }
    var success = function(res) {
        $('#bueprint_product' + productId).remove();
    }
    var dataType = 'text';

    swal({
            title: "Bạn muốn xóa ?",
            text: "Sản phẩm này sẽ bị loại bỏ !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal("Thành công! Sản phẩm đã được xóa !", {
                    icon: "success",
                });
                $.get(url, data, success, dataType);
            } else {
                swal("Sản phẩm đã được giữ lại !");
            }
        });
});
