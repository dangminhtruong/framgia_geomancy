function ajaxSubmit(url, method, data, success_callback, error_callback)
{
    $.ajax({
        url: SITE_URL + url,
        type: method,
        data: data,
        beforeSend: function() {
            // $('#load_scr').css('display', 'table');
        },
        complete: function() {
            // $('#load_scr').css('display', 'none');
        },
        success: function(result) {
            if (success_callback != null) {
                success_callback(result);
            }
        },
        error: function(result) {
            if (error_callback != null) {
                error_callback(result);
            }
        },
        statusCode: {
            403: function() {
                //$('#load_scr').css('display', 'none');
                toastr.warning('Có lỗi xảy ra, vui lòng thử lại');
                return false;
            },
            422: function(result) {
                var errors = result.responseJSON;
                for ($i = 0; $i < errors.length; $i++)
                {
                    toastr.error(errors[$i]);
                }
                return false;
            }
        }
    });
}
