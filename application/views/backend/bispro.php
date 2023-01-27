<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Business Controll</h6>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"> </li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-4 align-self-right">
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                      <label id="calenderbulan"></label> </h/4>
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
                
           
            
            <div class="row page-titles">
                        <div class="col-md-12 align-self-center">
                            <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                            &nbsp Core Bisnis by Value Rp. (Juta) <label id="LabelAll"></label>
                           
                        </h6>   
                        </div>
            </div>
            <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">  Revenue Vs Expenses Programmatics WE </h6>
                            <div id="ChartWEValueContent">
                            <canvas id="ChartWE"  height="300px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> Revenue Vs Expenses Programmatics HS</h6>
                            <div id="ChartHSValueContent">
                            <canvas id="foo" height="300px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>   
            </div> 
            
            <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                           Wartaekonomi
                    </h6>    
                    </div>
            </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>Core Bisnis Last Year Vs Year to Date</b></h6> 
                              <canvas id="ChartWEYTD" height="170px" ></canvas>  
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>Core Bisnis Last Month Vs Month to Date</b></h6>
                              <canvas id="ChartWEMTD" height="170px" ></canvas>  
                            </div>
                            
                        </div>
                    </div>
                </div>   

                <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                           Herstory
                    </h6>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                              <h6 class="card-title"><b>Core Bisnis Last Year Vs Year to Date</b></h6>
                              
                              <canvas id="ChartHSYTD" height="170px" ></canvas>  
                             
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>Core Bisnis Last Month Vs Month to Date</b></h6>
                              
                              <canvas id="ChartHSMTD" height="170px" ></canvas>  
                             
                            </div>
                            
                        </div>
                    </div>
                </div>   
             

                <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                           AE Performance
                    </h6>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                              <h6 class="card-title"><b>AE PErformance Last Year Vs Year to Date</b></h6>
                              
                              <canvas id="ChartAEYTD" height="100px" ></canvas>  
                             
                            </div>
                           
                        </div>
                    </div>
                    
                </div>   

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                              <h6 class="card-title"><b>AE PErformance Last Month Vs Month to Date</b></h6>
                              
                              <canvas id="ChartAEMTD" height="100px" ></canvas>  
                             
                            </div>
                           
                        </div>
                    </div>
                    
                </div>   
             

        </div>
       
<script src="<?php echo base_url(); ?>assets/js/bispro.js"></script>              
                                              
<?php $this->load->view('backend/footer'); ?>