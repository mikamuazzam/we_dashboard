<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<link href="<?php echo base_url(); ?>assets/css/chat.css" rel="stylesheet" media='all'>
<script>
$(function() {
   
   $('#isian').scrollTop($('#isian')[0].scrollHeight);
  
});
</script>
      <div class="page-wrapper">
            <br>
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 align-self-right">
                    <h5 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                        Event Dashboard </h5>
                    </div>
                    
                </div>
                
                <!-- ============================================================== -->
            </div>
            <div class="container-fluid">
            
                <!-- --------------------------Core bisnsi YTD ------->
                <div class="row">    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">List Events - <?php echo $date = date('M Y');?></h6>
                            <font color="#EC6C50" size="2px"><b>*Tentatif</b></font>
                                <div class="">
                                    <table id="weblist1"  class="display table table-hover table-striped table-bordered" width="100%">
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">List Events - <?php echo $date = date('M Y', strtotime('+1 month'));?></h6>
                                <font color="#EC6C50" size="2px"><b>*Tentatif</b></font>
                                <div class="" >
                                    <table id="weblist2" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">List Events - <?php echo $date = date('M Y', strtotime('+2 month'));?> </h6>
                            <font color="#EC6C50" size="2px"><b>*Tentatif</b></font>
                                <div class="" >
                                    <table id="weblist3" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                

                <div class="row">    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Events Summary - <?php echo $date = date('M Y');?></h6>
                                <div class="" >
                                <canvas id="event1" height="250px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Events Summary - <?php echo $date = date('M Y', strtotime('+1 month'));?></h6>
                                <div class="" >
                                <canvas id="event2" height="250px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Events Summary - <?php echo $date = date('M Y', strtotime('+2 month'));?> </h6>
                                <div class="" >
                                <canvas id="event3" height="250px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="row">    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Events Summary Revenue - <?php echo $date = date('M Y');?></h6>
                                <div class="" >
                                    <span id="jumlah"></span>
                                <canvas id="event_rev1" height="250px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Events Summary Revenue - <?php echo $date = date('M Y', strtotime('+1 month'));?></h6>
                                <div class="" >
                                <canvas id="event_rev2" height="250px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Events Summary Revenue - <?php echo $date = date('M Y', strtotime('+2 month'));?> </h6>
                                <div class="" >
                                <canvas id="event_rev3" height="250px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" >
                            <h6 class="card-title">Detail Events Progress  - <?php echo $date = date('M Y', strtotime('-1 month'));?></h6>
                            <div class="" >
                                <table id="list_event4" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead >
                                            <?php if($this->session->userdata('dept') == '9') {$pred='Potensi';} else { $pred='Prediction';} ;?>
                                            <tr bgcolor="#CDEBF4" style="border: 1px solid #CCC;">
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">No</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2" >Partner</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2" >Tema</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Schedule</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Budget</th>
                                                <th colspan="3" style="text-align:center;">Revenue</th>
                                                
                                                <th  style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">DayEvent</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">BM</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Progress</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Status</th> 
                                            </tr>
                                            <tr bgcolor="#CDEBF4" style="border: 1px solid black;">
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" ><?php echo $pred;?></th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" >PO</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;">Waiting PO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i=1; 
                                            $tot_pred=0;
                                            $tot_budget=0;
                                            $tot_po=0;
                                            $tot_waiting=0;
                                            foreach($list_event4 as $value): 
                                                if($value->warna=='red') $stt='Warning';
                                                else if ($value->warna=='green') $stt='Done';
                                                else $stt='OK';


                                                $tot_pred=$tot_pred+$value->pred;
                                                $tot_budget=$tot_budget + $value->budget ;
                                                $tot_po=$tot_po + $value->sales;
                                                $tot_waiting=$tot_waiting + $value->deal;
                                            ?>
                                            <tr >

                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value->nama_partner; ?></td>
                                                <td><?php echo $value->tema; ?></td>
                                               
                                                <td><?php echo $value->schedule; ?></td>
                                                <?php if($this->session->userdata('dept') == 9) { ?>
                                                <td align="right"><button  onclick="get_budget(<?php echo $value->event_id; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->budget); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->budget); ?></font></button></td>
                                                <td align="right"><button  onclick="get_potensi(<?php echo $value->event_id; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->pred); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->pred); ?></font></button></td>
                                                <?php } else { ?>
                                                    <td align="right"><?php echo  number_format($value->budget); ?></td>
                                                <td align="right"><b><?php echo  number_format($value->pred); ?></b></td>
                                                <?php }?>
                                                <td align="right"><button  onclick="get_sales(<?php echo $value->id_product; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->sales); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->sales); ?></font></button></td>
                                                <td align="right"><button  onclick="get_deal(<?php echo $value->id_product; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->deal); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->deal); ?></font></button></td>
                                                <td align="center"><?php echo 'H-'.$value->day; ?></td>
                                                <td align="right"><?php echo $value->benchmark; ?></td>
                                                <td> <span class="p-1"><?php echo  $value->persen.' %'; ?></span> <progress value="<?php echo  $value->persen; ?>" max="100" width="80%"></progress></td>
                                                <td>
                                                       <?php if(!empty($value->event_id)) 
                                                       {
                                                                if($value->warna=='red') $button="red";
                                                                else if ($value->warna=='green') $button="blue";
                                                                else $button="green"; 
                                                        
                                                                if($this->session->userdata('dept') == 9)
                                                                {
                                                        ?>
                                                                    <button onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                                <?php } else { ?>
                                                                    <button onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                                <?php }?>
                                                        <?php }?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                           
                                            
                                        </tbody>
                                        <thead>
                                        <tr bgcolor="#CDEBF4" style="border: 1px solid #CCC;">
                                                <th style="text-align:right; border: 1px solid #CCC;" colspan="4" >Total </th>
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_budget); ?></th>
                                                <th style="text-align:right;   border: 1px solid #CCC;"><?php echo  number_format($tot_pred); ?></th>
                                               
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_po); ?></th>
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_waiting); ?></th>
                                                <th style="text-align:right; border: 1px solid #CCC;" colspan="4"></th>
                                                
                                            </tr>
                                        </thead>
                                    </table>
                            </div>
                            </div>
                        </div>
                    </div>  
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" >
                            <h6 class="card-title">Detail Events Progress  - <?php echo $date = date('M Y');?></h6>
                            <div class="" >
                                <table id="list_event" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead >
                                            <tr bgcolor="#CDEBF4" style="border: 1px solid #CCC;">
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">No</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2" >Partner</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2" >Tema</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Schedule</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Budget</th>
                                                <th colspan="3" style="text-align:center;">Revenue</th>
                                                
                                                <th  style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">DayEvent</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">BM</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Progress</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Status</th> 
                                            </tr>
                                            <tr bgcolor="#CDEBF4" style="border: 1px solid black;">
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" ><?php echo $pred;?></th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" >PO</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;">Waiting PO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i=1; 
                                             $tot_pred=0;
                                             $tot_budget=0;
                                             $tot_po=0;
                                             $tot_waiting=0;
                                             foreach($list_event1 as $value): 
                                                 if($value->warna=='red') $stt='Warning';
                                                 else if ($value->warna=='green') $stt='Done';
                                                 else $stt='OK';
 
 
                                                 $tot_pred=$tot_pred+$value->pred;
                                                 $tot_budget=$tot_budget + $value->budget ;
                                                 $tot_po=$tot_po + $value->sales;
                                                 $tot_waiting=$tot_waiting + $value->deal;
                                            ?>
                                            <tr >

                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value->nama_partner; ?></td>
                                                <td><?php echo $value->tema; ?></td>
                                                <td><?php echo $value->schedule; ?></td>
                                                <?php if($this->session->userdata('dept') == 9) { ?>
                                                <td align="right"><button  onclick="get_budget(<?php echo $value->event_id; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->budget); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->budget); ?></font></button></td>
                                                <td align="right"><button  onclick="get_potensi(<?php echo $value->event_id; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->pred); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->pred); ?></font></button></td>
                                                <?php } else { ?>
                                                    <td align="right"><?php echo  number_format($value->budget); ?></td>
                                                <td align="right"><b><?php echo  number_format($value->pred); ?></b></td>
                                                <?php }?>
                                                <td align="right"><button  onclick="get_sales(<?php echo $value->id_product; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->sales); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->sales); ?></font></button></td>
                                                <td align="right"><button  onclick="get_deal(<?php echo $value->id_product; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->deal); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->deal); ?></font></button></td>
                                                <td align="center"><?php echo 'H-'.$value->day; ?></td>
                                                <td align="right"><?php echo $value->benchmark; ?></td>
                                                <td> <span class="p-1"><?php echo  $value->persen.' %'; ?></span> <progress value="<?php echo  $value->persen; ?>" max="100" width="80%"></progress></td>
                                                <td>
                                                       <?php if(!empty($value->event_id)) {
                                                        if($value->warna=='red') $button="red";
                                                        else if ($value->warna=='green') $button="blue";
                                                        else $button="green"; 
                                                        if($this->session->userdata('dept') == 9)
                                                        {
                                                ?>
                                                            <button onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                        <?php } else { ?>
                                                            <button onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                        <?php }?>
                                                <?php }?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <thead>
                                        <tr bgcolor="#CDEBF4" style="border: 1px solid #CCC;">
                                                <th style="text-align:right; border: 1px solid #CCC;" colspan="4" >Total </th>
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_budget); ?></th>
                                                <th style="text-align:right;   border: 1px solid #CCC;"><?php echo  number_format($tot_pred); ?></th>
                                               
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_po); ?></th>
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_waiting); ?></th>
                                                <th style="text-align:right; border: 1px solid #CCC;" colspan="4"></th>
                                                
                                            </tr>
                                        </thead>
                                    </table>
                            </div>
                            </div>
                        </div>
                    </div>  
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" >
                            <h6 class="card-title">Detail Events Progress  -  <?php echo $date = date('M Y', strtotime('+1 month'));?></h6>
                            <div class="" >
                                <table id="list_event" class="display table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead >
                                            <tr bgcolor="#CDEBF4" style="border: 1px solid #CCC;">
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">No</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2" >Partner</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2" >Tema</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Schedule</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Budget</th>
                                                <th colspan="3" style="text-align:center;">Revenue</th>
                                                
                                                <th  style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">DayEvent</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">BM</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Progress</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Status</th> 
                                            </tr>
                                            <tr bgcolor="#CDEBF4" style="border: 1px solid black;">
                                            <th style="vertical-align: middle; border: 1px solid #CCC;" ><?php echo $pred;?></th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" >PO</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;">Waiting PO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; 
                                            $tot_pred=0;
                                            $tot_budget=0;
                                            $tot_po=0;
                                            $tot_waiting=0;
                                            foreach($list_event2 as $value): 
                                                if($value->warna=='red') $stt='Warning';
                                                else if ($value->warna=='green') $stt='Done';
                                                else $stt='OK';


                                                $tot_pred=$tot_pred+$value->pred;
                                                $tot_budget=$tot_budget + $value->budget ;
                                                $tot_po=$tot_po + $value->sales;
                                                $tot_waiting=$tot_waiting + $value->deal;
                                            ?>
                                            <tr >
                                            <tr >

                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value->nama_partner; ?></td>
                                                <td><?php echo $value->tema; ?></td>
                                                <td><?php echo $value->schedule; ?></td>
                                                <?php if($this->session->userdata('dept') == 9) { ?>
                                                <td align="right"><button  onclick="get_budget(<?php echo $value->event_id; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->budget); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->budget); ?></font></button></td>
                                                <td align="right"><button  onclick="get_potensi(<?php echo $value->event_id; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->pred); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->pred); ?></font></button></td>
                                                <?php } else { ?>
                                                    <td align="right"><?php echo  number_format($value->budget); ?></td>
                                                <td align="right"><b><?php echo  number_format($value->pred); ?></b></td>
                                                <?php }?>
                                                <td align="right"><button  onclick="get_sales(<?php echo $value->id_product; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->sales); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->sales); ?></font></button></td>
                                                <td align="right"><button  onclick="get_deal(<?php echo $value->id_product; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->deal); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->deal); ?></font></button></td>
                                                <td align="center"><?php echo 'H-'.$value->day; ?></td>
                                                <td align="right"><?php echo $value->benchmark; ?></td>
                                                <td> <span class="p-1"><?php echo  $value->persen.' %'; ?></span> <progress value="<?php echo  $value->persen; ?>" max="100" width="80%"></progress></td>
                                                <td>
                                                       <?php if(!empty($value->event_id)) {
                                                        if($value->warna=='red') $button="red";
                                                        else if ($value->warna=='green') $button="blue";
                                                        else $button="green"; 
                                                        if($this->session->userdata('dept') == 9)
                                                                {
                                                        ?>
                                                                    <button onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                                <?php } else { ?>
                                                                    <button onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                                <?php }?>
                                                        <?php }?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <thead>
                                        <tr bgcolor="#CDEBF4" style="border: 1px solid #CCC;">
                                                <th style="text-align:right; border: 1px solid #CCC;" colspan="4" >Total </th>
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_budget); ?></th>
                                                <th style="text-align:right;   border: 1px solid #CCC;"><?php echo  number_format($tot_pred); ?></th>
                                               
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_po); ?></th>
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_waiting); ?></th>
                                                <th style="text-align:right; border: 1px solid #CCC;" colspan="4"></th>
                                                
                                            </tr>
                                        </thead>
                                    </table>
                            </div>
                            </div>
                        </div>
                    </div>  
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" >
                            <h6 class="card-title">Detail Events Progress  -  <?php echo $date = date('M Y', strtotime('+2 month'));?></h6>
                            <div class="" >
                                <table id="list_event" class="display table table-hover table-striped table-bordered" cellspacing="0" width="80%">
                                        <thead >
                                            <tr bgcolor="#CDEBF4" style="border: 1px solid #CCC;">
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">No</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2" >Partner</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2" >Tema</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Schedule</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Budget</th>
                                                <th colspan="3" style="text-align:center;">Revenue</th>
                                                
                                                <th  style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">DayEvent</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">BM</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Progress</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" rowspan="2">Status</th> 
                                            </tr>
                                            <tr bgcolor="#CDEBF4" style="border: 1px solid black;">
                                            <th style="vertical-align: middle; border: 1px solid #CCC;" ><?php echo $pred;?></th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;" >PO</th>
                                                <th style="vertical-align: middle; border: 1px solid #CCC;">Waiting PO</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; 
                                             $tot_pred=0;
                                             $tot_budget=0;
                                             $tot_po=0;
                                             $tot_waiting=0;
                                             foreach($list_event3 as $value): 
                                                 if($value->warna=='red') $stt='Warning';
                                                 else if ($value->warna=='green') $stt='Done';
                                                 else $stt='OK';
 
 
                                                 $tot_pred=$tot_pred+$value->pred;
                                                 $tot_budget=$tot_budget + $value->budget ;
                                                 $tot_po=$tot_po + $value->sales;
                                                 $tot_waiting=$tot_waiting + $value->deal;
                                            ?>
                                            <tr >
                                            <tr >

                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value->nama_partner; ?></td>
                                                <td><?php echo $value->tema; ?></td>
                                                <td><?php echo $value->schedule; ?></td>
                                                <?php if($this->session->userdata('dept') == 9) { ?>
                                                <td align="right"><button  onclick="get_budget(<?php echo $value->event_id; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->budget); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->budget); ?></font></button></td>
                                                <td align="right"><button  onclick="get_potensi(<?php echo $value->event_id; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->pred); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->pred); ?></font></button></td>
                                                <?php } else { ?>
                                                    <td align="right"><?php echo  number_format($value->budget); ?></td>
                                                <td align="right"><b><?php echo  number_format($value->pred); ?></b></td>
                                                <?php }?>
                                                <td align="right"><button  onclick="get_sales(<?php echo $value->id_product; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->sales); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->sales); ?></font></button></td>
                                                <td align="right"><button  onclick="get_deal(<?php echo $value->id_product; ?>,'<?php echo $value->tema; ?>','<?php echo  number_format($value->deal); ?>');" style="border: none;background-color: Transparent; "><font color="blue"><?php echo  number_format($value->deal); ?></font></button></td>

                                                <td align="center"><?php echo 'H-'.$value->day; ?></td>
                                                <td align="right"><?php echo $value->benchmark; ?></td>
                                                <td> <span class="p-1"><?php echo  $value->persen.' %'; ?></span> <progress value="<?php echo  $value->persen; ?>" max="100" width="80%"></progress></td>
                                                <td>
                                                       <?php if(!empty($value->event_id)) {
                                                        if($value->warna=='red') $button="red";
                                                        else if ($value->warna=='green') $button="blue";
                                                        else $button="green"; if($this->session->userdata('dept') == 9)
                                                        {
                                                ?>
                                                            <button onclick="get_list_acara_partner('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                        <?php } else { ?>
                                                            <button onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                        <?php }?>
                                                <?php }?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <thead>
                                        <tr bgcolor="#CDEBF4" style="border: 1px solid #CCC;">
                                                <th style="text-align:right; border: 1px solid #CCC;" colspan="4" >Total </th>
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_budget); ?></th>
                                                <th style="text-align:right;   border: 1px solid #CCC;"><?php echo  number_format($tot_pred); ?></th>
                                               
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_po); ?></th>
                                                <th style="text-align:right;  border: 1px solid #CCC;"><?php echo  number_format($tot_waiting); ?></th>
                                                <th style="text-align:right; border: 1px solid #CCC;" colspan="4"></th>
                                                
                                            </tr>
                                        </thead>
                                    </table>
                            </div>
                            </div>
                        </div>
                    </div>  
                    
                </div>  
                
                
                
            </div>
        </div>
       
        
        <div id="detWorkflow" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Detail Workflow </h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                <h6 class="modal-title"> <span id="StatusTitle"></span></h6>
                                    <table id="eventlistdet" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%"> 
                                    </table>
                                </div>
                                <div class="col-md-6 ml-auto" id="tabel_det">
                                <h6 class="modal-title"> <span id="StatusTitleDet"></span></h6>
                                <table id="task_det" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">             
                                </table>

                                <table id="eval_det" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">             
                                </table>
                                </div>
                            </div>
                            
                        </div>
                        
                            
                    </div>
                    <div class="modal-footer">
                           
                    </div>
                </div>
            </div>
        </div>

        

        <div id="det_kegiatan" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Kegiatan </h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" style="background: #C2E9EF;"><h6 class="modal-title"> 
                                <span id="kegiatan"></span></h6>     
                    </div>
                    <div class="modal-footer">
                           
                    </div>
                </div>
            </div>
        </div>

        <div id="det_sales" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Sales Revenue </h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" >
                    <h6 class="modal-title"> 
                                <span id="tema_event"></span> </h6>     
                    <table id="sales_det" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">             
                    </table>
                                   
                    </div>
                    <div class="modal-footer">
                    <h6 class="modal-title"> Total : <span id="sales_all"></span> </h6> 
                    </div>
                </div>
            </div>
        </div>

        <div id="det_potensi" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Potensi Revenue </h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" >
                    <h6 class="modal-title"> 
                                <span id="tema_event"></span> </h6>     
                    <table id="potensi_det" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">             
                    </table>
                                   
                    </div>
                    <div class="modal-footer">
                    <h6 class="modal-title"> Total : <span id="potensi_all"></span> </h6> 
                    </div>
                </div>
            </div>
        </div>

        <div id="det_budget" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Detail Budget </h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" >
                    <h6 class="modal-title"> 
                                <span id="tema_event"></span> </h6>     
                    <table id="budget_det" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">             
                    </table>
                                   
                    </div>
                    <div class="modal-footer">
                    <h6 class="modal-title"> Total : <span id="budget_all"></span> </h6> 
                    </div>
                </div>
            </div>
        </div>


        <div id="det_deal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Deal (Waiting PO) </h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" >
                    <h6 class="modal-title"> 
                                <span id="tema_event1"></span> </h6>     
                    <table id="deal_det" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">             
                    </table>
                                   
                    </div>
                    <div class="modal-footer">
                    <h6 class="modal-title"> Total : <span id="deal_all"></span> </h6> 
                    </div>
                </div>
            </div>
        </div>
             
        
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" style="position: fixed;  margin: auto;  width: 320px;    height: 70%;       right: 0px;  bottom : 0px; " role="document">   
            <div class="modal-content" >
                <div class="modal-header" style=" background-color: #3CC3EB;" > <h5>Chat</h5>
                    <button type="button"  class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" id="isian" >
                <div id="chatBox" ></div>
                </div>
                <div class="modal-footer">
                        <form id="chatForm" action="#">
                            <textarea class="form-control" name="message" id="message" rows="2" cols="50" placeholder="Type your message"></textarea>
                            <input type="submit" value="Send"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </form>
                </div>
            </div>

            </div>
        </div>
        <div style="display: flex; justify-content: flex-end">
            <footer class="footer" style="position:fixed; "> <span style="float:right;"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2">Chat </button></span></footer>                                                        
        </div>
