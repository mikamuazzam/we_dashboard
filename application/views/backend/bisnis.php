<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Dashboard Business</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard Business</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->   
  
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
                        &nbsp New AE Performance 
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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <label id="LabelAEPersen"></label></h6>
                            <canvas id="ChartAE1Persen" height="150px" ></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <label id="LabelAEvalue"></label></h6>
                            <canvas id="ChartAE1Value" height="150px" ></canvas>  
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
                        &nbsp Senior AE Performance
                        
            
                    </h4>     
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <label id="LabelPersen"></label></h6>
                            <canvas id="ChartAEPersen" height="120px" ></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <label id="Labelvalue"></label></h6>
                            <canvas id="ChartAEValue" height="120px" ></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                   
                </div>  
            </div>
            
            
            <div class="container-fluid">
                <div class="row page-titles">
                        <div class="col-md-12 align-self-center">
                            <h3 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                            &nbsp Core Bisnis by Value Rp. (Juta) <label id="LabelAll"></label>
                           
                        </h3>   
                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">  WE </h6>
                            <canvas id="ChartWEValue"  height="250px;"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> HS </h6>
                            <canvas id="ChartHSValue" height="250px;"></canvas> 
                            </div>
                            <br>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="card">
                                <div class="card-body">
                                <h6 class="card-title">Quadrant 1 </h6>
                                <canvas id="ChartQ1Value" height="250px;"></canvas>   
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
       
<script src="<?php echo base_url(); ?>assets/js/bisnis_1.js"></script>              
                                              
<?php $this->load->view('backend/footer'); ?>