function hapus(red){
	var x = swal({
	  title: "Hapus data?",
	  text: "Data yang anda hapus tidak dapat dikembalikan dan akan menghapus seluruh data yang terkait dengan data ini.",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Ya, hapus data!",
	  closeOnConfirm: false
	}
	,function(){
		window.location = red;
	});
	
}
