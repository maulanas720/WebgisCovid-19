<?=content_open($title)?>
<a href="<?=site_url($url.'/apirumahsakit')?>" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah</a>
<?=$this->session->flashdata('info')?>

<?=content_close()?>  