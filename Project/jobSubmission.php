<?php
    require_once "includes/config_session.inc.php";
?>
<!DOCTYPE html>
    <form action="includes/jobSubmission.inc.php" method="post">
        <label for="userJob">Please let us know what your job duties have been</label><br>
        <textarea id="userJob" name="userJob" rows="5" cols="30"><?php echo $_SESSION["user_userJob"]?></textarea><br>
        <button>Submit</button>
    </form>
</html>