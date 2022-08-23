<?php
session_start();
include('head.php');

$date=date(Y);
?>
        <div class="container-fluid">
            <div class="row" style=" padding: 10px; background-color: white; border-radius: 5px;">
                <div class="col-lg-12" class="breadcrumb">
                   
                    <i class="fa fa-home"></i> Home / Vouchers / Search Voucher
                    
                </div>
            </div>
            <br>
            <div class="row"  style="background-color: white; padding: 0px 20px 20px 20px; border-radius: 5px;">
                <div class="col-lg-12">
                    <h2>Search Voucher</h2>
                </div>
<div class="row">
                    <div class="col-lg-12">
<form class="form-group" method="post">
                        <label>Enter Search Term</label>
                        <input type="text" id="search_text" style="height: 50px;" placeholder="Enter Manual ID" name="search_text" required class="form-control"><br>
                   </form>
                   <div id="result" class="col-lg-12"> </div>
                </div>
                </div>
            </div>

<script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt= $(this).val();
            if(txt !=''){
                $.ajax({
                    url:"fetch.php",
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
            else
            {
                $('#result').html('');
            }
        });
    });

</script>
<?php
include('footer.php');
?>
