<?php
session_start();
include('head.php');

$date=date(Y);
?>
        <div class="container-fluid">
            <div class="row" style=" padding: 10px; background-color: white; border-radius: 5px;">
                <div class="col-lg-12" class="breadcrumb">
                   
                    <i class="fa fa-home"></i> Home / Event Log
                    
                </div>
            </div>
            <br>
            <div class="row"  style="background-color: white; padding: 0px 20px 20px 20px; border-radius: 5px;">
                <div class="col-lg-12">
                    <h2>Event Log</h2>
                </div>
<div class="row">
                    <div class="col-lg-12">

<!-- Add Accoun-->
<br>
                    <fieldset>

                    <legend><font color="green">Login Events</font></legend>
                    <table class="table table-bordered table-striped table-condensed">
                        <tr>
                            <th>S/N</th>
                            <th>Username</th>
                            <th>User Type</th>
                            <th>Date & Time of Login</th>
                        </tr>
<?php
include('connect.php');
$i=1;

$sql2="SELECT * FROM event_log ORDER BY id DESC ";
$result2=mysql_query($sql2);

$count=mysql_num_rows($result2);

while($rows=mysql_fetch_assoc($result2)){
?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $rows['username']; ?></td>
                            <td><?php echo $rows['user_type']; ?></td>
                            <td><?php echo $rows['datetime']; ?></td>
                        </tr>
<?php
}

mysql_close();
?><tr>
    <td colspan="4"><strong>Total No. of Login Events: <?php echo $count; ?></strong></td>
</tr>
                    </table>
                </fieldset>
                </div>
                </div>
            </div>
<?php
include('footer.php');
?>
