<?php
session_start();
include('head.php');

$date=date(Y);
?>
        <div class="container-fluid">
            <div class="row" style=" padding: 10px; background-color: white; border-radius: 5px;">
                <div class="col-lg-12" class="breadcrumb">
                   
                    <i class="fa fa-home"></i> Home / Vouchers
                    
                </div>
            </div>
            <br>
            <div class="row"  style="background-color: white; padding: 0px 20px 20px 20px; border-radius: 5px;">
                <div class="col-lg-12">
                    <h2>Vouchers</h2>
                </div>
<div class="row">
                    <div class="col-lg-12">
<?php
if(isset($_POST['sub'])){

    include('connect.php');

    $doe=date('d-m-Y');
    $date=$_POST['dop'];//Date of Payment
    $manual_id=$_POST['manual_id'];
    $voucher_type=$_POST['voucher_type'];
    $description=$_POST['description'];
    $amount=$_POST['amount'];
    $posted_by=$_POST['posted_by'];
    $acct_paid_to=$_POST['acct_paid_to'];
    $action=$_POST['action'];

        $sql5="SELECT * FROM accounts WHERE name='$acct_paid_to' ";
        $result5=mysql_query($sql5);
        $row=mysql_fetch_assoc($result5);
        $balance=$row['balance'];
        $id=$row['id'];


    if($action=='debit' && $balance>$amount){
        $debit=$amount;
        $credit='';
        $closing=$balance-$amount;
        $sql6="UPDATE accounts SET balance=balance-'$amount' WHERE id='$id'  ";
        $result6=mysql_query($sql6);
    }elseif($action=='credit'){
        $credit=$amount;
        $debit='';
        $closing=$balance+$amount;
        $sql6="UPDATE accounts SET balance=balance+'$amount' WHERE id='$id'  ";
        $result6=mysql_query($sql6);
    }else{
        echo "<script>
    alert('Invalid Amount! Please check and try again!');
    window.open('vouchers.php', '_self');
</script>
            ";
    }

    if($balance>$amount || $action=='credit'){
        $sql="INSERT INTO vouchers(pay_date, manual_id, voucher_type, description, amount, posted_by, acct_paid_to, status, debit, credit, closing)VALUES('$date','$manual_id','$voucher_type','$description','$amount','$posted_by','$acct_paid_to','$action', '$debit', '$credit', '$closing'); ";
    $result=mysql_query($sql);
    echo $closing;

        if($result){
                echo "<script>
            alert('Voucher Added Successfully!');
            window.open('vouchers.php', '_self');
            </script>
                    ";
            }else{
                echo "<script>
            alert('Transaction Unsuccessful!');
            window.open('vouchers.php', '_self');
            </script>
                    ";//echo mysql_error()."------".$sql;
            }
    }
    
        
}


?>
<!-- Add Accoun-->
<br><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
<span class="fas fa-plus-circle"></span> Add New Voucher
</button> <a href="search.php" class="btn btn-success"><span class="fas fa-search"></span> Search Record</a>
<hr>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="  -
myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<!-- Header-->
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">
<span aria-hidden="true">&times;</span>
<span class="sr-only">Close</span>
</button>
<h4 class="modal-title" id="myModalLabel">Add New Voucher</h4>
</div>
<!-- Body -->
<div class="modal-body">
                        <form class="form-group" method="post">
                            <table class="table">
                                <tr>
                                    <td>Date of Payment<input type="date" class="form-control" name="dop" required placeholder="Date of Payment"></td>
                                    <td><input type="text" name="manual_id" class="form-control" required placeholder="Manual ID/Teller Number"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="voucher_type" class="form-control">
                                            <option value="">---- Select Voucher Type ----</option>
                                            <option value="Cash Payment">Cash Payment</option>
                                            <option value="Bank Cash Payment">Bank Cash Payment</option>
                                            <option value="Online Transfer Payment">Online Transfer Payment</option>
                                            <option value="Bank Transfer Payment">Bank Transfer Payment</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="acct_paid_to" class="form-control" required>
                                            <option value="">---- Account Paid To ----</option>
                                            <?php
                                            include('connect.php');
                                                $sql4="SELECT * FROM accounts";
                                                $result4=mysql_query($sql4);

                                                while($row=mysql_fetch_assoc($result4)){
                                            ?>
                                            <option value="<?php echo $row['name'];  ?>"><?php echo $row['name'];  ?></option>
                                            <?php
                                                }
                                                echo $sql4;
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="number" name="amount" class="form-control" required placeholder="Amount (eg. 12000)"></td>
                                    <td><input type="text" name="posted_by" placeholder="Posted By" required class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><textarea placeholder="Description" class="form-control" name="description"></textarea></td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="action" class="btn" required value="debit"> Debit</td>
                                    <td><input type="radio" name="action" class="btn" required value="credit"> Credit</td>
                                </tr>
                            </table>
                        
                        <br>

                        <div align="center">
                            <input type="submit" class="btn btn-success" name="sub" value="Add Voucher">
                        </div>
                   </form>
              
</div>
</div></div></div>

                    

                    <fieldset style="height: 600px; overflow-y: scroll;">

                    <legend><font color="green">Voucher Records</font></legend>
                    <table class="table table-bordered table-striped table-condensed">
                        <tr>
                            <th>S/N</th>
                            <th>Payment Date</th>
                            <th>Manual ID</th>
                            <th>Voucher Type</th>
                            <th>Debit/Credit</th>
                            <th>Amount (₦)</th>
                            <th>Posted By</th>
                            <th>Account Paid To</th>
                            <th></th>
                        </tr>
<?php
include('connect.php');
$i=1;

$sql2="SELECT * FROM vouchers ORDER BY id DESC ";
$result2=mysql_query($sql2);

$count=mysql_num_rows($result2);

while($rows=mysql_fetch_assoc($result2)){
?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $rows['pay_date']; ?></td>
                            <td><?php echo $rows['manual_id']; ?></td>
                            <td><?php echo $rows['voucher_type']; ?></td>
                            <td><?php echo $rows['status']; ?></td>
                            <td><?php echo number_format($rows['amount']); ?></td>
                            <td><?php echo $rows['posted_by']; ?></td>
                            <td><?php echo $rows['acct_paid_to']; ?></td>
                            <td>
<?php  
$user_type=$_SESSION['user_type'];

if($user_type!='Admin'){
    ;?>
    <a class="btn-success btn btn-sl btn-sm" href="view_voucher.php?id=<?php echo $rows['id']; ?>">View</a>
                                <form class="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                                    <input type="submit" name="del_sub" value="Delete" class="btn btn-danger btn-sm">
                                </form>
<?php
}
?>                                
                            </td>
                        </tr>
<?php
}

if(isset($_POST['del_sub'])){
    $id=$_POST['id'];

    $sql3="DELETE FROM vouchers WHERE id='$id' ";
    $result3=mysql_query($sql3);

     if($result3){
        echo "<script>
    alert('Voucher Deleted Successfully!');
    window.open('vouchers.php','_self');
</script>
            ";
            echo "<script>
    alert('Oops!!! Operation Unsuccessful. Please Try again!');
    window.open('vouchers.php','_self');
</script>
            ";
    }
}

mysql_close();
?><tr>
    <td colspan="10"><strong>Total No. of Vouchers: <?php echo $count; ?></strong></td>
</tr>
                    </table>
                </fieldset>
                </div>
                </div>
            </div>
<?php
include('footer.php');
?>
