
<script src="jquery.min.js"></script>
<link href="bootstrap.min.css" rel="stylesheet">
<script src="bootstrap.min.js"></script>
<script src="collapse.js"></script>

<fieldset style="height: 600px; overflow-y: scroll;">

                    <legend><font color="green">General Statement</font></legend>
                    <table class="table table-bordered table-striped table-condensed">
                        <tr>
                            <th>Payment Date</th>
                            <th>Manual ID</th>
                            <th>Description</th>
                            <th>Account Paid To</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Balance (₦)</th>
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
echo $sql2."Error: ".mysqli_error();
?>
<tr>
    <td colspan="4" align="right"><strong>Total</strong></td>
   <td><b>₦ <?php echo number_format($total_income); ?></b></td>
   <td><b>₦ <?php echo number_format($total_expense); ?></b></td>
   <td><b>₦ <?php echo number_format($balance); ?></b></td>
</tr>
                    </table>
                </fieldset>
<?php 
echo
mysqli_close();?>