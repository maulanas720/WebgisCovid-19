<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeafletPoint extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model('RumahsakitModel');
		$this->load->model('KasusModel');
		$this->load->model('KecamatanModel');
    }
	public function index()
	{
		$datacontent['title']='Halaman Leaflet Point';
		$datacontent['url']='leafletpoint';
		//$datacontent['datatable']=$this->Model->get();
        $data['content']=$this->load->view('leafletpoint/mapView',$datacontent,TRUE);
        $data['js']=$this->load->view('leafletpoint/js/mapJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layouts/html',$data);
	}
}
