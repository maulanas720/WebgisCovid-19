<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeafletStandar extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->model('RumahsakitModel','Model');
		$this->load->model('KecamatanModel');
    }
	public function index()
	{
		$datacontent['title']='Halaman Leaflet Standar';
		$datacontent['url']='Leaflet Standar';
		//$datacontent['datatable']=$this->Model->get();
        $data['content']=$this->load->view('leafletstandar/mapView',$datacontent,TRUE);
        $data['js']=$this->load->view('leafletstandar/js/mapJs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layouts/html',$data);
	}
}
