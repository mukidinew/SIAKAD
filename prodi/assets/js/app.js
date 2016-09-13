$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})

$(document).on('change', '.btn-file :file', function() {
	var input = $(this),
	numFiles = input.get(0).files ? input.get(0).files.length : 1,
	label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	input.trigger('fileselect', [numFiles, label]);
});

$(document).ready( function() {
	$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
		var input = $(this).parents('.input-group').find(':text'),
		log = numFiles > 1 ? numFiles + ' files selected' : label;
		if( input.length ) {
			input.val(log);
		} else {
			if( log ) alert(log);
		}
	});
	
});

function stats(x) {
	if(x == 0) {
		$("#notif").html('<i class="fa fa-spinner fa-spin"></i>');
	} else {
		$("#notif").html('');
	}
	$.ajax({
		url: top_url+"file/check",
		cache: false,
		error: function(html) {
			//$(".stats-loading").html('<div class="info-message">We couldn\'t fetch any data, please try again.</div>');
		},
		success: function(html) {
			$("#notif").empty();
			$("#notif").delay(0).animate({"opacity": "1"}, 700);
			$("#notif").prepend($(html).filter('.notif'));
			//$("#notif").prepend($(html));
		}
	});
}
//stats(0);
setInterval(stats(), 1000);

$('a.modalButton').click(function(){
	var src = $(this).attr('data-src');
	$('#isi').html('Loading, please wait...');
	$('#isi').load(src);
});