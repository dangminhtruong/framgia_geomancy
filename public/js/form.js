$(document).ready(function() {
    //===== ADD INPUT FORM =====//
    $('#_add_prd_attr').on('click', function() {
        var template = `
            <div class="box-attr">
                <div class="form-group">
                    <input class="form-control input-sm m-t-sm width-30 _attr_name" type="text" placeholder="Tên thuộc tính">
                </div>
                <div class="form-inline">
                    <div class="form-inline zero-left-padding">
                        <div class="form-group col-md-8 zero-left-padding">
                            <input type="text" class="form-control full-width" placeholder="Giá trị">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger _remove_attr" type="button"><i class="fa fa-trash-o"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            `;
        $('.attribute-content').append(template);
    });

    //===== REMOVE INPUT FORM =====//
    $('.attribute-content').on('click', '._remove_attr', function() {
        $(this).parents().eq(3).remove();
        return true;
    });

    //===== CHANGE NAME ATTRIBUTE =====//
    $('.attribute-content').on('change', '._attr_name', function() {
        var value = $(this).val().replace(' ', '_');
        var input = $(this).parents().next().children().first().children().find('input');
        input.attr('name', value);
    });
});
