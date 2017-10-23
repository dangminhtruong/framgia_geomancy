function ajaxSubmit(url, method, data, success_callback, error_callback)
{
    $.ajax({
        url: SITE_URL + url,
        type: method,
        data: data,
        complete: function() {
            $('#load_scr').css('display', 'none');
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
                toastr.warning('Tài khoản không được cấp quyền');
                return false;
            },
            422: function(result) {
                var errors = Object.values(result.responseJSON);
                for (let i = 0; i < errors.length; i++)
                {
                    toastr.warning(errors[i]);
                }
            }
        }
    });
}
