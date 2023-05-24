<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
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
                                <div class="" >
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
                            <h6 class="card-title"> Events - <?php echo $date = date('M Y');?></h6>
                                <div class="" >
                                <canvas id="event1" height="200px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Events - <?php echo $date = date('M Y', strtotime('+1 month'));?></h6>
                                <div class="" >
                                <canvas id="event2" height="200px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Events - <?php echo $date = date('M Y', strtotime('+2 month'));?> </h6>
                                <div class="" >
                                <canvas id="event3" height="200px;"></canvas> 
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
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tema</th>
                                                <th>Schedule</th>
                                                <th>Budget</th>
                                                <th>Sales</th>
                                                <th>DayEvent</th>
                                                <th>BM</th>
                                                <th>Progress</th>
                                                <th>Status</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i=1; foreach($list_event1 as $value): 
                                            if($value->warna=='red') $stt='Warning';
                                            else if ($value->warna=='green') $stt='Done';
                                            else $stt='OK';
                                            ?>
                                            <tr >

                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value->tema; ?></td>
                                                <td><?php echo $value->schedule; ?></td>
                                                <td align="right"><?php echo  number_format($value->budget); ?></td>
                                                <td align="right"><?php echo  number_format($value->sales); ?></td>
                                                <td align="center"><?php echo 'H-'.$value->day; ?></td>
                                                <td align="right"><?php echo $value->benchmark; ?></td>
                                                <td> <span class="p-1"><?php echo  $value->persen.' %'; ?></span> <progress value="<?php echo  $value->persen; ?>" max="100" width="80%"></progress></td>
                                                <td>
                                                       <?php if(!empty($value->event_id)) {
                                                        if($value->warna=='red') $button="red";
                                                        else if ($value->warna=='green') $button="blue";
                                                        else $button="green"; ?>
                                                        <button onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                        <?php }?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
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
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tema</th>
                                                <th>Schedule</th>
                                                <th>Budget</th>
                                                <th>Sales</th>
                                                <th>DayEvent</th>
                                                <th>BM</th>
                                                <th>Progress</th>
                                                <th>Status</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; foreach($list_event2 as $value): 
                                            if($value->warna=='red') $stt='Warning';
                                            else if ($value->warna=='green') $stt='Done';
                                            else $stt='OK';
                                            ?>
                                            <tr >
                                            <tr >

                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value->tema; ?></td>
                                                <td><?php echo $value->schedule; ?></td>
                                                <td align="right"><?php echo  number_format($value->budget); ?></td>
                                                <td align="right"><?php echo  number_format($value->sales); ?></td>
                                                <td align="center"><?php echo 'H-'.$value->day; ?></td>
                                                <td align="right"><?php echo $value->benchmark; ?></td>
                                                <td> <span class="p-1"><?php echo  $value->persen.' %'; ?></span> <progress value="<?php echo  $value->persen; ?>" max="100" width="80%"></progress></td>
                                                <td>
                                                       <?php if(!empty($value->event_id)) {
                                                        if($value->warna=='red') $button="red";
                                                        else if ($value->warna=='green') $button="blue";
                                                        else $button="green"; ?>
                                                        <button onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                        <?php }?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
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
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tema</th>
                                                <th>Schedule</th>
                                                <th>Budget</th>
                                                <th>Sales</th>
                                                <th>DayEvent</th>
                                                <th>BM</th>
                                                <th>Progress</th>
                                                <th>Status</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; foreach($list_event3 as $value): 
                                            if($value->warna=='red') $stt='Warning';
                                            else if ($value->warna=='green') $stt='Done';
                                            else $stt='OK';
                                            ?>
                                            <tr >
                                            <tr >

                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value->tema; ?></td>
                                                <td><?php echo $value->schedule; ?></td>
                                                <td align="right"><?php echo  number_format($value->budget); ?></td>
                                                <td align="right"><?php echo  number_format($value->sales); ?></td>
                                                <td align="center"><?php echo 'H-'.$value->day; ?></td>
                                                <td align="right"><?php echo $value->benchmark; ?></td>
                                                <td> <span class="p-1"><?php echo  $value->persen.' %'; ?></span> <progress value="<?php echo  $value->persen; ?>" max="100" width="80%"></progress></td>
                                                <td>
                                                       <?php if(!empty($value->event_id)) {
                                                        if($value->warna=='red') $button="red";
                                                        else if ($value->warna=='green') $button="blue";
                                                        else $button="green"; ?>
                                                        <button onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>',1);" ><font color='<?php echo $button;?>'><?php echo $stt; ?></font></button>
                                                        <?php }?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
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

<script src="<?php echo base_url(); ?>assets/js/event1.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>