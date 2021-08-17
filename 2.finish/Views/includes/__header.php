<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Code review #1</title>

</head>
<body>

<nav>

    <ul >
        <li style="display: inline"><a href="index.php">Home</a></li>


        <?php if (!isset($_SESSION['logged_in'])) : ?>

        <li style="display: inline"><a href="login">Login</a></li>
        <li style="display: inline"><a href="register">Register</a></li>

        <?php else: ?>
            <li style="display: inline"><a href="logout">Logout</a></li>
        <?php endif ?>

        <form style="display: inline" action="search" method="post">
            <input type="text" name="search" placeholder="Search username or email">
            <input type="submit" value="Search">

        </form>

    </ul>

</nav>



