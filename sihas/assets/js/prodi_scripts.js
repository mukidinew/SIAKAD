$(document).ready(function () {
	$("#btnDaftarSkripsi").click(function(){
		$.ajax({
			url: site+"/prodi/Skripsi", 
			success: function(result){
				$("#mainContent").html(result);
				$("#breadCrumbMenu").text("Masukan Data Pendaftar Skripsi");
			}
		});
	});
	$("#btnDaftarProposal").click(function(){
		$.ajax({
			url: site+"/prodi/Proposal", 
			success: function(result){
				$("#mainContent").html(result);
				$("#breadCrumbMenu").text("Masukan Data Pendaftar Proposal");
			}
		});
	});
});

function operateFormatter(value, row, index) {
	return [
		'<a class="edit ml10 sound" href="javascript:void(0)" title="Edit">',
        '<i class="glyphicon glyphicon-edit"></i>',
        '</a>',
        
        '<a class="remove ml10 sound" href="javascript:void(0)" title="Remove">',
		'<i class="glyphicon glyphicon-remove"></i>',
		'</a>'
		].join('');
}

window.operateEvents = {
	'click .remove': function (e, value, row, index) {
	},
	'click .edit': function (e, value, row, index) {
	}
};

function myNavFunction(id) {
	$("#date-popover").hide();
	var nav = $("#" + id).data("navigation");
	var to = $("#" + id).data("to");
	console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}


