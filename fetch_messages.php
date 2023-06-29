<?php
include("connection.php");
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the latest messages from the database
    $sel = "SELECT * FROM chat WHERE (userid='$_SESSION[uid]' and sid='$id')  OR  (userid='$id' and sid='$_SESSION[uid]')  ORDER BY id ASC";
    $result = mysqli_query($con, $sel);
    $rows = mysqli_num_rows($result);
    $prevDate = "";
    if ($rows == 0 && !isset($_GET['id'])) {
        echo "<h7 style='color:gray; opacity:50%;'>Select any chat to start messaging!</h7>";
    } else if ($rows == 0 && isset($_GET['id'])) {
        echo "<h7 style='color:gray; opacity:50%;'>Start messaging!</h7>";
    } else {

    // Build the HTML markup for the new messages
    while ($row = mysqli_fetch_array($result)) {
        $time24Hr = $row['date_time'];
        $time12Hr = date("h:i A", strtotime($time24Hr));
        $messageDate = date("d-m-Y", strtotime($time24Hr));

        $messageWrapper = "";
        $messageBubble = "";
        $messageTime = "";

        if ($prevDate != $messageDate) {
            $messageWrapper .= "<div class='message-date'>$messageDate</div>";
            $prevDate = $messageDate;
        }

        if ($row['sid'] == $_SESSION['uid']) {
            $messageWrapper .= "<div class='message-wrapper sent' style='text-align:right'>";
            $messageBubble .= "<div class='message-bubble1 sent-bubble'>";
            $messageTime .= "<span class='message-time' style='text-align:right'>$time12Hr&nbsp</span>";
        } else {
            $messageWrapper .= "<div class='message-wrapper received' style='text-align:left'>";
            $messageBubble .= "<div class='message-bubble received-bubble'>";
            $messageTime .= "<span class='message-time'>&nbsp$time12Hr</span>";
        }

        $messageBubble .= "<span class='message-text'>$row[message]</span>";
        $messageBubble .= "</div>";
        $messageWrapper .= $messageBubble;
        $messageWrapper .= "</div>";
        $messageWrapper .= $messageTime;

        echo $messageWrapper;
    }
}
}
