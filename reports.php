<?php
session_start();
include('head.php');

$date=date(Y);
?>
<div class="container-fluid">
    <div class="row" style=" padding: 10px; background-color: white; border-radius: 5px;">
        <div class="col-lg-12" class="breadcrumb">

            <i class="fa fa-home"></i> Home / Reports

        </div>
    </div>
    <br>
    <div class="row" style="background-color: white; padding: 0px 20px 20px 20px; border-radius: 5px;">
        <div class="col-lg-12">
            <h2>Reports</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <!-- General Statement-->
                <div class="panel-group" id="accordion">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#y2">
                                    <h3><strong>General Statement</strong></h3>
                                </a>
                            </h4>
                        </div>
                        <div id="y2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table table-bordered table-striped table-condensed">
                                    <tr>
                                        <th>Payment Date</th>
                                        <th>Manual ID</th>
                                        <th>Description</th>
                                        <th>Account Paid To</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Closing (₦)</th>
                                        <th>Posted By</th>
                                    </tr>
                                    <?php
include('connect.php');



$i=1;

$sql3="SELECT * FROM vouchers ORDER BY id DESC ";
$result3=mysqli_query($conn, $sql3);

$count=mysqli_num_rows($result3);

while($rows=mysqli_fetch_assoc($result3)){
?>
                                    <tr>
                                        <td><?php echo $rows['pay_date']; ?></td>
                                        <td><?php echo $rows['manual_id']; ?></td>
                                        <td><?php echo $rows['description']; ?></td>
                                        <td><?php echo $rows['acct_paid_to']; ?></td>
                                        <td><?php echo number_format($rows['debit']); ?></td>
                                        <td><?php echo number_format($rows['credit']); ?></td>
                                        <td><?php echo number_format($rows['closing']); ?></td>
                                        <td><?php echo $rows['posted_by']; ?></td>
                                    </tr>
                                    <?php
}

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
//echo $sql2."Error: ".mysqli_error();
?>
                                    <tr>
                                        <td colspan="4" align="right"><strong>Total</strong></td>
                                        <td><b>₦ <?php echo number_format($total_expense); ?></b></td>
                                        <td><b>₦ <?php echo number_format($total_income); ?></b></td>
                                        <td><b>₦ <?php echo number_format($balance); ?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8">
                                            <h4><strong>
                                                    <font color="green">Summary</font>
                                                </strong><br>
                                                <font color="green"><strong>Total Revenue: ₦
                                                        <?php echo number_format($total_income); ?></strong><br>
                                                    <strong>Total Expenses: ₦
                                                        <?php echo number_format($total_expense); ?></strong><br>
                                                    <strong>Balance: ₦ <?php echo number_format($balance); ?></strong>
                                                </font>
                                            </h4>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ledger by Account-->
                <div class="panel-group" id="accordion">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#y3">
                                    <h3><strong>Ledger by Account</strong></h3>
                                </a>
                            </h4>
                        </div>
                        <div id="y3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <?php
$sql="SELECT * FROM accounts ";
$result=mysqli_query($conn, $sql);

