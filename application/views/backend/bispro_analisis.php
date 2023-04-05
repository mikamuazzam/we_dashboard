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
                    <div class="col-lg-6">
                        <div class="card "  style="height:180px">
                            <div class="card-body">
                                <h6 class="card-title" > Website &nbsp; &nbsp; <a href="#" id="clear_web"> [uncheck all] </a></h6>
                                <div class="form-check">
                               
                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="4" id="web4" checked />
                                    <label class="form-check-label" for="web4">Programmatics WE</label>
                                  
                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="10" id="web10" checked />
                                    <label class="form-check-label" for="web10">Programmatics HS</label>

                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="11" id="web11" checked />
                                    <label class="form-check-label" for="web11">Programmatics Populis</label>

                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="16" id="web16" checked />
                                    <label class="form-check-label" for="web16">Programmatics KJ</label>

                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="19" id="web19" checked />
                                    <label class="form-check-label" for="web19">Programmatics NW</label>

                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="18" id="web18" checked />
                                    <label class="form-check-label" for="web18">Programmatics Trivia</label>

                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="1" id="web1" checked />
                                    <label class="form-check-label" for="web1">Iklan WE</label>

                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="7" id="web7" checked />
                                    <label class="form-check-label" for="web7">Iklan HS</label>

                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="3" id="web3" checked />
                                    <label class="form-check-label" for="web3">Seminar Banking WE</label>
                                   
                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="2" id="web2" checked />
                                    <label class="form-check-label" for="web2">Award WE</label>

                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="9" id="web3" checked />
                                    <label class="form-check-label" for="web3">Seminar HS</label>
                                   
                                    <input class="form-check-input" name="web_name[]" type="checkbox" value="8" id="web2" checked />
                                    <label class="form-check-label" for="web2">Award HS</label>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-lg-6" >
                        <div class="card" style="height:180px">
                            <div class="card-body">
                                <h6 class="card-title"> Expenss Parameter &nbsp;&nbsp; <a href="#" id="clear_param"> [uncheck all] </a></h6>
                                <div class="form-check">
                                    <?php foreach($expenses as $value): ?>
                                    <input class="form-check-input" name="exp_name[]" type="checkbox" value="<?php echo $value->kategori_id; ?>" id="<?php echo 'exp'.$value->kategori_id; ?>" checked />
                                    <label class="form-check-label" for="<?php echo 'exp'.$value->kategori_id; ?>"><?php echo $value->name; ?></label>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                         
                        </div>
                    </div>   
                </div>
            
                
                <div class="row">
                    <div class="col-lg-6">
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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics WE v2</b></h6>
                            <div id="ChartWEPr2Content">
                            <canvas id="ChartWEPr2"  height="200px;"></canvas> 
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
                            <h6 class="card-title"> <b> Programmatics HS </b></h6>
                            <div id="ChartHSPrContent">
                            <canvas id="ChartHSPr"  height="250px;"></canvas> 
                            </div> 
                            
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics HS v2</b></h6>
                            <div id="ChartHSPr2Content">
                            <canvas id="ChartHSPr2"  height="200px;"></canvas> 
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
                            <h6 class="card-title"> <b> Programmatics Populis </b></h6>
                            <div id="ChartPPPrContent">
                            <canvas id="ChartPPPr"  height="250px;"></canvas> 
                            </div> 
                            
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics Populis v2</b></h6>
                            <div id="ChartPPPr2Content">
                            <canvas id="ChartPPPr2"  height="200px;"></canvas> 
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
                            <h6 class="card-title"> <b> Programmatics KJ </b></h6>
                            <div id="ChartKJPrContent">
                            <canvas id="ChartKJPr"  height="250px;"></canvas> 
                            </div> 
                            
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics KJ v2</b></h6>
                            <div id="ChartKJPr2Content">
                            <canvas id="ChartKJPr2"  height="200px;"></canvas> 
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
                            <h6 class="card-title"> <b> Programmatics NW </b></h6>
                            <div id="ChartNWPrContent">
                            <canvas id="ChartNWPr"  height="200px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b>Programmatics NW v2 </b></h6>
                            <div id="ChartNWPr2Content">
                            <canvas id="ChartNWPr2" height="250px;"></canvas> 
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
                            <h6 class="card-title"> <b> Programmatics Trivia </b></h6>
                            <div id="ChartTVPrContent">
                            <canvas id="ChartTVPr"  height="250px;"></canvas> 
                            </div> 
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b> Programmatics WE Trivia v2 </b></h6>
                            <div id="ChartTVPr2Content">
                            <canvas id="ChartTVPr2"  height="250px;"></canvas> 
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
                            <h6 class="card-title"> <b>Iklan WE v2 </b></h6>
                            <div id="ChartWEIklan2Content">
                            <canvas id="ChartWEIklan2" height="250px;"></canvas> 
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
                            <h6 class="card-title"> <b>Iklan HS </b></h6>
                            <div id="ChartHSIklanContent">
                            <canvas id="ChartHSIklan" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"> <b>Iklan HS v2</b></h6>
                            <div id="ChartHSIklan2Content">
                            <canvas id="ChartHSIklan2" height="250px;"></canvas> 
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
                            <h6 class="card-title"><b> Award WE v2 </b></h6>
                            <div id="ChartWEAward2Content">
                            <canvas id="ChartWEAward2" height="250px;"></canvas> 
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
                            <h6 class="card-title"><b> Seminar Banking WE  </b></h6>
                            <div id="ChartWEBankingContent">
                            <canvas id="ChartWEBanking" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b> Seminar Banking WE v2 </b></h6>
                            <div id="ChartWEBanking2Content">
                            <canvas id="ChartWEBanking2" height="250px;"></canvas> 
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
                            <h6 class="card-title"><b> Award HS </b></h6>
                            <div id="ChartHSAwardContent">
                            <canvas id="ChartHSAward" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b> Award HS v2 </b></h6>
                            <div id="ChartHSAward2Content">
                            <canvas id="ChartHSAward2" height="250px;"></canvas> 
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
                            <h6 class="card-title"><b> Seminar  HS  </b></h6>
                            <div id="ChartHSBankingContent">
                            <canvas id="ChartHSBanking" height="250px;"></canvas> 
                            </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b> Seminar HS v2 </b></h6>
                            <div id="ChartHSBanking2Content">
                            <canvas id="ChartHSBanking2" height="250px;"></canvas> 
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
            

         
                <?php }  ?>

        </div>
       
<script src="<?php echo base_url(); ?>assets/js/bispro_analisis.js"></script>              
                                              
<?php $this->load->view('backend/footer'); ?>