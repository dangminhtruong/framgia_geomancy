$('.file').hide();
$(document).ready(function() {
    if (document.getElementById("DescriptionsTextArea") != undefined) {
        CKEDITOR.replace('DescriptionsTextArea', {
            height: 500
        });
    }
});

$(document).on('click', '.browse', function() {
    var file = $(this).parent().parent().parent().find('.file');
    file.trigger('click');
});

$(document).on('change', '.file', function() {
    $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});

$(document).ready(function() {
    $('#add_more_img').click(function() {
        $('#add_more_img').before('<div class="form-group"><input type="file" name="img[]" class="file"><div class="input-group col-xs-12"><span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span><input type="text" class="form-control input-lg" disabled placeholder="Upload Image"><span class="input-group-btn"><button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button></span></div></div>');
    	$('.file').hide();
    });
});
