$(document).ready(function() {
    if (document.getElementById("DescriptionsTextArea") != undefined) {
        CKEDITOR.replace('DescriptionsTextArea', {
            height: 500
        });
    }
});
