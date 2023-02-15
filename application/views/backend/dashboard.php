<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Dashboard Media Rank</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Media Rank</li>
                    </ol>
                </div>
            </div>
            
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <div class="row ">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-2">
                        <div class="card card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_we_now=$rank->we;
                                    $nilai_we_last= $rank_last->we;
                                    $nilai_we =$nilai_we_now -  $nilai_we_last ;
                                    $nilai_we1 =$nilai_we_last -  $nilai_we_now ;
                                ?>
                                <h4 class="font-light ">
                                    <?php echo $rank->we; ?>
                                    <?php 
                                        if($nilai_we_now == $nilai_we_last) echo "(=)"; 
                                        else  if($nilai_we_now > $nilai_we_last) echo "<font color='red'>&darr; (".$nilai_we.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_we1.") </font>";
                                    ?>
                                </h4>
                                <img src="<?php echo base_url();?>assets/images/we_logo.jpeg" style="width:100px ;height:22px;">
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-2">
                        <div class="card  card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_populis_now=$rank->populis;
                                    $nilai_populis_last= $rank_last->populis;
                                    $nilai_populis =$nilai_populis_now -  $nilai_populis_last ;
                                    $nilai_populis1 =$nilai_populis_last -  $nilai_populis_now ;
                                ?>
                                <h4 class="font-light">
                                    <?php echo $rank->populis; ?>
                                    <?php 
                                        if($nilai_populis_now == $nilai_populis_last) echo "(=)"; 
                                        else  if( $nilai_populis_now > $nilai_populis_last) echo "<font color='red'>&darr; (".$nilai_populis.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_populis1.") </font>";
                                    ?>
                                </h4>
                                <img src="<?php echo base_url();?>assets/images/populis.jpeg" style="width:100px ;height:22px;">
                            </div>
                          
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-2">
                        <div class="card card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_hs_now=$rank->hs;
                                    $nilai_hs_last= $rank_last->hs;
                                    $nilai_hs =$nilai_hs_now -  $nilai_hs_last ;
                                    $nilai_hs1 =$nilai_hs_last -  $nilai_hs_now ;
                                ?>
                                <h4 class="font-light ">
                                    <?php echo $rank->hs; ?>
                                    <?php 
                                        if($nilai_hs_now == $nilai_hs_last) echo "(=)"; 
                                        else  if($nilai_hs_now > $nilai_hs_last) echo "<font color='red'>&darr; (".$nilai_hs.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_hs1.") </font>";
                                    ?>
                                
                                </h4>
                                <img src="<?php echo base_url();?>assets/images/hs.jpeg" style="width:100px ;height:25px;">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-2 col-xlg-2">
                        <div class="card card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_kj_now=$rank->konten_jatim;
                                    $nilai_kj_last= $rank_last->konten_jatim;
                                    $nilai_kj =$nilai_kj_now -  $nilai_kj_last ;
                                    $nilai_kj1 =$nilai_kj_last -  $nilai_kj_now ;
                                ?>
                                <h4 class="font-light ">
                                    <?php echo $rank->konten_jatim; ?>
                                    <?php 
                                        if($nilai_kj_now == $nilai_kj_last) echo "(=)"; 
                                        else  if($nilai_kj_now > $nilai_kj_last) echo "<font color='red'>&darr; (".$nilai_kj.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_kj1.") </font>";
                                    ?>
                                </h4>
                                <img src="<?php echo base_url();?>assets/images/kj.jpg" style="width:100px ;height:25px;">
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-2">
                        <div class="card  card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_wf_now=$rank->we_finance;
                                    $nilai_wf_last= $rank_last->we_finance;
                                    $nilai_wf =$nilai_wf_now -  $nilai_wf_last ;
                                    $nilai_wf1 =$nilai_wf_last -  $nilai_wf_now ;
                                ?>
                                <h4 class="font-light">
                                    <?php echo $rank->we_finance; ?>
                                    <?php 
                                        if($nilai_wf_now == $nilai_wf_last) echo "(=)"; 
                                        else  if( $nilai_wf_now > $nilai_wf_last) echo "<font color='red'>&darr; (".$nilai_wf.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_wf1.") </font>";
                                    ?>
                                </h4>
                                <img src="<?php echo base_url();?>assets/images/we_finance.jpeg" style="width:100px ;height:25px;">
                            </div>
                          
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-2 col-xlg-2">
                        <div class="card card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_nw_now=$rank->news_worthy;
                                    $nilai_nw_last= $rank_last->news_worthy;
                                    $nilai_nw =$nilai_nw_now -  $nilai_nw_last ;
                                    $nilai_nw1 =$nilai_nw_last -  $nilai_nw_now ;
                                ?>
                                <h4 class="font-light ">
                                    <?php echo $rank->news_worthy; ?>
                                    <?php 
                                        if($nilai_nw_now == $nilai_nw_last) echo "(=)"; 
                                        else  if($nilai_nw_now > $nilai_nw_last) echo "<font color='red'>&darr; (".$nilai_nw.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_nw1.") </font>";
                                    ?>
                                
                                </h4>
                                <img src="<?php echo base_url();?>assets/images/nw.jpeg" style="width:100px ;height:25px;">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
            </div> 
            
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title"><b> News Media Website Rank List </b></h6>
                                <div id="MediaRank">
                                <canvas id="myChartWE" style="height:250px;"></canvas>  
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

                <div class="card">
                    <br>
                      <h6 class="card-title"><b>&nbsp;&nbsp;&nbsp; Social Media Wartaekonomi </b></h6>
                
                <div class="row">
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank">
                                <canvas id="ig_we" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank2">
                                <canvas id="tiktok_we" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                           
                                <div id="MediaRank3">
                                <canvas id="yt_we" style="height:200px;"></canvas>  
                                </div>
                            </div>
                    </div>
                </div>
    
                </div>
           
                <div class="card">
                    <br>
                      <h6 class="card-title"><b>&nbsp;&nbsp;&nbsp; Social Media Herstory </b></h6>
                
                <div class="row">
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank">
                                <canvas id="ig_hs" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank2">
                                <canvas id="tiktok_hs" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                           
                                <div id="MediaRank3">
                                <canvas id="yt_hs" style="height:200px;"></canvas>  
                                </div>
                            </div>
                    </div>
                </div>
                </div>

                <div class="card">
                    <br>
                      <h6 class="card-title"><b>&nbsp;&nbsp;&nbsp; Social Media Populis </b></h6>
                
                <div class="row">
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank">
                                <canvas id="ig_pp" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank2">
                                <canvas id="tiktok_pp" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                           
                                <div id="MediaRank3">
                                <canvas id="yt_pp" style="height:200px;"></canvas>  
                                </div>
                            </div>
                    </div>
                </div>
                </div>


                <div class="card">
                    <br>
                      <h6 class="card-title"><b>&nbsp;&nbsp;&nbsp; Social Media Konten Jatim </b></h6>
                
                <div class="row">
                    
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank">
                                <canvas id="ig_kj" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank2">
                                <canvas id="tiktok_kj" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                           
                                <div id="MediaRank3">
                                <canvas id="yt_kj" style="height:200px;"></canvas>  
                                </div>
                            </div>
                    </div>
                </div>
                </div>

                <div class="card">
                    <br>
                      <h6 class="card-title"><b>&nbsp;&nbsp;&nbsp; Social Media Generasi Sawit </b></h6>
                
                <div class="row">
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank">
                                <canvas id="ig_gs" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank2">
                                <canvas id="tiktok_gs" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                           
                                <div id="MediaRank3">
                                <canvas id="yt_gs" style="height:200px;"></canvas>  
                                </div>
                            </div>
                    </div>
                </div>
                </div>

                <div class="card">
                    <br>
                      <h6 class="card-title"><b>&nbsp;&nbsp;&nbsp; Social Media WE Academy </b></h6>
                
                <div class="row">
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank">
                                <canvas id="ig_wea" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                                <div id="MediaRank2">
                                <canvas id="tiktok_wea" style="height:200px;"></canvas>  
                                </div>
                            </div>   
                    </div>
                    <div class="col-lg-4">
                            <div class="card-body">
                           
                                <div id="MediaRank3">
                                <canvas id="yt_wea" style="height:200px;"></canvas>  
                                </div>
                            </div>
                    </div>
                </div>
                </div>
                <!--
                <div class="row">
                    <div class="col-lg-12"  >
                        <div class="card">
                            <div class="card-body" style="height:370px;">
                            <h4 class="card-title">Website Rank List </h4>
                                <div class="" >
                                    <table id="weblist" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                                <th>Date</th>
                                                <th>WE</th>
                                                <th>HS </th>
                                                <th>Populis </th>
                                                <th>Konten Jatim </th>
                                                <th>WE Finance</th>
                                                <th>News Worthy</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($web_list as $value): ?>
                                            <tr  >
                                                <td><?php echo $value->tgl; ?></td>
                                                <td><?php echo $value->we; ?></td>
                                                <td><?php echo $value->hs; ?></td>
                                                <td><?php echo $value->populis; ?></td>
                                                <td><?php echo $value->konten_jatim; ?></td>
                                                <td><?php echo $value->we_finance; ?></td>
                                                <td><?php echo $value->news_worthy; ?></td>
                                               
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div> 
                                           --> 
            
        </div>
       
<script src="<?php echo base_url(); ?>assets/js/dashboard.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>