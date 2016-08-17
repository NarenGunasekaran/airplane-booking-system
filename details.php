<?php 
ob_start();
session_start();
include('includes/db_config.php');
if(isset($_REQUEST['delete'])){
	$query5=mysql_query("delete from book where user_id='".$_SESSION['userid']."'");
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
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
             
           
		
			 <div class="row">
				<div class="col-lg-12">
					<section class="panel">
					  <div class="panel-body">
					  <header class="panel-heading">
                              BOOKING HISTORY 
                          </header>
                          <table class="table table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
								  <th>Booking date</th>
                                  <th>Flight Number</th>
								  <th>Airlines</th>
								  <th>Arrival</th>
								  <th>Departure</th>
                                  <th>Journey Date</th>
								  <th>From</th>
								  <th>To</th>
                                   <th>Status</th>
								  
                                  <th style='color:'>Action</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
							 <?php 
							 $j=0;
							 $query4=mysql_query("select * from book where user_id='".$_SESSION['userid']."' order by date desc");
							 while($row=mysql_fetch_assoc($query4)){
							 $j++;
							 ?>
                               <tr>
							  <td><?php echo $j;?></td>
							  <td><?php echo $row['date'];?></td>
							  <td><?php echo $row['flight_no'];?></td>
							  <td><?php echo $row['airline'];?></td>
							  <td><?php echo $row['from_city'];?></td>
							  <td><?php echo $row['to_city'];?></td>
                               <td><?php echo $row['travel_date'];?></td>
							  <td><?php echo $row['arrival'];?></td>
							  <td><?php echo $row['dep'];?></td>
                              
                              <td><?php if($row['status']=='n'){echo "<span style='color:#FF0000'>Cancelled before transaction</span>";}else if($row['status']=='t'){echo "<span style='color:#33C'>Booking successful</span>";}?></td>
                              
                              <td> <?php if($row['status']=='t'){?><a class="btn btn-primary" href="ticket.php?id=<?php echo $row['id'];?>">TICKET</a><?php }else{}?></td>
                                </tr>
							 
							<?php }?>
							  </tbody>
							  </table>
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
		
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>


  </body>
</html>
