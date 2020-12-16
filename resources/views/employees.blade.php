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
				<div class="col-md-12">
					<div class="card">
						<div class="card-header p-2">
							All Employee <a href="/add-Employee" class="btn btn-success">Add New Employee</a>
						</div>
						<div class="card-body">
							@if(Session::has('employee_deleted'))
								<div role="alert" class="alert alert-danger">
									{{Session::get('employee_deleted')}}
								</div>
							@endif
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Employee Name</th>
										<th>Employee Mail</th>
										<th>Employee Department</th>
										<th>Employee Role</th>
										<th style="text-align: center;">Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($employees as $employee)
										<tr>
											<td>{{$employee->id}}</td>
											<td>{{$employee->Employeename}}</td>
											<td>{{$employee->Employeemail}}</td>
											<td>{{$employee->Employeedepartment}}</td>
											<td>{{$employee->Employeerole}}</td>
											<td style="text-align: center;">
												<a href="/employees/{{$employee->id}}" class="btn btn-info">Details</a>
												<a href="/edit-employee/{{$employee->id}}" class="btn btn-primary">Edit</a>
												<a href="/delete-employee/{{$employee->id}}" class="btn btn-danger">Delete</a>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
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