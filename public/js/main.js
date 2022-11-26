function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#photo").change(function() {
    readURL(this);
});



$(function() {

    $('#regiNumber').keydown(function(e) {
        var key = e.charCode || e.keyCode || 0;
        $text = $(this);
        if ($text.val().length === 2) {
            $text.val($text.val() + '-');
        }

    })
});