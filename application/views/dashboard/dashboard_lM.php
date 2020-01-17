<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title></title>
        
        <!-- <script src="<?php echo base_url() ?>assets/js/jquery.min.js" type="text/javascript"></script> --><!-- 
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
        <style type="text/css">
${demo.css}
        </style>
        <script type="text/javascript">
$(function () {
   Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'LAPORAN INCOMING & REPLY'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        /*categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],*/
        <?php 
          $tgl=date('Y');
           echo "categories: [";
                $sss = $this->db->query("SELECT date_incoming FROM tb_nasabah where date_incoming like '%$tgl%' GROUP BY DATE_FORMAT(date_incoming, '%y,%m')");
                            //$d=$sss->num_rows();
                            foreach ($sss->result_array() as $bulan) {
        echo "'".date('F',strtotime($bulan['date_incoming']))."', ";
                  }  
            echo "] ,";
            ?>
        crosshair: true
    },
    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'INCOMING',
       <?php
                echo "data: [";
                foreach ($sss->result_array() as $bulan) {
                $tgl=date('Y',strtotime($bulan['date_incoming']));
                $aa = $this->db->query("SELECT count(date_incoming) as total_pro FROM tb_nasabah where date_incoming like '%$tgl%' ");
                #var_dump("SELECT sum(nama) as total_pro FROM tb_nasabah where tgl_input like '%$tgl%'");exit();
                        foreach ($aa->result_array() as $a) {
                        echo $a['total_pro'].", ";
                        }
                    }
                echo "]";
            ?>

    }, {
        name: 'REPLY',
        <?php
                echo "data: [";
                foreach ($sss->result_array() as $bulan) {
                $tgl=date('Y',strtotime($bulan['date_incoming']));
                $aa = $this->db->query("SELECT count(date_reply) as total_pros FROM tb_nasabah where date_incoming like '%$tgl%' ");
                #var_dump("SELECT sum(nama) as total_pro FROM tb_nasabah where tgl_input like '%$tgl%'");exit();
                        foreach ($aa->result_array() as $a) {
                        echo $a['total_pros'].", ";
                        }
                    }
                echo "]";
            ?>

    }/*, {
        name: 'SLA',
        <?php
                echo "data: [";
                foreach ($sss->result_array() as $bulan) {
                $tgl=date('Y',strtotime($bulan['tgl_input']));
                $aa = $this->db->query("SELECT count(duration_sla) as total_pross FROM tb_nasabah where tgl_input like '%$tgl%' ");
                #var_dump("SELECT sum(nama) as total_pro FROM tb_nasabah where tgl_input like '%$tgl%'");exit();
                        foreach ($aa->result_array() as $a) {
                        echo $a['total_pross'].", ";
                        }
                    }
                echo "]";
            ?>

    }*//*, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7]

    }*/]
});
   Highcharts.chart('containers', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan SLA'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        /*categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],*/

        <?php 
          $tgls=date('Y');
           echo "categories: [";
                $ssss = $this->db->query("SELECT sla, date_incoming FROM tb_nasabah where date_incoming like '%$tgls%' GROUP BY DATE_FORMAT(date_incoming, '%y,%m')");
                            //$d=$sss->num_rows();
                            foreach ($ssss->result_array() as $a) {
                            $a['sla'];
        echo "'".date('F',strtotime($a['date_incoming']))."', ";
                  }  
            echo "] ,";
            ?>
        crosshair: true
    },
    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'IN SLA',
       <?php
                echo "data: [";
              foreach ($ssss->result_array() as $a) {
                $tgl=date('Y',strtotime($a['date_incoming']));
                $sla="on time";
                $aa = $this->db->query("SELECT count(date_incoming) as total_pro FROM tb_nasabah where sla='$sla' and date_incoming like'%$tgl%' ");
                #var_dump("SELECT sum(nama) as total_pro FROM tb_nasabah where tgl_input like '%$tgl%'");exit();
                        foreach ($aa->result_array() as $a) {
                        echo $a['total_pro'].", ";
                        }
                    }
                echo "]";
            ?>

    }, {
        name: 'OUT SLA',
        <?php
                echo "data: [";
                foreach ($ssss->result_array() as $a) {
                $tgl=date('Y',strtotime($a['date_incoming']));
                $outsla="tidak on time";
                $aa = $this->db->query("SELECT count(date_incoming) as total_pros FROM tb_nasabah where sla='$outsla' and date_incoming like'%$tgl%'  ");
                #var_dump("SELECT sum(nama) as total_pro FROM tb_nasabah where tgl_input like '%$tgl%'");exit();
                        foreach ($aa->result_array() as $a) {
                        echo $a['total_pros'].", ";
                        }
                    }
                echo "]";
            ?>

    }/*, {
        name: 'SLA',
        <?php
                echo "data: [";
                foreach ($sss->result_array() as $bulan) {
                $tgl=date('Y',strtotime($bulan['date_incoming']));
                $aa = $this->db->query("SELECT count(duration_sla) as total_pross FROM tb_nasabah where date_incoming like '%$tgl%' ");
                #var_dump("SELECT sum(nama) as total_pro FROM tb_nasabah where tgl_input like '%$tgl%'");exit();
                        foreach ($aa->result_array() as $a) {
                        echo $a['total_pross'].", ";
                        }
                    }
                echo "]";
            ?>

    }*//*, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7]

    }*/]
});
});
 
    </script>
    </head>
    <body>
<div id="page-content">
    <div class="row">
    <div class="col-sm-6">
        <div class="block full">
             <div class="block-title">
                    <h2><strong>LAPORAN</strong> INCOMING & REPLY</h2>
                
                    <div class="block-options pull-right"> 
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
                    </div>
                
            </div>
      
            <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="block full">
             <div class="block-title">
                    <h2><strong>LAPORAN</strong> SLA</h2>
                
                    <div class="block-options pull-right"> 
                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-primary" data-toggle="block-toggle-fullscreen"><i class="fa fa-desktop"></i></a>
                    </div>
                
            </div>
      
            <div id="containers" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
        </div>
    </div>
</div>
        <script src="<?php echo base_url() ?>assets/js/highcharts.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/highcharts-3d.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/exporting.js" type="text/javascript"></script>
         <script src="<?php echo base_url() ?>assets/js/export-data.js" type="text/javascript"></script>
     </div>
    </body>
</html>

