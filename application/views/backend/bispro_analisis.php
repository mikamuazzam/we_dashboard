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
                    <h6 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Business Analisis</h6>
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
                            <div id="ChartHSPrContent1">
                            <canvas id="ChartHSPr1"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics Populis </b></h6>
                            <div id="ChartPPPrContent1">
                            <canvas id="ChartPPPr1"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b>Programmatics KJ </b></h6>
                            <div id="ChartKJPrContent1">
                            <canvas id="ChartKJPr1" height="250px;"></canvas> 
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
                            <div id="ChartNWPrContent1">
                            <canvas id="ChartNWPr1"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics WE Trivia </b></h6>
                            <div id="ChartTVPrContent1">
                            <canvas id="ChartTVPr1"  height="250px;"></canvas> 
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
                            <div id="ChartHSIklanContent1">
                            <canvas id="ChartHSIklan1" height="250px;"></canvas> 
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
                            <div id="ChartQ1Content1">
                            <canvas id="ChartQ11"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b>Q1 Revitalisasi</b></h6>
                            <div id="ChartQ1RevContent1">
                            <canvas id="ChartQ1Rev1" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>   
            </div>
            

         
                <?php }  ?>

        </div>
       
<script src="<?php echo base_url(); ?>assets/js/bispro_analisis.js"></script>              
                                              
<?php $this->load->view('backend/footer'); ?>