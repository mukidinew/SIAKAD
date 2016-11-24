<script type="text/javascript">
    $(document).ready(function () {
      $(".table").dataTable();
      $('#id_kurikulum').select2({
        placeholder: "Masukan Kata Kunci Kurikulum Nama | Periode| Kode Prodi",
        //minimumInputLength: 1,
        ajax: {
          url: top_url+'jadwal/getKurikulum',
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
      $('#btnCariJadwal').click(function(){
        var id_kurikulum = $("#id_kurikulum").val();
        if (id_kurikulum==null) {
          alert("Pilih Kurikulum Dahulu")
        }
        else {
          getKelasDosen(id_kurikulum);
          getRuangan();
        }
      })
    });

    //fungsi
    function getKelasDosen(a) {
      $('#id_kelas_dosen').select2({
        placeholder: "Masukan Kata Kunci",
        //minimumInputLength: 1,
        ajax: {
          url: top_url+'jadwal/getKelasDosen/'+a,
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
                  id: obj.id_kelas_dosen,
                  text: obj.nm_mk+" | "+obj.kode_mk+" | "+obj.nm_kelas
                };
              })
            };
          },
          cache: true
        }
      });
    }
    function getRuangan() {
      $('#id_ruang').select2({
        placeholder: "Masukan Kata Kunci",
        //minimumInputLength: 1,
        ajax: {
          url: top_url+'jadwal/getRuangan/',
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
                  id: obj.id_ruangan,
                  text: obj.nm_ruangan
                };
              })
            };
          },
          cache: true
        }
      });
    }
</script>
