/*-----------------------------------------
	  7. Sticky Header ------------------------
	  -----------------------------------------*/
window.onscroll = function() { myFunction() };

function myFunction() {
    if ($(window).width() > 1199) {
        if ($(window).scrollTop() > 145) {
            $('.header-wrap').addClass("stickyNav animated fadeInDown");
        } else {
            $('.header-wrap').removeClass("stickyNav fadeInDown");
        }
    }
}

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
$("#imageUpload").change(function() {
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