<?php
$connect=mysqli_connect("localhost", "root", "", "finance");


$output='';
$sql="SELECT * FROM vouchers WHERE manual_id LIKE '%".$_POST['search']."%' OR id LIKE '%".$_POST['search']."%' ";
$result=mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0)
{
	
	echo '<div class="row"> <h2>Search Results:</h2>';
	while($rows=mysqli_fetch_array($result))
	{
echo '<div class="well search-result">
                <div class="row">
                    <a href="view_voucher.php?id='.$rows['id'].'" title="View Record">
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-10 ">
                            <h3>'.$rows['manual_id'].' - '.$rows['posted_by'].' - ₦'.number_format($rows['amount']).'</h3>
                        </div>
                    </a>
                </div>
            </div>';
}

echo '</div>';
}
else
{
	echo '<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<em>Feedback: </em> NO DATA FOUND!
			</div>';
}

?>
<style type="text/css">
	.well {
    border: 0;
    padding: 20px;
    min-height: 63px;
    background: #fff;
    box-shadow: none;
    border-radius: 3px;
    position: relative;
    max-height: 100000px;
    border-bottom: 2px solid #ccc;
    transition: max-height 0.5s ease;
    -o-transition: max-height 0.5s ease;
    -ms-transition: max-height 0.5s ease;
    -moz-transition: max-height 0.5s ease;
    -webkit-transition: max-height 0.5s ease;
}
.form-control {
    height: 45px;
    padding: 10px;
    font-size: 16px;
    box-shadow: none;
    border-radius: 0;
    position: relative;
}  
    background:#eee;

}
.search-result .title h3 {
    margin: 0 0 15px;
    color: #333;
}
.search-result .title p {
    font-size: 12px;
    color: #333;
}
</style>