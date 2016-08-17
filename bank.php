<?php 
ob_start();
session_start();
include('includes/db_config.php');
$user=$_SESSION['username'];
$userid=$_SESSION['userid'];
$query=mysql_query("select * from signup where id='$userid'");
$row=mysql_fetch_assoc($query);
if(isset($_REQUEST['fl_id'])!=''){
$fl_id=$_REQUEST['fl_id'];
$query1=mysql_query("select * from book where id='$fl_id'");
$row1=mysql_fetch_assoc($query1);
}
$ids=$row1['id'];
if(isset($_REQUEST['cancel'])){
	header('location:book_flight.php');
}
$msg='';
if(isset($_POST['submit'])){
$card=$_POST['card_number'];
$id=$_POST['book_id'];
$cvv=$_POST['cvv'];
$name=$_POST['name'];
$pin=$_POST['pin'];
	$query3=mysql_query("select * from bank where card_no='$card' and cvv='$cvv' and name='$name' and pin='$pin'");
	$num=mysql_num_rows($query3);
	
	if($num>0){
		$query4=mysql_query("update book set status='t' where id='$id'");
		header('location:complete.php?id='.$ids.'');
	}else{$msg="Transaction Failed";}
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
 <?php include('includes/header.php');?>
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-laptop"></i>Search Flight</li>
						<li><i class="fa fa-laptop"></i>Booking</li>
						<li><i class="fa fa-laptop"></i>Bank</li>						  	
					</ol>
				</div>
			</div>
              <div class="row">
				<div class="col-lg-12">
					<section class="panel">
					  <div class="panel-body">
                      <form method="post">
					    <div class="col-lg-4">
						<label class="col-sm-2 control-label">User</label>
						<div class="col-sm-10">
                        <input type="hidden" name="book_id" value="<?php echo $row1['id']?>"/>
						<input type="text" name="user" class="form-control" value="<?php echo $row1['user'];?>" readonly/>
						 </div>
						</div>
						  <div class="col-lg-4">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
						<input type="text" name="email" class="form-control" value="<?php echo $row1['email'];?>" readonly/>
						 </div>
						</div>
                         <div class="col-lg-4">
						<label class="col-sm-2 control-label">Contact</label>
						<div class="col-sm-10">
						<input type="text" name="contact" class="form-control" value="<?php echo $row1['contact'];?>" readonly/>
						 </div>
						</div>
					 </div>
					</section>
                    </div>
			</div>
             <div class="row">
				<div class="col-lg-8" style="margin-left:190px;";>
                    <section class="panel">
					  <div class="panel-body">
                      <div class="row">
                        <div class="col-lg-5">
                        <label class="col-sm-4 control-label">Airline</label>
                        
                      <div class="col-sm-8">
						<input type="text" name="airline" class="form-control" value="<?php echo $row1['airline'];?>" readonly/>
						 </div>
                      </div>
                        <div class="col-lg-5">
                        <label class="col-sm-4 control-label">Flight</label>
                        
                      <div class="col-sm-8">
					  
						<input type="text" name="flight_no" class="form-control" value="<?php echo $row1['flight_no'];?>" readonly/>
						 </div>
                      </div>
                        <div class="col-lg-5">
                        <label class="col-sm-4 control-label">From</label>
                        
                      <div class="col-sm-8">
						<input type="text" name="from_city" class="form-control" value="<?php echo $row1['from_city'];?>" readonly/>
						 </div>
                      </div>
                        <div class="col-lg-5">
                        <label class="col-sm-4 control-label">To</label>
                        
                      <div class="col-sm-8">
						<input type="text" name="to_city" class="form-control" value="<?php echo $row1['to_city'];?>" readonly/>
						 </div>
                      </div>
                        <div class="col-lg-5">
                        <label class="col-sm-4 control-label">Arrival</label>
                        
                      <div class="col-sm-8">
						<input type="text" name="arrival" class="form-control" value="<?php echo $row1['arrival'];?>" readonly/>
						 </div>
                      </div>
						 <div class="col-lg-5">
                        <label class="col-sm-4 control-label">Departure</label>
                        
                      <div class="col-sm-8">
						<input type="text" name="dep" class="form-control" value="<?php echo $row1['dep'];?>" readonly/>
						 </div>
                         
                      </div>
                       <div class="col-lg-5">
                        <label class="col-sm-4 control-label">Price</label>
                        
                      <div class="col-sm-8">
						<input type="text" name="dep" class="form-control" value="<?php $total='';$total=$row1['price']*$row1['passenger'];echo $total."rs";?>" readonly/>
						 </div>
                         </div>
                      </div>
                       
                        <div class="clear" style="margin-bottom:40px;"></div>
                          <div class="row">
                          <div class="col-lg-4" style="margin-left:220px;";>
                            <section class="panel">
					           <div class="panel-body">
							   <label>Debit Card Details</label>
                                <label style="color:#F00;"><?php echo $msg;?></label>
							   <div class="clear" style="margin-bottom:20px;"></div>
                                <input type="text" size="12" name="card_number" class="form-control" placeholder="Last Four Digit" required/>
								<div class="clear" style="margin-bottom:20px;"></div>
								 <input type="text" size="12" name="cvv" class="form-control" placeholder="CVV Number" required/>
								 <div class="clear" style="margin-bottom:20px;"></div>
								  <input type="text" size="12" name="name" class="form-control" placeholder="Your name as on the card" required/>
								 <div class="clear" style="margin-bottom:20px;"></div>
								  <input type="password" size="12" name="pin" class="form-control" placeholder="Pin Number" required/>
								 <div class="clear" style="margin-bottom:20px;"></div>
								 <input type="submit" value="SUBMIT" class="btn btn-primary btn-lg btn-block" name="submit"/>
                                 
                                  </form>
								 <div class="clear" style="margin-bottom:10px;"></div>
								  <a href="bank.php?cancel" class="btn btn-danger btn-xs btn-block">CANCEL</a>
                               </div>
							</section>
							 
					          
                               
                             
							
						   </div>
						  </div> 	   
					    </div>
                        
                     </section>
				 </div>
			
           
		
				
          
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>
              
            </div>
                        
          </div> 
              <!-- project team & activity end -->

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputFields",
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
</script>
    <script src="js/jquery.js"></script>
	<script src="js/jquery-ui-1.10.4.min.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
	<script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js" ></script>
	<script src="assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
	<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="js/xcharts.min.js"></script>
	<script src="js/jquery.autosize.min.js"></script>
	<script src="js/jquery.placeholder.min.js"></script>
	<script src="js/gdp-data.js"></script>	
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="date/jsDatePick.min.1.3.js"></script>

  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>

  </body>
</html>
	