<script type="text/javascript">
    $(document).ready(function () {
      $("#mytable").dataTable();
      $("#mk_kurikulum_table").dataTable();

      $('#id_kurikulum').select2({
        placeholder: "Masukan Kata Kunci Kurikulum Nama | Periode| Kode Prodi",
        //minimumInputLength: 1,
        ajax: {
          url: top_url+'mata_kuliah_kurikulum/getKurikulum',
          type: "POST",
          dataType: 'json',
          delay: 20,
          data: function (cari) {
            return {
              q: cari.term,
              page: 20
            };
          },
          processResults: function (data) {
            return {
              results: $.map(data, function(obj) {
                return {
                  id: obj.id_kurikulum,
                  text: obj.nm_kurikulum+" | "+obj.ta+" | "+obj.kd_prodi
                };
              })
            };
          },
          cache: true
        }
      });

      $('#id_kurikulum_t').select2({
        placeholder: "Masukan Kata Kunci Kurikulum Nama | Periode| Kode Prodi",
        ajax: {
          url: top_url+'mata_kuliah_kurikulum/getKurikulum',
          type: "POST",
          dataType: 'json',
          delay: 20,
          data: function (cari) {
            return {
              q: cari.term,
              page: 20
            };
          },
          processResults: function (data) {
            return {
              results: $.map(data, function(obj) {
                return {
                  id: obj.id_kurikulum,
                  text: obj.nm_kurikulum+" | "+obj.ta+" | "+obj.kd_prodi
                };
              })
            };
          },
          cache: true
        }
      });

        $('#kd_prodi').select2({
          placeholder: "Masukan Kata Kunci Prodi Kode Prodi | Nama Prodi | Ketua",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'kurikulum/getprodi',
            type: "POST",
            dataType: 'json',
            delay: 20,
            data: function (cari) {
              return {
                q: cari.term,
                page: 20
              };
            },
            processResults: function (data) {
              return {
                results: $.map(data, function(obj) {
                  return {
                    id: obj.id_prodi,
      							text: obj.id_prodi+" | "+ obj.nm_prodi +" | "+ obj.nm_ketua
                  };
                })
              };
            },
            cache: true
          }
        });

        $("#duplikasi_mk_kur").on('submit',(function(e) {
      		e.preventDefault();
      		var urls = $("#duplikasi_mk_kur").attr("action");
      		$.ajax({
      			url: urls,
      			type: "POST",
      			data: new FormData(this),
      			//mimeType:"multipart/form-data",
      			contentType: false,
      			cache: false,
      			processData:false,
      			beforeSend:function()
      			{

      			},
      			complete:function()
      			{

      			},
      			error: function()
      			{

      			},
      			success: function(data)
      			{
              obj = JSON.parse(data);
              alert("Mata Kuliah Berhasil Di Duplikasi | Berhasil : "+obj.berhasil+" Gagal : "+obj.gagal)
      			}
      		});
      	}));
    });
</script>
