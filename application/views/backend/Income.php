<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
<link href="<?php echo base_url(); ?>assets/css/chat.css" rel="stylesheet" media='all'>
<script>
$(function() {
   
   $('#isian').scrollTop($('#isian')[0].scrollHeight);
  
});
</script>
      <div class="page-wrapper">
            <br>
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-12 align-self-right">
                    <h5 class="text-themecolor"><i class="fa fa-braille" style="color:#1976d2"></i>
                       Project Income </h5>
                    </div>
                    
                </div>
                
                <!-- ============================================================== -->
            </div>
            <div class="container-fluid">
            
                <!-- --------------------------Core bisnsi YTD ------->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">List Events </h6>
                           
                                <div class="">
                                    <table id="listevent"  class="display table table-hover table-striped table-bordered" width="100%">
                                       
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>     
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                            <h6 class="card-title">Detail Income</h6>
                                <div class="">
                                    <table   class="display table table-hover table-striped table-bordered" width="100%">
                                        <thead>
                                           
                                            <tr >
                                                <th align="left" style="border: 1px solid #CCC;" ></th>
                                                <th  bgcolor="#089031" style="border: 1px solid #CCC;"><font color="white"><b>Wartaekonomi</b></font></th>
                                                <th  bgcolor="#E78415" style="border: 1px solid #CCC;"><font color="white"><b>Promedia</b></font></th>
                                                <th  bgcolor="#158BE7" style="border: 1px solid #CCC;"><font color="white"><b>Bersama</b></font></th> 
                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <tr><td align="left"><b>Income</b></td>
                                                <td align="right"  bgcolor="#089031"><font color="white"></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                            <tr><td align="right"><b>Pendapatan Award</b></td>
                                                <td align="right"  bgcolor="#089031"><font color="white"><b>Rp. 2.000.000.000</b></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"><b>Rp. 2.000.000.000</b></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                            <tr><td align="right" >ppn 11%</td>
                                                <td align="right"  bgcolor="#089031"><font color="white"><b>Rp. 220.000.000</b></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"><b></b></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right">pph 23 (2%)</td>
                                                <td align="right"  bgcolor="#089031" ><font color="white"><b>Rp. 40.000.000</b></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"><b></b></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>Pendapatan Setelah Pajak</b></td>
                                                <td align="right"  bgcolor="#089031"><font color="white"><b>Rp. 1.740.000.000</b></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"><b>Rp. 2.000.000.000</b></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Fee Marketing (20%)</td>
                                                <td align="right"  bgcolor="#089031"><font color="white"><b>Rp. 348.000.000</b></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"><b>Rp. 400.000.000</b></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>Pendapatan Bersih</b></td>
                                                <td align="right"  bgcolor="#089031"><font color="white"><b>Rp. 1.392.000.000</b></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"><b>Rp. 1.600.000.000</b></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>Total Pendapatan Bersih</b></td>
                                                <td align="right"  bgcolor="#089031"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"><b>Rp. 2.920.000.000</b></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right" colspan="4" bgcolor="#FFF"></td>
                                                
                                            </tr>
                                            <tr><td align="left"><b>Cost</b></td>
                                                <td align="right"  bgcolor="#089031"><font color="white"></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Hotel</td>
                                                <td align="right"  bgcolor="#089031"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"><b>Rp. 200.000.000</b></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Vendor</td>
                                                <td align="right"  bgcolor="#089031"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"><b>Rp. 100.000.000</b></font></td>
                                            </tr>
                                           
                                            <tr>
                                                <td align="right">Nara sumber</td>
                                                <td align="right"  bgcolor="#089031"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"><b>Rp. 20.000.000</b></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>Total Cost</b></td>
                                                <td align="right"  bgcolor="#089031"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"><b>Rp. 320.000.000</b></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right" colspan="4" bgcolor="#FFF"></td>
                                                
                                            </tr>
                                            <tr><td align="left"><b>Margin</b></td>
                                                <td align="right"  bgcolor="#089031"><font color="white"></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Margin Bersama</td>
                                                <td align="right"  bgcolor="#089031"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"><b>Rp. 2.672.000.000</b></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right">Margin Produksi</td>
                                                <td align="right"  bgcolor="#089031"><font color="white"><b>Rp. 1.336.000.000</b></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"><b>Rp. 1.336.000.000</b></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                           
                                            <tr>
                                                <td align="right">Fee Marketing</td>
                                                <td align="right"  bgcolor="#089031"><font color="white"><b>Rp. 348.000.000</b></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"><b>Rp. 400.000.000</b></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>Margin Total</b></td>
                                                <td align="right"  bgcolor="#089031"><font color="white"><b>Rp. 1.684.000.000</b></font></td>
                                                <td align="right"  bgcolor="#E78415"><font color="white"><b>Rp. 1.736.000.000</b></font></td>
                                                <td align="right"  bgcolor="#158BE7"><font color="white"></font></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                        </div>
                    </div> 
                    
                   
                   
                </div>
                

               
            </div>
    </div>
       
     
<script src="<?php echo base_url(); ?>assets/js/income.js"></script>              
                              
<?php $this->load->view('backend/footer'); ?>