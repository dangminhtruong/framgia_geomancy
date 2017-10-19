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
            console.log(result);
            if (result.length != 0) {
                html = '';
                for (i in result) {
                    html += '<li><button type="button" class="btn btn-link product-name" value=' + result[i].id + '>' +
                        result[i].name + '</a></li>';
                    $('#search-drop-result').html(html);
                };
                $('.product-name').click(function() {
                    var id = $(this).val();
                    var name = $(this).text();
                    var checkBox = '<div class="col-xss-12 col-xs-6 col-sm-6 col-md-6">' +
                        '<div class="col-xs-6 col-sm-8"><div class="form-group">' +
                        '<label>Product\'s name: </label>' + name + '</div> </div><div class="col-xs-6 col-sm-4">' +
                        '<div class="form-group form-spin-group"><label>Quantity</label>' +
                        '<input type="text" class="form-control form-spin" name="blueprint_product[' + id + ']" value="1" /> ' +
                        '</div></div></div>';
                    $('#blueprint-prd').append(checkBox);
                });
            } else {
                html = '';
                html += '<li><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#suggest">' +
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

$(document).ready(function(){
    $('#btn-add-attr').click(function(){
        var id = $(this).val();
        var url = '/blueprint/create-blueprint/add-attribute/' + id;
        var success = function(result){
            $('#add-more-attr').before(result);
            $('#btn-add-attr').attr('value', (id +1));
        };
        var dataType = 'html';
        $.get(url,success,dataType);
    });
});
