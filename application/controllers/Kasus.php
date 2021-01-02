<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasus extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('KasusModel','Model');
		$this->load->model('KecamatanModel');
    }
	public function index()
	{
		$datacontent['title']='Halaman Positif';
		$datacontent['url']='kasus';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('kasus/tabelView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layouts/html',$data);
	}
	public function form($parameter='',$id='')
	{
        $datacontent['title']='Form kasus';
        $datacontent['parameter']=$parameter;
        $datacontent['id']=$id;
        $datacontent['url']='kasus';
        $data['content']=$this->load->view('kasus/formView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layouts/html',$data);
	}
	public function simpan()
	{
		if($this->input->post()){
			$data=[
				'nama'=>$this->input->post('nama'),
				'positif'=>$this->input->post('positif'),
				'sembuh'=>$this->input->post('sembuh'),
				'mati'=>$this->input->post('mati'),
				'tanggal'=>$this->input->post('tanggal'),
				'lat'=>$this->input->post('lat'),
				'lng'=>$this->input->post('lng'),	
				
			];
			// upload
			if($_FILES['marker']['name']!=''){
				$upload=upload('marker','marker','image');
				if($upload['info']==true){
					$data['marker']=$upload['upload_data']['file_name'];
				}
				elseif($upload['info']==false){
					$info='<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> '.$upload['message'].' </div>';
					$this->session->set_flashdata('info',$info);
					redirect('kasus');
					exit();
				}
			}
			// upload
			
			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_kasus'=>$this->input->post('id_kasus')]);
			}

		}
		redirect('kasus');
	}
	public function hapus($id=''){
        // hapus file di dalam folder
		$this->db->where('id_kasus',$id);
		$get=$this->Model->get()->row();
		$marker=$get->marker;
		unlink('assets/unggah/marker/'.$marker);
		// end hapus file di dalam folder
		$this->Model->delete(["id_kasus"=>$id]);
		redirect('kasus');
    }
}
