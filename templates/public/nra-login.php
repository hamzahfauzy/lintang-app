<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>NRA Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= routeTo('assets/img/main-logo.png')?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?=routeTo('assets/js/plugin/webfont/webfont.min.js')?>"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?=routeTo('assets/css/fonts.min.css')?>']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=routeTo('assets/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=routeTo('assets/css/atlantis.min.css')?>">
</head>
<body style="min-height:auto;">
	<div class="container">
        <div class="row mt-4">
            <div class="col-sm-12 col-md-8 col-lg-6 mx-auto">
                <div class="card full-height">
                    <?php if($success_msg): ?>
                    <div class="alert alert-success"><?=$success_msg?></div>
                    <?php endif ?>
    
                    <?php if($error_msg): ?>
                    <div class="alert alert-danger"><?=$error_msg?></div>
                    <?php endif ?>
                    <div class="card-body">
                        <center>
                            <img src="<?=routeTo('assets/img/main-logo.png')?>" width="150px" height="100px" alt="logo" style="object-fit:contain;">
                        </center>
                        <div class="card-title text-center">OTP Login</div>
                        <div class="card-category text-center">Masukkan Nomor WA Anda.</div>

                        <form action="" method="post">                    
                            <div class="phone-field form-group">
                                <label for="">Nomor WA</label>
                                <div class="input-group">
                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="Nomor WA anda disini" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" onclick="sendOtp()">Kirim OTP</button>
                                    </div>
                                </div>
                            </div>
                            <div class="otp-field form-group d-none">
                                <label for="">OTP</label>
                                <input type="text" name="password" id="password" class="form-control mb-2" placeholder="OTP Disini...">
                                <button class="btn btn-primary btn-block btn-round">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
async function sendOtp()
{
    var phone = document.querySelector('#phone')
    var formData = new FormData
    formData.append('phone', phone.value)
    var request = await fetch('<?=routeTo('api/v1/send-otp')?>',{
        method:'POST',
        body:formData
    })
    if(request.ok)
    {
        var response = await request.json()
        if(response.status == 'success')
        {
            var phoneField = document.querySelector('.phone-field')
            phoneField.classList.add('d-none')

            var otpField = document.querySelector('.otp-field')
            otpField.classList.remove('d-none')
        }
        else
        {
            alert(response.message)
        }
    }
    else
    {
        var response = await request.json()
        alert(response.message)
    }
}
</script>
</body>
</html>