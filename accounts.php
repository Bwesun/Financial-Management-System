<?php
session_start();
include('head.php');

$date=date(Y);
?>
        <div class="container-fluid">
            <div class="row" style=" padding: 10px; background-color: white; border-radius: 5px;">
                <div class="col-lg-12" class="breadcrumb">
                   
                    <i class="fa fa-home"></i> Home / Accounts
                    
                </div>
            </div>
            <br>
            <div class="row"  style="background-color: white; padding: 0px 20px 20px 20px; border-radius: 5px;">
                <div class="col-lg-12">
                    <h2>Accounts Manager</h2>
                </div>
<div class="row">
                    <div class="col-lg-12">
<?php
if(isset($_POST['sub'])){

    include('connect.php');

    $name=$_POST['name'];
    $number=$_POST['number'];
    $title=$_POST['title'];
    $balance=$_POST['balance'];

    $sql="INSERT INTO accounts(name, acct_number, title, balance)VALUES('$name', '$number', '$title', '$balance') ";
    $result=mysql_query($sql);

    if($result){
        echo "<script>
    alert('Account Added Successfully!');
    window.open('accounts.php','_self');
</script>
            ";
    }else{
        echo "<script>
    alert('Oops!!! Operation Unsuccessful. Please Try again! Ensure there is no record duplicating!');
    window.open('accounts.php','_self');
</script>
            ";
    }
}


?>
<!-- Add Accoun-->
<br>
<?php 
$user_type=$_SESSION['user_type'];

if($user_type=='Admin'){
    
?>
<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
<span class="fas fa-plus"></span> Add Account
</button>
<hr>
<?php 
}
?>
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
<h4 class="modal-title" id="myModalLabel">Add Account</h4>
</div>
<!-- Body -->
<div class="modal-body">
                        <form class="form-group" method="post">
                        <label>Account Name</label>
                        <input type="text" required placeholder="Account Name" name="name" required class="form-control">
                         <label>Account Number</label>
                        <input type="text" required placeholder="Account Number" name="number" required class="form-control">
                        <label>Title</label>
                        <input type="text" required placeholder="Enter Title" name="title" class="form-control">
                        <label>Balance</label>
                        <input type="number" required placeholder="Enter Balance (₦)" name="balance" class="form-control">
                        <br>
                        <br>

                        <div align="center">
                            <input type="submit" class="btn btn-success" name="sub" value="Create">
                        </div>
                   </form>
              
</div>
</div></div></div>

                    

                    <fieldset>

                    <legend><font color="green">Accounts</font></legend>
                    <table class="table table-bordered table-striped table-condensed">
                        <tr>
                            <th>S/N</th>
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>Title</th>
                            <th>Balance</th>
                            <th></th>
                        </tr>
<?php
include('connect.php');
$i=1;

$sql2="SELECT * FROM accounts ORDER BY id DESC ";
$result2=mysql_query($sql2);

$count=mysql_num_rows($result2);

while($rows=mysql_fetch_assoc($result2)){
?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $rows['name']; ?></td>
                            <td><?php echo $rows['acct_number']; ?></td>
                            <td><?php echo $rows['title']; ?></td>
                            <td>₦ <?php echo number_format($rows['balance']); ?></td>
                            <td>
<?php
$user_type=$_SESSION['user_type'];

if($user_type=='Admin'){
    
?>
                                <form class="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                                    <input type="submit" name="del_sub" value="Remove" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
<?php
}
}

if(isset($_POST['del_sub'])){
    $id=$_POST['id'];

    $sql3="DELETE FROM accounts WHERE id='$id' ";
    $result3=mysql_query($sql3);

     if($result3){
        echo "<script>
    alert('Account Removed Successfully!');
    window.open('accounts.php','_self');
</script>
            ";
            echo "<script>
    alert('Oops!!! Operation Unsuccessful. Please Try again! Ensure there is no duplicate record! ".mysql_error()."');
    window.open('accounts.php','_self');
</script>
            ";
    }
}

mysql_close();
?><tr>
    <td colspan="4"><strong>Total No. of Accounts: <?php echo $count; ?></strong></td>
</tr>
                    </table>
                </fieldset>
                </div>
                </div>
            </div>
<?php
include('footer.php');
?>
