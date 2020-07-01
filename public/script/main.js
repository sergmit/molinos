$(document).ready(function () {
    bsCustomFileInput.init()
})

$('button.answer').each(function() {
    $(this).click(function() {
        let id = $(this).data('id');
        $('input[name="feedbackId"]').val(id);
    });
});
