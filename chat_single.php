<?php
error_reporting(0);
include("connection.php");

if (isset($_POST['ccc'])) {
    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y H:i');
    // Check if the message is not blank
    if (!empty($_POST['msgd'])) {
        $uid = $_SESSION['uid']; // Retrieve the value of $_SESSION['uid']
        $msg = $_POST['msgd']; // Retrieve the value of $_POST['msgd']
        $sid = $_REQUEST['id']; // Retrieve the value of $_REQUEST['id']

        $query = "INSERT INTO chat (sid, message, date_time, userid) VALUES ('$sid', '$msg', '$date', '$uid')";
        mysqli_query($con, $query);
    }
    header("Location: chat.php?id=$sid"); // Redirect to the chat page of the corresponding user
        exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Chat</title>

    <style>
        .chat-wrapper {
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 10px;
            max-height: 350px;
            overflow-y: auto;
            flex-direction: column;
            display: flex;
            scrollbar-width: thin;
            scrollbar-color: #c3c3c3 #f5f5f5;
        }

        .chat-wrapper::-webkit-scrollbar {
            width: 0.5em;
        }

        .chat-wrapper::-webkit-scrollbar-track {
            background-color: transparent;
        }

        .chat-wrapper::-webkit-scrollbar-thumb {
            background-color: transparent;
            border-radius: 4px;
        }

        .message-bubble {
            display: inline-block;
            max-width: 70%;
            padding: 10px;
            border-radius: 10px;
            color: #434242;
            font-size: 14px;
        }

        .message-bubble1 {
            display: inline-block;
            max-width: 70%;
            padding: 10px;
            border-radius: 10px;
            color: #fff;
            font-size: 14px;
        }

        .sent-bubble {
            background-color: #0695FF;
            align-self: flex-end;
        }

        .received-bubble {
            background-color: #fff;
            align-self: flex-start;
        }

        .message-time {
            font-size: 8px;
            color: #777;
            margin-bottom: 10px;
        }

        .message-date {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .message-input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 20px;
            font-size: 14px;
        }

        .send-button {
            background-color: #5BC0F8;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 50%;
            margin-left: 5px;
            cursor: pointer;
        }

        .send-button i {
            font-size: 16px;
        }

        .chat-header {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            margin-bottom: 10px;
        }

        .chat-header-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile-image {
            border: 0.5px solid #0695FF;
            border-radius: 50%;
        }

        .chat-header-name {
            font-weight: bold;
        }

        .chat-wrapper:hover::-webkit-scrollbar-thumb {
            background-color: #ccc;
        }

        .chat-wrapper:hover::-webkit-scrollbar-track {
            background-color: #f5f5f5;
        }
    </style>

</head>

<body>
    <div class="central-meta item" style="border-radius: 10px;">
        <div class="user-post">
            <div class="friend-info">
                <section class="section">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="container">
                                <!-- Chat Header -->
                                <?php
                                $sel = mysqli_query($con, "SELECT * FROM `student` WHERE id='$_REQUEST[id]'");
                                while ($row = mysqli_fetch_array($sel)) {
                                ?>
                                    <div class="chat-header">
                                        <img class="chat-header-image profile-image" src="admin/user_tbl/uploads/<?php echo $row['image']; ?>" alt="Profile Image">
                                        <a href="view.php?id=<?php echo $row['id'] ?>" title=""><?php echo $row['name'] ?></a>
                                    </div>
                                <?php
                                }
                                ?>
                                <!-- Chat Messages -->
                                <div class="chat-wrapper" id="message">
                                    <?php
                                    $sel = "SELECT * FROM chat WHERE (userid='$_SESSION[uid]' and sid='$_REQUEST[id]')  OR  (userid='$_REQUEST[id]' and sid='$_SESSION[uid]')  ORDER BY id ASC";
                                    $result = mysqli_query($con, $sel);
                                    $rows = mysqli_num_rows($result);
                                    $prevDate = "";
                                    if ($rows == 0 && !isset($_REQUEST['id'])) {
                                        echo "<h7 style='color:gray; opacity:50%;'>Select any chat to start messaging!</h7>";
                                    } else if ($rows == 0 && isset($_REQUEST['id'])) {
                                        echo "<h7 style='color:gray; opacity:50%;'>Start messaging!</h7>";
                                    } else {
                                        while ($row = mysqli_fetch_array($result)) {
                                            $time24Hr = $row['date_time'];
                                            $time12Hr = date("h:i A", strtotime($time24Hr));
                                            $messageDate = date("d-m-Y", strtotime($time24Hr));

                                            if ($prevDate != $messageDate) {
                                                echo "<div class='message-date'>$messageDate</div>";
                                                $prevDate = $messageDate;
                                            }

                                            if ($row['sid'] == $_SESSION['uid']) {
                                                echo "<div class='message-wrapper sent' style='text-align:right'>";
                                                echo "<div class='message-bubble1 sent-bubble'>";
                                                echo "<span class='message-text'>$row[message]</span>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "<span class='message-time' style='text-align:right'>$time12Hr&nbsp</span>";
                                            } else {
                                                echo "<div class='message-wrapper received'>";
                                                echo "<div class='message-bubble received-bubble'>";
                                                echo "<span class='message-text'>$row[message]</span>";
                                                echo "</div>";
                                                echo "</div>";
                                                echo "<span class='message-time'>&nbsp$time12Hr</span>";
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <!-- Message Input -->
                                <?php
                                if ($rows > 0 || isset($_REQUEST['id'])) {
                                    // Display the message input form if chat messages exist
                                    echo "<form action='' method='post'>";
                                    echo "<div class='input-wrapper'>";
                                    echo "<input type='text' class='message-input' name='msgd' placeholder=' Message' required>";
                                    echo "<button type='submit' class='send-button' style='padding-left:10px;' name='ccc'><i class='fa fa-paper-plane'></i></button>";
                                    echo "</div>";
                                    echo "</form>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>

<script>
    var chatWrapper = document.getElementById('message');

    function fetchMessages() {
        $.ajax({
            url: 'fetch_messages.php',
            type: 'GET',
            data: {
                id: <?php echo $_REQUEST['id']; ?>
            },
            success: function(response) {
                // Check if the user is already at the bottom before appending new messages
                var isScrolledToBottom = chatWrapper.scrollHeight - chatWrapper.clientHeight <= chatWrapper.scrollTop + 1;

                // Append the new messages to the chat wrapper
                $('#message').html(response);

                // Scroll to the bottom of the chat wrapper if the user was already at the bottom
                if (isScrolledToBottom) {
                    chatWrapper.scrollTop = chatWrapper.scrollHeight;
                }
            }
        });
    }

    setInterval(fetchMessages, 1000);

    // Scroll to the bottom of the chat wrapper on page load
    window.onload = function() {
        chatWrapper.scrollTop = chatWrapper.scrollHeight;
    };

    // Disable form submission if the message is blank
    document.querySelector('form').addEventListener('submit', function(event) {
        var messageInput = document.querySelector('.message-input');
        if (messageInput.value.trim() === '') {
            event.preventDefault();
        }
    });
</script>

</html>
