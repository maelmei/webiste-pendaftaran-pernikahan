<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
    
<head>
	<title>Buat Password Baru</title>
    <link rel="stylesheet" href="css/style.css">
	<link rel="icon" href="{{ asset('img/kua.png') }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<!--Coded with love by Mutiullah Samim-->
<body style="background-image: url('{{ asset('img/kua2.jpg') }}')">
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="{{ asset('img/kua.png') }}" class="brand_logo" alt="Logo">
						
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action="{{ route('password.update') }}" method="post">
						@csrf
						@if ($errors->any())
						<div class="alert alert-danger" role="alert" id="alert">
							
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
						</div>
						@endif
                        @if(session()->has('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif
						<h3 class="text-center" style="font-family: Georgia, 'Times New Roman', Times, serif">Lupa Password</h3>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
                            <input type="hidden" name="token" value="{{ request()->token }}">
                            <input type="hidden" name="email" value="{{ request()->email }}">
							<input type="password" name="password" class="form-control input_user"  placeholder="password">
						{{-- @error('email')
							{{ $message }}
						@enderror --}}
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="password_confirmation" class="form-control input_user"  placeholder="password confirmation">
						{{-- @error('email')
							{{ $message }}
						@enderror --}}
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<button type="submit" name="button" class="btn login_btn">Kirim Email</button>
					
					 
					 
				</div>
				
			</form>
		</div>
		
				<div class="mt-4">
					<div class="d-flex justify-content-center links">
						 <a href="{{ route('login') }}" class="ml-2 btn btn-warning">Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('sweetalert::alert')

	<script>
	 setTimeout(() => {
		document.getElementById('alert').style.display = 'none'
	}, 100000);
	</script>

</body>
</html>
