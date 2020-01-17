 <script src="<?php echo base_url();?>assets/js/vendor/jquery.min.js"></script>
<!-- sorting -->
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting-common.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting-css.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting.js" type="text/javascript"></script>
<!-- Load and execute javascript code used only in this page -->


  <div id="page-content">
    <div class="block">
        <div class="block-title">
            <h2><strong>List User</strong></h2>
            <div class="block-options pull-right"> 
                <a href="<?php echo base_url('/user/user/tambah/')?>" class="btn btn-primary">Tambah</a>
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a> 
            </div>
        </div>  
        

        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr style=" background-color: aliceblue" id="sortableTable0">
                      <th  style="font-size: 12px;width: 3% " class="text-center" >NO</th> 
                      <th  style="font-size: 12px;width: 3% " class="text-center" >KODE USER</th> 
                      <th style="font-size: 12px; width: 10%" class="text-center" >NAMA</th> 
                      <th style="font-size: 12px;width: 10%" class="text-center" >ALAMAT</th>
                      <th style="font-size: 12px; width: 10%" class="text-center" >NO TLP</th> 
                      <th style="font-size: 12px; width: 10%" class="text-center" >TOTAL POINT</th> 
                      <th style="font-size: 12px; width: 10%" class="text-center" ><i class="fa fa-th"></i></th>
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
                    <td class="text-center"><?php echo $item['kode_user']?></td>
                    <td class="text-center"><?php echo $item['nama_cust'] ?></td>
                    <td class="text-center"><?php echo $item['alamat'] ?></td>
                    <td class="text-center"><?php echo $item['no_tlp'] ?></td>
                    <td class="text-center"><?php echo $item['point'] ?></td>
                    <td class="text-center">
                      <div class="btn-group btn-group-xs"> 
                          <a href="<?php echo base_url('/user/user/update/'.$item['kode_user']);?>" data-toggle="tooltip" title="" class="btn btn-info" data-original-title="Ubah" aria-describedby="tooltip307040"><i class="fa fa-edit"></i></a> 
                      </div>
                      <div class="btn-group btn-group-xs"> 
                          <a href="<?php echo base_url('/user/user/delete/'.$item['kode_user']);?>" onClick='return confirm("Apakah anda ingin menghapus?")' data-toggle="tooltip" title="" class="btn btn-xs btn-danger" data-original-title="delete"><i class="fa fa-trash"></i></a>
                      </div> 
                    </td>
                </tr>
                  <?php endforeach;?>
                  <?php else:?>
                  There is no data.
                  <?php endif;?> 
                </tbody>
            </table>
        </div>
        <br>
    </div>
    
</div>
