<?php 
ob_start();
session_start();
include('includes/db_config.php');
$user=$_SESSION['username'];
$userid=$_SESSION['userid'];
$query=mysql_query("select * from signup where id='$userid'");
$row=mysql_fetch_assoc($query);
$query1=mysql_query("select * from flights where id='".$_REQUEST['id']."'");
$row1=mysql_fetch_assoc($query1);

if(isset($_POST['cancel'])){
	header('location:book_flight.php');
}

if(isset($_POST['book'])){
$date_reg=date('Y-m-d h:i:s');
$user_id=$_POST['user_id'];
$user=$_POST['user'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$airline=$_POST['airline'];
$flight_no=$_POST['flight_no'];
$from_city=$_POST['from_city'];
$to_city=$_POST['to_city'];
$arrival=$_POST['arrival'];
$dep=$_POST['dep'];
$dates=$_POST['datess'];
$pass=$_POST['passenger'];
$food=$_POST['food'];
$price=$_POST['price'];
$query="insert into book(date,user_id,user,email,contact,airline,flight_no,from_city,to_city,arrival,dep,travel_date,passenger,food,price,status) values('$date_reg','$user_id','$user','$email','$contact','$airline','$flight_no','$from_city','$to_city','$arrival','$dep','$dates','$pass','$food','$price','n')";
if(mysql_query($query)){
 $last_id = mysql_insert_id();
header('location:bank.php?fl_id='.$last_id.'');
}
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
						<li><i class="fa fa-home"></i><a href="main.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Search Flight</li>		
						<li><i class="fa fa-laptop"></i>Booking</li>						  	
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
						<input type="text" name="user" class="form-control" value="<?php echo $row['name'];?>" readonly/>
						<input type="hidden" name="user_id" value="<?php echo $row['id'];?>"/>
						 </div>
						</div>
						  <div class="col-lg-4">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
						<input type="text" name="email" class="form-control" value="<?php echo $row['email'];?>" readonly/>
						 </div>
						</div>
                         <div class="col-lg-4">
						<label class="col-sm-2 control-label">Contact</label>
						<div class="col-sm-10">
						<input type="text" name="contact" class="form-control" value="<?php echo $row['contact'];?>" readonly/>
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
					  
						<input type="text" name="flight_no" class="form-control" value="<?php echo $row1['flight_number'];?>" readonly/>
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
						<input type="text" name="arrival" class="form-control" value="<?php echo $row1['arival'];?>" readonly/>
						 </div>
                      </div>
						 <div class="col-lg-5">
                        <label class="col-sm-4 control-label">Departure</label>
                        
                      <div class="col-sm-8">
						<input type="text" name="dep" class="form-control" value="<?php echo $row1['departure'];?>" readonly/>
						 </div>
                          </div>
                          <div class="col-lg-5">
                        <label class="col-sm-4 control-label">Price</label>
                        
                      <div class="col-sm-8">
						<input type="text" name="price" class="form-control" value="<?php echo $row1['price'];?>" readonly/>
						 </div>
                     
                      </div>
                       <div class="col-lg-5">
                        <label class="col-sm-4 control-label">Date</label>
                        
                      <div class="col-sm-8">
						 <input type="text" size="12" name="datess" class="form-control" value="<?php echo $_REQUEST['date'];?>" readonly/>
						 </div>
                     
                      </div>
                        <div class="clear" style="margin-bottom:70px;"></div>
                        <div class="row">
                          <div class="col-lg-4" style="margin-left:220px;">
                            <section class="panel">
					         
                                <div class="panel-body">
                               <select class="form-control m-bot15" name="passenger">
						 <option value="">--No Of Passengers--</option>
						<option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
						 </select>
                         </div>
                          <div class="panel-body">
                               <select class="form-control m-bot15" name="food">
						 <option value="">--Food Type--</option>
						<option value="Veg">Veg</option>
                        <option value="Non Veg">Non Veg</option>
                       
						 </select>
                         </div>
                           <div class="panel-body">
                           <input type="submit" value="BOOK FLIGHT" class="btn btn-primary btn-lg btn-block" name="book"/>
                           <input type="submit" class="btn btn-danger btn-xs btn-block" value="CANCEL" name="cancel"/>
                            </div>
                            </section>
                         </div>
					    </div>
                         </form>
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
