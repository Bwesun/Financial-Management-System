<?php
session_start();
include('head.php');

$user_type=$_SESSION['user_type'];

if($user_type!='Admin'){
    echo "<script>
    alert('Only Administrators can view this page!');
    window.open('index.php','_self');
</script>
            ";
}

$date=date(Y);
?>
        <div class="container-fluid">
            <div class="row" style=" padding: 10px; background-color: white; border-radius: 5px;">
                <div class="col-lg-12" class="breadcrumb">
                   
                    <i class="fa fa-home"></i> Home / Users 
                    
                </div>
            </div>
            <br>
            <div class="row"  style="background-color: white; padding: 0px 20px 20px 20px; border-radius: 5px;">
                <div class="col-lg-12">
                    <h2>User Manager</h2>
                </div>
<div class="row">
                    <div class="col-lg-12">
<?php
if(isset($_POST['sub'])){

    include('connect.php');

    $username=$_POST['username'];
    $password=$_POST['password'];
    $type=$_POST['type'];
    $hash=md5($password);

    $sql="INSERT INTO users(username,password, hash, type)VALUES('$username','$password', '$hash', '$type') ";
    $result=mysql_query($sql);

    if($result){
        echo "<script>
    alert('Record Created Successfully! Username is: ".$username." and Password is: ".$password.".');
    window.open('users.php','_self');
</script>
            ";
    }else{
        echo "<script>
    alert('Oops!!! Operation Unsuccessful. Please Try again! Ensure there is no record duplicating!');
    window.open('users.php','_self');
</script>
            ";
    }
}


?>
<!-- Add Accoun-->
<br><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
<span class="fas fa-user-plus"></span> Create New User
</button>
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
<h4 class="modal-title" id="myModalLabel">Create New User</h4>
</div>
<!-- Body -->
<div class="modal-body">
                        <form class="form-group" method="post">
                        <label>Name</label>
                        <input type="text" placeholder="Enter Username" name="username" required class="form-control">
                         <label>Password</label>
                        <input type="text" placeholder="Enter Password" name="password" required class="form-control">
                        <label>User Type</label>
                        <input type="radio" name="type" required value="Admin"> Admin  <input type="radio" name="type" required value="Accountant"> Accountant
                        <br>
                        <br>

                        <div align="center">
                            <input type="submit" class="btn btn-success" name="sub" value="Create">
                        </div>
                   </form>
              
</div>
</div></div></div>

                    

                    <fieldset>

                    <legend><font color="green">User Records</font></legend>
                    <table class="table table-bordered table-striped table-condensed">
                        <tr>
                            <th>S/N</th>
                            <th>User Name</th>
                            <th>User Type</th>
                            <th>Password</th>
                            <th></th>
                        </tr>
<?php
include('connect.php');
$i=1;

$sql2="SELECT * FROM users ORDER BY id DESC ";
$result2=mysql_query($sql2);

$count=mysql_num_rows($result2);

while($rows=mysql_fetch_assoc($result2)){
?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $rows['username']; ?></td>
                            <td><?php echo $rows['type']; ?></td>
                            <td><?php echo $rows['hash']; ?></td>
                            <td>
                                <form class="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
                                    <input type="submit" name="del_sub" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                            </td>
                        </tr>
<?php
}

if(isset($_POST['del_sub'])){
    $id=$_POST['id'];

    $sql3="DELETE FROM users WHERE id='$id' ";
    $result3=mysql_query($sql3);

     if($result3){
        echo "<script>
    alert('User Deleted Successfully!');
    window.open('users.php','_self');
</script>
            ";
            echo "<script>
    alert('Oops!!! Operation Unsuccessful. Please Try again! Ensure there is no record duplicating!');
    window.open('users.php','_self');
</script>
            ";
    }
}

mysql_close();
?><tr>
    <td colspan="4"><strong>Total No. of Users: <?php echo $count; ?></strong></td>
</tr>
                    </table>
                </fieldset>
                </div>
                </div>
            </div>
<?php
include('footer.php');
?>
