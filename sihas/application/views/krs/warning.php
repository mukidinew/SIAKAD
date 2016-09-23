<div class="container-fluid">
  <div class="page-header" style="margin-top: 50px;">
    <div class="row" style="margin-bottom: 10px">
      <div class="col-md-12">
        <div class="col-md-6">
          <h3>
            <?php
            echo $title_page;
            ?>
          </h3>
        </div>
        <div class="col-md-6 text-center">

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="well text-center">
        <div class="center text-large innerAll">
          <i class="fa fa-5x fa-chain-broken text-danger "></i>
        </div>
        <h1 class="strong innerTB "></h1>
        <h1 class="strong innerTB  ">Perhatian!</h1>
        <h2 class="fa fa-exclamation-triangle fa-3x innerB"> Halaman Tidak Tersedia.</h2>
        <br>
        <br>
        <div class="strong text-danger">
            <h4>
              <p>
                <b>MAAF ANDA MENCOBA BELANJA MATA KULIAH DILUAR PERIODE AKTIF</b><br>
                <b>PERIODE YANG ANDA MASUKAN ADALAH <?php echo $ta ?></b><br><br>
                Periode Aktif Ditandai dengan Label Periode HIJAU pada menu list Daftar KRS Anda
              </p>
            </h4>
        </div>
      </div>
      <a href="<?php echo site_url('krs') ?>" class="btn btn-danger btn-block">Kembali Ke Menu Sebelumnya</a>
    </div>
  </div>
</div>
