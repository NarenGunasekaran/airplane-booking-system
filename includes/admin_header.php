

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">Airline <span class="lite">Reservation</span></a>
            <!--logo end-->

           

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                
                   
                   
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                Welcome
                            </span>
                            <span class="username" style="text-transform:capitalize;"><?php echo $_SESSION['username'];?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                           
                           
                            <li>
                                <a href="logout.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                           
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="active">
                      <a class="" href="">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                   <li class="active">
                      <a class="" href="airlines.php?td=view">
                          <i class="icon_house_alt"></i>
                          <span>Airlines</span>
                      </a>
                  </li>
                  
				     
                 <li class="active">
                      <a class="" href="city.php?td=view">
                          <i class="icon_house_alt"></i>
                          <span>City</span>
                      </a>
                  </li>
				   <li class="active">
                      <a class="" href="time.php?td=view">
                          <i class="icon_house_alt"></i>
                          <span>Timings</span>
                      </a>
                  </li>
                   <li class="active">
                      <a class="" href="flights.php?td=view">
                          <i class="icon_house_alt"></i>
                          <span>Flight Details</span>
                      </a>
                  </li>
                  <li>                     
                      <a class="" href="">
                          <i class="icon_piechart"></i>
                          <span>Information</span>
                          
                      </a>
                                         
                  </li>
				  
                             
                
                  
                
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->