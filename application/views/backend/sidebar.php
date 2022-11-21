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
                            <li> <a href="<?php echo base_url(); ?>" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Website Rank </span></a></li>
                            <!--<li> <a href="<?php echo base_url(); ?>media" ><i class="mdi mdi-instagram"></i><span class="hide-menu">Media Rank </span></a></li>!-->
                            <li> <a href="<?php echo base_url(); ?>ga" ><i class="mdi mdi-gauge"></i><span class="hide-menu">GA Report </span></a></li>
                            <li> <a href="<?php echo base_url(); ?>crm" ><i class="ti-pencil-alt"></i><span class="hide-menu">CRM </span></a></li> 
                            <li> <a href="<?php echo base_url(); ?>ads" ><i class="ti-wallet"></i><span class="hide-menu">Ads </span></a></li>  
                           
                            <li> <a href="<?php echo base_url(); ?>finance" ><i class="ti-money"></i><span class="hide-menu">finance </span></a></li>   
                        <?php }?>
                        <?php if ($dep_id==7) { ?>  
                            <li> <a href="<?php echo base_url(); ?>jprof" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
                        <?php }?>
                        <?php if ($dep_id==3) { ?> 
                            <li> <a href="<?php echo base_url(); ?>bisnis" ><i class="ti-wallet"></i><span class="hide-menu">CRM </span></a></li>  
                            <li> <a href="<?php echo base_url(); ?>ads" ><i class="ti-wallet"></i><span class="hide-menu">Ads </span></a></li>  
                        <?php }?>
                        <?php if ($dep_id==8) { ?>  
                            <li> <a href="<?php echo base_url(); ?>ads" ><i class="ti-wallet"></i><span class="hide-menu">Ads </span></a></li>  
                        <?php }?>
                    </ul> 
                    
                   
                   
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>