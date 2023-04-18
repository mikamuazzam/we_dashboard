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
            <div class="row page-titles">
                    <div class="col-md-4 align-self-right">
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                        Calendar Event <label id="calenderbulan"></label> </h/4>
                    </div>
                    <div class="col-md-8 align-self-left">
                        <select id="bulan">
                            <?php 
                                $current_month =date('m');
                                $i=1;
                                while ($i<=12)
                                {
                                    if($i==$current_month)$selected='selected';
                                    else $selected='';
                                    echo "<option value=$i $selected>$i</option>";
                                    $i++;
                                }
                            ?>
                        </select>
                        <select id="tahun">
                        <?php 
                                $current_year =date('Y');
                                $i=0;
                                while ($i<=2)
                                {
                                    $j=2022+$i;
                                    if($j==$current_year)$selected='selected';
                                    else $selected='';
                                    echo "<option value=$j $selected>$j</option>";
                                    $i++;
                                }
                            ?>
                        </select>
                        <button class="btn-sm btn-primary" id="cari">Filter</button>
                    </div>
                </div>
                <!-- --------------------------Core bisnsi YTD ------->
                <div class="row">    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">List Events</h6>
                                <div class="" >
                                    <table id="weblist" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
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
                            <h6 class="card-title">Detail Events Progress</h6>
                            <div class="" >
                                <table id="list_event" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Tipe</th>
                                                <th>Tema</th>
                                                <th>Schedule</th>
                                                <th>Budget</th>
                                                <th>Sales</th>
                                                <th>Margin</th>
                                                <th>Progress</th>
                                                <th>Status</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($list_event as $value): 
                                            if($value->warna=='pink') $stt='Warning';
                                            else $stt='OK';
                                           
                                             $margin = (($value->sales -$value->budget)/$value->budget)*100;
                                           
                                            ?>
                                            <tr bgcolor="<?php echo $value->warna; ?>">

                                                <td><?php echo $value->tipe_award; ?></td>
                                                <td><?php echo $value->tema; ?></td>
                                                <td><?php echo $value->schedule; ?></td>
                                                <td align="right"><?php echo  number_format($value->budget); ?></td>
                                                <td align="right"><?php echo  number_format($value->sales); ?></td>
                                                <td align="right"><?php echo  number_format($margin).'%'; ?></td>
                                                <td> <span class="p-1"><?php echo  $value->persen.' %'; ?></span> <progress value="<?php echo  $value->persen; ?>" max="100"></progress></td>
                                                <td>
                                                    <?php if ($stt=='Warning') { ?>
                                                        <a href="#" onclick="get_list_acara_det('<?php echo  $value->event_id; ?>','<?php echo  $value->tema; ?>');"><?php echo $stt; ?></a>
                                                    <?php } ?>
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
                            <h6 class="card-title">Detail Events Progress <b><span id="StatusTitle"></span></b></h6>
                            <div class="" >
                                    <table id="eventlistdet" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
                                    </table>
                            </div>
                            </div>
                        </div>
                    </div>  
                    
                </div>
            </div>
        </div>
                
       
<script src="<?php echo base_url(); ?>assets/js/event.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>