<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Dashboard CRM</h4>
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
                                <h1 class="font-light text-white">
                                <?php 
                                        echo $deals_won->jum; 
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
                                <h5 class="font-light text-white">  Cancel Deals  </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-inverse card-dark">
                            <div class="box text-center">
                                <h1 class="font-light text-white">
                                <?php 
                                        echo $deals_inv->jum; 
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
                <div class="row page-titles">
                    <div class="col-md-4 align-self-right">
                    <h4 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
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
                                    if($i==$current_year)$selected='selected';
                                    else $selected='';
                                    echo "<option value=$j $selected>$j</option>";
                                    $i++;
                                }
                            ?>
                        </select>
                        <button class="btn btn-primary" id="cari">Filter</button>
                    </div>
                </div>
            </div>
                        
            <div class="container-fluid">
                <div class="row">    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                           
                            
                            <div class="" >
                                    <table id="weblist" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>    
            </div>
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                        <h4 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                        &nbsp Core Bisnis by Persentage
                        (
                            <font color="#3cb5de">>100 %</font>,
                            <font color="#1e6b24">81-100 %</font>,
                            <font color="#6b4c1e">61-80 %</font>,
                            <font color="#ded43c">41-60 %</font>,
                            <font color="red"> <= 40 %</font>
                        )
            
                    </h4>     
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <label id="LabelWE"></label></h6>
                            <canvas id="ChartWEPersen" height="400px" ></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">  <label id="LabelHS"></label></h6>
                            <canvas id="ChartHSPersen" height="400px" ></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>


                    <!-- Column -->
                    <div class="col-lg-3">
                    <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">  <label id="LabelPOP"></label></h6>
                            <canvas id="ChartPOPPersen" height="400px" ></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                    <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <label id="LabelQ1"></label></h6>
                            <canvas id="ChartQ1Persen" height="400px" ></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                </div>   
            </div>  

            <div class="container-fluid">
                <div class="row page-titles">
                        <div class="col-md-12 align-self-center">
                            <h4 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                            &nbsp Core Bisnis by Value Rp. (Juta) <label id="LabelAll"></label>
                           
                        </h4>   
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">  WE </h6>
                            <canvas id="ChartWEValue"  height="400px;"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> HS </h6>
                            <canvas id="ChartHSValue" height="400px;"></canvas> 
                            </div>
                            <br>
                        </div>
                    </div>
                    
                    <!-- Column -->
                    <div class="col-lg-3">
                    <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">Populis</h6>
                            <canvas id="ChartPOPValue" height="400px;"></canvas>   
                            </div>
                            <br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card">
                                <div class="card-body">
                                <h6 class="card-title">Quadrant 1 </h6>
                                <canvas id="ChartQ1Value" height="400px;"></canvas>   
                                </div>
                                <br>
                        </div>
                    </div>
                </div>   
            </div>  
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                        <h4 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                        &nbsp Total Target VS Total Pencapaian (Juta Rp)  - <?php echo date('Y');?> 
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Warta Ekonomi </h6>
                            <canvas id="ChartWEMonthly" height="200px"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Herstory</h6>
                            <canvas id="ChartHSMonthly" height="200px;"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
            <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Populis </h6>
                            <canvas id="ChartPOPMonthly" height="200px;"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Quadrant 1</h6>
                            <canvas id="ChartQ1Monthly" height="200px;"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>   
                </div>  
            </div>

            <div class="container-fluid">
                <div class="row">
                     <!-- Column -->
                     <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">Total  Pencapaian per divisi Tahun <?php echo date('Y');?>  = <b><?php echo number_format($sum_pencapaian->jum,0,",",".");?>&nbsp; Juta</b></h6>
                            <canvas id="progChart" height="200px;"></canvas> 
                            </div>
                        </div>
                    </div>    
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">Total Pencapaian Perusahaan  Tahun <?php echo date('Y');?> = <b><?php echo number_format($sum_pencapaian->jum,0,",",".");?>&nbsp; Juta</b></h6>
                            <canvas id="ProgChartMont" height="200px;"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                                  
            </div>  
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">KGI Sales </h4>
                            <canvas id="kgiChart" style="position: relative; height:350px; width:100%"></canvas>  
                            </div>
                            <br>
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
            <div class="container-fluid">
                <div class="row">    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">Company list
                            <div class="" >
                                    <table id="complist" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>    
            </div>
        </div>
       
<script src="<?php echo base_url(); ?>assets/js/crm.js"></script>              
                                              
<?php $this->load->view('backend/footer'); ?>