<?php 
header('Access-Control-Allow-Origin: *'); 
require_once('config/config.php');
require_once('config/+koneksi.php');
require_once('models/database.php');
include "models/m_dTable.php";

$connection = new Database($host, $user, $pass, $database);
$tbl = new DTable($connection);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<title>Hasil - Classification</title>
		<link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
		
		<!-- Font Awesome icons (free version)-->
		<script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
		
		<!-- Google fonts-->
		<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
		
		<!-- Core theme CSS (includes Bootstrap)-->
		<link href="css/styles.css" rel="stylesheet" />

	</head>

	<body>
		<!-- Custhead-->
		<header class="custhead">
			<div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
				<div class="d-flex justify-content-center">
					<div class="text-center">
						<!--Loader-->
						<div id="loader" style="margin-top:30px">
							<img class="rounded-4" src="assets/img/Gear-0.2s-200px.gif">
						</div>
						<!--Result-->
						<div id="result" style="display:none">
							<h1 class="mx-auto mb-xxl-3 my-0 text-uppercase" id="result-pred"></h1>
							<h2 class="text-white-50 mx-auto mt-2 mb-5" id="result-desc"></h2>
							<!-- Button List-->
							<!-- <button class="btn btn-primary" id="submitButton" type="submit">Show Text</button> -->
							<a class="btn btn-danger" href="\demo-kp">Go Back</a>
							<!-- End button list-->
							<div class="container">
  						</div>
					</div>
				</div>
			</div>
  
		</header>


		<script src="assets/js/jquery-3.6.0.js"></script>		
		<script>
			$(document).ready(function(){
				$.ajax({
					type:"GET",
					url: "http://Pancake:8080/api/rest/public/process/Model-Lapor-NBC?",
					dataType:"json",

					complete: function (xhr){
						$("#loader").hide();
						var data = xhr.responseJSON;
						var result = data[0]["prediction(Kategori Laporan)"];
						var kat = "";
						
						switch(result){
							case '1':
								kat = 'ENERGI PANGAN DAN MARITIM';
								break;
							case '2':
								kat = 'INFRASTRUKTUR DAN TRANSPORTASI';
								break;
							case '3':
								kat = 'KESEHATAN';
								break;
							case '4':
								kat = 'PARIWISATA DAN LINGKUNGAN HIDUP';
								break;
							case '5':
								kat = 'PENDIDIKAN';
								break;
							case '6':
								kat = 'REFORMASI BIROKRASI';
								break;
						}

						var output1 = `"${kat}"`;
						var output2 = `Berdasarkan hasil prediksi dari sistem, teks tergolong dalam kategori<br>(<b>${kat}</b>)`;
						
						$.ajax({
							method:"POST",
							url: "models/update-data.php",
							data:{
								result:result
							}
						});
						$("#result").show();
						$("#result-pred").html(output1);
						$("#result-desc").html(output2);
						// $("#buttonShowText").show();
					},
					error: function(){
						console.log("error");
						$("#loader").hide();
						$("#result-pred").html("Failed to get data");
						$("#result").show();
					}
				});
			});

		</script>
	</body>
</html>