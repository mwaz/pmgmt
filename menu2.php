<?php 

$profile=readProfile($_SESSION['login']);

?>
<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element"> <span>
    <img alt="image" class="img-circle" src="uploads/<?php echo $profile['profile_image']; ?> " style="height:100px;width:100px;" />
          </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['login'] ?></strong>
                             </span> <span class="text-muted text-xs block"> Police Officer <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="pprofile.php">Profile</a></li>
                                <li><a href="#">Contacts</a></li>
                                <li><a href="#">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="login.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            Rongai Police 
                        </div>
                    </li>
                    <li class="active">
                        <a href="#"><i class="fa fa-pencil-square-o"></i> <span class="nav-label">Profile</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="active"><a href="pprofile.php">Update Profile </a></li>
                           
                       
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-level-down"></i> <span class="nav-label">Application claims</span><span class="fa arrow"></span></a>

                        <ul class="nav nav-second-level collapse">
                            <li><a href="abstract_loses.php">Abstract Application's </a></li>
                             <li><a href="reported_cases.php">Case Reportings </a></li>
                              <li><a href="#">Finalized Claims </a></li>
                            
                            
                        </ul>
                    </li>
                   
                    
                   
                    
            
                    <li>
            <a href="#"><i class="fa fa-external-link-square"></i> <span class="nav-label">Cases Section</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="p_case.php">Add Case</a></li>
                             <li><a href="reported_cases.php">Reported Cases</a></li>
                              <li><a href="#">Finalized Case</a></li>
                            
                            
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-eraser"></i> <span class="nav-label">Bail Out's Section </span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gavel"></i> <span class="nav-label">Suspects Section</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            
                            <li><a href="add_suspect.php">Add Suspect</a></li>
                            <li><a href="view_suspects.php">View Suspects </a></li>
                           <!-- upcoming feature --> 
                           <!-- <li><a href="#">Cells Capacity </a></li> --> 
                            <li><a href="wanted.php">WANTED criminals </a></li>

                           
                        </ul>
                    </li>
                    
                   
                   
                    <li class="special_link">
                        <a href="#"><i class="fa fa-spinner fa-spin"></i> <span class="nav-label">Evidence Database </span></a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
           <form role="search" class="navbar-form-custom" action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Rongai Police Management System</span>
                </li>
               


                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
            </ul>

        </nav>
        </div>
                <div class="row  border-bottom white-bg dashboard-header">

                    <div class="col-sm-3">
                        <h2> <strong> Welcome </strong> <?php echo $_SESSION['login'] ?></h2>

                        <ol class="breadcrumb">
                        <li>
                            <a href="police.php">Home</a>
                        </li>
                        <li class="#">
                            <strong>Profile</strong>
                        </li>
                    </ol>

              
                        <ul class="list-group clear-list m-t">
                           
                        </ul>
                    </div>
                   
                    <div class="col-sm-3">
                        <div class="statistic-box">
                        <h4>
                       
                            <div class="m-t">
                                <h4>RONGAI POLICE STATION </h4>
                            </div>

                        </div>
                    
            </div>
            </div>