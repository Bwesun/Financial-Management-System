<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="jquery.min.js"></script>
    <link href="bootstrap.min.css" rel="stylesheet">
<?php
include('connect.php');

$sql2="SELECT SUM(credit), SUM(debit) FROM vouchers ";
$result2=mysql_query($sql2);


$rows=mysql_fetch_assoc($result2);

$all_total=$rows['SUM(credit)'];
$all=$rows['SUM(debit)'];

echo "Credit Total: ".$all_total;
echo "<br>Debit Total: ".$all;
?>

<script src="bootstrap.min.js"></script>
<script src="collapse.js"></script>



<div class="panel-group" id="accordion">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion"
			href="#y2">
			jkhgjh
			</a>
			</h4>
		</div>
		<div id="y2" class="panel-collapse collapse">
			<div class="panel-body">
				ljkgkhbju
				lkukgvnjli
			</div>
		</div>
	</div>
	<?php
	
	//Clear the Message Tray
	?>
</div>