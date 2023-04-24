<?php
    extract($_GET);
		
    // Create a connection to the DB Server
    $con = mysqli_connect('localhost', 'root', '', 'Skychef Food');
    $sql = "SELECT * FROM feedback";
    $res = mysqli_query($con, $sql);
    $c = 0;
    while ($row = mysqli_fetch_assoc($res)) {
        $c++;
        echo "<div id=\"fd$c\">";
        echo "<strong style=\"position:absolute;top:1vh;left:5vw;color:black\">" . $row['username'] . "<br></strong>";
        echo "<p class=\"stat\"><span style=\"color:blue;\">" . $row['postdate'] . "</span><br>" . $row['post'] . "</p>";
        echo "<input type=\"button\" value=\"Like(0)\" id=\"likebtnsave$c\" onclick=\"likefn(this.id)\">
        <input type=\"button\" value=\"Comment\" id=\"commentbtnsave$c\" onclick=\"commentfn(this.id)\">";
        echo "</div>";
    }
    mysqli_close($con);
    header("Location: http://" . $_SERVER['HTTP_HOST'] . '/Skychef Food/feedbkform.php');
?>