<script src="<?php echo base_url(); ?>assets/js/event2.js"></script>              
<script>
        $(document).ready(function() {

            $('#isian').scrollTop($('#isian')[0].scrollHeight);
            // Load initial chat messages
            loadChatMessages();

            // Periodically load new chat messages
            setInterval(loadChatMessages, 1000);

            // Submit chat message
            $('#chatForm').submit(function(e) {
                e.preventDefault();

                
                var message = $('#message').val();

                saveChatMessage( message);

                // Clear input fields
                $('#message').val('');
            });
        });

        // Function to load chat messages
        function loadChatMessages() {
            var user_id='<?= $this->session->userdata('user_log_id'); ?>';
            $.ajax({
                url: '<?= base_url('chat/getmessages') ?>',
                dataType: 'json',
                success: function(response) {
                    var chatBox = $('#chatBox');
                    chatBox.empty();

                    for (var i = 0; i < response.length; i++) {
                        var message = response[i].message;
                        var em_image = response[i].em_image;
                        var senderName = response[i].from;
                        var createdAt = response[i].sent;
                        var tgl =response[i].tgl;
                        var jam =response[i].jam;
                        var nama =response[i].first_name;
                       
                        var tgl_now = '<?= date ("Y-m-d");?>';
                        if(tgl==tgl_now) {createdAt = jam ; }
                        if(user_id != senderName){
                        var chatMessage2 ='<div class="d-flex flex-row p-1"><img src="<?php echo base_url(); ?>assets/images/users/' + em_image + '" alt="'+nama+'" width="40" height="40" style=" border-radius: 50%;"><div class="chat ml-2 p-1" style="width: 300px; ">' + message +'<div style="text-align:right; font-size: 8px;">'+ createdAt +'</div></div></div>'
                        }
                        else
                        {
                            var chatMessage2 ='<div class="d-flex flex-row p-1"><div class="bg-white mr-2 p-1" style="width: 300px; text-align: right;"><span class="text-muted">' + message + '<div style="text-align:right; font-size: 8px;">'+ createdAt +'</div></div> </span><img src="<?php echo base_url(); ?>assets/images/users/' + em_image + '" alt="'+nama+'" width="40" height="40" style=" border-radius: 50%;">'
                        }
                        var chatMessage = '<p><strong>' + senderName + ':</strong> ' + message + ' (' + createdAt + ')</p>';
                        chatBox.append(chatMessage2);
                    }
                }
            });
            $('#message').focus();
        }

        // Function to save chat message
        function saveChatMessage( message) {
            $.ajax({
                url: '<?= base_url('chat/savemessage') ?>',
                method: 'POST',
                data: {
                   
                    message: message
                },
                success: function(response) {
                    console.log('Chat message saved');
                }
            });
        }
    </script>                                               
<?php $this->load->view('backend/footer'); ?>