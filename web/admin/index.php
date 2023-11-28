<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'><link rel="stylesheet" href="../style_login.css">
	<title></title>
	<style type="text/css">
		.btn-primary {
    color: #fff;
    background-color: #e51717;
    border-color: #ad0f0f
}
.btn-primary:hover,.btn-primary:focus,.btn-primary:active,.btn-primary.active,.open .dropdown-toggle.btn-primary {
    color: #fff;
    background-color: #d10e2c;
    border-color: #b50823
}
	</style>
</head>
<body>
<div class="wrapper">
    <form class="form-signin" method="post" action="process_signin.php" >       
      <h2 class="form-signin-heading">Đăng Nhập</h2>
      <input type="email" class="form-control" name="Email" placeholder="Email Address" required="" autofocus="" />
      <input type="password" class="form-control" name="Password" placeholder="Password" required=""/>      
      <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>  
    </form>
  </div>
</body>
</html>