<script type="text/javascript">
    $(document).ready(function () {
      $("#mytable").dataTable();
      $("#kurTable").dataTable();
      $("#count_validasi").dataTable();
        $('#id_dosen').select2({
          placeholder: "Masukan Kata Kunci Dosen NAMA || NIDN",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'kelas_dosen/getdosen',
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
                    id: obj.nidn,
      							text: obj.nidn+" | "+obj.nm_dosen
                  };
                })
              };
            },
            cache: true
          }
        });

        $('#id_kelas_kuliah').select2({
          placeholder: "Masukan Kata Kunci Kelas | Periode | KODE MK | NAMA MK | PRODI | Nama Kelas ",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'kelas_dosen/getDataKelas',
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
                    id: obj.id_kelas,
      							text: obj.ta+" | "+obj.kode_mk+" | "+obj.nm_mk+" | "+obj.nm_prodi+" | "+obj.nm_kelas
                  };
                })
              };
            },
            cache: true
          }
        });
    });
</script>