while($brows=mysqli_fetch_assoc($result)){
?>
                                <h3>
                                    <font color="maroon">
                                        Account Name: <?php echo $brows['name'];  ?><br>
                                        Account Number:
                                        <?php $acct_name=$brows['name'];  echo $brows['acct_number'];  ?><br>
                                        <small> <strong><?php echo $brows['title'];  ?></strong></small>

                                    </font>
                                </h3>
                                <table class="table table-bordered table-striped table-condensed">
                                    <tr>
                                        <th>Payment Date</th>
                                        <th>Manual ID</th>
                                        <th>Description</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Closing (₦)</th>
                                        <th>Posted By</th>
                                    </tr>
                                    <?php
$sql3="SELECT * FROM vouchers WHERE acct_paid_to='$acct_name' ORDER BY id DESC ";
$result3=mysqli_query($conn, $sql3);

$count=mysqli_num_rows($result3);

while($rows=mysqli_fetch_assoc($result3)){
?>
                                    <tr>
                                        <td><?php echo $rows['pay_date']; ?></td>
                                        <td><?php echo $rows['manual_id']; ?></td>
                                        <td><?php echo $rows['description']; ?></td>
                                        <td><?php echo number_format($rows['debit']); ?></td>
                                        <td><?php echo number_format($rows['credit']); ?></td>
                                        <td><?php echo number_format($rows['closing']); ?></td>
                                        <td><?php echo $rows['posted_by']; ?></td>
                                    </tr>
                                    <?php
}

$sql2="SELECT SUM(credit) FROM vouchers WHERE acct_paid_to='$acct_name' ";
$result2=mysqli_query($conn, $sql2);
$rows=mysqli_fetch_assoc($result2);
$total_income=$rows['SUM(credit)'];

$sql5="SELECT SUM(debit) FROM vouchers WHERE acct_paid_to='$acct_name' ";
$result5=mysqli_query($conn, $sql5);
$rows=mysqli_fetch_assoc($result5);
$total_expense=$rows['SUM(debit)'];

$sql6="SELECT * FROM accounts WHERE name='$acct_name' ";
$result6=mysqli_query($conn, $sql6);
$rows=mysqli_fetch_assoc($result6);
$balance=$rows['balance'];
//echo $sql2."Error: ".mysqli_error();
?>
                                    <tr>
                                        <td colspan="3" align="right"><strong>Total</strong></td>
                                        <td><b>₦ <?php echo number_format($total_expense); ?></b></td>
                                        <td><b>₦ <?php echo number_format($total_income); ?></b></td>
                                        <td><b>₦ <?php echo number_format($balance); ?></b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <h4><strong>
                                                    <font color="maroon">Summary</font>
                                                </strong><br>
                                                <font color="maroon">Total Revenue: ₦
                                                    <?php echo number_format($total_income); ?><br>
                                                    Total Expenses: ₦ <?php echo number_format($total_expense); ?><br>
                                                    Balance: ₦ <?php echo number_format($balance); ?></font>
                                            </h4>
                                        </td>
                                    </tr>
                                </table>
                                <b>
                                    <hr></b>



                                <?php
}
?>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Trial Balance-->
                <div class="panel-group" id="accordion">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#y4">
                                    <h3><strong>Trial Balance</strong></h3>
                                </a>
                            </h4>
                        </div>
                        <div id="y4" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table table-bordered table-striped table-condensed">
                                    <tr>
                                        <th>S/N</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th>Title</th>
                                        <th>Balance</th>
                                    </tr>
                                    <?php
$i=1;
$sql3="SELECT * FROM accounts ORDER BY id DESC ";
$result3=mysqli_query($conn, $sql3);

$count=mysqli_num_rows($result3);

while($rows=mysqli_fetch_assoc($result3)){
?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $rows['name']; ?></td>
                                        <td><?php echo $rows['acct_number']; ?></td>
                                        <td><?php echo $rows['title']; ?></td>
                                        <td>₦ <?php echo number_format($rows['balance']); ?></td>
                                    </tr>
                                    <?php
}

$sql6="SELECT SUM(balance) FROM accounts ";
$result6=mysqli_query($conn, $sql6);
$rows=mysqli_fetch_assoc($result6);
$balance=$rows['SUM(balance)'];
//echo $sql2."Error: ".mysqli_error();
?>

                                    <tr>
                                        <td colspan="8">
                                            <h4><strong>
                                                    <font color="blue">Overall Balance: </font>
                                                </strong><br>
                                                <font color="blue"><strong>₦
                                                        <?php echo number_format($balance); ?></strong></font>
                                            </h4>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
                <!--
<a class="btn btn-primary" href="general_statement.php" target="iframe"><span class="fas fa-plus"></span> General Statement</a>
<a class="btn btn-primary" href="ledger.php" target="iframe"><span class="fas fa-plus"></span> General Statement</a>
<a class="btn btn-primary" href="account_ledger.php" target="iframe"><span class="fas fa-plus"></span> Ledger by Account</a>
<a class="btn btn-primary" href="trial_balance.php" target="iframe"><span class="fas fa-plus"></span> Trial Balance</a>

<div class="embed-responsive embed-responsive-16by9">
    <iframe name="iframe" allow="fullscreen" style="border:none;" seamless loading="lazy">Sorry! Your Browser Does not Support iFrames.</iframe>
</div>
-->







            </div>
        </div>
    </div>
    <?php
include('footer.php');
?>