<?php 
ob_start();
session_start();
include('includes/db_config.php');
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
					</ol>
				</div>
			</div>
              <div class="row">
				<div class="col-lg-12">
					<section class="panel">
					  <div class="panel-body">
                      <form method="post">
					    <div class="col-lg-4">
						<label class="col-sm-2 control-label">Airlines</label>
						<div class="col-sm-10">
						 <select class="form-control m-bot15" name="airline" required>
						 <option value="">--Select Airlines--</option>
						 <?php 
						 $query5="select * from airlines";
						 $res=mysql_query($query5);
						 while($row5=mysql_fetch_assoc($res)){
						 
						 ?>
						 <option value="<?php echo $row5['airline_name'];?>"><?php echo $row5['airline_name'];?></option>
						 <?php }?>
						 </select>
						 </div>
						</div>
						 <div class="col-lg-3">
						 <label class="col-sm-2 control-label">From</label>
						<div class="col-sm-10">
						<select class="form-control m-bot15" name="from_city" required>
						<option value="">--Select City--</option>
						  <?php 
						 $query5="select * from city";
						 $res=mysql_query($query5);
						 while($row5=mysql_fetch_assoc($res)){
						 
						 ?>
						 <option value="<?php echo $row5['city'];?>"><?php echo $row5['city'];?></option>
						 <?php }?>
						 </select>
						 </div>
						</div>
						 <div class="col-lg-3">
						  <label class="col-sm-2 control-label">To</label>
						<div class="col-sm-10">
						<select class="form-control m-bot15" name="to_city" required>
						 <option value="">--Select City--</option>
						  <?php 
						 $query5="select * from city";
						 $res=mysql_query($query5);
						 while($row5=mysql_fetch_assoc($res)){
						 
						 ?>
						 <option value="<?php echo $row5['city'];?>"><?php echo $row5['city'];?></option>
						 <?php }?>
						 </select>
						 </div>
						</div>
						<div class="col-lg-4">
						  <label class="col-sm-2 control-label">Date</label>
						<div class="col-sm-10">
						<input type="text" id="datetimepicker8" name="dd" class="form-control" required/><br><br>
						 </div>
						</div>
						 <div class="col-lg-2">
						 
						<div class="col-sm-10">
						<input type="submit" class="btn btn-primary" name="search" value="Search"/>
						 </div>
						</div>
                        </form>
					  </div>
					</section>
				</div>
			</div>
           
		
			 <div class="row">
				<div class="col-lg-12">
					<section class="panel">
					  <div class="panel-body">
					  <header class="panel-heading">
                              Flights
                          </header>
                          <table class="table table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Flight Number</th>
								  <th>Airlines</th>
                                   <th>From</th>
								  <th>To</th>
								  <th>Arrival</th>
								  <th>Departure</th>
								   <th>Price</th>
                                   <th>Total Seats</th>
								  <th>Seats Available</th>
                                
                                  <th>Action</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
							 
							  <?php 
							  $j=0;
							  $bv='';
							 
							  if(isset($_POST['search'])!=''){
								 $date=$_POST['dd'];
								  if($_POST['airline']!=''){
									  $air=$_POST['airline'];
									 $bv .=" and airline like '%$air%'";
								  }
								  if($_POST['from_city']!='' && $_POST['to_city']!=''){
									 $bv .=" and from_city='".$_POST['from_city']."' and to_city='".$_POST['to_city']."'";
								  }
								  
							  $query=mysql_query("select * from flights where 1".$bv);
							  
						  while($row=mysql_fetch_assoc($query)){
							  $j++;
							  ?>
                               <tr>
							  <td><?php echo $j;?></td>
							  <td><?php echo $row['flight_number'];?></td>
							  <td><?php echo $row['airline'];?></td>
							  <td><?php echo $row['from_city'];?></td>
							  <td><?php echo $row['to_city'];?></td>
							  <td><?php echo $row['arival'];?></td>
							  <td><?php echo $row['departure'];?></td>
                               <td><?php echo $row['price'];?></td>
                              <td><?php echo $row['seats'];?></td>
                              <td><?php 
							   $query1=mysql_query("select * from book where flight_no='".$row['flight_number']."' and travel_date='$date' and from_city='".$row['from_city']."' and to_city='".$row['to_city']."' and arrival='".$row['arival']."' and dep='".$row['departure']."' and status='t'");
							   $tot='';
							   while($row1=mysql_fetch_assoc($query1)){
								   $tot +=$row1['passenger'];
							   }
							   $total='';
							  
							   $total=$row['seats']-$tot;
							   if($total<=50){
							   echo $total;}else{echo "FILLED";}
							  ?></td>
                              
                              <td> <a class="btn btn-primary" href="booking.php?id=<?php echo $row['id'];?>&date=<?php echo $date;?>">BOOK</a></td>
                                </tr>
							  <?php } }?>
							
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
	<script src="js/gdp-data.js"></script>	
	<script src="js/morris.min.js"></script>
	<script src="js/sparklines.js"></script>	
	<script src="js/charts.js"></script>
	<script src="js/jquery.slimscroll.min.js"></script>
    
    
    
    <script src="date/jquery.datetimepicker.js"></script>
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
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/
$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1986/01/05'
});
$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});

$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
	formatTime:'H:i',
	formatDate:'d.m.Y',
	//defaultDate:'8.12.1986', // it's my birthday
	defaultDate:'+03.01.1970', // it's my birthday
	defaultTime:'10:00',
	timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
	step:5,
	inline:true
});
$('#datetimepicker_mask').datetimepicker({
	mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
	datepicker:false,
	format:'H:i',
	step:5
});
$('#datetimepicker2').datetimepicker({
	yearOffset:222,
	lang:'en',
	timepicker:false,
	format:'d/m/Y',
	formatDate:'Y/m/d',
	minDate:'-1970/01/02', // yesterday is minimum date
	maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker3').datetimepicker({
	inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
	$('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
	$('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
	$('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
	datepicker:false,
	allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
	step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
	if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
		$('#datetimepicker6').datetimepicker('destroy');
		this.value = 'create';
	}else{
		$('#datetimepicker6').datetimepicker();
		this.value = 'destroy';
	}
});
var logic = function( currentDateTime ){
	if (currentDateTime && currentDateTime.getDay() == 6){
		this.setOptions({
			minTime:'11:00'
		});
	}else
		this.setOptions({
			minTime:'8:00'
		});
};
$('#datetimepicker7').datetimepicker({
	onChangeDateTime:logic,
	onShow:logic
});
$('#datetimepicker8').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'d-m-Y',
	formatDate:'Y-m-d',
	minDate:'-1970-01-01', // yesterday is minimum date
	maxDate:'+1970-12-02' // and tommorow is maximum date calendar
});
$('#datetimepicker9').datetimepicker({
	onGenerate:function( ct ){
		$(this).find('.xdsoft_date.xdsoft_weekend')
			.addClass('xdsoft_disabled');
	},
	weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
	timepicker:false
});
var dateToDisable = new Date();
	dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [false, ""]
		}

		return [true, ""];
	}
});
$('#datetimepicker12').datetimepicker({
	beforeShowDay: function(date) {
		if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
			return [true, "custom-date-style"];
		}

		return [true, ""];
	}
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>
  </body>
</html>
