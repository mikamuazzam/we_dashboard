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
                    <?php if ($dep_id==2) { ?> 
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a href="<?php echo base_url(); ?>" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Website Rank </span></a></li>
                        <!--<li> <a href="<?php echo base_url(); ?>media" ><i class="mdi mdi-instagram"></i><span class="hide-menu">Media Rank </span></a></li>!-->
                        <li> <a href="<?php echo base_url(); ?>ga" ><i class="mdi mdi-gauge"></i><span class="hide-menu">GA Report </span></a></li>
                        <li> <a href="<?php echo base_url(); ?>crm" ><i class="ti-wallet"></i><span class="hide-menu">CRM </span></a></li>  
                    </ul> 
                    <?php }?>
                    <?php if ($dep_id==7) { ?> 
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a href="<?php echo base_url(); ?>jprof" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
                    </ul> 
                    <?php }?>
                    <?php if ($dep_id==3) { ?> 
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a href="<?php echo base_url(); ?>bisnis" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Performance </span></a></li>
                    </ul> 
                    <?php }?>
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>