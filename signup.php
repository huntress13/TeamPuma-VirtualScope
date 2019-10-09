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
<div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
        <h1 class="user__title">VirtualScope</h1>
        <br>
        <br>
        <br>
    </header>




    <form class="form-signup" action="includes/signup.inc.php" method="post">

		 <div class="form__group">
            <input type="text" name = "firstname" placeholder="First Name" class="form__input" />
            <input type="text" name = "lastname" placeholder="Last Name" class="form__input" />
            <input type="text" name = "starid" placeholder="StarId" class="form__input" />
            <input type="password" name="classpwd" placeholder="Class Password" class="form__input" />
            <input type="text" name = "uid" placeholder="Username" class="form__input" />
            <input type="password" name = "pwd" placeholder="Password" class="form__input" />
            <input type="Password" name = "pwd-repeat" placeholder="Repeat Password" class="form__input" />
        </div>
		<button class="btn" name = "signup-submit" type="submit">Sign up!</button><br>
    </form>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
