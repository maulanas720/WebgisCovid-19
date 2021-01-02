<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambahkasus extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('kasusModel','Model');
		$this->load->model('KecamatanModel');
    }
	public function index()
	{
		$datacontent['title']='Halaman Positif';
		$datacontent['url']='tambahkasus';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('kasus/tabelView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layouts/html',$data);
	}
	public function apikasus()
	{
		$url="http://jsonplaceholder.typicode.com/posts/";
		$get_url = file_get_contents($url);
		$data = json_decode($get_url);

		$data_array = array(
		'datalist' => $data
		);
		$this->load->view('kasus/tabelkkasus',$data_array);
	}


	public function form($parameter='',$id='')
	{
        $datacontent['title']='Form kasus';
        $datacontent['parameter']=$parameter;
        $datacontent['id']=$id;
        $datacontent['url']='tambahkasus';
        $data['content']=$this->load->view('kasus/formView',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layouts/html',$data);
	}
	public function apiapi(){
		$url = "https://covid19-public.digitalservice.id/api/v1/rekapitulasi/jabar?level=kab";
		$get_url = file_get_contents($url);
//        $url = "https://corona.elpida.my.id/api/detail/";
		if ($get_url == true) {
			
	        $datas = json_decode($get_url);
			$contents = $datas->data->content;
			$meta = $datas->data->metadata;
			date_default_timezone_set("Asia/Jakarta");
			$tanggal = date("Y-m-d");
			foreach($contents as $content => $value){
			    $kode_kab = $value->kode_kab;
			    $nama_kab = $value->nama_kab;
			    $positif = $value->positif;
			    $sembuh = $value->sembuh;
			    $mati = $value->meninggal;

			    $data=[
					'nama'=>$nama_kab,
					'positif'=>$positif,
					'sembuh'=>$sembuh,
					'mati'=>$mati,
					'tanggal'=>$tanggal,				
				];
				$this->Model->update($data,['id_kasus'=>$kode_kab]);
			}
				redirect('tambahkasus');
		} else{
			$info='<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Error!</h4> Data gagal Update </div>';
	    	$this->session->set_flashdata('info',$info);
	    	redirect('tambahkasus');
		}
        
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
					redirect('tambahkasus');
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
		redirect('tambahkasus');
	}
	public function hapus($id=''){
        // hapus file di dalam folder
		$this->db->where('id_kasus',$id);
		$get=$this->Model->get()->row();
		$marker=$get->marker;
		unlink('assets/unggah/marker/'.$marker);
		// end hapus file di dalam folder
		$this->Model->delete(["id_kasus"=>$id]);
		redirect('tambahkasus');
    }
}
