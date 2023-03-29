<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    
<head>
	<title>KUA Gandus</title>
    <link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="{{ asset('img/kua.png') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<!--Coded with love by Mutiullah Samim-->
<body style="background-image: url('{{ asset('img/kua2.jpg') }}')">
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100" style="margin-top: 70px">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="{{ asset('img/kua.png') }}" class="brand_logo" alt="Logo">
						
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="/register" method="post">
						@csrf
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="bi bi-people-fill"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="username">
							@error('username')
							<p class='text-danger'>
								{{$message}}
							</p>
							@enderror
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="bi bi-people-fill"></i></span>
							</div>
							<input type="email" name="email" class="form-control input_user" value="" placeholder="email">
							@error('email')
							<p class='text-danger'>
								{{$message}}
							</p>
							@enderror
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="bi bi-book"></i></span>
							</div>
							<input type="text" name="nama_lengkap" class="form-control input_user" value="" placeholder="nama_lengkap">
							@error('nama_lengkap')
							<p class='text-danger'>
								{{$message}}
							</p>
							@enderror
						</div>

						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="bi bi-key-fill"></i></span>
							</div>
							<input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
							<input type="hidden" name='cek_id' value="Belum Daftar" >
							@error('password')
							<p class='text-danger'>
								{{$message}}
							</p>
							@enderror
						</div>


						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline">Remember me</label>
								<input type="hidden" name="level">
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Daftar</button>
					
					 
					 
				</div>
				
			</form>
		</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						Do you have an account? <a href="{{ route('login') }}" class="ml-2">Sign in</a>
					</div>
					<div class="d-flex justify-content-center links">
						<a href="/forgot-password">Forgot your password?</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('sweetalert::alert')

</body>
</html>
