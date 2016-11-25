<script type="text/javascript">
    $(document).ready(function () {
      $(".table").dataTable();

      $('#id_proposal_maju_2').select2({
        placeholder: "Masukan Kata Kunci Mahasiswa Proposal Nama | NIM | Judul",
        //minimumInputLength: 1,
        ajax: {
          url: top_url+'skripsi/getIdProposalMaju',
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
                  id: obj.id_proposal_maju,
                  text: obj.nim+" | "+obj.nm_mhs+" | "+obj.judul
                };
              })
            };
          },
          cache: true
        }
      });
    });
</script>
