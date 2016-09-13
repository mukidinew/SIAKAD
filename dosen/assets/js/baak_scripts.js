$(document).ready(function () {
  $(".date-picker").datepicker({
    changeYear:true,
    yearRange: "-100:+0",
    dateFormat: 'yy-mm-dd'
  });

  $("#transfer").change(function() {
    $("#transferForm").show();
  });

  $("#formMhsBaak").validate({
    rules:{
      nm_pd:{
        required: true
      },
      tmpt_lahir:{
        required: true,

      },
      tgl_lahir:{
        required: true,
        date: true
      },
      nisn:{
        required:true
      },
      email:{
        required:true,
        email:true
      },
      nik :{
        required:true
      },
      kewarganegaraan:{
        required:true
      },
      jln:{
        required:true
      },
      nm_dsn:{
        required:true
      },
      ds_kel:{
        required:true
      },
      id_wil:{
        required:true
      },
      rt_mhs:{
        required : true,
        digits: true,
  			minlength:2,
  			maxlength:2
      },
      rw_mhs:{
        required : true,
        digits: true,
  			minlength:2,
  			maxlength:2
      },
      kode_pos_mhs:{
        required : true,
        digits: true,
  			minlength:5,
  			maxlength:5
      },
      telepon_mhs:{
        required : true,
        digits: true,
  			minlength:9,
  			maxlength:9
      },
      hp_mhs:{
        required : true,
        digits: true,
  			minlength:12,
  			maxlength:12
      },
      nm_ibu_kandung:{
        required:true
      },
      tgl_lahir_ibu:{
        required:true,
        date:true
      },
      nm_ayah:{
        required:true
      },
      tgl_lahir_ayah:{
        required:true,
        date:true
      },
      nm_wali:{
        required:true
      },
      tgl_lahir_wali:{
        required:true,
        date:true
      },
      nipd:{
        required : true,
        digits: true,
  			minlength:10,
  			maxlength:10
      },
      tgl_masuk_sp:{
        required:true,
        date:true
      },
      tgl_keluar:{
        date:true
      },
      sks_diakui:{
        digits: true
      }
    },
    messages:{
      nm_pd:{
        required: "Nama Mahasiswa Harus Diisi"
      },
      tmpt_lahir:{
        required: "Masukan Tempat Lahir",
      },
      tgl_lahir :{
        required:"Masukan Tanggal Lahir",
        date:"Isi Format Tanggal Dengan Benar"
      },
      nisn: {
        required:"Masukan NISN"
      },
      email:{
        required:"Email Harus Di Isi",
        email:"Format Email Salah"
      },
      nik:{
        required:"NIK Harus Diisi"
      },
      kewarganegaraan:{
        required:"Kewarganegaraan ISI dengan Singkatan Contoh ID"
      },
      jln:{
        required:"Jalan Harus Di Isi"
      },
      nm_dsn:{
        required:"Nama Dusun Harus Diisi"
      },
      ds_kel:{
        required:"Kelurahan Harus Diisi "
      },
      id_wil:{
        required:"Wilayah Harus Diisi"
      },
      rt_mhs:{
        required : "RT Harus Diisi",
        digits: "Harus Angka",
  			minlength:"Minimal harus 2 Karakter",
  			maxlength:"Minimal harus 2 Karakter"
      },
      rw_mhs:{
        required : "RW Harus Diisi",
        digits: "Harus Angka",
  			minlength:"Minimal harus 2 Karakter",
  			maxlength:"Minimal harus 2 Karakter"
      },
      kode_pos_mhs:{
        required : "Kode Pos Harus Diisi",
        digits: "Harus Angka",
  			minlength:"Isi Dengan 5 Angka Kode Pos Yang Benar",
  			maxlength:"Isi Dengan 5 Angka Kode Pos Yang Benar"
      },
      telepon_mhs:{
        required : "Telepon Harus Diisi",
        digits: "Harus Angka",
  			minlength:"Isi Dengan 9 Angka No. Telepon Yang Benar",
  			maxlength:"Isi Dengan 9 Angka No. Telepon Yang Benar"
      },
      hp_mhs:{
        required : "Handphone Harus Diisi",
        digits: "Harus Angka",
  			minlength:"Isi Dengan 12 Angka No. HP Yang Benar",
  			maxlength:"Isi Dengan 12 Angka No. HP Yang Benar"
      },
      nm_ibu_kandung:{
        required:"Nama Ibu Kandung Harus Diisi"
      },
      tgl_lahir_ibu:{
        required:"Tanggal lahir Harus Diisi",
        date:"Masukan Format Tanggal YYYY/MM/DD"
      },
      nm_ayah:{
        required:"Nama Ayah Harus Diisi"
      },
      tgl_lahir_ayah:{
        required:"Tanggal lahir Harus Diisi",
        date:"Masukan Format Tanggal YYYY/MM/DD"
      },
      nm_wali:{
        required:"Nama Wali Tidak Boleh Kosong"
      },
      tgl_lahir_wali:{
        required:"Tanggal Lahir Wali Tidak Boleh Kosong",
        date:"Masukan Format Tanggal YYYY/MM/DD"
      },
      nipd:{
        required : "NIM Harus Diisi",
        digits: "Harus Angka",
  			minlength:"Isi Dengan 10 Digit NIM",
  			maxlength:"Isi Dengan 10 Digit NIM"
      },
      tgl_masuk_sp:{
        required:"Tanggal Masuk Perguruan Tinggi Tidak Boleh Kosong",
        date:"Masukan Format Tanggal YYYY/MM/DD"
      },
      tgl_keluar:{
        date:"Masukan Format Tanggal YYYY/MM/DD"
      },
      skhun:{
        required:"Nomor SKHUN Harus Diisi"
      },
      sks_diakui:{
        digits:"Masukan Dalam Format Angka"
      }
    }
  });
});
