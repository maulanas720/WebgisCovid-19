<?php
$id_kasus="";
$nama="";
$positif="";
$sembuh="";
$mati="";	
$tanggal="";
$lat="";
$lng="";
if($parameter=='ubah' && $id!=''){
    $this->db->where('id_kasus',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}
?>
<?=content_open('Form Positif')?>
   <form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
        <?=input_hidden('id_kasus',$id_kasus)?>
        <?=input_hidden('parameter',$parameter)?>
    	<div class="row">
        <div class="col-md-6">
    	<div class="form-group">
    		<label>Nama</label>
    		<div class="row">
	    		<div class="col-md-8">
	    			<?=input_text('nama',$nama)?>
		    	</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<label>Positif</label>
    		<div class="row">
	    		<div class="col-md-8">
	    			<?=input_text('positif',$positif)?>
		    	</div>
	    	</div>
    	</div>
    	<div class="form-group">
    	<div class="form-group">
    		<label>Sembuh</label>
    		<div class="row">
	    		<div class="col-md-8">
    				<?=textarea('sembuh',$sembuh)?>
    			</div>
    		</div>
		</div>
		<div class="form-group">
    		<label>Meninggal</label>
    		<div class="row">
	    		<div class="col-md-8">
	    			<?=input_text('mati',$mati)?>
		    	</div>
	    	</div>
		<div class="form-group">
    		<label>Tanggal</label>
    		<div class="row">
	    		<div class="col-md-8">
    				<?=input_date('tanggal',$tanggal)?>
    			</div>
    		</div>
    	</div>
    	<div class="form-group">
    	<div class="form-group">
    		<label>Titik Koordinat</label> 
    		<div class="row">
	    		<div class="col-md-6">
	    			<?=input_text('lat',$lat)?>
	    		</div>
	    		<div class="col-md-6">
	    			<?=input_text('lng',$lng)?>
	    		</div>
    		</div>
    	</div>
    	<div class="form-group">
    		<label>Marker</label>
    		<div class="row">
	    		<div class="col-md-10">
    				<?=input_file('marker','')?>
    			</div>
    		</div>
    	</div>

    </div>
    <div class="col-md-12">
        <hr>
    	<div class="form-group">
    		<button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			<a href="<?=site_url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
    	</div>
    </div>
    </div>

    </form>
<?=content_close()?>