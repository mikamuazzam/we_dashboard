<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<link href="<?php echo base_url(); ?>assets/css/finance.css" rel="stylesheet" media="all">
      <div class="page-wrapper">
            <br>
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 align-self-right">
                    <h5 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                       Finance - Status Invoices</h5>
                    </div>
                    
                </div>
                <div class="card">
                <div class="card-body crm">
                <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-12 mb-4">
                            <div class="card text-white bg-info shadow">
                                <div class="card-body card-stats">
                                    <div class="description">
                                        <h5 class="card-title h5">Total PO : <?php echo $total_po; ?>
                                        </h5>
                                        
                                        
                                    </div>
                                    <div class="icon bg-warning-light">
                                        <i class="material-icons">local_mall</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-xs-12 mb-4">
                            <div class="card text-white bg-warning shadow">
                                <div class="card-body card-stats">
                                    <div class="description">
                                        <h5 class="card-title h5"><?php  if(empty($jum_new->jum)) echo '0'; else  echo $jum_new->jum; ?>
                                        </h5>
                                        <p class="card-text">New</p>
                                        
                                    </div>
                                    <div class="icon bg-warning-light">
                                        <i class="material-icons">local_mall</i>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="card-footer-left">
                                        <div class="icon me-2">
                                        <?php  if(empty($jum_new->jum)) echo '0'; else echo number_format($jum_new->amount,0); ?>
                                        </div>  
                                    </div>
                                    <div class="card-footer-right">
                                       
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-xs-12 mb-4">
                            <div class="card text-white bg-success shadow">
                                <div class="card-body card-stats">
                                    <div class="description">
                                        <h5 class="card-title h5"><?php  if(empty($jum_sent->jum)) echo '0'; else  echo $jum_sent->jum; ?></h5>
                                        <p class="card-text">Sent</p>
                                    </div>
                                    <div class="icon">
                                       
                                        <i class="material-icons">drive_file_move</i>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="card-footer-left">
                                        <div class="icon me-2">
                                        <?php  if(empty($jum_sent->jum)) echo '0'; else echo number_format($jum_sent->amount,0); ?>
                                        </div>
                                    </div>
                                    <div class="card-footer-right">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-xs-12 mb-4">
                            <div class="card text-white bg-danger shadow">
                                <div class="card-body card-stats">
                                    <div class="description">
                                        <h5 class="card-title h5"><?php  if(empty($jum_aging->jum)) echo '0'; else  echo $jum_aging->jum; ?></h5>
                                        <p class="card-text">Processing</p>
                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-money-bill-wave"></i> -->
                                        <i class="material-icons">history</i>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="card-footer-left">
                                        <div class="icon me-2">
                                        <?php  if(empty($jum_aging->jum)) echo '0'; else echo number_format($jum_aging->amount,0); ?>
                                        </div>  
                                    </div>
                                    <div class="card-footer-right">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-xs-12 mb-4">
                            <div class="card text-white bg-info shadow">
                                <div class="card-body card-stats">
                                    <div class="description">
                                    <h5 class="card-title h5"><?php  if(empty($jum_cash->jum)) echo '0'; else  echo $jum_cash->jum; ?></h5>
                                        <p class="card-text">Cash In</p>
                                    </div>
                                    <div class="icon">
                                        <!-- <i class="fas fa-money-bill-wave"></i> -->
                                        <i class="material-icons">payments</i>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="card-footer-left">
                                        <div class="icon me-2">
                                        <?php  if(empty($jum_cash->jum)) echo '0'; else echo number_format($jum_cash->amount,0); ?>
                                        <?php ?>
                                        </div>  
                                    </div>
                                    <div class="card-footer-right">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                </div>
            </div>
                <!-- ============================================================== -->
            </div> 
            <div class="container-fluid">  
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"></h6>
                            <canvas id="pie-chart"></canvas>
                            </div>
                            <br>
                        </div>
                    </div> 
                
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">Cash In / Cash Out &nbsp;

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
                            </h6>
                                <div class="card text-white bg-info shadow">
                                    <div class="card-body card-stats">
                                        <div class="description">
                                        <h5 class="card-title h5"><p id="total_cashin"></p></h5>
                                        
                                        </div>
                                    
                                    </div>
                                </div>
                                <div class="card text-white bg-info shadow">
                                    <div class="card-body card-stats">
                                        <div class="description">
                                        <h5 class="card-title h5"> <p id="total_cashout"></p></h5>
                                          
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div> 
                   
                </div> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" >
                                <div class="" >
                                <h6 class="card-title"> Detail Invoice &nbsp;&nbsp;  

                                   
                                </h6>
                                    <table id="inv_list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" style="width:100%;overflow-x:auto;display:block;">
                                     
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>    
                   
                </div>          
                
            </div>
</div>    

<script src="<?php echo base_url(); ?>assets/js/finance.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>