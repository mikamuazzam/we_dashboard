<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <br>
            
            <div class="container-fluid">
            <div class="row page-titles">
                    <div class="col-md-12 align-self-right">
                    <h5 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                        Programmatic Ads <label id="calenderbulan"></label> </h5>
                    </div>
                    
                </div>
                <div class="row">
                <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"></h6>
                            <canvas id="ChartBalance" height="150px" ></canvas> 
                            </div>
                            <br>
                        </div>
                    </div> 
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                             <h4 class="card-title">Total Balance List </h4>
                                <div class="" >
                                    <table id="weblist" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Website</th>
                                                <th>Deposit Date</th>
                                                <th>Deposit</th>
                                                <th>Revenue</th>
                                                <th>Balance</th>
                                                <th>Available Slot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($balance_list as $value): ?>
                                            <tr >
                                                <td><?php echo $value->website_name; ?></td>
                                                <td><?php echo $value->tanggal_deposit; ?></td>
                                                <td align="right">$<?php echo number_format($value->deposit,2); ?></td>
                                                <td align="right">$<?php echo number_format($value->revenue,2); ?></td>
                                                <td align="right" bgcolor="pink">$<?php echo number_format( $value->sisa,2); ?></td>
                                                <td align="right" ><?php echo $value->sisa_slot; ?></td>
                                               
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                           
                            </div>
                            <br>
                        </div>
                    </div> 
                    
                </div>      
                <div class="row page-titles">
                    <div class="col-md-4 align-self-right">
                    <h5 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                        Programmatic Ads <label id="calenderbulan"></label> </h5>
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
                                    if($i==$current_year)$selected='selected';
                                    else $selected='';
                                    echo "<option value=$j $selected>$j</option>";
                                    $i++;
                                }
                            ?>
                        </select>
                        <button class="btn-sm btn-primary" id="cari">Filter</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"></h6>
                            <canvas id="ChartRevenue" height="100px" ></canvas>  
                            </div>
                            <br>
                        </div>
                    </div> 
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Monthly Revenue List </h4>
                             <div class="" >
                                    <table id="ads-monthly-list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                     
                                    </table>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div> 
                </div>     
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"></h6>
                            <canvas id="ChartAds" height="100px" ></canvas>  
                            </div>
                            <br>
                        </div>
                    </div> 
                    
                </div>  
                             
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" >
                                <div class="" >
                                    <table id="ads-we-list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                     
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>  
                
            </div>
       
       
<script src="<?php echo base_url(); ?>assets/js/ads.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>