<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Zexlusive Hotel Yönetim Paneli</title>

<link href='../../fonts.googleapis.com/css@family=Roboto_3A400,300,500,700,900' rel='stylesheet' type='text/css' />
<link href='../../fonts.googleapis.com/css@family=Lato_3A300,400,700' rel='stylesheet' type='text/css' />

<!-- Styles -->
<link rel="stylesheet" href="font-awesome-4.2.0/css/font-awesome.css" type="text/css" /><!-- Font Awesome -->
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" /><!-- Bootstrap -->
<link rel="stylesheet" href="css/style.css" type="text/css" /><!-- Style -->
<link rel="stylesheet" href="css/responsive.css" type="text/css" /><!-- Responsive -->	
<style>
	body{
		background-image: url('images/resource/pattern-bg.jpg');
		/*background-repeat:inherit;*/
		background-size:100%;
		width:100%;
		height:70%;



	}
</style>
</head>
<body>
	
<div class="login-sec">
	<div class="login">
		<div class="login-form">
			<h5>Zexlusive Hotel<br/><br/>YÖNETİM PANELİ</h5>
			<form action="includes/control.php" method="POST">
				<fieldset><input type="text" name="username" placeholder="Kullanıcı Adınız" /><i class="fa fa-user"></i></fieldset>
				<fieldset><input type="password" name="password" placeholder="Şifreniz" /><i class="fa fa-unlock-alt"></i></fieldset>
				<button type="submit" class="blue">Giriş</button>
			</form>
			<a href="#modal" data-toggle="modal" title="">Şifre Değiştir</a>
		</div>
		<span>Copyright © zexclusivehotel.com 2020. All rights reserved.</span>
	</div>

<div class="modal fade" id="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Uyarı!</h4>
			</div>
				<div class="modal-body">
					<form id="modalform">
  <div class="form-group">
    <label for="exampleInputEmail1">Kullanıcı Adnınız</label>
    <input type="text" class="form-control" id="username" placeholder="Kullanıcı Adınız">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Eski Şifreniz</label>
    <input type="password" class="form-control" id="oldpassword" placeholder="Eski Şifre">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Yeni Şifreniz</label>
    <input type="password" class="form-control" id="yeni_sifre" placeholder="Yeni Şifre">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Yeni Şifreniz Tekrar</label>
    <input type="password" class="form-control" id="yeni_sifre1" placeholder="Yeni Şifre Tekrar">
  </div>
</form>
					<div class="modal-footer">
						
						<button class="btn btn-success" type="button" id="kaydet">Kaydet</button>
						<button class="btn btn-danger" type="button" data-dismiss="modal">Vazgeç</button>
					</div>
				</div>
					
		</div>
	</div>
</div>
</div><!-- Log in Sec -->	


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
	
	$("#kaydet").on("click",function(){

			//var data = CKEDITOR.instances.baslik.getData();
			var username 	= $("#username").val();
			var password 	= $("#oldpassword").val();
			var yeni_sifre 	= $("#yeni_sifre").val();
			var yeni_sifre1 = $("#yeni_sifre1").val();
			// alert(username + password + yeni_sifre + yeni_sifre1);
			
			if(yeni_sifre === yeni_sifre1){

				//alert("Şifre Uyumlu");

				$.ajax({

					type : 'POST',
					url  : '../process.php',
					data : {'username':username, 'password':password, 'yeni_sifre':yeni_sifre,'q':'sifre_degistir'},

					success: function(cevap){

						alert(cevap);
						$('#modal').modal('hide');
						$("#modalform")[0].reset();
						//window.location.reload();
					}
				});

			}else{
				$("#yeni_sifre ,#yeni_sifre1").css("border","1px solid red");
          		$("#yeni_sifre , #yeni_sifre1").attr("placeholder", "Şifre Uyumsuzluğu var").val("").focus().blur();
			}
			//var data = $("#baslik").html();
			//$("#veri").html(data);
			
		/*$.ajax({

			type : 'POST',
			url  : 'process.php',
			data : {'sayfa':data,'q':'index'},

			success: function(cevap){

				//alert(cevap);
				window.location.reload();
			}
		});*/
	});
</script>

</body>
</html>