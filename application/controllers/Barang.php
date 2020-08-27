<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller {
  public function __construct() {
	parent::__construct();
        $this->load->model('ModelBarang');
  	}

	public function index() {
		$this->allBarang();
	}

  public function allBarang() {
    $data['all']=$this->ModelBarang->allBarang();
    $data['content']='barang/list';
    $this->load->view('template/body', $data);
  }

  public function addBarang() {
      $data['title'] = "Add Barang";
      $data['content']='barang/form_add';
      $this->load->view('template/body', $data);
  }

  public function aksiTambahBarang($tbl) {
  	$tbl = decrypt_url($tbl);
    $nama = $this->input->post('nama');
    $harga_beli = $this->input->post('harga_beli');
    $harga_jual = $this->input->post('harga_jual');
    $stok = $this->input->post('stok');
    $foto = $_FILES['foto']['name'];

    if(trim($foto) == ""){
      $data = [
        'nama'		=> $nama,
        'harga_beli'=> $harga_beli,
        'harga_jual'=> $harga_jual,
        'stok'		=> $stok
      ];
    }else{
      $data = [
        'foto'		=> $this->uploadkeun("foto", "images"),
        'nama'		=> $nama,
        'harga_beli'=> $harga_beli,
        'harga_jual'=> $harga_jual,
        'stok'		=> $stok
      ];
    }
    if ($this->ModelBarang->cekNamaBarang($tbl, $data['nama'])){
    	 $this->session->set_flashdata('pangbeja', '<div class="alert alert-danger alert-dismissible">
                                  <strong>Warning!</strong><br> Nama Barang Sudah Ada
                                  </div>');
    redirect($_SERVER['HTTP_REFERER'], 'refresh');
    }else{
      $this->ModelBarang->insertData($tbl, $data);
      $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                  Added Barang Successfully
                                  </div>');
    redirect(base_url('barang'));
	}
  }

  public function deleteBarang($id, $tbl) {
  	$id = decrypt_url($id);
  	$tbl = decrypt_url($tbl);
    $d = $this->ModelBarang->deleteData($tbl, "id", $id);
    $this->session->set_flashdata('pangbeja', '<div class="alert alert-danger alert-dismissible">
                                  Deleted Barang Successfully
                                  </div>');
    redirect(base_url('Barang'));
  }

  public function editBarang($id, $tbl) {
  	$id = decrypt_url($id);
  	$tbl = decrypt_url($tbl);
    $data['barang'] = $this->ModelBarang->findData($tbl, "id", $id);
    $data['title'] = "Edit Barang";
    $data['content']='barang/form_edit';
    $this->load->view('template/body', $data);
  }

  public function aksiEditBarang($id, $tbl) {
  	$id = decrypt_url($id);
  	$tbl = decrypt_url($tbl);
    $nama = $this->input->post('nama');
    $harga_beli = $this->input->post('harga_beli');
    $harga_jual = $this->input->post('harga_jual');
    $stok = $this->input->post('stok');
    $foto = $_FILES['foto']['name'];

    if(trim($foto) == ""){
      $data = [
        'nama'		=> $nama,
        'harga_beli'=> $harga_beli,
        'harga_jual'=> $harga_jual,
        'stok'		=> $stok
      ];
    }else{
      $data = [
        'foto'		=> $this->uploadkeun("foto", "images"),
        'nama'		=> $nama,
        'harga_beli'=> $harga_beli,
        'harga_jual'=> $harga_jual,
        'stok'		=> $stok
      ];
    }
      $this->ModelBarang->updateData($tbl, $data, "id", $id);
      $this->session->set_flashdata('pangbeja', '<div class="alert alert-success alert-dismissible">
                                  Updated Barang Successfully
                                  </div>');
    redirect(base_url('barang'));
  }

  public function uploadkeun($fileApa, $folder) {
    $config =  array(
                   'upload_path'     => "./penyimpanan_file/" . $folder . "/",
                   'allowed_types'   => "jpg|png|jpeg",
                   'encrypt_name'    => False, //
                   'max_size'        => "100", //100 KB
                   'max_height'      => "9680",
                   'max_width'       => "9024"
                 );
      $this->load->library('upload',$config);
      $this->upload->initialize($config);

      if( ! $this->upload->do_upload($fileApa))
      {
        $pesan=$this->upload->display_errors();
        $this->session->set_flashdata('pangbeja', '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning !</strong><br> '."".$pesan.'
               </div>');
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
      }else{
        $upload_data = $this->upload->data();
        $nama_file = $upload_data['file_name'];
        $ukuran_file = $upload_data['file_size'];

        //resize img + thumb Img -- Optional
        $config['image_library']     = 'gd2';
		$config['source_image']      = $upload_data['full_path'];
		$config['create_thumb']      = FALSE;
		$config['maintain_ratio']    = TRUE;
		$config['width']             = 150;
		$config['height']            = 150;

        $this->load->library('image_lib', $config);
        $this->image_lib->initialize($config);
		if (!$this->image_lib->resize()) {
          $pesan=$this->image_lib->display_errors();
          $this->session->set_flashdata('pangbeja', '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Warning !</strong><br> '."".$pesan.'
               </div>');
        redirect($_SERVER['HTTP_REFERER'], 'refresh');
        }
        return $nama_file;
      }
  }

}