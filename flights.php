<?php 
ob_start();
session_start();
include('includes/db_config.php');

if(isset($_POST['submit'])){
	$air=$_POST['airlines'];
	
	$flight=$_POST['flight_number'];
	$fromcity=$_POST['from_city'];
	$tocity=$_POST['to_city'];
	$arrival=$_POST['arrival'];
	$dep=$_POST['dep'];
	$seat=$_POST['seats'];
	$price=$_POST['price'];
	$query1="insert into flights(airline,flight_number,from_city,to_city,arival,departure,seats,price) values ('$air', '$flight', '$fromcity', '$tocity', '$arrival','$dep','$seat','$price')";
	mysql_query($query1);
}

if(isset($_REQUEST['delete'])){
$id=$_REQUEST['id'];
$result = mysql_query("DELETE FROM `flights` WHERE `id` = '$id'");
header('location:flights.php?td=view');
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>
     

    <title>Creative - Bootstrap Admin Template</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>
 <?php include('includes/admin_header.php');?>
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="admin.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>			
                        	<div style="float:right;postition:absolute">
                    <a href="flights.php?td=view"><button class="btn btn-default btn-sm">VIEW</button></a>
                      <a href="flights.php?td=add"><button class="btn btn-default btn-sm">ADD</button></a>
                    </div>		  	
					</ol>
                    
				</div>
			</div>
              
           <?php if($_REQUEST['td']=='add'){?>
		   
		    <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Form Elements
                          </header>
                          <div class="panel-body">
						  <form class="form-horizontal " method="post">
						  <div class="form-group">
                                      <label class="col-sm-2 control-label">Airlines Name</label>
                                      <div class="col-sm-10">
                                          <select name="airlines" class="form-control" required>
										   <option value="">--SElECT--</option>
                    <?php 
					$query=mysql_query("select * from airlines");
					while($row=mysql_fetch_assoc($query)){
					?>
                    <option value="<?php echo $row['airline_name'];?>"><?php echo $row['airline_name'];?></option>
                    <?php }?>
										  </select>
                                      </div>
                                  </div>
							<div class="form-group">
                                      <label class="col-sm-2 control-label">Flight Number</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="flight_number" class="form-control" required/>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">From city</label>
                                      <div class="col-sm-10">
                                          <select name="from_city" class="form-control" required>
										   <option value="">--SElECT--</option>
										   <?php  
										   $query3=mysql_query("select * from city");
										   while($row3=mysql_fetch_assoc($query3)){?>
										   <option value="<?php echo $row3['city'];?>"><?php echo $row3['city'];?></option>
										   <?php }?>
										   </select>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">To city</label>
                                      <div class="col-sm-10">
                                          <select name="to_city" class="form-control" required>
										   <option value="">--SElECT--</option>
										   <?php  
										   $city=mysql_query("select * from city");
										   while($row1=mysql_fetch_assoc($city)){?>
										   <option value="<?php echo $row1['city'];?>"><?php echo $row1['city'];?></option>
										   <?php }?>
										   </select>
                                      </div>
                                  </div>
								   <div class="form-group">
                                      <label class="col-sm-2 control-label">Arrival</label>
                                      <div class="col-sm-10">
                                         <select name="arrival" class="form-control" required>
										   <option value="">--SElECT--</option>
										   <?php  
										   $city=mysql_query("select * from time");
										   while($row1=mysql_fetch_assoc($city)){?>
										   <option value="<?php echo $row1['time'];?>"><?php echo $row1['time'];?></option>
										   <?php }?>
										   </select>
                                      </div>
                                  </div>
								   <div class="form-group">
                                      <label class="col-sm-2 control-label">Departure</label>
                                      <div class="col-sm-10">
                                          <select name="dep" class="form-control" required>
										   <option value="">--SElECT--</option>
										   <?php  
										   $city=mysql_query("select * from time");
										   while($row1=mysql_fetch_assoc($city)){?>
										   <option value="<?php echo $row1['time'];?>"><?php echo $row1['time'];?></option>
										   <?php }?>
										   </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Total Seats</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="seats" class="form-control" required/>
                                      </div>
                                  </div>	
                                   <div class="form-group">
                                      <label class="col-sm-2 control-label">Price</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="price" class="form-control" required/>
                                      </div>
                                  </div>	  
								  <input class="btn btn-primary" name="submit" type="submit" value="Submit">
						  </form>
						  </div>
					</section>
				</div>
			</div>		
		   
		   
		   
		           
         
                <?php }else if($_REQUEST['td']=='view'){?>
                 <div class="row">
                 
                     
                  <div class="col-sm-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Hover Table
                          </header>
                          <table class="table table-hover">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Airlines</th>
								  <th>Flight Number</th>
								  <th>From City</th>
								  <th>To City</th>
								  <th>Arrival</th>
								  <th>Departure</th>
                                  <th>Total Seats</th>
                                  <th>Price</th>
                                  <th>Action</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							  $j=0;
							   $query=mysql_query("select * from flights");
							  while($row=mysql_fetch_assoc($query)){
							  $j++;
							  ?>
							  <tr>
							  <td><?php echo $j;?></td>
							  <td><?php echo $row['airline'];?></td>
							  <td><?php echo $row['flight_number'];?></td>
							  <td><?php echo $row['from_city'];?></td>
							  <td><?php echo $row['to_city'];?></td>
							  <td><?php echo $row['arival'];?></td>
							  <td><?php echo $row['departure'];?></td>
                               <td><?php echo $row['seats'];?></td>
                               <td><?php echo $row['price'];?></td>
							  <td> <div class="btn-group">
                                      <a class="btn btn-primary" href="flights.php?td=update&id=<?php echo $row['id'];?>">EDIT</a>
                                      <a class="btn btn-success" href="flights.php?delete&id=<?php echo $row['id'];?>">DELETE</a>
                                     
                                  </div></td>
							  </tr>
							  <?php }?> 
							  
							  
							  </tbody>
							  </table>
							</section>
						</div>	  
				 </div>
                <?php }else if(isset($_REQUEST['td'])=='update'){
				
				$query=mysql_query("select * from flights where id='".$_REQUEST['id']."'");
				$row2=mysql_fetch_assoc($query);
				if(isset($_POST['update'])){
				$query1=mysql_query("update flights set airline='".$_POST['airlines']."',flight_number='".$_POST['flight_number']."',from_city='".$_POST['from_city']."',to_city='".$_POST['to_city']."',arival='".$_POST['arrival']."',departure='".$_POST['dep']."',seats='".$_POST['seats']."',price='".$_POST['price']."' where id='".$_REQUEST['id']."'");
				
				if($query1){
				header("location:flights.php?td=view");
				}
				}
				?>
				 <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Form Elements
                          </header>
                          <div class="panel-body">
						  <form class="form-horizontal " method="post">
						  <div class="form-group">
                                      <label class="col-sm-2 control-label">Airlines Name</label>
                                      <div class="col-sm-10">
                                          <select name="airlines" class="form-control">
										   <option value="">--SElECT--</option>
                    <?php 
					$query=mysql_query("select * from airlines");
					while($row=mysql_fetch_assoc($query)){
					?>
                    <option value="<?php echo $row['airline_name'];?>" <?php if($row['airline_name']==$row2['airline']){echo 'selected';}?>><?php echo $row['airline_name'];?></option>
                    <?php }?>
										  </select>
                                      </div>
                                  </div>
							<div class="form-group">
                                      <label class="col-sm-2 control-label">Flight Number</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="flight_number" class="form-control" value="<?php echo $row2['flight_number'];?>"/>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">From city</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="from_city" class="form-control" value="<?php echo $row2['from_city'];?>"/>
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label class="col-sm-2 control-label">To city</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="to_city" class="form-control" value="<?php echo $row2['to_city'];?>"/>
                                      </div>
                                  </div>
								   <div class="form-group">
                                      <label class="col-sm-2 control-label">Arrival</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="arrival" class="form-control" value="<?php echo $row2['arival'];?>"/>
                                      </div>
                                  </div>
								   <div class="form-group">
                                      <label class="col-sm-2 control-label">Departure</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="dep" class="form-control" value="<?php echo $row2['departure'];?>"/>
                                      </div>
                                  </div>	 
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Total Seats</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="seats" class="form-control" value="<?php echo $row2['seats'];?>"/>
                                      </div>
                                  </div> 
                                   <div class="form-group">
                                      <label class="col-sm-2 control-label">Price</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="price" class="form-control" value="<?php echo $row2['price'];?>" required/>
                                      </div>
                                  </div>
								  <input class="btn btn-primary" name="update" type="submit" value="Update">
						  </form>
						  </div>
					</section>
				</div>
			</div>		
		   
				<?php }?> 
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
      <script type="text/javascript" src="js/jquery.validate.min.js"></script>

    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>
    <!-- nice scroll -->
    
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
