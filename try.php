<?php
session_start();

if(!isset($_SESSION['admin_user'])){
    header("location:login.php");
}

include('head.php');


$date=date(Y);
?>
<title>Home: Dashboard</title>
<style type="text/css">
    .card-box {
    position: relative;
    color: #fff;
    padding: 20px 10px 40px;
    margin: 20px 0px;
}
.card-box:hover {
    text-decoration: none;
    color: #f1f1f1;
}
.card-box:hover .icon i {
    font-size: 100px;
    transition: 1s;
    -webkit-transition: 1s;
}
.card-box .inner {
    padding: 5px 10px 0 10px;
}
.card-box h3 {
    font-size: 27px;
    font-weight: bold;
    margin: 0 0 8px 0;
    white-space: nowrap;
    padding: 0;
    text-align: left;
}
.card-box p {
    font-size: 15px;
}
.card-box .icon {
    position: absolute;
    top: auto;
    bottom: 5px;
    right: 5px;
    z-index: 0;
    font-size: 72px;
    color: rgba(0, 0, 0, 0.15);
}
.card-box .card-box-footer {
    position: absolute;
    left: 0px;
    bottom: 0px;
    text-align: center;
    padding: 3px 0;
    color: rgba(255, 255, 255, 0.8);
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    text-decoration: none;
}
.card-box:hover .card-box-footer {
    background: rgba(0, 0, 0, 0.3);
}
.bg-blue {
    background-color: #00c0ef !important;
}
.bg-green {
    background-color: #00a65a !important;
}
.bg-orange {
    background-color: #f39c12 !important;
}
.bg-red {
    background-color: #d9534f !important;
}

</style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Statistics <small><font color="green">Overview</font></small></h1>
                    <ol class="breadcrumb">
                        <li class="active"><i class="fa fa-calendar"></i> January-December</li>
                    </ol>
                </div>
<div class="row">
<?php
include('connect.php');

$sql="SELECT * FROM users ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

$sql2="SELECT SUM(total) FROM users ";
$result2=mysql_query($sql2);


$rows=mysql_fetch_assoc($result2);

$all_total=$rows['SUM(total)'];

$current_month=date(M);
$current_year=date(Y);

$sql3="SELECT SUM($current_month) FROM users  ";
$result3=mysql_query($sql3);
$rows=mysql_fetch_assoc($result3);

$month_total=$rows['SUM('.$current_month.')'];
/*
echo "The SQL: ".$sql3."<br>";
echo "The current_month: ".$current_month."<br>";
echo "The month_total: ".$month_total."<br>";
*/
?>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-blue">
                <div class="inner">
                    <h3> <?php echo "₦".number_format($month_total); ?> </h3>
                    <p> <b><?php echo $current_month." Collections"; ?> </b></p>
                </div>
                <div class="icon">
                    <i class="" aria-hidden="true"></i>
                </div>
                <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
                <div class="inner">
                    <h3> <?php echo "₦".number_format($all_total); ?> </h3>
                    <p> <b><?php echo $current_year." Collections"; ?> </b></p>
                </div>
                <div class="icon">
                    <i class="" aria-hidden="true"></i>
                </div>
                <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                   <h3> <?php echo number_format($count); ?> </h3>
                    <p> <b><?php echo "No of Records"; ?> </b></p>
                </div>
                <div class="icon">
                    <i class="" aria-hidden="true"></i>
                </div>
                <a href="create_record.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
<?php
$sql4="SELECT * FROM logg ";
$result4=mysql_query($sql4);

$rows=mysql_fetch_assoc($result4);
$count=mysql_num_rows($result4);


?>
                    <h3> <?php echo $count; ?> </h3>
                    <p> Annual No. of Inputs </p>
                </div>
                <div class="icon">
                    <i class=""></i>
                </div>
                <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

                </div>
            </div>
<?php
include('footer.php');
?>