<?php 
ob_start();
session_start();
include('includes/db_config.php');

if(isset($_POST['submit'])){
	$city=$_POST['city'];
	
	$query="insert into city(city) value('$city')";
	
	mysql_query($query);
}

if(isset($_REQUEST['delete'])){
$id=$_REQUEST['id'];
$result = mysql_query("DELETE FROM `city` WHERE `id` = '$id'");
header('location:city.php?td=view');
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
                    <a href="city.php?td=view"><button class="btn btn-default btn-sm">VIEW</button></a>
                      <a href="city.php?td=add"><button class="btn btn-default btn-sm">ADD</button></a>
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
                                      <label class="col-sm-2 control-label">City Name</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="city" required="" class="form-control"/>
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
                                  <th>City</th>
                                  <th>Action</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
							  <?php
							  $j=0;
							   $query=mysql_query("select * from city");
							  while($row=mysql_fetch_assoc($query)){
							  $j++;
							  ?>
							  <tr>
							  <td><?php echo $j;?></td>
							  <td><?php echo $row['city'];?></td>
							  <td> <div class="btn-group">
                                      <a class="btn btn-primary" href="city.php?td=update&id=<?php echo $row['id'];?>">EDIT</a>
                                      <a class="btn btn-success" href="city.php?delete&id=<?php echo $row['id'];?>">DELETE</a>
                                     
                                  </div></td>
							  </tr>
							  <?php }?> 
							  
							  
							  </tbody>
							  </table>
							</section>
						</div>	  
				 </div>
                <?php }else if($_REQUEST['td']=='update'){
				$id=$_REQUEST['id'];
				$query1=mysql_query("select * from city where id='$id'");
				$row1=mysql_fetch_assoc($query1);
				if(isset($_POST['update'])){
				$city=$_POST['city'];
				$query2="update city set city='$city' where id='$id'";
			    if(mysql_query($query2)){
				header('location:city.php?td=view');
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
                                          <input type="text" name="city" required="" class="form-control" value="<?php echo $row1['city'];?>"/>
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
    <!-- nice scroll -->
   <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="js/form-validation-script.js"></script>
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
