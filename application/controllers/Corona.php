<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Corona extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->model('TambahModel','Model');
		$this->load->model('KecamatanModel');
 
    }
 
    public function index(){
    	$url = "https://covid19-public.digitalservice.id/api/v1/rekapitulasi/jabar?level=kab";
//        $url = "https://corona.elpida.my.id/api/detail/";
        $get_url = file_get_contents($url);
        $data = json_decode($get_url);
		$contents = $data->data->content;
		foreach($contents as $content){
		    $kode_kab = $content->kode_kab;
		    $nama_kab = $content->nama_kab;
		    $positif = $content->positif;
		    $sembuh = $content->sembuh;
		    $mati = $content->meninggal;
		}
    	$datacontent['title']='Halaman Kabupaten/Kota';
		$datacontent['url']='Kecamatan';
		$datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('kasus/tabelkasus',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layouts/html',$data);
    }
    public function getjson(){
   		$url = "https://covid19-public.digitalservice.id/api/v1/rekapitulasi/jabar?level=kab";
//        $url = "https://corona.elpida.my.id/api/detail/";
        $get_url = file_get_contents($url);
        $data = json_decode($get_url, true);
		$contents = $data->data[0]->content;
		foreach($contents as $content){
		    $kode_kab = $content->kode_kab;
		    $nama_kab = $comment->nama_kab;
		    $positif = $comment->positif;
		    $sembuh = $comment->sembuh;
		    $mati = $comment->mati;
		}


    }

}