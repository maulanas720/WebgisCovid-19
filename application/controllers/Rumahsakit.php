<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumahsakit extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('rumahsakitModel','Model');
		if($this->session->logged!==true){
			redirect('auth');
		  }
    }
	public function index()
	{
		$datacontent['title']='Halaman Rumahsakit';
		$datacontent['url']='rumahsakit';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('rumahsakit/tabelView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layouts/html',$data);
	}
	public function form($parameter='',$id='')
	{
        $datacontent['title']='Form rumahsakit';
        $datacontent['parameter']=$parameter;
        $datacontent['id']=$id;
        $datacontent['url']='rumahsakit';
        $data['content']=$this->load->view('rumahsakit/formView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layouts/html',$data);
	}
	public function apirs($parameter='',$id='')
	{
        $datacontent['title']='Halaman Rumahsakit';
		$datacontent['url']='rumahsakit';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('rumahsakit/tabelRs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layouts/html',$data);
	}

	public function apirumahsakit(){
		$html = file_get_contents("https://pikobar.jabarprov.go.id/contact");
		$xpath_doc = new DOMDocument();

		libxml_use_internal_errors(TRUE);

		if(!empty($html)){

			$xpath_doc -> loadHTML($html);
			libxml_clear_errors();
			$xpath = new DOMXPath($xpath_doc);

			//cari queri xpath
			$nama_rs = $xpath -> query('//*[@id]/h5');
			$notelp_rs = $xpath -> query('//*[@id]/p[2]/a[1]');
			$alamat_rs = $xpath -> query('//*[@id]/p[1]');
			$marker = "health.png";
			if($nama_rs -> length > 0){
				foreach ($nama_rs as $value) {
					echo $nama_rs -> nodevalue;
					echo $notelp_rs -> nodevalue;
					echo $alamat_rs -> nodevalue;
				}
			}
				
		}
		redirect('rumahsakit/apirs',$nama_rs, );
	}
	public function simpan()
	{
		if($this->input->post()){
			$data=[
				'nama'=>$this->input->post('nama'),
				'alamat'=>$this->input->post('alamat'),
				'telepon'=>$this->input->post('telepon'),
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
					redirect('rumahsakit');
					exit();
				}
			}
			// upload
			
			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_rumahsakit'=>$this->input->post('id_rumahsakit')]);
			}

		}
		redirect('rumahsakit');
	}
	public function hapus($id=''){
        // hapus file di dalam folder
		$this->db->where('id_rumahsakit',$id);
		$get=$this->Model->get()->row();
		$marker=$get->marker;
		unlink('assets/unggah/marker/'.$marker);
		// end hapus file di dalam folder
		$this->Model->delete(["id_rumahsakit"=>$id]);
		redirect('rumahsakit');
    }
}
