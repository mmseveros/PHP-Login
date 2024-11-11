<?php require_once ('config.php'); // This is where the username and password are currently stored (hardcoded in variables)
session_start();
?>


<html lang="">

<link rel="stylesheet" type="text/css" href="../css/signin.css">
    <title>Sign in</title>
</head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/stylesheet.css">

<div class="header clearfix">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="extra.php">Extra</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contacts.php">Contact</a></li>
            <li><a href="login.php">Log In</a></li>
        </ul>
    </nav>
    <h3 class="text-muted">PHP Login exercise - Home page</h3>
</div>


<body>
<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername" >Username</label>
        <input
                name="Username"
                type="username"
                id="inputUsername"
                class="form-control"
                placeholder="Username"
                required
                autofocus
                minlength="3"
                pattern="^[a-zA-Z0-9]+$"
                title="Username must contain just letters and at least 3"
        >
        <label for="inputPassword">Password</label>
        <input
                name="Password"
                type="password"
                id="inputPassword"
                class="form-control"
                placeholder="Password"
                minlength="8"
                maxlength="12"
                required
                pattern="(?=.*[a-zA-Z])(?=.*\d).+$"
                title="Password must contain at least one number and one special character"
        >
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>

    </form>

    <?php

    /* Check if login form has been submitted */
    /* isset — Determine if a variable is declared and is different than NULL*/
    if(isset($_POST['Submit']))
    {
       $cleanName = test_input("Username");
       $cleanPassword = test_input("Username");

        /* Check if the form's username and password matches */
        /* these currently check against variable values stored in config.php but later we will see how these can be checked against information in a database*/
        if( ($_POST['Username'] == $Username) && ($_POST['Password'] == $Password))
        {
            //echo 'Success';
            /*Success: set session variables and redirect to protected page*/
            $_SESSION['Username'] = $Username; //store Username to the session
            $_SESSION['Active'] = true;

            header("location:about.php"); // header used to redirect the browser

            exit;
        }
        else
            echo 'Incorrect Username or Password';
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }
    ?>

</div>
</body>
</html>
