<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<?php 
        $id = $this->session->userdata('user_login_id');
        $dep_id = $this->session->userdata('dept');
        $basicinfo = $this->employee_model->GetBasic($id); 
?>  
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
                            &nbsp Revenue Vs Expenses <label id="LabelAll"></label>
                           
                        </h6>   
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
                
            
            <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics WE </b></h6>
                            <div id="ChartWEPrContent">
                            <canvas id="ChartWEPr"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics HS </b></h6>
                            <div id="ChartHSPrContent">
                            <canvas id="ChartHSPr"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics Populis </b></h6>
                            <div id="ChartPPPrContent">
                            <canvas id="ChartPPPr"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b>Programmatics KJ </b></h6>
                            <div id="ChartKJPrContent">
                            <canvas id="ChartKJPr" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>  
                    
            </div>
            <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics NW </b></h6>
                            <div id="ChartNWPrContent">
                            <canvas id="ChartNWPr"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics WE Trivia </b></h6>
                            <div id="ChartTVPrContent">
                            <canvas id="ChartTVPr"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    
            </div>
            <?php if($dep_id != 8) { ?>
            <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b>Iklan WE </b></h6>
                            <div id="ChartWEIklanContent">
                            <canvas id="ChartWEIklan" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b>Iklan HS </b></h6>
                            <div id="ChartHSIklanContent">
                            <canvas id="ChartHSIklan" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>  
                   
            </div>


            <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                             <div class="card-body">
                            <h6 class="card-title"><b> Award WE </b></h6>
                            <div id="ChartWEAwardContent">
                            <canvas id="ChartWEAward" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b> Seminar Banking WE </b></h6>
                            <div id="ChartWEBankingContent">
                            <canvas id="ChartWEBanking" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>   
            </div>
            <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Q1 Ide </b></h6>
                            <div id="ChartQ1Content">
                            <canvas id="ChartQ1"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b>Q1 Revitalisasi</b></h6>
                            <div id="ChartQ1RevContent">
                            <canvas id="ChartQ1Rev" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>   
            </div>
            

            <!-- Programmatics -->
            <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                           Programmatics ::: Last Year Vs Year to Date and Las Month Vs Month to Date
                    </h6>  <font color="red">Last year programmatics belum ada dikarenakan data harian baru ada bulan 7 2022</font> 
                    </div>
            </div>
                
         <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>WE (LY vs YtD)</b></h6> 
                             <div id="ChartProgYTDContent">
                              <canvas id="ChartProgYTD" height="300px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>WE (LM vs MtD) </b></h6>
                              <div id="ChartProgMTDContent">
                              <canvas id="ChartProgMTD" height="300px" ></canvas>  
                             </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>HS (LY vs YtD)</b></h6> 
                             <div id="ChartProgHSYTDContent">
                              <canvas id="ChartProgHSYTD" height="250px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>HS (LM vs MtD) </b></h6>
                              <div id="ChartProgHSMTDContent">
                              <canvas id="ChartProgHSMTD" height="250px" ></canvas>  
                             </div>
                            </div>
                            
                        </div>
                    </div>

                </div>   
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>PP (LY vs YtD)</b></h6> 
                             <div id="ChartProgPPYTDContent">
                              <canvas id="ChartProgPPYTD" height="300px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>PP (LM vs MtD) </b></h6>
                              <div id="ChartProgPPMTDContent">
                              <canvas id="ChartProgPPMTD" height="300px" ></canvas>  
                             </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>NW (LY vs YtD)</b></h6> 
                             <div id="ChartProgNWYTDContent">
                              <canvas id="ChartProgNWYTD" height="250px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>NW (LM vs MtD) </b></h6>
                              <div id="ChartProgNWMTDContent">
                              <canvas id="ChartProgNWMTD" height="250px" ></canvas>  
                             </div>
                            </div>
                            
                        </div>
                    </div>

                </div> 

            <!-- Award -->
            <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                           Award ::: Last Year Vs Year to Date and Las Month Vs Month to Date
                    </h6>    
                    </div>
            </div>
                
         <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>WE (LY vs YtD)</b></h6> 
                             <div id="ChartAwardYTDContent">
                              <canvas id="ChartAwardYTD" height="300px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>WE (LM vs MtD) </b></h6>
                              <div id="ChartAwardMTDContent">
                              <canvas id="ChartAwardMTD" height="300px" ></canvas>  
                             </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>HS (LY vs YtD)</b></h6> 
                             <div id="ChartAwardHSYTDContent">
                              <canvas id="ChartAwardHSYTD" height="250px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>HS (LM vs MtD) </b></h6>
                              <div id="ChartAwardHSMTDContent">
                              <canvas id="ChartAwardHSMTD" height="250px" ></canvas>  
                             </div>
                            </div>
                            
                        </div>
                    </div>

                </div>   

             <!-- Iklan -->
             <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                           Iklan ::: Last Year Vs Year to Date and Las Month Vs Month to Date
                    </h6>    
                    </div>
            </div>
                
         <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>WE (LY vs YtD)</b></h6> 
                             <div id="ChartIklanYTDContent">
                              <canvas id="ChartIklanYTD" height="300px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>WE (LM vs MtD) </b></h6>
                              <div id="ChartIklanMTDContent">
                              <canvas id="ChartIklanMTD" height="300px" ></canvas>  
                             </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>HS (LY vs YtD)</b></h6> 
                             <div id="ChartIklanHSYTDContent">
                              <canvas id="ChartIklanHSYTD" height="250px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>HS (LM vs MtD) </b></h6>
                              <div id="ChartIklanHSMTDContent">
                              <canvas id="ChartIklanHSMTD" height="250px" ></canvas>  
                             </div>
                            </div>
                            
                        </div>
                    </div>

                </div>   

            <!-- Seminar -->
            <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                           Seminar ::: Last Year Vs Year to Date and Las Month Vs Month to Date
                    </h6>    
                    </div>
            </div>
                
         <div class="row">
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>WE (LY vs YtD)</b></h6> 
                             <div id="ChartSeminarYTDContent">
                              <canvas id="ChartSeminarYTD" height="300px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>WE (LM vs MtD) </b></h6>
                              <div id="ChartSeminarMTDContent">
                              <canvas id="ChartSeminarMTD" height="300px" ></canvas>  
                             </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b>HS (LY vs YtD)</b></h6> 
                             <div id="ChartSeminarHSYTDContent">
                              <canvas id="ChartSeminarHSYTD" height="250px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>HS (LM vs MtD) </b></h6>
                              <div id="ChartSeminarHSMTDContent">
                              <canvas id="ChartSeminarHSMTD" height="250px" ></canvas>  
                             </div>
                            </div>
                            
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
                             <div id="ChartWEYTDContent">
                              <canvas id="ChartWEYTD" height="170px" ></canvas>  
                            </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>Core Bisnis Last Month Vs Month to Date</b></h6>
                              <div id="ChartWEMTDContent">
                              <canvas id="ChartWEMTD" height="170px" ></canvas>  
                             </div>
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
                              <div id="ChartHSYTDContent">
                              <canvas id="ChartHSYTD" height="170px" ></canvas>  
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                        <div class="card-body">
                              <h6 class="card-title"><b>Core Bisnis Last Month Vs Month to Date</b></h6>
                              <div id="ChartHSMTDContent">
                              <canvas id="ChartHSMTD" height="170px" ></canvas>  
                             </div>
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
                              <div id="ChartAEYTDContent">
                              <canvas id="ChartAEYTD" height="100px" ></canvas>  
                              </div>
                            </div>
                           
                        </div>
                    </div>
                    
                </div>   

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                              <h6 class="card-title"><b>AE PErformance Last Month Vs Month to Date</b></h6>
                              <div id="ChartAEMTDContent">
                              <canvas id="ChartAEMTD" height="100px" ></canvas>  
                              </div>
                            </div>
                           
                        </div>
                    </div>
                    
                </div>   
                <?php }  ?>

        </div>
       
<script src="<?php echo base_url(); ?>assets/js/bispro1.js"></script>              
                                              
<?php $this->load->view('backend/footer'); ?>