<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
        $('#id_krs').select2({
          placeholder: "Masukan Kata Kunci NIM | Nama | Kode MK | Nama MK | Kelas | Periode | Prodi",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'nilai/get_data_krs',
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
                    id: obj.id_data_krs,
      							text: obj.nim+ " | " +obj.nm_mhs+" | "+obj.id_matkul+" | "+obj.nm_mk+" | "+obj.ta+" | "+obj.nm_prodi
                  };
                })
              };
            },
            cache: true
          }
        });
    });
</script>
