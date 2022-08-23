<?php
session_start();
include('head.php');

?>
        <div class="container-fluid">
            <div class="row" style=" padding: 10px; background-color: white; border-radius: 5px;">
                <div class="col-lg-12" class="breadcrumb">
                   
                    <i class="fa fa-home"></i> Home / Vouchers / View Voucher
                    
                </div>
            </div>
            <br>

<?php
include('connect.php');
$id=$_GET['id'];

$sql2="SELECT * FROM vouchers WHERE id='$id' ";
$result2=mysql_query($sql2);

$rows=mysql_fetch_assoc($result2);
$manual_id=$rows['manual_id'];
?>

            <div class="row"  style="background-color: white; padding: 0px 20px 20px 20px; border-radius: 5px;">
                <div class="col-lg-12">
                    <h2>View Voucher</h2>
                </div>
<div class="row">
    <div class="col-lg-12">
<!-- Add Accoun-->
<br>

                    

                    <fieldset>

                    <legend><font color="green">Manual ID: <?php echo $manual_id;  ?></font></legend>
                    <table class="table table-bordered table-striped table-condensed">
                        <tr>
                            <td><b>Unique ID</b></td>
                            <td><?php echo $rows['id']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Payment Date</b></td>
                            <td><?php echo $rows['pay_date']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Manual ID</b></td>
                            <td><?php echo $rows['manual_id']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Voucher Type</b></td>
                            <td><?php echo $rows['voucher_type']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Description</b></td>
                            <td><?php echo $rows['description']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Amount</b></td>
                            <td>₦ <?php echo number_format($rows['amount']); ?></td>
                        </tr>
                        <tr>
                            <td><b>Posted By</b></td>
                            <td><?php echo $rows['posted_by']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Account Paid To</b></td>
                            <td><?php echo $rows['acct_paid_to']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Debit/Credit</b></td>
                            <td><?php echo $rows['status']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Date of Entry</b></td>
                            <td><?php echo $rows['doe']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Account Closing Balance</b></td>
                            <td>₦ <?php echo number_format($rows['closing']); ?></td>
                        </tr>


<?php

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
    alert('Oops!!! Operation Unsuccessful. Please Try again! ".mysql_error()."');
    window.open('vouchers.php','_self');
</script>
            ";
    }
}

mysql_close();
?>
                    </table>
                    <div align="center">
                        <form class="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                                    <input type="submit" name="del_sub" value="Delete Voucher" class="btn btn-danger">
                                    <a href="vouchers.php" class="btn btn-info"><span class="fas fa-arrow-left"></span> Go Back</a>
                                </form>
                    </div>
                </fieldset>
                </div>
                </div>
            </div>
<?php
include('footer.php');
?>
