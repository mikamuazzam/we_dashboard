        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                        <?php 
                        $id = $this->session->userdata('user_login_id');
                        $dep_id = $this->session->userdata('dept');
                        $basicinfo = $this->employee_model->GetBasic($id); 
                        ?>                
                <div class="user-profile">
                  

                    <!-- User profile text-->
                    <div class="profile-text">
                     </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                   
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <?php if ($dep_id==2) { ?> 
                            <li> <a href="<?php echo base_url(); ?>" ><i class="ti-bar-chart"></i><span class="hide-menu">Media Rank </span></a></li>
                            <!--<li> <a href="<?php echo base_url(); ?>media" ><i class="mdi mdi-instagram"></i><span class="hide-menu">Media Rank </span></a></li>!-->
                            <li> <a href="<?php echo base_url(); ?>ga" ><i class="mdi mdi-gauge"></i><span class="hide-menu">GA Report </span></a></li>
                            <li> <a href="<?php echo base_url(); ?>crm" ><i class="ti-pencil-alt"></i><span class="hide-menu">CRM </span></a></li> 
                            <li> <a href="<?php echo base_url(); ?>ads" ><i class="ti-wordpress"></i><span class="hide-menu">Media Ads </span></a></li>
                            <li> <a href="<?php echo base_url(); ?>sosmed" ><i class="ti-youtube"></i><span class="hide-menu">Sosmed Ads </span></a></li>
                            <li> <a href="<?php echo base_url(); ?>bispro" ><i class="ti-wallet"></i><span class="hide-menu">Business Controll </span></a></li> 
                            <li> <a href="<?php echo base_url(); ?>bispro_analisis" ><i class="ti-pulse"></i><span class="hide-menu">Business Analisis </span></a></li>
                            <li> <a href="<?php echo base_url(); ?>prediktif" ><i class="ti-pulse"></i><span class="hide-menu">Prediktif Analisis </span></a></li>  
                            <li> <a href="<?php echo base_url(); ?>finance" ><i class="ti-money"></i><span class="hide-menu">finance </span></a></li>
                            <li> <a href="<?php echo base_url(); ?>event" ><i class="ti-pencil-alt"></i><span class="hide-menu">Event </span></a></li>
                            <li> <a href="<?php echo base_url(); ?>income" ><i class="ti-briefcase"></i><span class="hide-menu">Project Income </span></a></li>
                            <li> <a href="<?php echo base_url(); ?>psikotes" ><i class="ti-pulse"></i><span class="hide-menu">Psikotes </span></a></li>    
                        <?php }?>
                        <?php if ($dep_id==7) { ?>  
                            <li> <a href="<?php echo base_url(); ?>jprof" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
                        <?php }?>
                        <?php if ($dep_id==3) { ?> 
                            <li> <a href="<?php echo base_url(); ?>bisnis" ><i class="ti-wallet"></i><span class="hide-menu">CRM </span></a></li>  
                            <li> <a href="<?php echo base_url(); ?>ads" ><i class="ti-wallet"></i><span class="hide-menu">Media Ads </span></a></li> 
                            <li> <a href="<?php echo base_url(); ?>event" ><i class="ti-pencil-alt"></i><span class="hide-menu">Event </span></a></li>    
                        <?php }?>
                        <?php if ($dep_id==8) { ?>  
                            <li> <a href="<?php echo base_url(); ?>ads" ><i class="ti-wallet"></i><span class="hide-menu">Ads </span></a></li>
                            <li> <a href="<?php echo base_url(); ?>bispro" ><i class="ti-wallet"></i><span class="hide-menu">Business Controll </span></a></li>
                            <li> <a href="<?php echo base_url(); ?>event" ><i class="ti-pencil-alt"></i><span class="hide-menu">Event </span></a></li>       
                        <?php }?>
                        <?php if ($dep_id==9 || $dep_id==10 ) { ?>  
                            <li> <a href="<?php echo base_url(); ?>event" ><i class="ti-pencil-alt"></i><span class="hide-menu">Event </span></a></li>  
                            
                        <?php }?>
                        <?php if ($dep_id==11  ) { ?>  
                            <li> <a href="<?php echo base_url(); ?>psikotes" ><i class="ti-pulse"></i><span class="hide-menu">Psikotes </span></a></li>    
                        <?php }?>

                        <?php if ($dep_id==13  ) { ?>  
                            <li> <a href="<?php echo base_url(); ?>finance" ><i class="ti-money"></i><span class="hide-menu">finance </span></a></li>
                        <?php }?>
                        <?php if ($dep_id==9 ) { ?>  
                            <li> <a href="<?php echo base_url(); ?>income" ><i class="ti-briefcase"></i><span class="hide-menu">Project Income </span></a></li> 
                        <?php }?>
                    </ul> 
                    
                   
                   
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>