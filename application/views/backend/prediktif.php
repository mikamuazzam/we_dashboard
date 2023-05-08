<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <br>
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 align-self-right">
                    <h5 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                        Prediktif Analisis</h5>
                    </div>
                </div>
                <!-- ============================================================== -->
            </div> 
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body" >
                                
                                <div id="ChartAdsTigaContent">
                                <canvas id="ChartAdsTiga" height="100px" ></canvas>  
                                </div>
                                </div>
                            </div>
                        </div>      
                </div>
                <div class="row page-titles">
                    <div class="col-md-12 align-self-right">
                    <h5 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                       Last 3 Month Prediction Vs Actual </h5>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body" >
                                
                                <div id="ChartIklanContent">
                                <canvas id="ChartIklan" height="100px" ></canvas>  
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body" >
                                <div id="ChartAwardContent">
                                <canvas id="ChartAward" height="100px" ></canvas>  
                                </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body" >
                                <div id="ChartSeminarContent">
                                <canvas id="ChartSeminar" height="100px" ></canvas>  
                                </div>
                                </div>
                            </div>
                        </div>       
                </div>
            </div>
                
       
<script src="<?php echo base_url(); ?>assets/js/prediktif.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>