<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Dashboard CRM</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard CRM</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
            
                <div class="row ">
                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-inverse card-warning">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white">
                                    <?php 
                                        echo $comp->jum; 
                                    ?>
                                </h1>
                                <h5 class="font-light text-white">
                                Companies
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-inverse card-info">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">
                                    <?php 
                                         $deals_all= $deals_new->jum + $deals_won->jum +$deals_lost->jum; 
                                        echo $deals_all;
                                    ?>
                                </h1>
                                <h5 class="font-light text-white">
                                Deals
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-primary card-inverse">
                        <div class="box bg-primary text-center">
                                <h1 class="font-light text-white">
                                <?php 
                                        echo $deals_new->jum; 
                                    ?>     
                                </h1>
                                <h5 class="font-light text-white">
                                Progress
                                </h4>
                            </div>
                          
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-success card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white">0
                                <?php 
                                        //echo $rank->populis; 
                                    ?>     
                                </h1>
                                <h5 class="font-light text-white">
                                Deals Won
                                </h4>
                            </div>
                          
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-inverse card-danger">
                            <div class="box text-center">
                            <h1 class="font-light text-white"> <?php 
                                        echo $deals_lost->jum; 
                                    ?>
                                </h1>
                                <h5 class="font-light text-white">  Deals Lost </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-inverse card-dark">
                            <div class="box text-center">
                                <h1 class="font-light text-white">
                                <?php 
                                        echo "0"; 
                                    ?>  
                                </h1>
                                <h5 class="font-light text-white"> Outs Inv </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
            </div> 
            
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Calendar Event <b> <?php echo date('M Y');?> </b></h4>
                            <div class="" >
                                    <table id="weblist" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr align="center" >
                                                <th>Date</th>
                                                <th>Start</th>
                                                <th>Finish</th>
                                                <th>Title</th>
                                                <th>Status </th>
                                                <th>Desc </th>
                                               
                                            </tr>
                                        </thead>
                                
                                        <tbody>
                                           <?php foreach($venue_list as $value): ?>
                                            <tr align="left"  >
                                                <td bgcolor="<?php echo $value->warna;?>"><?php echo $value->tanggal; ?></td>
                                                <td bgcolor="<?php echo $value->warna;?>"><?php echo $value->start_time; ?></td>
                                                <td bgcolor="<?php echo $value->warna;?>"><?php echo $value->finish_time; ?></td>
                                                <td bgcolor="<?php echo $value->warna;?>"><?php echo $value->acara; ?></td>
                                                <td bgcolor="<?php echo $value->warna;?>"><?php echo $value->status; ?></td>
                                                <td bgcolor="<?php echo $value->warna;?>"><?php echo $value->present; ?></td>
                                                
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title"> Core Bisnis WE (%) - <?php echo date('M Y');?></h5>
                            <canvas id="ChartWEPersen" style="position: relative; height:300px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Core Bisnis HS (%) - <?php echo date('M Y');?></h5>
                            <canvas id="ChartHSPersen" style="position: relative; height:300px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>


                    <!-- Column -->
                    <div class="col-lg-4">
                    <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Core Bisnis Populis (%) - <?php echo date('M Y');?></h5>
                            <canvas id="ChartPOPPersen" style="position: relative; height:300px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    
            </div>  

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h7 class="card-title"> Core Bisnis WE (Value) - <?php echo date('M Y');?></h7>
                            <canvas id="ChartWEValue" style="position: relative; height:300px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h7 class="card-title">Core Bisnis HS (Value) - <?php echo date('M Y');?></h7>
                            <canvas id="ChartHSValue" style="position: relative; height:300px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>

                    
                    <!-- Column -->
                    <div class="col-lg-4">
                    <div class="card">
                            <div class="card-body">
                            <h7 class="card-title">Core Bisnis Populis (Value) - <?php echo date('M Y');?></h7>
                            <canvas id="ChartPOPValue" style="position: relative; height:300px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    
            </div>  
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Monthly Core Bisnis WE - <?php echo date('Y');?></h4>
                            <canvas id="ChartWEMonthly" style="position: relative; height:300px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Monthly Core Bisnis HS - <?php echo date('Y');?></h4>
                            <canvas id="ChartHSMonthly" style="position: relative; height:300px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>

                    
                    <!-- Column -->
                    <div class="col-lg-4">
                    <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Monthly Core Bisnis Populis <?php echo date ('Y');?></h4>
                            <canvas id="ChartPOPMonthly" style="position: relative; height:300px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    
            </div>  

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">KGI Sales </h4>
                            <canvas id="kgiChart" style="position: relative; height:350px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Total Presentasi Pencapaian</h4>
                            <canvas id="progChart" style="position: relative; height:360px; width:100%"></canvas>
                            </div>
                        </div>
                    </div>
                    
            </div>  
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Top Companies </h4>
                            <canvas id="topComp" style="position: relative; height:350px; width:100%"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                   
                    
            </div>  
            
        </div>

        
<script src="<?php echo base_url(); ?>assets/js/crm.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>