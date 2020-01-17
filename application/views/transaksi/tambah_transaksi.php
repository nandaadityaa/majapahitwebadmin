 <script src="<?php echo base_url();?>assets/js/vendor/jquery.min.js"></script>
<!-- sorting -->
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting-common.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting-css.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/standardista-table-sorting.js" type="text/javascript"></script>
<!-- Load and execute javascript code used only in this page -->
<script type="text/javascript">
  $(document).ready(function () {
    $(".select2").select2();
    $("#kode_barang").change(function(){
      var kode_barang = $("#kode_barang").val();
      $.ajax({
        url: "<?php echo site_url('transaksi/transaksi/ambil_harga_barang')?>",
        data: "kode_barang="+kode_barang,
        cache: false,   
        success: function(data){
          console.log(data);
          $("#harga").val(data);
        }
      });
    });
  });
    var idx = 0;
    var id = 0;
    function insert_key ()
    {
        if ($("#kode_barang").val() == '') {
            alert ('Nama Barang wajib diisi'); $("#kode_barang").focus();return false;
        /*}else if ($("#nama_sub_indikator").val() == '') {
            alert ('Nama Sub Indikator wajib diisi'); $("#nama_sub_indikator").focus();return false;*/
        }else if ($("#harga").val() == '') {
            alert ('Harga wajib diisi'); $("#harga").focus();return false;
        }
        
        var is_double = false;
        $("#item tr").each(function() {
            if ($(this).find('td:first input').val() == $("#nama_sub_indikator").val()) {
            is_double = true;
            }
        });
    
        if ( $("#mode").val() == 'edit'){
            if ( $("#old_nama_sub_indikator").val() == $("#nama_sub_indikator").val() ) {
            insert_key_print ();
            }else {
                if(is_double) {
                    alert("Nama Indikator Tidak Boleh Duplikat");
                    $("#id_produk").val('');
                    $("#id_produk").focus();
                }else{
                insert_key_print ();
                }   
            }
        }else{
            if(is_double) {
                alert("Nama Indikator Tidak Boleh Duplikat");
                $("#nama_sub_indikator").val('');
                $("#nama_sub_indikator").focus();
            } else {
            insert_key_print ();
            }   
        }       
    }
         
    function insert_key_print ()
    {
        $string = '<tr id="id_'+id+'">'+
'<td align="center">'+$("#kode_barang").val()+'<input type="hidden" name="kode_barang[]" value="'+$("#kode_barang").val()+'"></td>'+
'<td align="center">'+$("#harga").val()+'<input type="hidden" name="harga[]" value="'+$("#harga").val()+'"></td>'+
                
                '<td width="50px">'+
                '<a href="" onclick="remove_key(\''+id+'\'); return false;">Delete</a></td>'+
               '</tr>';
        if ( $("#mode").val() == 'insert')
        {
            $('#item').append( $string );
        }
        else
            {
            $('tr#id_'+$("#item_id").val()).replaceWith($string);
        }
        id++;
        set_key ('');
        update_amount();
        //$(".tunjuk").select2();
    }
    function set_key ( VAL )
    {
        $("#kode_barang").val( VAL );
        $("#harga").val( VAL );
        $("#mode").val( 'insert' );
    }
    function remove_key ( VAL )
    {
        $('.'+VAL).remove();
        $('#id_'+VAL).remove();
        //update_amount();
        return false;
    }
    
