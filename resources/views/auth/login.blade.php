<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rapid Employee System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 45px;">
			<div class="col-md-4 offset-4">
				<h4>Sign In to access Rapid</h4>
				<hr>
				<form action="{{ route('auth.check') }}" method="post">
					@csrf
					<div class="results">
						@if(Session::has('fail'))
							<div class="alert alert-danger" role="alert">{{ Session::get('fail') }}</div>
						@endif
					</div>
					<div class="form-group p-2">
						<label for="mail">Email</label>
						<input type="text" name="mail" placeholder="Email" class="form-control" value="{{ old('mail') }}">
						<span class="text-danger">@error('mail'){{ $message }} @enderror</span>
					</div>
					<div class="form-group p-2">
						<label for="mail">Password</label>
						<input type="password" name="password" placeholder="Password" class="form-control">
						<span class="text-danger">@error('password'){{ $message }} @enderror</span>
					</div>
					<div class="form-group p-2">
						<button class="btn btn-block btn-primary">Login</button>
					</div>
					<a href="register" class="p-2">create an Account</a>
					<a href="forgetPassword" class="p-2">Forgotten your password ?</a>
					<a href="auth/github" style="margin-top: 20px;" class="btn btn-success">
                        <strong>Login With Github</strong>
                    </a> 
                    <a href="auth/google" style="margin-top: 20px;" class="btn 	btn-primary">
                        <strong>Login With Google</strong>
                    </a>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>