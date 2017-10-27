$('.file').hide();
$(document).ready(function() {
    $('.gallery1').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
});
$(document).ready(function() {
    if (document.getElementById("DescriptionsTextArea") != undefined) {
        CKEDITOR.replace('DescriptionsTextArea', {
            height: 800
        });
    }
});

$(document).on('click', '.browse', function() {
    var file = $(this).parent().parent().parent().find('.file');
    file.trigger('click');
});

$(document).on('change', '.file', function() {
    $(this).parent().find('.form-control').val($(this).val().replace(/fakepath\\/i, ''));
});

$(document).ready(function() {
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
});

$(document).ready(function() {
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
                    'Not match ? Suggest product</a' +
                    '></li>';
                $('#search-drop-result').html(html);
            }
        }
        var dataType = 'json';
        $.get(url, data, success, dataType);
    });
});

$(document).ready(function() {
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
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
                $.get(url, data, success, dataType);
            } else {
                swal("Your imaginary file is safe!");
    }
    });
    });
});

$(document).ready(function() {
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
});

$(document).ready(function() {
    $('.delete-request').click(function() {
        var requestId = $(this).val();
        var url = "/blueprint/request-blueprint/delete/" + requestId;
        var success = function(result) {
            $('#' + requestId).remove();
        }
        var dataType = 'text';
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this blueprint request!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your blueprint request has been deleted!", {
                    icon: "success",
                });
                $.get(url, success, dataType);
            } else {
                swal("Your blueprint request is safe!");
    }
    });
    });
});

$(document).ready(function() {
    $('#btn-add-suggest').click(function() {
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
            "price": price,
            "categoryId": categoryId,
            "descript": descript,
            "attri": attri
        }
        var success = function(result) {
            $('#suggest-list').append(result);
            $('#btn-suggest-reset').trigger('click');
            $('#suggestModalx').modal('hide');
            $('.remove-more-attr').trigger("click");
        }
        var dataType = 'html';
        $.get(url, data, success, dataType);
    });
});

$(document).ready(function() {
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
            title: "Are you sure?",
            text: "Once devared, you will not be able to recover this blueprint!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your blueprint has been deleted!", {
                    icon: "success",
                });
                $.get(url, data, success, dataType);
            } else {
                swal("Your blueprint is safe!");
    }
    });
    });
});

$(document).ready(function() {
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
});

$(document).ready(function() {
    $('.btn-fork').click(function() {
        var blueprintId = $(this).val();
        var url = '/blueprint/fork-blueprint/' + blueprintId;
        var data = {
            'id': blueprintId
        }
        var success = function(res) {
            if (res === 'forked') {
                swal("Forked !", "Now it your blueprint!", "success");
            } else {
                swal("You already fork it");
            }
        }
        var dataType = "text";
        $.get(url, data, success, dataType);
    });
});
