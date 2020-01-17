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
                <?php echo form_open('hadiah/hadiah/tambah/','class="form-horizontal" id="form-validation" ');?>
                    <?php echo view_errors();?>
                    <div class="row">
                        <div class="col-md-3">
                            <?php
                                $format = date('ymd');
                                $kondisi = "HDH".$format;
                                $sql=$this->db->query("SELECT kode_hadiah FROM tb_hadiah where kode_hadiah like '%$kondisi%' ORDER BY kode_hadiah DESC LIMIT 1 ");
                                $d=$sql->num_rows();

                                if($d>0){ 
                                    foreach ($sql->result() as $r){
                                        $d=$r->kode_hadiah; 
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

                                $kodeHadiah ="HDH".$format.$Nol.$No_Uruts;
                            ?>
                            <div class='form-group' style="padding-left: 5px;padding-right: 5px">
                            <?php echo form_text('Kode Hadiah','kode_hadiah',(isset($data[0]['kode_hadiah']))?$data[0]['kode_hadiah']:$kodeHadiah,'required="required" class="form-control" readonly placeholder="KAR-004"');?>
                            </div>
                            <?php #echo form_text('No Document','kode_kb',(isset($data->kode_kb))?$data->kode_kb:$kodeTransaksi,'class="form-control" readonly required="required" ');?>
                        </div>
                        <div class="col-md-3">
                            <div class='form-group' style="padding-left: 5px;padding-right: 5px">
                            <?php echo form_text('Nama Hadiah','nama_hadiah',(isset($datas[0]['nama_hadiah']))?$datas[0]['nama_hadiah']:'','required="required"class="form-control" placeholder="Nama Hadiah"');?>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class='form-group' style="padding-left: 5px;padding-right: 5px">
                            <?php echo form_text('Point','point',(isset($datas[0]['point']))?$datas[0]['point']:'','required="required"class="form-control" placeholder="Alamat"');?>
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
                            <a href="<?php echo base_url('/hadiah/hadiah/list_hadiah')?>" id="link-reminder-login" class="btn btn-primary"> Kembali</a>
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