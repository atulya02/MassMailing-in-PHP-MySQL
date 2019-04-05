<?php
//index.php
$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
$query = "SELECT * FROM customer ORDER BY customer_id";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Send Bulk Email </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/loading-bar.js"></script>
		<link rel="icon" type="image/icon" href="images/logo.png"/>
		<style type="text/css">
			#overlay {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            z-index: 0;
        }
        .ldBar{
        	position: relative;
        	top: 30%;
        }
        .ldBar-label {
	    color: #fff;
	    font-family: tahoma;
	    font-size: 2.1em;
	    font-weight: 200;
	    position: relative;
	    top: 50%;
	    left: 50%;
	    
	  }

		</style>
		<link rel="stylesheet" type="text/css" href="css/loading-bar.css">
	</head>
	<body>
		<div id="overlay" style="background: #0984e3;">
		
			<div class="ldBar" id="myItem1"
			  style="width:100%;height:100px",
			  data-stroke="data:ldbar/res,gradient(0,1,#9df,#9fd,#df9,#fd9)",
			  data-path="M10 20Q20 15 30 20Q40 25 50 20Q60 15 70 20Q80 25 90 20"
			></div>
			<script>
			  var bar1 = new ldBar("#myItem1");
			  var bar2 = document.getElementById('myItem1').ldBar;
			  bar1.set(100);
			</script>
		</div>
		<br />
		<div class="container">
			<h3 align="center">Send Bulk Email </h3>
			<br />
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
						<th>Customer Name</th>
						<th>Email</th>
						<th>Select</th>
						<th>Action</th>
					</tr>
				<?php
				$count = 0;
				foreach($result as $row)
				{
					$count = $count + 1;
					echo '
					<tr>
						<td>'.$row["customer_name"].'</td>
						<td>'.$row["customer_email"].'</td>
						<td>
							<input type="checkbox" name="single_select" class="single_select" data-email="'.$row["customer_email"].'" data-name="'.$row["customer_name"].'" />
						</td>
						<td>
						<button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$count.'" data-email="'.$row["customer_email"].'" data-name="'.$row["customer_name"].'" data-action="single">Send Single</button>
						</td>
					</tr>
					';
				}
				?>
					<tr>
						<td colspan="3"></td>
						<td><button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button></td></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>

<script>
$(document).ready(function(){
	$('.email_button').click(function(){
		$(this).attr('disabled', 'disabled');
		var id  = $(this).attr("id");
		var action = $(this).data("action");
		var email_data = [];
		if(action == 'single')
		{
			email_data.push({
				email: $(this).data("email"),
				name: $(this).data("name")
			});
		}
		else
		{
			$('.single_select').each(function(){
				if($(this).prop("checked") == true)
				{
					email_data.push({
						email: $(this).data("email"),
						name: $(this).data('name')
					});
				} 
			});
		}
		$.ajax({
			url:"send_mail.php",
			method:"POST",
			data:{email_data:email_data},
			beforeSend:function(){
				$('#'+id).html('Sending...');
				$('#'+id).addClass('btn-danger');

			},
			success:function(data){
				if(data == 'ok')
				{
					$('#'+id).text('Success');
					$('#'+id).removeClass('btn-danger');
					$('#'+id).removeClass('btn-info');
					$('#'+id).addClass('btn-success');
				}
				else
				{
					$('#'+id).text('Sent');
					$('#'+id).removeClass('btn-danger');
					$('#'+id).removeClass('btn-info');
					$('#'+id).addClass('btn-success');
				}
				$('#'+id).attr('disabled', false);
			}
		})
	});
});
</script>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $("#overlay").slideUp("");
        }, 1);
    })
</script>
