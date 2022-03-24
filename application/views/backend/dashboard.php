<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Dashboard</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
            
                <div class="row ">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-info">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">
                                    <?php 
                                        echo $rank->we; 
                                    ?>
                                </h1>
                                <img src="<?php echo base_url();?>assets/images/we_logo.JPEG" />
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-success card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white">
                                <?php 
                                        echo $rank->populis; 
                                    ?>     <font color="red">-</font>
                                </h1>
                                <img src="<?php echo base_url();?>assets/images/populis.JPEG" />
                            </div>
                          
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-danger">
                            <div class="box text-center">
                                <h1 > <?php 
                                        echo $rank->hs; 
                                    ?>
                                </h1>
                                <img src="<?php echo base_url();?>assets/images/hs.JPEG" style="width:150px;height:25px;"/>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse card-dark">
                            <div class="box text-center">
                                <h1 class="font-light text-white">
                                <?php 
                                        echo $rank->topcore; 
                                    ?>  
                                </h1>
                                <img src="<?php echo base_url();?>assets/images/topcore.JPEG" style="width:150px;height:25px;"/>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
            </div> 
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Alexa Website Rank </h4>
                            <canvas id="myChart"></canvas>  
                            </div>
                            <br>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                            <h4 class="card-title">Website Rank List </h4>
                                <div class="">
                                    <table id="weblist" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr align="center" >
                                                <th>Date</th>
                                                <th>WE</th>
                                                <th>HS </th>
                                                <th>Populis </th>
                                                <th>Topcore</th>
                                                <th>WE TV</th>
                                            </tr>
                                        </thead>
                                
                                        <tbody>
                                           <?php foreach($web_list as $value): ?>
                                            <tr align="center" >
                                                <td><?php echo $value->tanggal; ?></td>
                                                <td><?php echo $value->we; ?></td>
                                                <td><?php echo $value->hs; ?></td>
                                                <td><?php echo $value->populis; ?></td>
                                                <td><?php echo $value->topcore; ?></td>
                                                <td><?php echo $value->we_tv; ?></td>
                                               
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>  

            
        </div>
               
<script src="<?php echo base_url(); ?>assets/js/dashboard1.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>