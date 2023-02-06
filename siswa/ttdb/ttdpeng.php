<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tanda Tangan Digital</title>
    
    <!-- Bootstrap Core Css -->
    <link href="css/bootstrap.css" rel="stylesheet" />

    <!-- Font Awesome Css -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

	<!-- Bootstrap Select Css -->
    <link href="css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/app_style.css" rel="stylesheet" />
	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	
	<style>
		
		#btnSaveSign {
			color: #fff;
			background: #f99a0b;
			padding: 5px;
			border: none;
			border-radius: 5px;
			font-size: 20px;
			margin-top: 10px;
		}
		#signArea{
			width:304px;
			margin: 15px auto;
		}
		.sign-container {
			width: 90%;
			margin: auto;
		}
		.sign-preview {
			width: 150px;
			height: 50px;
			border: solid 1px #CFCFCF;
			margin: 10px 5px;
		}
		.tag-ingo {
			font-family: cursive;
			font-size: 12px;
			text-align: left;
			font-style: oblique;
		}
		.center-text {
			text-align: center;
		}
	</style>
</head>
<body>
   <?php $iduser=$_GET['id']; 
     ?>
     <form name=idttd>
      <?php echo "<input type=hidden name=iduser value=$iduser>"; ?>
     </form>
    <div class="all-content-wrapper">
		<!-- Top Bar 
		<?php require_once('./include/header.php'); ?>
		<!-- #END# Top Bar -->
	
	      	<section class="container">
			<div class="form-group custom-input-space has-feedback">
                        
					<div class="page-body clearfix">
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<div class="panel panel-default">
								<div class="panel-heading">Tanda Tangan Digital:</div>
								<div class="panel-body center-text">

								<div id="signArea" >
									<h2 class="tag-ingo">Silahkan Tanda Tangan Disini,</h2>
									<div class="sig sigWrapper" style="height:auto;">
										<div class="typed"></div>
										<canvas class="sign-pad" id="sign-pad" width="300" height="100"></canvas>
									</div>
								</div>
								
								
								<button id="btnSaveSign">Simpan</button>
								

   
								</div>
							</div>
						</div>


					</div>
				</div>
			</div>
		</section>
    </div>
	
	<!-- Jquery Core Js -->
    <script src="js/jquery.min.js"></script>

           
    <!-- Bootstrap Core Js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Select Js -->
    <script src="js/bootstrap-select.js"></script>

    <link rel="stylesheet" href="css/jquery-ui.css">
	<script src="js/jquery-ui.js"></script>
	
	<link href="./css/jquery.signaturepad.css" rel="stylesheet">
	<script src="./js/numeric-1.2.6.min.js"></script> 
	<script src="./js/bezier.js"></script>
	<script src="./js/jquery.signaturepad.js"></script> 
	
	<script type='text/javascript' src="js/html2canvas.js"></script>
	<script src="./js/json2.min.js"></script>
	
       
	<script>

	$(document).ready(function(e){

		$(document).ready(function() {
			$('#signArea').signaturePad({drawOnly:true, drawBezierCurves:true, lineTop:90});
		});
		

		$("#btnSaveSign").click(function(e){
			html2canvas([document.getElementById('sign-pad')], {
				onrendered: function (canvas) {
					var canvas_img_data = canvas.toDataURL('image/png');
					var img_data = canvas_img_data.replace(/^data:image\/(png|jpg);base64,/, "");
                                        var iduser=document.idttd.iduser.value;
					//ajax call to save image inside folder
					$.ajax({
						url: 'save_signpeng.php',
						data: { img_data:img_data, iduser:iduser,},
						type: 'post',
						dataType: 'json',
						success: function (response) {
                                                   alert("Sukses ... close dan tekan F5 untuk menampilkan tanda tangan ");
						   window.location.reload();
                                                   
						}
					});
				}
			});
		});

	});
	</script>
</body>
</html>