<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
      <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                    &nbsp Google Analytics Report  &nbsp; &nbsp;  &nbsp; &nbsp;<font color="black"> <?php echo date('d M Y');?></font></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Google Analytics Report</li>
                       
                    </ol>
                </div>
             
            </div> 
            <iframe width="100%" height="800" src="https://datastudio.google.com/embed/reporting/7df2100a-3831-4a41-b7b0-88d0b08afd1b/page/1M" frameborder="0" style="border:0" allowfullscreen></iframe>          
</div>

               
                                               
<?php $this->load->view('backend/footer'); ?>