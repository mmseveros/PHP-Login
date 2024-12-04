
<html lang="">

<link rel="stylesheet" type="text/css" href="../css/signin.css">
    <title>Sign Up</title>
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

<?php
if (isset($_POST['submit'])) {
    require "config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $new_user = array(
            "firstname" => $_POST['firstname'],
            "lastname" => $_POST['lastname'],
            "email" => $_POST['email'],
            "password" => $_POST['password']
        );
        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "users",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user)));
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}

if (isset($_POST['submit']) && $statement){
    echo $new_user['firstname']. ' was successfully added';
}
?>

<body>
<div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" name="Signup_Form" class="form-signin">
        <h2 class="form-signin-heading">Please complete the form</h2>
        <label for="firstname" >First Name</label>
        <input
                name="firstname"
                type="firstname"
                id="firstname"
                class="form-control"
                placeholder="First Name"
                required
                autofocus
                minlength="3"
                pattern="^[a-zA-Z0-9]+$"
                title="First name must contain just letters and at least 3"
        >
        <label for="lastname" >Last Name</label>
        <input
                name="lastname"
                type="lastname"
                id="lastname"
                class="form-control"
                placeholder="Last Name"
                required
                autofocus
                minlength="3"
                pattern="^[a-zA-Z0-9]+$"
                title="Last name must contain just letters and at least 3"
        >
        <label for="email" >Email</label>
        <input
                name="email"
                type="email"
                id="email"
                class="form-control"
                placeholder="example@domain.com"
                required
                autofocus
                title="Type a valid email"
        >
        <label for="password">Password</label>
        <input
                name="password"
                type="password"
                id="password"
                class="form-control"
                placeholder="Password"
                minlength="8"
                maxlength="12"
                required
                pattern="(?=.*[a-zA-Z])(?=.*\d).+$"
                title="Password must contain at least one number and one special character"
        >
        <label for="password">Confirm Password</label>
        <input
                name="password"
                type="password"
                id="password"
                class="form-control"
                placeholder="Confirm Password"
                minlength="8"
                maxlength="12"
                required
                pattern="(?=.*[a-zA-Z])(?=.*\d).+$"
                title="Passwords should match"
        >

        <button name="submit" value="Submit" class="button" type="submit">Submit</button>

    </form>

</div>
</body>
</html>
