<script src="<?php echo base_url();?>assets/js/vendor/jquery.min.js"></script>
<!-- sorting -->
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting-common.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting-css.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting.js" type="text/javascript"></script>
<!-- Load and execute javascript code used only in this page -->
<div id="page-content">
  <div class="block">  
      <div class="block-title">
          <h2><strong>List Transaksi</strong></h2> 
          <div class="block-options pull-right"> 
              <a href="<?php echo base_url('/transaksi/transaksi/tambah_transaksi/')?>" class="btn btn-primary">Tambah</a>
              <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a> 
          </div>
      </div>  
      <div class="table-responsive">
          <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
              <thead>
                  <tr style=" background-color: aliceblue" id="sortableTable0">
                    <th style="font-size: 12px;width: 3%" class="text-center">NO</th> 
                    <th style="font-size: 12px;width: 3%" class="text-center">KODE TRANSAKSI</th>
                    <th style="font-size: 12px;width: 10%" class="text-center">NAMA CUSTOMER</th> 
                    <th style="font-size: 12px;width: 10%" class="text-center">TOTAL BELANJA</th> 
                    <th style="font-size: 12px;width: 10%" class="text-center"><i class="fa fa-th"></i></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                if(!empty($_GET['page'])){
                  if($_GET['page']=='2'){
                    $no=101;
                  }else{
                    $get =100*($_GET['page']-1);
                    $no=$get+1;
                  }                          
                }else{
                  $no=1;
                }  
                ?>  
                  <?php  
                  if ($data):?>
                  <?php foreach ($data as $item):?>
              <tr>
                  <td class="text-center"><?php echo $no++; ?></td>
                  <td class="text-center"><?php echo $item['kode_transaksi']?></td>
                  <td class="text-center"><?php echo $item['nama_custs']?></td>
                  <td class="text-center">
                    <?php 
                      $total='0'; 
                      $kode_transaksi=$item['kode_transaksi'];
                      $query = $this->db->query("SELECT SUM(harga) as total from tb_detail_transaksi where kode_transaksi='$kode_transaksi'");
                      foreach ($query->result() as $row){ 
                        $total = $row->total;
                      }
                    ?>
                    <?php echo number_format($total) ?></td>
                  
                  <td class="text-center">
                    <div class="btn-group btn-group-xs"> 
                        <a href="<?php echo base_url('/transaksi/transaksi/lihat_detail/'.$item['kode_transaksi']);?>" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="Lihat" aria-describedby="tooltip307040"><i class="fa fa-eye"></i></a> 
                    </div> 
                  </td>
              </tr>
                <?php endforeach;?>
                <?php else:?>
                <?php endif;?> 
              </tbody>
          </table>
      </div>
      <br>
  </div>
</div>