<!DOCTYPE html>
<html>
<head>
	<title>AvaliHub</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	<meta name="description" content="A site for all the floofy avali photos, videos, gifs and more!">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
		  <a href="/search/index.php" class="ca">Or You Can Click Me To Skip</a>
     </form>
	 <img src="../images/AvalihubTransparent.png" alt="AvaliHub icon">
</body>
</html>