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

<?php
$date=date('d l M Y');
?>
</style>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Dashboard</h1>
                    <ol class="breadcrumb">
                        <i class="fa fa-calendar"></i> <?php echo $date; ?></li>
                    </ol>
                </div>
<div class="row">
<?php
include('connect.php');

$sql="SELECT * FROM accounts ";
$result=mysqli_query($conn, $sql);
$count=mysqli_num_rows($result);

$sql4="SELECT * FROM vouchers ";
$result4=mysqli_query($conn, $sql4);
$count4=mysqli_num_rows($result4); 

$sql7="SELECT * FROM vouchers ";
$result7=mysqli_query($conn, $sql7);
$count7=mysqli_num_rows($result7);


?>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-blue">
                <div class="inner">
                    <h3> Accounts </h3>
                    <p> <b><?php echo $count; ?> </b></p>
                </div>
                <div class="icon">
                    <i class="fas fa-lock"></i>
                </div>
                <a href="accounts.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
                <div class="inner">
                    <h3> Vouchers </h3>
                    <p> <b><?php echo $count4; ?> </b></p>
                </div>
                <div class="icon">
                    <i class="fas fa-credit-card" aria-hidden="true"></i>
                </div>
                <a href="vouchers.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                   <h3> Reports </h3>
                    <p> . </b></p>
                </div>
                <div class="icon">
                    <i class="fas fa-edit" aria-hidden="true"></i>
                </div>
                <a href="reports.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
<?php
$sql5="SELECT * FROM accounts ";
$result5=mysqli_query($conn, $sql5);
$count5=mysqli_num_rows($result5);

?>
                    <h3> User Management </h3>
                    <p> <?php echo $count5; ?> </p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <a href="users.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>


<?php
$sql="SELECT * FROM accounts ";
$result=mysqli_query($conn, $sql);
$count=mysqli_num_rows($result);

$sql4="SELECT * FROM accounts ";
$result4=mysqli_query($conn, $sql4);
$count4=mysqli_num_rows($result4); 


$sql2="SELECT SUM(credit) FROM vouchers ";
$result2=mysqli_query($conn, $sql2);
$rows=mysqli_fetch_assoc($result2);
$total_income=$rows['SUM(credit)'];

$sql5="SELECT SUM(debit) FROM vouchers ";
$result5=mysqli_query($conn, $sql5);
$rows=mysqli_fetch_assoc($result5);
$total_expense=$rows['SUM(debit)'];

$sql6="SELECT SUM(balance) FROM accounts ";
$result6=mysqli_query($conn, $sql6);
$rows=mysqli_fetch_assoc($result6);
$balance=$rows['SUM(balance)'];

?>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
                    <h3> Total Income </h3>
                    <p> <b>₦ <?php echo number_format($total_income); ?> </b></p>
                </div>
                <div class="icon">
                    <i class="fas fa-lock"></i>
                </div>
                <a href="reports.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                    <h3> Total Expenses </h3>
                    <p> <b>₦ <?php echo number_format($total_expense); ?> </b></p>
                </div>
                <div class="icon">
                    <i class="fas fa-list" aria-hidden="true"></i>
                </div>
                <a href="reports.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
                <div class="inner">
                   <h3> Balance </h3>
                    <p> <b>₦ <?php echo number_format($balance); ?> </b></p>
                </div>
                <div class="icon">
                    <i class="fas fa-file" aria-hidden="true"></i>
                </div>
                <a href="reports.php" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

                </div>
            </div>
<?php
include('footer.php');
?>