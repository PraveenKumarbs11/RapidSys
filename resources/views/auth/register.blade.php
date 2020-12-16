<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rapid Employee System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 45px;">
			<div class="col-md-4 offset-4">
				<h4>Register to access Rapid</h4>
				<hr>
				<form action="{{ route('auth.create') }}" method="POST">
					@csrf
					<div class="results">
						@if(Session::has('success'))
							<div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
						@endif
						@if(Session::has('fail'))
							<div class="alert alert-danger" role="alert">{{ Session::get('fail') }}</div>
						@endif
					</div>
					<div class="form-group p-2">
						<label for="mail">Name</label>
						<input type="text" name="name" placeholder="Username" class="form-control" value="{{ old('name') }}">
						<span class="text-danger">@error('name'){{ $message }} @enderror</span>
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
						<button type="submit" class="btn btn-block btn-primary">Register</button>
					</div>
					<a href="login" class="p-2">I already have an Account</a>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>