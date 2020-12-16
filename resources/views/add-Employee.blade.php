<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rapid Employee System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
	<section style="padding-top: 60px;">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header p-2">
							Add Employee
						</div>
						<div class="card-body">
							@if(Session::has('employee_created'))
								<div role="alert" class="alert alert-success">
									{{Session::get('employee_created')}}
								</div>
							@endif
							<form action="{{ route('employee.create') }}" method="POST">
								@csrf
								<div class="form-group">
									<label for="EName">Employee Name</label>
									<input type="text" name="EName" placeholder="Employee Name" class="form-control">
								</div>
								<div class="form-group">
									<label for="EMail">Employee Email</label>
									<input type="text" name="EMail" placeholder="Employee Mail" class="form-control">
								</div>
								<div class="form-group">
									<label for="EAddress">Employee Addresss</label>
									<input type="text" name="EAddress" placeholder="Employee Address" class="form-control">
								</div>
								<div class="form-group">
									<label for="EDepartment">Employee Department</label>
									<input type="text" name="EDepartment" placeholder="Employee Department" class="form-control">
								</div>
								<div class="form-group">
									<label for="ERole">Employee Role</label>
									<input type="text" name="ERole" placeholder="Employee Role" class="form-control">
								</div>
								<div class="form-group">
									<label for="EPhn">Employee PhoneNumber</label>
									<input type="text" name="EPhn" placeholder="Employee Phone Number" class="form-control">
								</div>
								<button type="submit" class="btn btn-success m-2">Add Employee</button>
								<a href="/employees" class="btn btn-danger">Back</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>