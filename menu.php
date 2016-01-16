<?php 

$profile=readProfile($_SESSION['login']);

?>

<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="uploads/<?php echo $profile['profile_image']; ?> " style="height:150px;width:150px;" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs">
                            <strong class="font-bold"><?php echo $_SESSION['login'] ?></strong>
                             </span> <span class="text-muted text-xs block">Public User<b
                                    class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Profile</a></li>
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
                <a href="#"><i class="fa fa-pencil"></i> <span class="nav-label">Profile</span> <span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="puprofile.php">Personal Profile </a></li>


                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-square"></i> <span class="nav-label">Application claims</span><span
                        class="fa arrow"></span></a>

                <ul class="nav nav-second-level collapse">
                    <li><a href="abstract.php">Abstract Application </a></li>
                    <li><a href="case.php">Report A Case </a></li>
                  


                </ul>
            </li>


                    <li class="special_link">
                        <a href="downloads.php"><i class="fa fa-download"></i> <span class="nav-label">Abstract Download </span></a>
                    </li>
        </ul>

    </div>
</nav>
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                </a>

                <form role="search" class="navbar-form-custom" action="#">
                    <div class="form-group">
                        <input type="text" placeholder="Search for something..." class="form-control"
                               name="top-search" id="top-search">
                    </div>
                </form>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Rongai Police Management System</span>
                </li>


                <li>
                    <a href="login.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle">
                        <i class="fa fa-tasks"></i>
                    </a>
                </li>
                <li>
                    <a class="right-sidebar-toggle" href="lock.php">
                        <i class="fa fa-lock"> </i> LOCK 
                    </a>
                </li>
            </ul>

        </nav>
    </div>
    <div class="row  border-bottom white-bg dashboard-header">

        <div class="col-sm-12">
            <h2>RONGAI POLICE STATION </h2>
            <ul class="list-group clear-list m-t">

            </ul>
        </div>

        
    </div>
