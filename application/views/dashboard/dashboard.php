<script src="<?php echo base_url() ?>assets/js/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/exporting.js" type="text/javascript"></script>
<style type="text/css">
        ${demo.css}
</style>
<script type="text/javascript">
        $(function () {
        $('#container').highcharts({
                title: {
                        text: 'Point Customer', 
                        x: -20 //center
                },
                subtitle: {
                        text: '',
                        x: -20
                },
                xAxis: {
                        categories: ['']
                        <?php 
                            /*$queryx = $this->db->query("SELECT nama_cust from tb_user");
                        echo "categories: [";
                            foreach ($queryx->result() as $row){
                            echo "'".$row->nama_cust."', ";
                                }
                        echo "]";*/
                        ?>
                },
                yAxis: {
                        title: {
                                text: 'Persentase (%)'
                        },
                        plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                        }]
                },
                tooltip: {
                        valueSuffix: ''
                },
                legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle',
                        borderWidth: 0
                },
                series: [
                <?php 
                    $query = $this->db->query("SELECT * from tb_user");
                    foreach ($query->result() as $row){ 
                            $nama_cust=$row->nama_cust;
                            echo "{";
                            echo "name: '".$row->nama_cust."',";
                            echo "data: [";/*
                                    $x = $this->db->query("SELECT nama_cust from tb_user");
                                    foreach ($x->result() as $d){ */
                                                    #$nama_custx=$d->nama_cust;
                                                    $query = $this->db->query("SELECT point FROM tb_user where nama_cust='$nama_cust'");
                                                    foreach ($query->result() as $row){ 
                                                        echo $point = $row->point.", ";
                                                    }  
                                    #}
                            echo "]";
                            echo "},";
                    }
                ?>
                ]
        });
});
</script>
<div id="page-content">
        <div class="row">
                <div class="col-sm-12">
                        <div class="block full">
                                 <div class="block-title">
                                        <h2><strong>LAPORAN</strong> </h2>
                                        <div class="block-options pull-right"> 
                                                <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
                                        </div>
                                </div>
                                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                        </div>
                </div>
        </div>
</div>