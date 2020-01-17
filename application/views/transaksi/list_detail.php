 <script src="<?php echo base_url();?>assets/js/vendor/jquery.min.js"></script>
<!-- sorting -->
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting-common.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting-css.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting.js" type="text/javascript"></script>
<!-- Load and execute javascript code used only in this page -->


  <div id="page-content">
    <div class="block">
        <div class="block-title">
            <h2><strong>List Detail Penilaian</strong></h2>
            <div class="block-options pull-right"> 
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a> 
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-3" style="margin-top: -6px">
                <div class='form-group' style="padding-left: 5px;padding-right: 5px"> 
                    <label  for="example-text-input">Nama Customer</label>
                    <div class="control-text">
                        <input type="text" readonly name="nama_cust" id="nama_cust" placeholder="Nama Customer" class="form-control" value="<?php echo $data[0]['nama_cust'];?>">
                    </div>
                </div>
            </div> 
            <div class="col-sm-3"style="margin-top: -6px">
                <div class='form-group' style="padding-left: 5px;padding-right: 5px">
                    <label  for="example-text-input">Tanggal</label> 
                    <div class="control-text">
                        <input type="text" readonly name="tgl" id="tgl" placeholder="Tanggal" value="<?php echo date('d M Y', strtotime($data[0]['tgl']));?>" class="form-control " >
                    </div>
                </div>
            </div>
        </div><br>
        
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr style=" background-color: aliceblue" id="sortableTable0">
                      <th  style="font-size: 12px;width: 3% " class="text-center" >NO</th> 
                      <th  style="font-size: 12px;width: 3% " class="text-center" >NAMA BARANG</th> 
                      <th style="font-size: 12px; width: 10%" class="text-center" >HARGA</th>  
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
                    <td class="text-center"><?php echo $item['nama_barang']?></td>
                    <td class="text-center"><?php echo $item['harga'] ?></td>
                </tr>
                  <?php endforeach;?>
                  <?php else:?>
                  There is no data.
                  <?php endif;?> 
                </tbody>
            </table>
          <div class="form-group form-actions" style="background-color: #f5f5f5;">
              <div class="col-md-6">
              </div>
              <div class="col-md-6 text-right">
              <br>
                  <a href="<?php echo base_url('/transaksi/transaksi/list_transaksi')?>" id="link-reminder-login" class="btn btn-primary"> Kembali</a>
              <br>
              </div>
          </div>
        </div>
        <br>

    </div>
    
</div>
 