</script>


  <div id="page-content">
    <div class="block">
        <div class="block-title"> 
            <h2><strong>Penilaian</strong></h2>
            <div class="block-options pull-right"> 
                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a> 
            </div>
        </div>  
        <?php echo form_open_multipart('transaksi/transaksi/tambah_transaksi/','class="form-horizontal" id="form-validation" ');?>
        <?php echo view_errors();?>
        <div class="row">
            <div class="col-md-3" style="margin-top: -15px">
                <?php
                    $format = date('ymd');
                    $kondisi = "TRS".$format;
                    $sql=$this->db->query("SELECT kode_transaksi FROM tb_transaksi where kode_transaksi like '%$kondisi%' ORDER BY kode_transaksi DESC LIMIT 1 ");
                    $d=$sql->num_rows();

                    if($d>0){ 
                        foreach ($sql->result() as $r){
                            $d=$r->kode_transaksi; 
                        }
                        $str=substr($d,9);
                        $No_Urut = (int)$str;

                    }else{
                        $No_Urut = 0;
                    }

                    $No_Uruts = $No_Urut + 1;
                    $Nol="";
                    $nilai=4-strlen($No_Uruts);  
                    for ($i=1;$i<=$nilai;$i++){
                        $Nol= $Nol."0";
                    }

                    $kodeTransaksi ="TRS".$format.$Nol.$No_Uruts;
                ?>
                <div class='form-group' style="padding-left: 5px;padding-right: 5px">
                <?php echo form_text('Kode Tansaksi','kode_transaksi',(isset($data[0]['kode_transaksi']))?$data[0]['kode_transaksi']:$kodeTransaksi,'required="required" class="form-control" readonly placeholder="KAR-004"');?>
                </div>
            </div>
            <?php #var_dump($pemilik);exit;?>
            <div class="col-sm-3" style="margin-top: -6px">
                <div class='form-group' style="padding-left: 5px;padding-right: 5px"> 
                    <label  for="example-text-input">Nama Customer</label>
                    <div class="control-text">
                        <select  name="kode_user" id="kode_user" required="required" class="select-select2" data-placeholder="--Pilih Nama Customer--" style="width: 100%;">
                          <option value=''>--Pilih Nama Customer--</option>
                          <?php
                            foreach ($pemilik as $val) {
                              echo '<option value="'.$val[0].'">'.$val[1].'</option>';
                            }
                          ?>
                        </select>
                    </div>
                </div>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col-sm-3"style="margin-top: -6px">
                <div class='form-group' style="padding-left: 5px;padding-right: 5px">
                    <label  for="example-text-input">Nama Barang</label> 
                    <div class="control-text">
                        <select  name="kode_barang" id="kode_barang" class="select-select2" data-placeholder="--Pilih Nama Barang--" style="width: 100%;">
                          <option value=''>--Pilih Nama Barang--</option>
                          <?php
                            foreach ($pemiliks as $val) {
                              echo '<option value="'.$val[0].'">'.$val[0].'</option>';
                            }
                          ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"style="margin-top: -6px">
                <div class='form-group' style="padding-left: 5px;padding-right: 5px">
                    <label  for="example-text-input">Harga</label> 
                    <div class="control-text">
                        <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga">
                    </div>
                </div>
            </div>
            <div class="col-sm-3"style="margin-top: 15px">
                <div class='form-group'>
                    <input type="hidden" value="" name="item_id" id="item_id">
                    <?php echo form_button('insert-key','Insert','onclick="return insert_key()" class="btn btn-primary"')?> 
                </div>
            </div>
        </div><br>
        <input type="hidden" value="insert" name="mode" id="mode" >

        <div class="table-responsive">
            <table class="table multimedia table-condensed table-bordered sortable" >
                <thead>
                    <tr style="font-size:12px; background-color: aliceblue;">
                        <th  style="font-size: 12px; width:20px; padding-top:10px;padding-bottom:10px;" class="text-center">Nama Barang</th> 
                        <th  style="font-size: 12px; width:20px; padding-top:10px;padding-bottom:10px;" class="text-center">Harga</th> 
                        <th  style="font-size: 12px; width:20px; padding-top:10px;padding-bottom:10px;" class="text-center">&nbsp;</th> 
                    </tr>
                </thead>
                <tbody id="item"> 
                <?php
                ?>
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
        <div class="form-group form-actions" style="background-color: #f5f5f5;">
            <div class="col-md-6">
            <br>
                <button class="btn btn-primary" type="submit" name="submit" value="submit" id="submit" onclick="return callValidation();"> Tambah</button>
                <!-- <button type="reset" class="btn btn-sm btn-warning" tabindex="28"><i class="fa fa-repeat"></i> Reset</button> -->
            <br>&nbsp;
            </div>
            <div class="col-md-6 text-right">
            <br>
                <a href="<?php echo base_url('/transaksi/transaksi/list_transaksi')?>" id="link-reminder-login" class="btn btn-primary"> Kembali</a>
            <br>
            </div>
        </div>

    </div>
    
</div>
