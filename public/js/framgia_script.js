$('.file').hide();
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
                    html += '<li><button type="button" class="btn btn-link product-name" value=' + result[i].id + '>' + result[i].name + '</a></li>';
                    $('#search-drop-result').html(html);
                };
                $('.product-name').click(function() {
                    var id = $(this).val();
                    var name = $(this).text();
                    var checkBox = '<div class="col-xss-12 col-xs-6 col-sm-6 col-md-4">' +
                        '<div class="checkbox-block">' +
                        '<input name="blueprint_product[]" type="checkbox" value= ' + id + ' class="checkbox" checked/>' +
                        '<label class="" for="filter_checkbox-1">' + name + '</label></div></div>';
                    $('#blueprint-prd').append(checkBox);
                });
            } else {
                html = '';
                html += '<li><button type="button" class="btn btn-link" data-toggle="collapse" data-target="#suggest-product">' +
                    'Not match ? Suggest product</a' +
                    '></li>';
                $('#search-drop-result').html(html);
            }
        }
        var dataType = 'json';
        $.get(url, data, success, dataType);
    });
});
