<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>VirtualScope</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
</head>
<body>
<!-- partial:index.partial.html -->
<main>
<div class="user">
    <header class="user__header">
      <section = class ="wrapper-main">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
        <h1 class="user__title">VirtualScope</h1>
    </header>

    <form class="form" action="includes/login.inc.php" method="post">

		 <div class="form__group">
            <input type="text" name="username" placeholder="Username" class="form__input" />
        </div>

        <div class="form__group">
            <input type="password" name = "pwd" placeholder="Password" class="form__input" />
        </div>

		<button class="btn"  name="login-submit" type="submit">Log In</button><br>


    </form>
	<!--<a href="file:///C:/Users/Babyhlee/Downloads/simple-and-light-sign-up-form%20(1)/simple-and-light-sign-up-form/dist/index%202.html">Not Register</a>-->

  Don't have an account?<button type= "submit" name = "register-submit" onclick="window.location.href='./signup.php'"> Register </button>
</section>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</main>
</body>
</html>
