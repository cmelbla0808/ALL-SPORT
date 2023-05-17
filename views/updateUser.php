<?php

namespace views;

session_start();
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Account Settings UI Design</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../css/settings.css">
</head>
<body>

	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Account Settings</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="<?php echo '../images/' . $_SESSION['imagen'] ?>" alt="Image" class="shadow">
						</div>
						<h4 class="text-center"><?php print($_SESSION['nombre'] . " " . $_SESSION['apellido']);?></h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active disabled" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link disabled" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
                        <a class="nav-link disabled" id="avatar-tab" data-toggle="pill" href="#avatar" role="tab" aria-controls="avatar" aria-selected="false">
							<i class="fa fa-user text-center mr-1"></i> 
							Avatar
						</a>
                        <a class="nav-link disabled" href="../views/index.php" role="tab" aria-selected="false">
							<i class="fa fa-home text-center mr-1"></i> 
							Go Home
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <form action="../controller/updateUser.php" method="POST">
						<h3 class="mb-4">Account Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>First Name</label>
								  	<input name="nombre" id="nombre" type="text" class="form-control" value="<?php print($_SESSION['nombre']);?>">
                                    <input name="id" id="id" type="hidden" class="form-control" value="<?php print($_SESSION['id']);?>">
                                    <input name="admin" id="admin" type="hidden" class="form-control" value="<?php print($_SESSION['admin']);?>">
                                    <input name="imagen" id="imagen" type="hidden" class="form-control" value="<?php print($_SESSION['imagen']);?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Last Name</label>
								  	<input name="apellido" id="apellido" type="text" class="form-control" value="<?php print($_SESSION['apellido']);?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input name="email" id="email" type="text" class="form-control" value="<?php print($_SESSION['email']);?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Age</label>
								  	<input name="edad" id="edad" type="number" class="form-control" value="<?php print($_SESSION['edad']);?>">
								</div>
							</div>
						</div>

						<div>
							<button type="submit" class="btn btn-primary">Ok</button>
							<a href="../views/settings.php" class="btn btn-light">Cancel</a>
						</div>
                        </form>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <form action="../controller/updatePassword">
						<h3 class="mb-4">Password Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Old password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>New password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm new password</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div>
							<button type="submit" class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
                        </form>
					</div>
                    <div class="tab-pane fade" id="avatar" role="tabpanel" aria-labelledby="avatar-tab">
                        <form action="../controller/updateAvatar">
						<h3 class="mb-4">Avatar Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Edit photo or avatar</label>
								  	<input type="file" class="form-control">
								</div>
							</div>
						</div>
						<div>
							<button type="submit" class="btn btn-primary">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
                        </form>
					</div>
			    </div>
		    </div>
        </div>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>