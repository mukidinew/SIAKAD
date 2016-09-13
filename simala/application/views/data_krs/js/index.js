<script type="text/javascript">
    $(document).ready(function () {
      $("#mytable").dataTable();
        $("#krstable").dataTable();
        $('#id_kelas').select2({
          placeholder: "Masukan Kata Kunci Nama Kelas | kode MK | Nama MK | Periode | Jurusan",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'data_krs/getKelas',
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
      							text: "Kelas : "+obj.nm_kelas+" | "+obj.id_matkul+" | "+obj.nm_mk+" | "+obj.ta+" | "+obj.nm_prodi
                  };
                })
              };
            },
            cache: true
          }
        });

        $('#id_krs').select2({
          placeholder: "Masukan Kata Kunci NIM | Nama | Periode",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'data_krs/getMhsKrs',
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
                    id: obj.id_krs,
      							text: obj.id_mhs+ " | " +obj.nm_mhs+" | "+obj.ta
                  };
                })
              };
            },
            cache: true
          }
        });
    });
</script>
