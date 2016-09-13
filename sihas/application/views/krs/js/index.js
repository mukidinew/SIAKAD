<script type="text/javascript">
    $(document).ready(function () {
        $("#krstable").dataTable();
        $("#mytable").dataTable();
        $('#id_kurikulum').select2({
          placeholder: "Masukan Kata Kunci Kurikulum Nama | Periode| Kode Prodi",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'krs/getKurikulum',
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

        $("#btnCariMatkul").click(function(){
          var id_kurikulum = $("#id_kurikulum").val();
          $('#id_matkul').select2({
            placeholder: "Masukan Kata Kunci Kelas | Kode MK | Periode",
            //minimumInputLength: 1,
            ajax: {
              url: top_url+'krs/getKelasMataKuliah/'+id_kurikulum,
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
        							text: obj.nm_mk+" | "+obj.kode_mk+" | "+obj.nm_kelas+" | "+obj.ta
                    };
                  })
                };
              },
              cache: true
            }
          });
        });
    });
</script>
