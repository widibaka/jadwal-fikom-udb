<script>
function set_background() {
	// Store
	var bg_url = $('#bg_url').val();
	localStorage.setItem("bg", 'url('+ bg_url +')');

	// Check browser support
	if (typeof(Storage) !== "undefined") {
	  // Retrieve
	  $('html').css('background-image', localStorage.getItem("bg"));
	} else {
	  document.getElementById("alert-container").innerHTML = "Maaf, browser Anda tidak support Web Storage...";
	}
}

$('#terapkan').click(function() {
	set_background();
	$('.peringatan').show();
})
</script>