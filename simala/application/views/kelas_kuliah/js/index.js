<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
        $("#kurTable").dataTable();
        $('#id_kurikulum').select2({
          placeholder: "Masukan Kata Kunci Kurikulum Nama | Periode| Kode Prodi",
          //minimumInputLength: 1,
          ajax: {
            url: top_url+'kelas_kuliah/getKurikulum',
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
            placeholder: "Masukan Kata Kunci Mata Kuliah Nama | Kode | Kurikulum | Periode",
            //minimumInputLength: 1,
            ajax: {
              url: top_url+'kelas_kuliah/getMataKuliah/'+id_kurikulum,
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
                      id: obj.kode_mk,
        							text: obj.nm_mk+" | "+obj.kode_mk+" | "+obj.nm_kurikulum+" | "+obj.ta
                    };
                  })
                };
              },
              cache: true
            }
          });
          $('#id_prodi').select2({
            placeholder: "Masukan Kata Kunci Prodi Kode || Nama | Ketua",
            //minimumInputLength: 1,
            ajax: {
              url: top_url+'kelas_kuliah/getprodi',
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
        							text: obj.id_prodi+" | "+obj.nm_prodi+" | "+ obj.nm_ketua
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
