<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>&nbsp Dashboard Media  Rank</h3>
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
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">
                            <i class="mdi mdi-youtube-play"></i>
                            &nbsp Youtube  Rank</h3>
                    </div>
                </div>
                <div class="row ">
                    <!-- Column -->
                   
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_we_now=$rank->we;
                                    $nilai_we_last= $rank_last->we;
                                    $nilai_we =$nilai_we_now -  $nilai_we_last ;
                                    $nilai_we1 =$nilai_we_last -  $nilai_we_now ;
                                ?>
                                <h1 class="font-light ">
                                    <?php echo $rank->we; ?>
                                    <?php 
                                        if($nilai_we_now == $nilai_we_last) echo "(=)"; 
                                        else  if($nilai_we_now > $nilai_we_last) echo "<font color='red'>&darr; (".$nilai_we.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_we1.") </font>";
                                    ?>
                                </h1>
                                <h5 class="font-bold text-black">Warta Ekonomi </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card  card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_populis_now=$rank->populis;
                                    $nilai_populis_last= $rank_last->populis;
                                    $nilai_populis =$nilai_populis_now -  $nilai_populis_last ;
                                    $nilai_populis1 =$nilai_populis_last -  $nilai_populis_now ;
                                ?>
                                <h1 class="font-light">
                                    <?php echo $rank->populis; ?>
                                    <?php 
                                        if($nilai_populis_now == $nilai_populis_last) echo "(=)"; 
                                        else  if( $nilai_populis_now > $nilai_populis_last) echo "<font color='red'>&darr; (".$nilai_populis.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_populis1.") </font>";
                                    ?>
                                </h1>
                                <h5 class="font-bold text-black">Populis </h4>
                            </div>
                          
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse">
                            <div class="box text-center">
                                
                                <?php 
                                    $nilai_hs_now=$rank->hs;
                                    $nilai_hs_last= $rank_last->hs;
                                    $nilai_hs =$nilai_hs_now -  $nilai_hs_last ;
                                    $nilai_hs1 =$nilai_hs_last -  $nilai_hs_now ;
                                ?>
                                <h1 class="font-light ">
                                    <?php echo $rank->hs; ?>
                                    <?php 
                                        if($nilai_hs_now == $nilai_hs_last) echo "(=)"; 
                                        else  if($nilai_hs_now > $nilai_hs_last) echo "<font color='red'>&darr; (".$nilai_hs.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_hs1.") </font>";
                                    ?>
                                
                                </h1>
                                <h5 class="font-bold text-black">Herstory </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse">
                            <div class="box text-center">
                            <?php 
                                    $nilai_tc_now=$rank->we_tv;
                                    $nilai_tc_last= $rank_last->we_tv;
                                    $nilai_tc =$nilai_tc_now -  $nilai_tc_last ;
                                    $nilai_tc1 =$nilai_tc_last -  $nilai_tc_now ;
                                ?>
                                <h1 class="font-light">
                                    <?php //echo $rank->we_tv; ?>
                                    <?php 
                                      /*  if($nilai_tc_now == $nilai_tc_last) echo "(=)"; 
                                        else  if($nilai_tc_now > $nilai_tc_last) echo "<font color='red'>&darr; (".$nilai_tc.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_tc1.") </font>";*/
                                    ?> 0</h1>
                                <h5 class="font-bold text-black">Konten Jatim </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">
                            <i class="mdi mdi-instagram"></i>
                            &nbsp Instagram  Rank</h3>
                    </div>
                </div>
                <div class="row ">
                    <!-- Column -->
                   
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_we_now=$rank->we;
                                    $nilai_we_last= $rank_last->we;
                                    $nilai_we =$nilai_we_now -  $nilai_we_last ;
                                    $nilai_we1 =$nilai_we_last -  $nilai_we_now ;
                                ?>
                                <h1 class="font-light ">
                                    <?php echo $rank->we; ?>
                                    <?php 
                                        if($nilai_we_now == $nilai_we_last) echo "(=)"; 
                                        else  if($nilai_we_now > $nilai_we_last) echo "<font color='red'>&darr; (".$nilai_we.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_we1.") </font>";
                                    ?>
                                </h1>
                                <h5 class="font-bold text-black">Warta Ekonomi</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card  card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_populis_now=$rank->populis;
                                    $nilai_populis_last= $rank_last->populis;
                                    $nilai_populis =$nilai_populis_now -  $nilai_populis_last ;
                                    $nilai_populis1 =$nilai_populis_last -  $nilai_populis_now ;
                                ?>
                                <h1 class="font-light">
                                    <?php echo $rank->populis; ?>
                                    <?php 
                                        if($nilai_populis_now == $nilai_populis_last) echo "(=)"; 
                                        else  if( $nilai_populis_now > $nilai_populis_last) echo "<font color='red'>&darr; (".$nilai_populis.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_populis1.") </font>";
                                    ?>
                                </h1>
                                <h5 class="font-bold text-black">Populis </h4>
                            </div>
                          
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse">
                            <div class="box text-center">
                                
                                <?php 
                                    $nilai_hs_now=$rank->hs;
                                    $nilai_hs_last= $rank_last->hs;
                                    $nilai_hs =$nilai_hs_now -  $nilai_hs_last ;
                                    $nilai_hs1 =$nilai_hs_last -  $nilai_hs_now ;
                                ?>
                                <h1 class="font-light ">
                                    <?php echo $rank->hs; ?>
                                    <?php 
                                        if($nilai_hs_now == $nilai_hs_last) echo "(=)"; 
                                        else  if($nilai_hs_now > $nilai_hs_last) echo "<font color='red'>&darr; (".$nilai_hs.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_hs1.") </font>";
                                    ?>
                                
                                </h1>
                                <h5 class="font-bold text-black">Herstory </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse">
                            <div class="box text-center">
                            <?php 
                                    $nilai_tc_now=$rank->we_tv;
                                    $nilai_tc_last= $rank_last->we_tv;
                                    $nilai_tc =$nilai_tc_now -  $nilai_tc_last ;
                                    $nilai_tc1 =$nilai_tc_last -  $nilai_tc_now ;
                                ?>
                                <h1 class="font-light">
                                    <?php //echo $rank->we_tv; ?>
                                    <?php 
                                      /*  if($nilai_tc_now == $nilai_tc_last) echo "(=)"; 
                                        else  if($nilai_tc_now > $nilai_tc_last) echo "<font color='red'>&darr; (".$nilai_tc.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_tc1.") </font>";*/
                                    ?> 0</h1>
                                <h5 class="font-bold text-black">Konten Jatim </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">
                        <img src="<?php echo base_url();?>assets/images/tiktok.png" style="width:25px;height:25px;" />
                            &nbsp Tiktok  Rank</h3>
                    </div>
                </div>
                <div class="row ">
                    <!-- Column -->
                   
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_we_now=$rank->we;
                                    $nilai_we_last= $rank_last->we;
                                    $nilai_we =$nilai_we_now -  $nilai_we_last ;
                                    $nilai_we1 =$nilai_we_last -  $nilai_we_now ;
                                ?>
                                <h1 class="font-light ">
                                    <?php echo $rank->we; ?>
                                    <?php 
                                        if($nilai_we_now == $nilai_we_last) echo "(=)"; 
                                        else  if($nilai_we_now > $nilai_we_last) echo "<font color='red'>&darr; (".$nilai_we.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_we1.") </font>";
                                    ?>
                                </h1>
                                <h5 class="font-bold text-black">Warta Ekonomi </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card  card-inverse">
                            <div class="box text-center">
                                <?php 
                                    $nilai_populis_now=$rank->populis;
                                    $nilai_populis_last= $rank_last->populis;
                                    $nilai_populis =$nilai_populis_now -  $nilai_populis_last ;
                                    $nilai_populis1 =$nilai_populis_last -  $nilai_populis_now ;
                                ?>
                                <h1 class="font-light">
                                    <?php echo $rank->populis; ?>
                                    <?php 
                                        if($nilai_populis_now == $nilai_populis_last) echo "(=)"; 
                                        else  if( $nilai_populis_now > $nilai_populis_last) echo "<font color='red'>&darr; (".$nilai_populis.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_populis1.") </font>";
                                    ?>
                                </h1>
                                <h5 class="font-bold text-black">Populis </h4>
                            </div>
                          
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse">
                            <div class="box text-center">
                                
                                <?php 
                                    $nilai_hs_now=$rank->hs;
                                    $nilai_hs_last= $rank_last->hs;
                                    $nilai_hs =$nilai_hs_now -  $nilai_hs_last ;
                                    $nilai_hs1 =$nilai_hs_last -  $nilai_hs_now ;
                                ?>
                                <h1 class="font-light ">
                                    <?php echo $rank->hs; ?>
                                    <?php 
                                        if($nilai_hs_now == $nilai_hs_last) echo "(=)"; 
                                        else  if($nilai_hs_now > $nilai_hs_last) echo "<font color='red'>&darr; (".$nilai_hs.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_hs1.") </font>";
                                    ?>
                                
                                </h1>
                                <h5 class="font-bold text-black">Herstory</h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-inverse">
                            <div class="box text-center">
                            <?php 
                                    $nilai_tc_now=$rank->we_tv;
                                    $nilai_tc_last= $rank_last->we_tv;
                                    $nilai_tc =$nilai_tc_now -  $nilai_tc_last ;
                                    $nilai_tc1 =$nilai_tc_last -  $nilai_tc_now ;
                                ?>
                                <h1 class="font-light">
                                    <?php //echo $rank->we_tv; ?>
                                    <?php 
                                      /*  if($nilai_tc_now == $nilai_tc_last) echo "(=)"; 
                                        else  if($nilai_tc_now > $nilai_tc_last) echo "<font color='red'>&darr; (".$nilai_tc.") </font>";
                                        else echo "<font color='blue'> &uarr;(".$nilai_tc1.") </font>";*/
                                    ?> 0</h1>
                                <h5 class="font-bold text-black">Konten Jatim </h4>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>    
            </div> 
            
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12"  >
                        <div class="card">
                            <div class="card-body" style="height:370px;">
                            <h4 class="card-title">WMedia ebsite Rank List </h4>
                                <div class="" >
                                    <table id="weblist" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                                <th>Date</th>
                                                <th>WE</th>
                                                <th>HS </th>
                                                <th>Populis </th>
                                                <th>Konten Jatim</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($web_list as $value): ?>
                                            <tr  >
                                                <td><?php echo $value->tgl; ?></td>
                                                <td><?php echo $value->we; ?></td>
                                                <td><?php echo $value->hs; ?></td>
                                                <td><?php echo $value->populis; ?></td>
                                               
                                                <td><?php echo '0'; ?></td>
                                               
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
               
<script src="<?php echo base_url(); ?>assets/js/media.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>