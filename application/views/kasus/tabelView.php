<?=content_open($title)?>
<a href="<?=site_url($url.'/form/tambah')?>" class="btn btn-success" ><i class="fa fa-plus"></i> Tambah</a>
<a href="<?=site_url($url.'/apiapi')?>" class="btn btn-success" ><i class="fa fa-plus"></i> Update Semua Data</a>
<?=$this->session->flashdata('info')?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Positif</th>
			<th>Sembuh</th>
			<th>Meninggal</th>
			<th>Tanggal</th>
			<th>Lat</th>
			<th>Lng</th>
			<th>Marker</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			foreach ($datatable->result() as $row) {
				?>
					<tr>
						<td><?=$no?></td>
						<td><?=$row->nama?></td>
						<td><?=$row->positif?></td>
						<td><?=$row->sembuh?></td>
						<td><?=$row->mati?></td>
						<td><?=$row->tanggal?></td>
						<td><?=$row->lat?></td>
						<td><?=$row->lng?></td>
						<td class="text-center"><?=($row->marker==''?'-':'<img src="'.assets('unggah/marker/'.$row->marker).'" width="40px">')?></td>
						<td>
							<a href="<?=site_url($url.'/form/ubah/'.$row->id_kasus)?>" class="btn btn-info"><i class="fa fa-edit"></i> Update</a>
							<a href="<?=site_url($url.'/hapus/'.$row->id_kasus)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
					</tr>
				<?php
				$no++;
			}

		?>
	</tbody>
</table>
<?=content_close()?>  