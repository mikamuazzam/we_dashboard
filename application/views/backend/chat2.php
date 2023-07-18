<!DOCTYPE html>
<html lang="en">
<?php
date_default_timezone_set('Asia/Jakarta');

$id = $this->session->userdata('user_login_id');
$dep_id = $this->session->userdata('dept');
//$basicinfo = $this->employee_model->GetBasic($id); 

if ($dep_id==7)#jprof
{
    $icon='jprof.png';
    $favicon='jprof.png';
}
else
{
    $icon='logo-icon.png';
    $favicon='favicon.PNG';
}
?>  
<head>
    <meta http-equiv="refresh" content="3600">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="GenIT Bangladesh">
    <!-- Favicon icon -->
    <?php $settingsvalue = $this->settings_model->GetSettingsValue(); ?>
    <link rel="icon" type="image/ico" sizes="16x16" href="<?php echo base_url(); ?>assets/images/<?php echo $favicon;?>">
    <title><?php echo $settingsvalue->sitetitle; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/2.0.46/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/css/print.css" rel="stylesheet" media='print'>
   
 <link href="<?php echo base_url(); ?>assets/css/chat.css" rel="stylesheet" media='all'>
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>assets/css/colors/blue.css" id="theme" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>assets/plugins/material-icons/css.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Daterange picker plugins css -->
    <link href="<?php echo base_url(); ?>assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <script>var base_url = "<?=base_url();?>";</script>
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
     <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <link href="<?php echo base_url(); ?>assets/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />   
    <link href="<?php echo base_url(); ?>assets/plugins/calendar/dist/fullcalendar.css" rel="stylesheet" type="text/css" />   
<style>
    .button1 {
	background-color: #3CD8EB;
	color: black;
	border: 1px solid #4CAF50; /* Green */
    border-radius: 10%;
    
}
    </style>
<script >
$(function() {
  
    $('#pesan').focus();
   
});
</script>
</head>

                    <div class="container d-flex justify-content-center">
                        <div class="card_chat mt-1" id="tst">
                            <?php foreach($list_chat as $value):  
                                if($this->session->userdata('user_log_id') != $value->from) {
                                ?>
                                        <div class="d-flex flex-row p-1">
                                            <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $value->em_image; ?>" width="30" height="30" style=" border-radius: 50%;">
                                            <div class="chat ml-2 p-1" style="width: 300px; "><?php echo $value->message; ?></div>
                                        </div>
                                  
                           
                                    <?php } else  { ?>
                                        <div class="d-flex flex-row p-1">
                                        <div class="bg-white mr-2 p-1" style="width: 300px; text-align: right;"><span class="text-muted"><?php echo $value->message; ?></span></div>
                                        <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $value->em_image; ?>" width="30" height="30" style=" border-radius: 50%;">
                                    </div>
                            <?php } endforeach ;?>
                            <div class="d-flex flex-row p-3">
                                <div > <textarea class="form-control" id="pesan" rows="2" cols="50" placeholder="Type your message"></textarea></div>
                                <button  class="button1" onclick="send_chat(<?php echo $this->session->userdata('user_log_id');?>)" ><font color="blue">Send</font></button>
                            </div>
                        
                        </div>
                    </div>

                     <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>

    <!-- ============================================================== -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--morris JavaScript -->
    <script src="<?php echo base_url(); ?>assets/plugins/raphael/raphael-min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/morrisjs/morris.js"></script>
    <!-- Chart JS -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0">  </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chart.piecelabel.js/0.15.0/Chart.PieceLabel.min.js



"></script>   