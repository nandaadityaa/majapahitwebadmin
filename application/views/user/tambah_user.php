<script type="text/javascript" src="<?php echo base_url();?>assets/js/vendor/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/sweetalert.css">
<script type="text/javascript" src="<?php echo base_url();?>assets/js/sweetalert.min.js"></script>
<!-- Page content -->
<div id="page-content">
    <!-- Block Tabs -->
    <div class="block full">
        <!-- Block Tabs Title -->
        <!-- END Block Tabs Title -->
        <div class="row">
            <br>
            <legend><i class="fa fa-angle-right"></i> Tambah Data</legend>     
        </div>
        <!-- Tabs Content -->
        <div class="tab-content">
            <!-- Koperasi -->
            <div class="tab-pane active" id="pt-table-based"> 
                <?php echo form_open_multipart('user/user/tambah/','class="form-horizontal" id="form-validation" ');?>
                    <?php echo view_errors();?>
                    <div class="row">
                        <div class="col-md-3">
                            <?php
                                $format = date('ymd');
                                $kondisi = "USR".$format;
                                $sql=$this->db->query("SELECT kode_user FROM tb_user where kode_user like '%$kondisi%' ORDER BY kode_user DESC LIMIT 1 ");
                                $d=$sql->num_rows();

                                if($d>0){ 
                                    foreach ($sql->result() as $r){
                                        $d=$r->kode_user; 
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

                                $kodeTransaksi ="USR".$format.$Nol.$No_Uruts;
                            ?>
                            <div class='form-group' style="padding-left: 5px;padding-right: 5px">
                            <?php echo form_text('Kode User','kode_user',(isset($datas[0]['kode_user']))?$datas[0]['kode_user']:$kodeTransaksi,'required="required" class="form-control" readonly placeholder="KAR-004"');?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class='form-group' style="padding-left: 5px;padding-right: 5px;">
                                <?php echo form_text('Nama Customer','nama_cust',(isset($datas[0]['nama_cust']))?$datas[0]['nama_cust']:'','required="required"class="form-control" placeholder="Nama Customer"');?>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class='form-group' style="padding-left: 5px;padding-right: 5px">
                            <?php echo form_text('Alamat','alamat',(isset($datas[0]['alamat']))?$datas[0]['alamat']:'','required="required"class="form-control" placeholder="Alamat"');?>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class='form-group' style="padding-left: 5px;padding-right: 5px">
                            <?php echo form_text('No Tlp','no_tlp',(isset($datas[0]['no_tlp']))?$datas[0]['no_tlp']:'','required="required"class="form-control" placeholder="No Tlp"');?>
                            </div>
                        </div>
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
                            <a href="<?php echo base_url('/user/user/list_user')?>" id="link-reminder-login" class="btn btn-primary"> Kembali</a>
                        <br>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Mitra -->
            <!-- Provider -->
            <div class="tab-pane" id="">
            </div>
            <!-- END Form Validation Example Content -->
        </div>
        <!-- END Tabs Content -->
    </div>
    <!-- END Block Tabs -->

    <script src="<?php echo base_url();?>assets/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins.js"></script> 
    <script src="<?php echo base_url();?>assets/js/app.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/formsValidation.js"></script>
    <script>$(function() { FormsValidation.init(); });</script>
    <script type="text/javascript"> 
        function callValidation(){ 
             if(grecaptcha.getResponse().length == 0){
                document.getElementById("comfirm").style.display = "block";
                return false;
            }else{
                document.getElementById("comfirm").style.display = "none";
            }
            return true;
        }
    </script>
</div>       