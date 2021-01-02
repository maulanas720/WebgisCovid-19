<?php
$id_rumahsakit="";
$nama="";
$alamat="";
$telepon="";
$lat="";
$lng="";
if($parameter=='ubah' && $id!=''){
    $this->db->where('id_rumahsakit',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}
?>
<?=content_open('Form rumahsakit')?>
   <form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
        <?=input_hidden('id_rumahsakit',$id_rumahsakit)?>
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
    		<label>Telepon</label>
    		<div class="row">
	    		<div class="col-md-8">
	    			<?=input_text('telepon',$telepon)?>
		    	</div>
	    	</div>
    	</div>
    	<div class="form-group">
    		<label>Alamat</label>
    		<div class="row">
	    		<div class="col-md-12">
    				<?=textarea('alamat',$alamat)?>
    			</div>
    		</div>
    	</div>
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