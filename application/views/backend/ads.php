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
                        Programmatic Ads This Month Revenue : Kurs USD (<?php echo number_format($nilai_kurs->kurs,2);?>) </h5>
                    </div>
                    
                </div>
                <div class="card">
                <div class="card-body">
                <div class="row ">
                    <!-- Column -->
                    <?php $total =0; 
                        foreach($laba_all as $value):
                        if($value->kurs == 'USD') $rupiah= $nilai_kurs->kurs * $value->laba;
                        else $rupiah= $value->laba;
                        
                        $total=$total+$rupiah;
                   
                     endforeach;?> 
                    
                    <div class="col-md-5 col-lg-4 col-xlg-4">
                        <div class="card card-info card-info">
                            <div class="box bg-info text-center">    
                                <h5 class="font-light text-white">
                                 Total 
                                 <?php echo 'Rp. '.number_format($total,0);?>
                                </h5>  
                                  
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-lg-4 col-xlg-4">
                        <div class="card card-warning card-warning">
                            <div class="box bg-warning text-center">    
                                <h5 class="font-light text-white">
                                 Total 
                                 <?php echo 'Rp. '.number_format($slaba_rumpita+$slaba_liberte,0);?>
                                </h5>  
                                  
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5 col-lg-4 col-xlg-4">
                        <div class="card card-primary card-primary">
                            <div class="box bg-primary text-center">    
                                <h5 class="font-light text-white">
                                 Total 
                                 <?php echo 'Rp. '.number_format($slaba_rumpita+$slaba_liberte+$total,0);?>
                                </h5>  
                                  
                            </div>
                        </div>
                    </div> 
                </div>
                    
                <div class="row ">
                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-info card-info">
                            <div class="box bg-info text-center">    
                            <h6 class="font-light text-white">
                                <?php echo 'Rp. '.number_format($slaba_we,0);?>
                            </h6> 
                            </div>
                            <img src="<?php echo base_url();?>assets/images/we.jpeg" style="width:100% ;height:22px;">    
                        </div>   
                    </div>
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-info card-info">
                            <div class="box bg-info text-center">
                            <h6 class="font-light text-white">
                                <?php echo 'Rp. '.number_format($slaba_pp,0);?>
                            </h6> 
                            </div>
                            <img src="<?php echo base_url();?>assets/images/pop.jpeg" style="width:100% ;height:22px;">
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-info card-info">
                        <div class="box bg-info text-center">
                            <h6 class="font-light text-white">
                                <?php echo 'Rp. '.number_format($slaba_hs,0);?>
                            </h6> 
                            </div>
                            
                            <img src="<?php echo base_url();?>assets/images/hs.jpeg" style="width:100% ;height:22px;">
                        </div>
                    </div>
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-info card-info">
                        <div class="box bg-info text-center">
                            <h6 class="font-light text-white">
                                <?php echo 'Rp. '.number_format($slaba_kj,0);?>
                            </h6> 
                            </div>
                            <img src="<?php echo base_url();?>assets/images/kj.jpg" style="width:100% ;height:22px;">
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-info card-info">
                        <div class="box bg-info text-center">
                            <h6 class="font-light text-white">
                                <?php echo 'Rp. '.number_format($slaba_wf,0);?>
                            </h6> 
                            </div>
                        <img src="<?php echo base_url();?>assets/images/wf.jpeg" style="width:100% ;height:22px;">
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-info card-info">
                        <div class="box bg-info text-center">
                            <h6 class="font-light text-white">
                                <?php echo 'Rp. '.number_format($slaba_nw,0);?>
                            </h6> 
                            </div>
                            <img src="<?php echo base_url();?>assets/images/nw.jpeg" style="width:100% ;height:22px;">
                        </div>
                    </div>
                    <!-- Column -->

                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-info card-info">
                        <div class="box bg-info text-center">
                            <h6 class="font-light text-white">
                                <?php echo 'Rp. '.number_format($slaba_trivia,0);?>
                            </h6>  
                            </div>
                            <img src="<?php echo base_url();?>assets/images/trivia.jpeg" style="width:100% ;height:22px;">
                        </div>
                    </div>
                    <!-- Column -->

                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-warning card-warning">
                        <div class="box bg-warning text-center">
                            <h6 class="font-light text-white">
                                <?php echo 'Rp. '.number_format($slaba_liberte,0);?>
                            </h6>  
                            </div>
                            <img src="<?php echo base_url();?>assets/images/liberte.jpg" style="width:100% ;height:22px;">
                        </div>
                    </div>
                    <!-- Column -->

                    <!-- Column -->
                    <div class="col-md-5 col-lg-2 col-xlg-2">
                        <div class="card card-warning card-warning">
                        <div class="box bg-warning text-center">
                            <h6 class="font-light text-white">
                                <?php echo 'Rp. '.number_format($slaba_rumpita,0);?>
                            </h6>  
                            </div>
                            <img src="<?php echo base_url();?>assets/images/rumpita.jpg" style="width:100% ;height:22px;">
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                </div></div>
                <!-- ============================================================== -->
            </div> 

        
            <div class="container-fluid">
            <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body" >
                                <h6 class="card-title"> This Month's Revenue Forecast </h6>
                                <div class="card card-info card-info">
                                    <div class="box bg-info text-center">
                                        <h6 class="font-light text-white">
                                            <?php echo 'Rp. '.number_format($forecast2,0);?>
                                        </h6>  
                                    </div>
                                </div>

                                <h6 class="card-title">Average Revenue (last 3 month) </h6>
                                <div class="card card-info card-info">
                                    <div class="box bg-info text-center">
                                        <h6 class="font-light text-white">
                                        <?php $total =0; 
                                            foreach($avg_rev as $value):
                                                $avg=$value->laba;
                                            
                                            $total=$total+$avg;
                                            endforeach;
                                        ?>
                                            <?php echo 'Rp. '.number_format(($total/3)*1000000,0);?>
                                        </h6>  
                                    </div>
                                </div>

                                <div id="ChartAdsTigaContent">
                                <canvas id="ChartAdsTiga" height="130px" ></canvas>  
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6" >
                        <div class="card">
                            <div class="card-body" >
                                <h6 class="card-title"> This Month's Revenue Forecast </h6>
                                <div class="card card-warning card-warning">
                                    <div class="box bg-warning text-center">
                                        <h6 class="font-light text-white">
                                            <?php echo 'Rp. '.number_format($forecast,0);?>
                                        </h6>  
                                    </div>
                                </div>

                                <h6 class="card-title">Average Revenue (last 2 month) </h6>
                                <div class="card card-warning card-warning">
                                    <div class="box bg-warning text-center">
                                        <h6 class="font-light text-white">
                                        <?php $total =0; 
                                            foreach($avg_rev2 as $value):
                                                $avg=$value->pencapaian;
                                            
                                            $total=$total+$avg;
                                            endforeach;
                                        ?>
                                            <?php echo 'Rp. '.number_format(($total/2)*1000000,0);?>
                                        </h6>  
                                    </div>
                                </div>

                                <div id="ChartAdsTigaPartnerContent">
                                <canvas id="ChartAdsTigaPartner" height="130px" ></canvas>  
                                </div>
                            </div>
                        </div>  
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body" >
                                <h6 class="card-title"> This Month's Revenue Forecast </h6>
                                <div class="card card-info card-info">
                                    <div class="box bg-info text-center">
                                        <h6 class="font-light text-white">
                                            <?php echo 'Rp. '.number_format($forecast2,0);?>
                                        </h6>  
                                    </div>
                                </div>

                                <h6 class="card-title">Average Revenue (last 3 month) </h6>
                                <div class="card card-info card-info">
                                    <div class="box bg-info text-center">
                                        <h6 class="font-light text-white">
                                        <?php $total =0; 
                                            foreach($avg_rev as $value):
                                                $avg=$value->laba;
                                            
                                            $total=$total+$avg;
                                            endforeach;
                                        ?>
                                            <?php echo 'Rp. '.number_format(($total/3)*1000000,0);?>
                                        </h6>  
                                    </div>
                                </div>

                                <div id="ChartAdsTigaContent">
                                <canvas id="ChartAdsTiga" height="130px" ></canvas>  
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="col-md-6" >
                        <div class="card">
                            <div class="card-body" >
                                
                                <div id="ChartAdsTigaPartnerContent">
                                <canvas id="ChartAdsTigaPartner" height="130px" ></canvas>  
                                </div>
                            </div>
                        </div>  
                    </div>
            </div>
            <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">Available Slot </h6>
                            <table  id="weblist" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr >
                                                <th rowspan=2 style="border: 1px solid;border-color:#CCCCCC;  vertical-align: middle;">Website</th>
                                                <th colspan=6 style="border: 1px solid;border-color:#CCCCCC; text-align: center;" >Display Banner</th>
                                                <th rowspan=2 style="border: 1px solid; border-color:#CCCCCC;vertical-align: middle;">Advernative</th>
                                                <th rowspan=2 style="border: 1px solid;border-color:#CCCCCC;  vertical-align: middle;">Mobile Video</th>
                                               
                                            </tr>
                                            <tr>
                                                <th style="border: 1px solid;border-color:#CCCCCC;text-align: center;">Mob - Top</th>
                                                <th style="border: 1px solid;border-color:#CCCCCC;text-align: center;">Mob - In Article 1</th>
                                                <th style="border: 1px solid;border-color:#CCCCCC;text-align: center;">Mob - In Article 2</th>
                                                <th style="border: 1px solid;border-color:#CCCCCC;text-align: center;">Mob - In Article 3</th>
                                                <th style="border: 1px solid;border-color:#CCCCCC;text-align: center;">Mob - Sticky Bottom</th>
                                                <th style="border: 1px solid;border-color:#CCCCCC;text-align: center;">Mob - inImage Banner</th>
                                               
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($slot_partner_list as $value):
                                                $bgcolor1='';
                                                $bgcolor2='';
                                                $bgcolor3='';
                                                $bgcolor4='';
                                                $bgcolor5='';
                                                $bgcolor6='';
                                                $bgcolor7='';
                                                $bgcolor8='';
                                                if ($value->mob_top=='available') $bgcolor1="bgcolor='pink'";
                                                if ($value->mob_in_article1== 'available') $bgcolor2="bgcolor='pink'";
                                                if ($value->mob_in_article2== 'available') $bgcolor3="bgcolor='pink'";
                                                if ($value->mob_in_article3== 'available') $bgcolor4="bgcolor='pink'";
                                                if ($value->mob_sticky_bottom== 'available') $bgcolor5="bgcolor='pink'";
                                                if ($value->mob_in_imagebanner== 'available') $bgcolor6="bgcolor='pink'";
                                                if ($value->mob_nativead== 'available') $bgcolor7="bgcolor='pink'";
                                                if ($value->mob_video== 'available') $bgcolor8="bgcolor='pink'";
                                                
                                        ?>
                                            <tr>
                                            <td style="text-align: center;" ><?php echo $value->website_name; ?></td>
                                            <td style="text-align: center;" <?php echo $bgcolor1;?>><?php echo $value->mob_top; ?></td>
                                            <td style="text-align: center;" <?php echo $bgcolor2;?>><?php echo $value->mob_in_article1; ?></td>
                                            <td style="text-align: center;" <?php echo $bgcolor3;?>><?php echo $value->mob_in_article2; ?></td>
                                            <td style="text-align: center;" <?php echo $bgcolor4;?>><?php echo $value->mob_in_article3; ?></td>
                                            <td style="text-align: center;" <?php echo $bgcolor5;?>><?php echo $value->mob_sticky_bottom; ?></td>
                                            <td style="text-align: center;" <?php echo $bgcolor6;?>><?php echo $value->mob_in_imagebanner; ?></td>
                                            <td style="text-align: center;" <?php echo $bgcolor7?>><?php echo $value->mob_nativead; ?></td>
                                            <td style="text-align: center;" <?php echo $bgcolor8;?>><?php echo $value->mob_video; ?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div> 
                </div>
                  
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                             <h6 class="card-title">Total Balance Advernative Ads </h6>
                                <div class="" >
                                    <table id="weblist" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Website</th>
                                                <th>Deposit Date</th>
                                                <th>Deposit</th>
                                                <th>Revenue</th>
                                                <th>Balance</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($balance_list as $value):
                                                if($value->id == 1)
                                                    $laba=$laba_we->revenue;
                                                else if ($value->id == 2)
                                                    $laba= $laba_hs->revenue;
                                                else if ($value->id == 3)
                                                    $laba= $laba_pp->revenue;
                                                else if ($value->id == 4)
                                                    $laba=$laba_kj->revenue;
                                                else if ($value->id == 5)
                                                    $laba=$laba_wf->revenue;
                                                else if ($value->id == 6)
                                                    $laba=$laba_nw->revenue;  
                                                else $laba=0;

                                                $sisa=$value->deposit -$laba;
                                                ?>
                                            <tr >

                                                <td><?php echo $value->website_name; ?></td>
                                                <td><?php echo $value->tanggal_deposit; ?></td>
                                                <td align="right">$<?php echo $value->deposit; ?></td>
                                                <td align="right">$<?php echo number_format($laba,2); ?></td>
                                                <td align="right" bgcolor="pink">$<?php echo number_format( $sisa,2); ?></td>
                                                                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>  
                    
                </div> 
                     
                <div class="row">
                    <div class="col-lg-12">
                    <div class="row page-titles">
                    <div class="col-md-4 align-self-right">
                    <h5 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                        Programmatic Ads <label id="calenderbulan"></label> </h5>
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
                        <select id="partner">
                        <?php foreach($partner_list as $value):
                                 echo "<option value=$value->id>$value->name</option>";
                               endforeach;?>
                        </select>
                        <button class="btn-sm btn-primary" id="cari">Filter</button>
                    </div>  
                </div>  
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body" >
                            <h6 class="card-title"></h6>
                            <div id="ChartAdsMonthContent">
                            <canvas id="ChartAdsMonth" height="100px" ></canvas>  
                            </div>
                            </div>
                        </div>
                    </div>  
               
                    
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" >
                                <div class="" >
                                <h6 class="card-title">Monthly Revenue By Partner IDR</h6>
                                    <table id="partner-monthly-list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" height="100px">
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
                            <h6 class="card-title"></h6>
                            <div id="ChartRevenueIDRContent">
                            <canvas id="ChartRevenueIDR" height="100px" ></canvas>  
                            </div>
                            </div>
                            <br>
                        </div>
                    </div> 
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body" >
                                <div class="" >
                                <h6 class="card-title"> <div id="total1"></div></h6>
                                    <table id="ads-monthly-list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%" height="100px">
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>    
                </div>          
                
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" >
                            <h6 class="card-title"></h6>
                            <div id="ChartAdsContent">
                            <canvas id="ChartAds" height="150px" ></canvas>
                            </div>  
                            </div>
                        </div>
                    </div>      
                </div>               
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" >
                                <div class="" >
                                <h6 class="card-title">Daily </h6>
                                    <table id="ads-we-list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                     
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>  
                
            </div>
       
       
<script src="<?php echo base_url(); ?>assets/js/ads.js"></script>              
<script>
</script>                                               
<?php $this->load->view('backend/footer'); ?>