<?=content_open('kasus')?>
    <div class="card" style="font-style: Calibri;font-size:12px">
        <div class="card-header">
            <h2>Details Corona Terakhir COVID-19</h2>
        </div>
        <div class="card-header">
            <b>Last Update : </b><?php echo $datalist['data']['metadata']['last_update'];?>
        </div>
        <div class="card-body">
            <table id="data_corona" class="table table-bordered table-striped" style="font-style: Calibri;font-size:12px">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>kode_kab</th>
                        <th>nama_kab</th>
                        <th>odp_total</th>
                        <th>meninggal</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no=0;
                        foreach($datalist['data']['content'] as $row){
                            $no++;
                            foreach ($row as $key => $value ) {
                               $$key=$value;
                           }                    
                    ?>
                        <tr>
                            <td><?php echo number_format($no);?></td>
                            <td><?php echo $kode_kab;?></td>
                            <td><?php echo $nama_kab;?></td>
                            <td><?php echo $odp_total;?></td>
                            <td><?php echo $meninggal;?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>kode_kab</th>
                        <th>nama_kab</th>
                        <th>odp_total</th>
                        <th>meninggal</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?=content_close()?>