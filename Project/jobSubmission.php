<?php
    require_once "includes/config_session.inc.php";
?>
<form action="main.php" method="post">
    <button>Return to Home</button>
</form>
<br>
<form action="profile.php" method="post">
    <button>View Profile</button>
</form>
<br>
<form action="includes/logout.inc.php" method="post">
    <button>Logout</button>
</form>

<!DOCTYPE html>
    <form action="includes/jobSubmission.inc.php" method="post">
        <label for="userJob">Please let us know what your job duties have been</label><br>
        <textarea id="userJob" name="userJob" rows="5" cols="30"><?php echo $_SESSION["user_userJob"]?></textarea><br>
        <button>Submit</button>
    </form>
</html>