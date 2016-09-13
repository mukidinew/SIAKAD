<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();

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

        $('#kode_mk').select2({
          placeholder: "Masukan Kata Mata kuliah kurikulum kode_mk | Nama MK | Nama Kurikulum |Periode",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'mata_kuliah_kurikulum/get_mata_kuliah',
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
                    id: obj.id_kur_mk,
      							text:obj.kode_mk+" | "+obj.nm_mk+" | "+obj.nm_kurikulum+" | "+obj.ta
                  };
                })
              };
            },
            cache: true
          }
        });
    });
</script>
