<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
        $('#id_dosen_wali').select2({
          placeholder: "Masukan Kata Kunci NIDN | Nama ",
          ajax: {
            url: top_url+'mhs_wali/getDosen',
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
                    id: obj.id_dosen_wali,
      							text: obj.id_dosen+ " | " +obj.nm_dosen
                  };
                })
              };
            },
            cache: true
          }
        });
    });
</script>
