<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="jquery.min.js"></script>
    <link href="bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
    	body{
    background:#f4f3ef;    
}

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 250px;
}

#sidebar-wrapper {
    z-index: 1000;
    position: fixed;
    left: 250px;
    width: 0;
    height: 100%;
    margin-left: -250px;
    overflow-y: auto;
    background:#fff;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#sidebar-wrapper {
    box-shadow: inset -1px 0px 0px 0px #DDDDDD;
}

#wrapper.toggled #sidebar-wrapper {
    width: 250px;
}

#page-content-wrapper {
    width: 100%;
    position: absolute;
    padding: 15px;
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -250px;
}

/* Sidebar Styles */

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 250px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    text-indent: 20px;
    line-height: 40px;
}

.sidebar-nav li a {
    display: block;
    text-decoration: none;
    color: #999999;
    font-weight: bold;
}

.sidebar-nav li a:hover {
    text-decoration: none;
    background-color: gray;
    color: white;
    font-weight: bold;
}

.sidebar-nav li a:active,
.sidebar-nav li a:focus {
    text-decoration: none;
    background-color: gray;
    color: white;
    font-weight: bolder;
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 18px;
    line-height: 60px;
}

.sidebar-nav > .sidebar-brand a {
    color: #999999;
}

.sidebar-nav > .sidebar-brand a:hover {
    color: blue;
    background: none;
}

@media(min-width:768px) {
    #wrapper {
        padding-left: 250px;
    }

    #wrapper.toggled {
        padding-left: 0;
    }

    #sidebar-wrapper {
        width: 250px;
    }

    #wrapper.toggled #sidebar-wrapper {
        width: 0;
    }

    #page-content-wrapper {
        padding: 20px;
        position: relative;
    }

    #wrapper.toggled #page-content-wrapper {
        position: relative;
        margin-right: 0;
    }
}

#sidebar-wrapper li.active > a:after {
    border-right: 17px solid #f4f3ef;
    border-top: 17px solid transparent;
    border-bottom: 17px solid transparent;
    content: "";
    display: inline-block;
    position: absolute;
    right: -1px;
}

.sidebar-brand {
    border-bottom: 1px solid rgba(102, 97, 91, 0.3);
}

.sidebar-brand {
    padding: 18px 0px;
    margin: 0 20px;
}

.navbar .navbar-nav > li > a p {
    display: inline-block;
    margin: 0;
}
p {
    font-size: 16px;
    line-height: 1.4em;
}

.navbar-default {
    background-color: #f4f3ef;
    border:0px;
    border-bottom: 1px solid #DDDDDD;
}

btn-menu {
    border-radius: 3px;
    padding: 4px 12px;
    margin: 14px 5px 5px 20px;
    font-size: 14px;
    float: left;
}
    </style>
</head>


<link href="fontawesome/css/all.min.css" rel="stylesheet">
<div id="wrapper" class="wrapper-content">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="index.php">
                    NILEST FMS
                </a>
            </li>
            <li>
                <a href="index.php"><span class="glyphicon glyphicon-dashboard"></span>  Dashboard</a>
            </li>
            <?php
            $user=$_SESSION['user_type'];
            if($user=='Admin'){
                echo '<li>
                <a href="users.php"><span class="fas fa-user"></span>  Users</a>
            </li>
            <li>
                <a href="accounts.php"><span class="fas fa-lock"></span>  Accounts</a>
            </li>';
            }
            ?>
            
            
            <li>
                <a href="vouchers.php"><span class="fas fa-list"></span>  Vouchers</a>
            </li>
            <li>
                <a href="reports.php"><span class="fas fa-edit"></span>  Reports</a>
            </li>
            <?php
            $user=$_SESSION['user_type'];
            if($user=='Admin'){
                echo '<li>
                <a href="event_log.php"><span class="fas fa-th"></span>  Event Log</a>
            </li>';
            }
            ?>
            
            <li>
                <a href="search.php"><span class="fas fa-search"></span>  Search Voucher</a>
            </li>
            <li>
                <a href="logout.php"><span class="fas fa-unlink"></span>  Logout</a>
            </li>
        </ul>
    </div>
<body>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button class="btn-menu btn btn-success btn-toggle-menu" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="navbar-header">
                    <h3 style="padding-left: 20px;">Nigerian Institute of Leather and Science Technology <small><font color="green">Financial Management System</font></small></h3>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
        				<li>
                            <a href="index.php">
        						<i class="ti-settings"></i>
        						<p>
                  <?php
$user=$_SESSION['username'];

if (isset($_SESSION['name'])){
    echo "<i style='color:green; font-weight:bold;'><span class='fas fa-user-circle'></span>  ".$user."</i>";
}
                  ?>                  
                                </p>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <i class="ti-logout"></i>
                                <p><span class="fas fa-unlink"></span> Logout</p>
                            </a>
                        </li>
                    </ul>
        
                </div>
            </div>
        </nav>