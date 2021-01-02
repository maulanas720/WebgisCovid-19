<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct(){
		parent::__construct();
		/*if($this->session->logged!==true){
	      redirect('auth');
	    }*/
	    $this->load->model('KecamatanModel');
		$this->load->model('RumahsakitModel');
		$this->load->model('kasusModel');
		
	}

	public function data($jenis='kecamatan',$type='point')
	{
		header('Content-Type: application/json');
		$response=[];
		if($jenis=='kecamatan'){
			$getKecamatan=$this->KecamatanModel->get();
			foreach ($getKecamatan->result() as $row) {
				$data=null;
				$data['id_kecamatan']=$row->id_kecamatan;
				$data['kd_kecamatan']=$row->kd_kecamatan;
				$data['geojson_kecamatan']=$row->geojson_kecamatan;
				$data['warna_kecamatan']=$row->warna_kecamatan;
				$data['nm_kecamatan']=$row->nm_kecamatan;
				$response[]=$data;
			}
			echo "var dataKecamatan=".json_encode($response,JSON_PRETTY_PRINT);
		}
		elseif($jenis=='rumahsakit'){
			if($type=='point'){
				$getRumahsakit=$this->RumahsakitModel->get();
				foreach ($getRumahsakit->result() as $row) {
					$data=null;
					$data['type']="Feature";
					$data['properties']=[
												"name"=>$row->nama,
												"nama"=>$row->nama,
												"telepon"=>$row->telepon,
												"alamat"=>$row->alamat,
												"icon"=>($row->marker=='')?assets('icons/marker.png'):assets('unggah/marker/'.$row->marker),
												"popUp"=>"Nama   : ".$row->nama."<br>Telepon : ".$row->telepon."<br>Alamat  : ".$row->alamat
												];
					$data['geometry']=[
												"type" => "Point",
												"coordinates" => [$row->lng,$row->lat ] 
												];	

					$response[]=$data;
				}
				echo "var rumahsakitPoint=".json_encode($response,JSON_PRETTY_PRINT);	
			}
		}
			elseif($jenis=='kasus'){
				if($type=='point'){
					$getKasus=$this->kasusModel->get();
					foreach ($getKasus->result() as $row) {
						$data=null;
						$data['type']="Feature";
						$data['properties']=[
													"name"=>$row->nama,
													"nama"=>$row->nama,
													"positif"=>$row->positif,
													"sembuh"=>$row->sembuh,
													"mati"=>$row->mati,
													"tanggal"=>$row->tanggal,
													"icon"=>($row->marker=='')?assets('icons/marker.png'):assets('unggah/marker/'.$row->marker),
													
													"popUp"=>"Nama : ".$row->nama."<br>Positif : ".$row->positif."<br>Sembuh : ".$row->sembuh.
													"<br>Meninggal : ".$row->mati."<br>Tanggal : ".$row->tanggal
													];
						$data['geometry']=[
													"type" => "Point",
													"coordinates" => [$row->lng,$row->lat ] 
													];	
	
						$response[]=$data;
					}
					echo "var kasusPoint=".json_encode($response,JSON_PRETTY_PRINT);	
				}
			/*elseif($type=="polygon"){
				$getHotspot=$this->HotspotModel->get();
				$polygon=null;
				foreach ($getHotspot->result() as $row) {
					if($row->polygon!=NULL){
						$polygon[]=$row->polygon;
					}
				}
				echo "var latlngs=[".implode(',', $polygon)."];";
			}*/
			
		}
		
	}
}

