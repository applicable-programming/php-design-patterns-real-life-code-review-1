<?php
require_once 'includes/__header.php';
?>

<H3>Please enter your email and password to log in</H3>

<?php


if (isset($_SESSION['msg'])) {
    echo "<h3>".$_SESSION['msg']."</h3>";
    unset($_SESSION['msg']);
}?>

    <form action="loginUser" method="post">

        <input type="text" name="email" placeholder="Enter your email">
        <br>
        <input type="password" name="password" placeholder="Enter your password">
        <br>
        <input type="submit" value="Submit">
    </form>


<?php

require_once 'includes/__footer.php';
