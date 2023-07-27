<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<link href="<?php echo base_url(); ?>assets/css/chat.css" rel="stylesheet" media='all'>

      <div class="page-wrapper">
            <br>
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 align-self-right">
                    <h5 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                      Papi kostick Report >> 
                        <select id="det_list">
                        <?php foreach($detail_list as $value):
                                 echo "<option value='".$value->aspek."'>$value->aspek</option>";
                               endforeach;?>
                        </select> </h5>
                    </div>
                    
                </div>
                
                <!-- ============================================================== -->
            </div>
            <div class="container-fluid">
            
                <!-- --------------------------Core bisnsi YTD ------->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="" id="score1Content">
                                    <canvas id="score1" height="150px;"></canvas> 
                                </div>
                                
                            </div>
                        </div>
                    </div>     
                    
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">Kesimpulan</h6>
                                <div class="" id="aspek1Content">
                                <table id="aspek1" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">     
                                </table>
                                
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="" id="score2Content">
                                    <canvas id="score2" height="150px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div>     
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">Kesimpulan</h6>
                                <div class="" id="aspek2Content">
                                <table id="aspek2" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="row" id="isian3">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="" id="score3Content">
                                    <canvas id="score3" height="150px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div>     
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">Kesimpulan</h6>
                                <div class="" id="aspek3Content" >
                                <table id="aspek3" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="row" id="isian4">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="" id="score4Content">
                                    <canvas id="score4" height="150px;"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div>     
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">Kesimpulan</h6>
                                <div class="" id="aspek4Content" >
                                <table id="aspek4" class="display  table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
                

               
            </div>
    </div>
       
     
<script src="<?php echo base_url(); ?>assets/js/psikotes2.js"></script>              
                              
<?php $this->load->view('backend/footer'); ?>