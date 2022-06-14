        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                        <?php 
                        $id = $this->session->userdata('user_login_id');
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
                        <li> <a href="<?php echo base_url(); ?>" ><i class="mdi mdi-gauge"></i><span class="hide-menu">Website Rank </span></a></li>
                        <!--<li> <a href="<?php echo base_url(); ?>media" ><i class="mdi mdi-instagram"></i><span class="hide-menu">Media Rank </span></a></li>!-->
                        <li> <a href="<?php echo base_url(); ?>crm" ><i class="ti-wallet"></i><span class="hide-menu">CRM </span></a></li>  
                    </ul> 
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>