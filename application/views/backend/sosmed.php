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
                        Social Media Ads This Month Revenue 
                        
                    </h5>
                    </div>
                    
                </div>
                <div class="card">
                <div class="card-body">
               
                <div class="row ">
                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-info card-info">
                            <div class="box bg-info text-center">    
                            <h6 class="font-light text-white">
                            <?php echo 'Rp. '.number_format($yt_we,0);?>
                            </h6> 
                            </div>
                            <img src="<?php echo base_url();?>assets/images/yt.jpg" style="width:100% ;height:22px;">   
                        </div>   
                    </div>
                    

                    <div class="col-md-5 col-lg-4 col-xlg-4">
                        <div class="card card-info card-info">
                            <div class="box bg-info text-center">    
                                <h5 class="font-light text-white">
                                 Total  : 
                                 <?php echo 'Rp. '.number_format($sosmed_all,0);?>
                                </h5>  
                                  
                            </div>
                        </div>
                    </div>
                   
                </div>
                </div></div>
                <!-- ============================================================== -->
            </div> 
            <div class="container-fluid">
            <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body" >
                            
                            <div id="ChartAdsTigaContent">
                            <canvas id="ChartAdsTiga" height="100px" ></canvas>  
                            </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-4" >
                        <div class="card">
                            <div class="card-body" >
                            <h6 class="card-title">Average Revenue (last 2 month) </h6>
                                <div class="card card-info card-info">
                                    <div class="box bg-info text-center">
                                    <h6 class="font-light text-white">
                                        <?php $total =0; 
                                            foreach($avg_rev as $value):
                                                $avg=$value->laba;
                                            
                                            $total=$total+$avg;
                                            endforeach;
                                        ?>
                                            <?php echo 'Rp. '.number_format(($total/2),0);?>
                                        </h6>   
                                    
                                    </div>
                                </div>
                            </div>
                           
                        </div>  
                    </div>
            </div>
                                        </div>
                
       
<script src="<?php echo base_url(); ?>assets/js/sosmed.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>