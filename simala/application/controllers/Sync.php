<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sync extends CI_Controller
{
        private $limit;
        private $filter;
        private $order;
        private $offset;

        private $dir_ws;
        private $host_ws;
        private $port_ws;

        private $npsn;
        private $ws_a;

        private $password_f='stm1k788688ADH1gvn@';
      	private $username_f='093111';
        // private $password_f='';
      	// private $username_f='';
        private $temp_token='';

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')) {
          redirect('auth');
        }
        else if($this->session->userdata('level') != 'baak'){
            redirect('auth/logout');
        }
        else {
          $this->load->model('App_model','app_model');
          $this->load->model('M_feeder','feeder');

          $this->limit = $this->config->item('limit');
    			$this->filter = $this->config->item('filter');
    			$this->order = $this->config->item('order');
    			$this->offset = $this->config->item('offset');

          $this->npsn=$this->username_f;

          $setting = $this->app_model->get_query("SELECT * FROM tb_setting WHERE role='A'")->result();
          foreach ($setting as $key) {
      			$this->dir_ws = $key->link;
            $this->password_f=base64_decode($key->pass_feed);
            $this->kode_feed=base64_decode($key->kode_feed);
      			$this->host_ws = parse_url($this->dir_ws, PHP_URL_HOST);
      			$this->port_ws = parse_url($this->dir_ws, PHP_URL_PORT)==''?80:parse_url($this->dir_ws, PHP_URL_PORT);
      			$ping = ping($this->host_ws,$this->port_ws);
          }

    			if (!$ping) {
    				show_error('Error, Tidak bisa menghubungi server Feeder. Jika Server Feeder berada di LAN/Internet, silahkan check koneksi LAN atau koneksi Internet Anda');
    			}
        }
    }
    public function index()
    {

      $count_mhs = $this->app_model->total_rows("v_sync_mhs");
      $count_mhs_lulus = $this->app_model->total_rows("v_sync_mhs_lulus");
      $count_mk_kur = $this->app_model->total_rows("v_sync_mk_kurikulum");
      $count_nilai = $this->app_model->total_rows("v_sync_nilai");
      $count_kelas_kuliah = $this->app_model->total_rows("v_sync_kelas_kuliah");
      $count_kelas_dosen = $this->app_model->total_rows("v_sync_kelas_dosen");
      $count_data_krs = $this->app_model->total_rows("v_sync_data_krs");
      $count_data_krs = $this->app_model->total_rows("v_sync_data_krs");
      $count_kurikulum = $this->app_model->total_rows_where("tb_kurikulum","status_upload","N");
      $count_mata_kuliah = $this->app_model->total_rows_where("tb_mata_kuliah","status_upload","N");

      $data['count_mhs'] =$count_mhs ;
      $data['count_kurikulum'] =$count_kurikulum ;
      $data['count_mata_kuliah'] =$count_mata_kuliah ;
      $data['count_mhs_lulus'] =$count_mhs_lulus;
      $data['count_mk_kur'] =$count_mk_kur;
      $data['count_nilai'] = $count_nilai;
      $data['count_kelas_kuliah'] = $count_kelas_kuliah;
      $data['count_kelas_dosen'] = $count_kelas_dosen;
      $data['count_data_krs'] = $count_data_krs;
      $data['site_title'] = 'SIMALA';
      $data['title_page'] = 'Sinkronisasi Data Ke Feeder';
      $data['assign_js'] = 'sync/js/index.js';
      load_view('sync/sync_index', $data);
    }
    public function getAkses()
    {
      $temp_db=$this->session->userdata('mode');
      $ws = $temp_db=='on'?$this->dir_ws.'live.php?wsdl':$this->dir_ws.'sandbox.php?wsdl';
      $this->feeder->url_ws($ws);
      $ws_client = new nusoap_client($ws, true);
      $temp_proxy = $ws_client->getProxy();
      $temp_error = $ws_client->getError();

      if ($temp_proxy==NULL) {
        echo "Gagal ".$temp_error." Dan ".$temp_proxy;
      }
      else {
        $this->temp_token = $temp_proxy->GetToken($this->username_f, $this->password_f);
        if ($this->temp_token=='ERROR: username/password salah') {
          echo "Error ".$this->temp_token;
        }
      }
    }
    public function mahasiswa()
    {
      $this->getAkses();
      $mahasiswa = $this->app_model->get_all_view("v_sync_mhs");
      foreach ($mahasiswa as $key) {
        $nim = $key->nim;
        $nm_mhs = $key->nm_mhs;
        $tmp_lahir =$key->tpt_lhr;
        $tgl_lahir = $key->tgl_lahir;
        $jk = trim($key->jenkel);
        $agama = trim($key->agama);
        $ds_kel = $key->alamat;
        $wilayah = trim($key->wilayah);
        $nm_ibu = $key->nm_ibu;
        $kode_prodi = trim($key->id_prodi);
        $tgl_masuk = $key->tgl_masuk;
        $smt_awal = trim($key->smt_masuk);
        $stat_mhs = trim($key->nm_status);
        $stat_awal = trim($key->status_awal);
        $filter_sms = "kode_prodi='".$kode_prodi."' AND id_sp='".$this->config->item('id_sp')."'";
        $filter_sms = "kode_prodi LIKE '%".$kode_prodi."%' AND id_sp='".$this->config->item('id_sp')."'";
        $temp_sms = $this->feeder->getrecord($this->temp_token,'sms',$filter_sms);
        $id_sms = $temp_sms['result']?$temp_sms['result']['id_sms']:'';

        $temp_data['nm_pd'] = $nm_mhs;
        $temp_data['jk'] = $jk;
        $temp_data['tmpt_lahir'] = $tmp_lahir;
        $temp_data['tgl_lahir'] = $tgl_lahir;
        $temp_data['id_agama'] = $agama;
        $temp_data['id_kk'] = 0;
        $temp_data['id_sp'] = $this->config->item('id_sp');
        $temp_data['ds_kel'] = $ds_kel;
        $temp_data['nik'] = $nim;
        $temp_data['id_wil'] = $wilayah;
        $temp_data['a_terima_kps'] = 0;
        $temp_data['stat_pd'] = $stat_mhs;
        $temp_data['id_kebutuhan_khusus_ayah'] = 0;
        $temp_data['nm_ibu_kandung'] = $nm_ibu;
        $temp_data['id_kebutuhan_khusus_ibu'] = 0;
        $temp_data['kewarganegaraan'] = 'ID';

        $temps_data['id_sms'] = $id_sms;
        $temps_data['id_sp'] = $this->config->item('id_sp');
        $temps_data['id_jns_daftar'] = $stat_awal;
        $temps_data['nipd'] = $nim;
        $temps_data['tgl_masuk_sp'] = $tgl_masuk;
        $temps_data['a_pernah_paud'] = 0;
        $temps_data['a_pernah_tk'] = 0;
        $temps_data['mulai_smt'] = $smt_awal;
        if ($stat_awal==1){
          $sks_diakui = "";
          $pt_asal = "";
          $prodi_asal = "";
        }
        else{
              $mhs_transfer = $this->app_model->get_view_by_id('v_mhs_transfer','nim',$nim);
              $sks_diakui = $mhs_transfer->sks_diakui;
              $pt_asal = $mhs_transfer->pt_asal;
              $prodi_asal = $mhs_transfer->prodi_asal;
        }

      $temp_result = $this->feeder->insertrecord($this->temp_token, "mahasiswa", $temp_data);
        if ($temp_result['result']) {
           $temps_data['id_pd'] = $temp_result['result']['id_pd'];
           $temps_result = $this->feeder->insertrecord($this->temp_token, "mahasiswa_pt", $temps_data);
           $temps_upload=array(
             'status_upload' => 'Y'
           );
           if ($temps_result['result']) {
             $cek = $this->app_model->update('tb_mhs','nim',$key->nim,$temps_upload);
             if (!$cek) {
               echo "Eror DB -> Data Berhasil Sinkron ";
             }
             else {
               echo "Data Berhasil Sinkron ";
             }
           }
           else{
             echo "Gagal Ditambahkan Ke Mahasiswa PT";
           }
        }
        else {
          echo "tidak sinkron";
        }
      }
    }

    public function mahasiswa_lulus()
    {
      $temp_data='';
      $temp_result='';
      $this->getAkses();
      $mahasiswa_lulus = $this->app_model->get_all_view("v_sync_mhs_lulus");
      foreach ($mahasiswa_lulus as $key) {
        $nim = $key->nim;
        $jenis_keluar = $key->id_jenis_keluar;
        $tgl_keluar = $key->tgl_keluar;
        $jalur_skripsi = $key->jalur_skripsi;
        $judul_skripsi = $key->judul_skripsi;
        $bulan_awal_bimbingan = $key->bln_awal_bim;
        $bulan_akhir_bimbingan = $key->bln_akhir_bim;
        $sk_yudisium = $key->sk_yudisium;
        $tgl_yudisium = $key->bln_akhir_bim;
        $ipk = $key->IPK;
        $no_seri_ijazah = $key->no_ijazah;
        $keterangan = $key->ket;

        $filter_regpd = "nipd like '%".$nim."%'";
        $filter_regpd = "nipd LIKE '%".$nim."%' AND p.id_sp='".$this->config->item('id_sp')."'";
        $temp_regpd = $this->feeder->getrecord($this->temp_token,"mahasiswa_pt",$filter_regpd);
        if ($temp_regpd['result']) {
          $id_reg_pd = $temp_regpd['result']['id_reg_pd'];
        }

        $temp_key = array('id_reg_pd' => $id_reg_pd);

        if ($jenis_keluar==4) {
          $temp_data = array('id_jns_keluar' => $jenis_keluar,
                    'tgl_keluar' => $tgl_keluar,
                    'ket' => $keterangan
                  );
        } else {
          $temp_data = array('id_jns_keluar' => $jenis_keluar,
                    'tgl_keluar' => $tgl_keluar,
                    'ket' => $keterangan,
                    'jalur_skripsi' => $jalur_skripsi,
                    'judul_skripsi' => $judul_skripsi,
                    'bln_awal_bimbingan' => $bulan_awal_bimbingan,
                    'bln_akhir_bimbingan' => $bulan_akhir_bimbingan,
                    'sk_yudisium' => $sk_yudisium,
                    'tgl_sk_yudisium' => $tgl_yudisium,
                    'ipk' => $ipk,
                    'no_seri_ijazah' => $no_seri_ijazah
                  );
        }
        $array[] = array('key'=>$temp_key,'data'=>$temp_data);

        echo json_encode($temp_data)."<br>";
        // $temp_result = $this->feeder->updaterset($this->temp_token,"mahasiswa_pt",$array);
        // $i=0;
        // if ($temp_result['result']) {
        //   foreach ($temp_result['result'] as $key) {
        //     ++$i;
        //     if ($key['error_desc']==NULL) {
        //       ++$sukses_count;
        //     } else {
        //       ++$error_count;
        //       $error_msg[] = "<h4>Error baris ".$i."</h4>".$key['error_desc'];
        //       $stat_reg = FALSE;
        //     }
        //   }
        // }
        // else {
        //   echo "<div class=\"bs-callout bs-callout-danger\"><h4>Error ".$temp_result['error_code']."</h4>".$temp_result['error_desc']."</div></div>";
        // }
      }
    }

    public function mahasiswa_transfer()
    {
      # code...
    }

    public function upload_kelas()
    {
      $id_sms = '';
      $id_mk = '';
      $sks_mk = '';
      $sks_tm = '';
      $sks_prak = '';
      $sks_prak_lap = '';
      $sks_sim = '';
      $temp_data = array();
      $sukses_count = 0;
      $error_count = 0;
      $error_msg = array();
      $sukses_msg = array();

      $this->getAkses();
      $kelas_kuliah= $this->app_model->get_all_view('v_sync_kelas_kuliah');
      foreach ($kelas_kuliah as $key) {
        $kode_mk = $key->kode_mk;
        $nm_mk = $key->nm_mk;
        $semester = trim($key->ta);
        $kelas = $key->nm_kelas;
        $kode_prodi = trim($key->kode_prodi);

        $filter_sms = "id_sp='".$this->config->item('id_sp')."' AND kode_prodi='".$kode_prodi."'";
        $temp_sms = $this->feeder->getrecord($this->temp_token,'sms',$filter_sms);
        if ($temp_sms['result']) {
          $id_sms = $temp_sms['result']['id_sms'];
        }

        $filter_mk = "kode_mk='".$kode_mk."' AND id_sms='".$id_sms."'";
        $temp_mk = $this->feeder->getrecord($this->temp_token,'mata_kuliah',$filter_mk);
        if ($temp_mk['result']) {
          $id_mk = $temp_mk['result']['id_mk'];
          $sks_mk = $temp_mk['result']['sks_mk'];
          $sks_tm = $temp_mk['result']['sks_tm']==''?'0':$temp_mk['result']['sks_tm'];
          $sks_prak = $temp_mk['result']['sks_prak']==''?'0':$temp_mk['result']['sks_prak'];
          $sks_prak_lap = $temp_mk['result']['sks_prak_lap']==''?'0':$temp_mk['result']['sks_prak_lap'];
          $sks_sim = $temp_mk['result']['sks_sim']==''?'0':$temp_mk['result']['sks_sim'];
        }
        $temp_data['id_sms'] = $id_sms;
        $temp_data['id_smt'] = $semester;
        $temp_data['id_mk'] = $id_mk;
        $temp_data['nm_kls'] = $kelas;
        $temp_data['sks_mk'] = $sks_mk;
        $temp_data['sks_tm'] = $sks_tm;
        $temp_data['sks_prak'] = $sks_prak;
        $temp_data['sks_prak_lap'] = $sks_prak_lap;
        $temp_data['sks_sim'] = $sks_sim;

        echo json_encode($temp_data);
        //$temp_result = $this->feeder->insertrecord($this->session->userdata['token'], "kelas_kuliah", $temp_data);
        // if ($temp_result['result']) {
        //   if ($temp_result['result']['error_desc']==NULL) {
        //     ++$sukses_count;
        //     $sukses_msg[] = "<h4>Sukses</h4>Kelas perkuliahan <strong>".$kode_mk."</strong> - <strong>".$nm_mk."</strong> (Kelas ".$kelas.") berhasil ditambahkan";
        //   } else {
        //     ++$error_count;
        //     $error_msg[] = "<h4>Error ".$temp_result['result']['error_code']." (".$kode_mk." - ".$nm_mk.")</h4>".$temp_result['result']['error_desc'];
        //   }
        // }
        // else {
        //   //echo "<div class=\"alert alert-danger\" role=\"alert\"><h4>Error ".$temp_result['error_code']."</h4>".$temp_result['error_desc']."</div>";
        //   echo "<div class=\"bs-callout bs-callout-danger\"><h4>Error ".$temp_result['error_code']."</h4>".$temp_result['error_desc']."</div></div>";
        //   break;
        // }
      }
    }

    public function upload_krs()
    {
      $id_mk = '';
      $id_kls = '';
      $id_reg_pd = '';
      $id_sms = '';
      $temp_data = array();
      $sukses_count = 0;
      $error_count = 0;
      $error_msg = array();
      $sukses_msg = array();
      $error_nim = array();
      $this->getAkses();
      $krs_data = $this->app_model->get_all_view('v_sync_data_krs');
      foreach ($krs_data as $key) {
        $nim = $key->nim;
        $nm_mhs = $key->nm_mhs;
        $kode_mk = $key->id_matkul;
        $nm_mk = $key->nm_mk;
        $kelas = $key->nm_kelas;
        $semester = $key->ta;
        $kode_prodi = $key->id_prodi;

        $filter_kls = "nm_kls='".$kelas."'";
        $temp_kls = $this->feeder->getrset($this->temp_token,"kelas_kuliah",$filter_kls,strpost($this->config->item('id_sp'),$kode_prodi,$kode_mk,$kelas,$semester,$nim),'','');
        if ($temp_kls['result']) {
          foreach ($temp_kls['result'] as $row) {
            $id_kls = $row['id_kls'];
            $id_reg_pd = $row['id_reg_pd'];
          }
        }
        $temp_data['id_kls'] = $id_kls;
        $temp_data['id_reg_pd'] = $id_reg_pd;
        $temp_data['asal_data'] = 9;
        echo json_encode($temp_data);
        //$temp_result = $this->feeder->insertrecord($this->session->userdata['token'], $this->table2, $temp_data);
        //var_dump($temp_result);
        // if ($temp_result['result']) {
        //   if ($temp_result['result']['error_desc']==NULL) {
        //     ++$sukses_count;
        //     $sukses_msg[] = "<h4>Sukses</h4>KRS Mahasiswa <strong>".$nm_mhs."</strong> / <strong>".$nim."</strong> mata kuliah <strong>".$kode_mk."</strong> - <strong>".$nm_mk."</strong> berhasil ditambahkan";
        //   } else {
        //     ++$error_count;
        //     $error_msg[] = "<h4>Error ".$temp_result['result']['error_code']." (".$nm_mhs." / ".$nm_mk.")</h4>".$temp_result['result']['error_desc'];
        //   }
        // } else {
        //   //echo "<div class=\"alert alert-danger\" role=\"alert\"><h4>Error ".$temp_result['error_code']."</h4>".$temp_result['error_desc']."</div>";
        //   echo "<div class=\"bs-callout bs-callout-danger\"><h4>Error ".$temp_result['error_code']."</h4>".$temp_result['error_desc']."</div></div>";
        //   break;
        // }
      }
    }

    public function feeder_to_mhs()
    {
      $b=0;
      $c=0;
      $d=0;
      $e=0;
      $f=0;
      $g=0;
      $h=0;
      $k=0;
      $this->getAkses();
      $a= $this->feeder->count_all($this->temp_token,"mahasiswa","");
      $total_data = $a['result'];
      $jumlahHal = ceil($total_data/169);
      for ($i=0; $i<=$total_data; $i=$i+$jumlahHal){
        $record_mhs = $this->feeder->getrset($this->temp_token,'mahasiswa','','','20',$i);
        foreach ($record_mhs['result'] as $key => $value) {
          $data_umum=$value;
          $record_mhs_pt = $this->feeder->getrset($this->temp_token,'mahasiswa_pt',"p.id_pd='".$value["id_pd"]."'",'','','');
          foreach ($record_mhs_pt['result'] as $key => $value) {
            $temp_filter_prodi = "id_sms='".$value["id_sms"]."'";
      			$temp_rec_prodi= $this->feeder->getrecord($this->temp_token,	'sms', $temp_filter_prodi);
            $kode_prodi_temps = $temp_rec_prodi['result'];
            $stat_mhs = $data_umum['stat_pd'];
      			$tempt_status='';
      			if ($stat_mhs == 'A'){
      				$tempt_status ='1';
      			}
      			else if ($stat_mhs == 'C'){
      				$tempt_status ='2';
      			}
      			else if ($stat_mhs == 'L'){
      				$tempt_status ='3';
      			}
      			else if ($stat_mhs == 'D'){
      				$tempt_status ='4';
      			}
      			else if ($stat_mhs == 'K'){
      				$tempt_status ='5';
      			}
      			else if ($stat_mhs == 'N'){
      				$tempt_status ='6';
      			}
      			else {
      				$tempt_status ='7';
      			}

            $temps_sync = $this->app_model->get_mahasiswa($value["nipd"]);
        		if ($temps_sync->num_rows() == 1) {
        			$b++;
        		}
            else {
              $temp_db = array(	'nim' =>$value["nipd"],
        												'nm_mhs' =>$value["nm_pd"],
        												'tpt_lhr' =>$data_umum["tmpt_lahir"],
        												'tgl_lahir' =>$data_umum["tgl_lahir"],
        												'jenkel' => $data_umum["jk"],
        												'agama' =>$data_umum["id_agama"],
        												'kelurahan'=>$data_umum["ds_kel"],
        												'wilayah'=>$data_umum["id_wil"],
        												'nm_ibu'=>$data_umum["nm_ibu_kandung"],
        												'kd_prodi'=>$kode_prodi_temps["kode_prodi"],
        												'tgl_masuk'=>$value['tgl_masuk_sp'],
        												'smt_masuk'=>$value['mulai_smt'],
        												'status_mhs'=>$tempt_status,
        												'status_awal'=>$value['id_jns_daftar'],
        												'email' => $data_umum["email"],
                                'status_upload' => 'Y'
        											);
              $result_db = $this->app_model->insertRecordMahasiswa($temp_db);
              $result_db=true;
        			if ($result_db == true) {
                $c++; //mahasiswa aktif
        				if ($value['id_jns_daftar']=='2') {
        					$temp_db_tr = array('id_trans' => NULL,
        															'id_mhs' =>$value["nipd"],
        															'sks_diakui' =>$value["sks_diakui"],
        															'pt_asal' =>$value["nm_pt_asal"],
        															'prodi_asal'=>$value["nm_prodi_asal"]
        														);
        					$result_db_tr = $this->app_model->insertRecord('tb_mhs_transfer',$temp_db_tr);
        				}

        				if ($stat_mhs=='L') {
        					$temp_db_mhs_lulus = array(
        																				'id_mhs' => $value["nipd"],
        																				'id_jns_keluar' => $value['id_jns_keluar'],
        																				'tgl_keluar'=>$value['tgl_keluar'],
        																				'jalur_skripsi'=>$value['jalur_skripsi'],
        																				'judul_skripsi'=>$value['judul_skripsi'],
        																				'bln_awal_bim'=>$value['bln_awal_bimbingan'],
        																				'bln_akhir_bim' =>$value['bln_akhir_bimbingan'],
        																				'sk_yudisium' =>$value['sk_yudisium'],
        																				'tgl_yudisium' => $value['tgl_sk_yudisium'],
        																				'IPK' => $value['ipk'],
        																				'no_ijazah' =>$value['no_seri_ijazah'],
        																				'ket' => $value['ket'],
                                                'status_upload' => 'Y'
        																		);
        					$result_db_lulus = $this->app_model->insertRecord('tb_mhs_lulus',$temp_db_mhs_lulus);
        					if ($result_db_lulus == true){
        						$d++; //mahasiswa lulus
        					}
        					else {
        						$e++; //mahasiswa gagal input lulus
        					}
        				}
        				else if($stat_mhs=='A'){
        					$nm_mhs = strtolower($value["nm_pd"]);
        					$username_baru = str_replace(' ', '', $nm_mhs);
        					$temp_user = array(
        															'id_user' =>NULL,
        															'username' => base64_encode($username_baru),
        															'password' => base64_encode($value["nipd"]),
        															'id_mhs' =>$value["nipd"],
        															'level' =>"mhs",
        															'status' =>"N"
        														);
        					$result_db_user = $this->app_model->insertRecord('login_mhs',$temp_user);
        					if ($result_db_user == true){
        						$f++; //login add berhasil
        					}
        					else {
        						$g++; //login add gagal
        					}
        				}
        				else {
        					$h++;

        				}
        			}
        			else {
        				$k++;
        			}
            }
          }
        }
      }
      $temp_akhir = array(
        'berhasil' => $c,
        'gagal_input'=>$d,
        'error'=>$e,
      );
      echo json_encode($temp_akhir);
    }

    public function feeder_to_dosen()
    {
      $temp_akhir=array();
      $this->getAkses();
      $a= $this->feeder->count_all($this->temp_token,"dosen_pt","");
      $b=0;
      $c=0;
      $d=0;
      $total_data = $a['result'];
      $jumlahHal = ceil($total_data/14);
      for ($i=0; $i<=$total_data; $i=$i+$jumlahHal){
        $record_dosen_pt = $this->feeder->getrset($this->temp_token,'dosen_pt',"p.id_thn_ajaran='2015'",'','20',$i);
        foreach ($record_dosen_pt['result'] as $key => $value) {
          $temp_filter_prodi = "id_sms='".$value["id_sms"]."'";
          $temp_rec_prodi= $this->feeder->getrecord($this->temp_token,'sms', $temp_filter_prodi);
          $kode_prodi_temps = $temp_rec_prodi['result'];

          $temp_filter_nidn = "id_ptk='".$value["id_ptk"]."'";
          $temp_rec_nidn= $this->feeder->getrecord($this->temp_token,'dosen', $temp_filter_nidn);
          $kode_nidn_temps = $temp_rec_nidn['result'];
          $temp_dosen = array(
              'nidn' => $kode_nidn_temps["nidn"],
              'nm_dosen' => $value["nm_ptk"],
              'program_studi'=>$kode_prodi_temps["kode_prodi"]
            );
          $temps_sync = $this->app_model->get_dosen($kode_nidn_temps["nidn"]);
          if ($temps_sync->num_rows() == 1) {
            $b++;
          }
          else {
            $result_db_user = $this->app_model->insertRecord('tb_dosen',$temp_dosen);
            if ($result_db_user == true){
              $c++;
            }
            else {
              $d++;
            }
          }
        }
      }
      $temp_akhir = array(
        'duplikat' => $b,
        'berhasil' => $c,
        'gagal_input'=>$d
      );
      echo json_encode($temp_akhir);
    }

    public function feeder_to_mk()
    {
      $b=0;
      $c=0;
      $d=0;
      $this->getAkses();
      $a= $this->feeder->count_all($this->temp_token,"mata_kuliah","");
      $total_data = $a['result'];
      $jumlahHal = ceil($total_data/20);
      for ($i=0; $i<=$total_data; $i=$i+$jumlahHal){
        $record_mk= $this->feeder->getrset($this->temp_token,'mata_kuliah',"",'','20',$i);
        foreach ($record_mk['result'] as $key => $value) {
          //echo "Kode MK : ".$value["kode_mk"]." NM MK : ".$value["nm_mk"]." SKS : ".$value["sks_mk"]."<br>";
          $temps_mk = array(
            'kode_mk' => $value["kode_mk"],
            'nm_mk' => $value["nm_mk"],
            'sks' =>$value["sks_mk"],
            'semester' => ""
          );
          $temps_sync = $this->app_model->get_mk($value["kode_mk"]);
          if ($temps_sync->num_rows() == 1) {
            $b++;
          }
          else {
            $result_db_user = $this->app_model->insertRecord('tb_mata_kuliah',$temps_mk);
            if ($result_db_user == true){
              $c++;
            }
            else {
              $d++;
            }
          }
        }
      }
      $temp_akhir = array(
        'duplikat' => $b,
        'berhasil' => $c,
        'gagal_input'=>$d
      );
      echo json_encode($temp_akhir);
    }

    public function feeder_to_kurikulum()
    {
      $b=0;
      $c=0;
      $d=0;
      $this->getAkses();
      $record_kurikulum= $this->feeder->getrset($this->temp_token,'kurikulum',"",'','','');
      foreach ($record_kurikulum['result'] as $key => $value) {
        $temp_filter_prodi = "id_sms='".$value["id_sms"]."'";
        $temp_rec_prodi= $this->feeder->getrecord($this->temp_token,'sms', $temp_filter_prodi);
        $kode_prodi_temps = $temp_rec_prodi['result'];
        $temp_filter_smt = "id_smt='".$value["id_smt_berlaku"]."'";
        $temp_rec_smt= $this->feeder->getrecord($this->temp_token,'semester', $temp_filter_smt);
        $smt_berlaku = $temp_rec_smt['result'];
        $temps_kur = array(
          'id_kurikulum' =>"",
          'nm_kurikulum'=>$value["nm_kurikulum_sp"],
          'ta'=>$value["id_smt_berlaku"],
          'kd_prodi'=>$kode_prodi_temps["kode_prodi"],
          'status'=>$smt_berlaku["a_periode_aktif"]
        );

        $temps_sync = $this->app_model->get_kurikulum($value["nm_kurikulum_sp"]);
        if ($temps_sync->num_rows() == 1) {
          $b++;
        }
        else {
          $result_db_user = $this->app_model->insertRecord('tb_kurikulum',$temps_kur);
          if ($result_db_user == true){
            $c++;
          }
          else {
            $d++;
          }
        }
      }
      $temp_akhir = array(
        'duplikat' => $b,
        'berhasil' => $c,
        'gagal_input'=>$d
      );
      echo json_encode($temp_akhir);
    }

    public function feeder_to_mk_kurikulum()
    {
      $b=0;
      $c=0;
      $d=0;
      $this->getAkses();
      $a= $this->feeder->count_all($this->temp_token,"mata_kuliah_kurikulum","");
      $total_data = $a['result'];
      $jumlahHal = ceil($total_data/15);
      for ($i=0; $i<=$total_data; $i=$i+$jumlahHal){
        $record_mk_kurikulum= $this->feeder->getrset($this->temp_token,'mata_kuliah_kurikulum',"",'','20',$i);
        foreach ($record_mk_kurikulum['result'] as $key => $value) {
          //echo json_encode($value);
          $data_kur_db= $this->app_model->get_query("SELECT * FROM tb_kurikulum WHERE nm_kurikulum='".$value["fk__id_kurikulum_sp"]."'")->result();
          foreach ($data_kur_db as $key) {
            $id_kur = $key->id_kurikulum;
          }
          $temps_mk_kur = array(
            'kode_mk' => $value["fk__id_mk"],
            'id_kurikulum'=>$id_kur
          );
          //echo "SELECT * FROM tb_mk_kurikulum WHERE kode_mk='".$value["fk__id_mk"]."' AND id_kurikulum='".$id_kur."'<br>";
          $temps_sync = $this->app_model->get_query("SELECT * FROM tb_mk_kurikulum WHERE kode_mk='".$value["fk__id_mk"]."' AND id_kurikulum='".$id_kur."'");
          if ($temps_sync->num_rows() == 1) {
            $b++;
          }
          else {
            $result_db_user = $this->app_model->insertRecord('tb_mk_kurikulum',$temps_mk_kur);
            if ($result_db_user == true){
              $c++;
            }
            else {
              $d++;
            }
          }
        }
      }
      $temp_akhir = array(
        'duplikat' => $b,
        'berhasil' => $c,
        'gagal_input'=>$d
      );
      echo json_encode($temp_akhir);
    }

    public function feeder_to_kelas_kul()
    {
      $b=0;
      $c=0;
      $d=0;
      $e=0;
      $this->getAkses();
      $a= $this->feeder->count_all($this->temp_token,"kelas_kuliah","");
      $total_data = $a['result'];
      $jumlahHal = ceil($total_data/150);
      for ($i=0; $i<=$total_data; $i=$i+$jumlahHal){
        $record_kelas_kul= $this->feeder->getrset($this->temp_token,'kelas_kuliah',"",'id_smt DESC','20',$i);
        foreach ($record_kelas_kul['result'] as $key => $value) {
          $data_kur_db= $this->app_model->get_query("SELECT * FROM tb_kurikulum WHERE ta='".$value["id_smt"]."'");
          if ($data_kur_db->num_rows() == 1) {
            $e++;
          }
          else{
            foreach ($data_kur_db->result() as $key) {
              $id_kur = $key->id_kurikulum;
              $temp_filter_prodi = "id_sms='".$value["id_sms"]."'";
              $temp_rec_prodi= $this->feeder->getrecord($this->temp_token,'sms', $temp_filter_prodi);
              $kode_prodi_temps = $temp_rec_prodi['result'];

              $temps_kelas_kul = array(
                'nm_kelas' => $value["nm_kls"],
                'id_matkul' => $value["kode_mk"],
                'id_kurikulum' =>$id_kur,
                'id_prodi'=>$kode_prodi_temps["kode_prodi"],
                'status_upload'=>'Y'
              );
              //echo json_encode($temps_kelas_kul)."<br>";
              $result_db_user = $this->app_model->insertRecord('tb_kelas_kul',$temps_kelas_kul);
              if ($result_db_user == true){
                $c++;
              }
              else {
                $d++;
              }
            }
          }
        }
      }
      $temp_akhir = array(
        'berhasil' => $c,
        'gagal_input'=>$d,
        'error'=>$e,
      );
      echo json_encode($temp_akhir);
    }
}
