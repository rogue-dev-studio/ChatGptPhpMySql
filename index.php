<?php include('config/db.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT with PHP</title>
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div id="ceklayar" class="container">
        <div class="header">
            <div class="row">
                <div class="col-sm-5">
                    <h1>ChatGPT with PHP</h1>
                </div>
                <div class="col-sm-7 icon-screen">
                    <button id="fullwidth-btn" class="fullwidth-button" onclick="toggleFullwidth()">
                        <i id="fullwidth-icon" class="fa fa-expand-arrows-alt"></i>
                        <span class="tooltip">Full Width</span>
                    </button>
                    <button id="fullscreen-btn" class="fullscreen-button"
                        onclick="toggleFullscreen();toggleFullscreenIcon();">
                        <i id="fullscreen-icon" class="fa fa-expand"></i>
                        <span class="tooltip">Fullscreen</span>
                    </button>
                </div>
            </div>

        </div>
        <div id="chat-container" class="mb-3"></div>
        <!-- <div class="input-group">
            <input id="user-input" type="text" class="form-control" placeholder="Type your message here">
            <div class="input-group-append">
                <button id="send-btn" class="btn btn-primary">
                    <i class="fa fa-paper-plane"></i>
                </button>
            </div>
        </div> -->
        <div class="input-group">
            <textarea id="user-input" type="text" class="form-control" placeholder="Type your message here"></textarea>
            <div class="input-group-append">
                <button id="send-btn" class="btn btn-primary">
                    <i class="fa fa-paper-plane"></i>
                </button>
            </div>
        </div>

    </div>
    <?php

// if ($result->num_rows > 0) {
//     // Menampilkan data
//     while ($row = $result->fetch_assoc()) {
//         if($row["user_id"]==1){
//             echo "ID: " . $row["user_id"] . " - Nama: " . $row["user_name"] . "<br>";
//         }
//     }
// } else {
//     echo "Tidak ada data yang ditemukan.";
// }
if ($result->num_rows > 0) {
    // Menampilkan data
    $user_names = array(); // Array untuk menyimpan semua nilai user_name
    while ($row = $result->fetch_assoc()) {
        if ($row["user_id"] == 1) {
            $user_names[] = $row["user_name"]; // Menambahkan nilai user_name ke dalam array
        }
        if ($row["user_id"] == 2) {
            $bot[] = $row["user_name"]; // Menambahkan nilai user_name ke dalam array
        }
    }
} else {
    echo "Tidak ada data yang ditemukan.";
}
?>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/functions.js"></script>
    <script>
    $(document).ready(function() {
        var chatContainer = $("#chat-container");
        var userInput = document.getElementById("user-input");

        function sendMessage() {
            var message = userInput.value.trim();

            if (message !== "") {
                appendMessage("user", userInput.value);
                userInput.value = "";
                sendRequest(message);
            }
        }

        // Menggunakan event keyup untuk mendeteksi tombol Enter
        document.getElementById("user-input").addEventListener("keyup", function(event) {
            if (event.key === "Enter" && !event.shiftKey) {
                event.preventDefault();
                sendMessage();
            }
        });

        document.getElementById("send-btn").addEventListener("click", sendMessage);

        // Menangani paste dari clipboard
        document.getElementById("user-input").addEventListener("paste", function(event) {
            event.preventDefault();
            var clipboardData = event.clipboardData || window.clipboardData;
            var pastedText = clipboardData.getData("text/plain");
            document.getElementById("user-input").value = pastedText;
        });

        // Function appendMessage() dan sendRequest() tidak perlu diubah

        function appendMessage(role, content) {
        
            var user_names = <?php echo json_encode($user_names); ?>;
            var bot = <?php echo json_encode($bot); ?>;
            console.log(user_names); // Contoh: mencetak semua nilai user_name ke konsol
            var messageClass = (role === "user") ? "user-message" : "chatgpt-message";
            var avatarURL = (role === "user") ? "user_avatar.png" : "chatgpt_avatar.png";
            var role = (role === "user") ? user_names : bot;
            var messageHTML = '<div class="message-container ' + messageClass + '"><img src="' + avatarURL +
                '" class="avatar"><div class="message-content"><div class="message-role">' + role +
                '</div><div class="isi-pesan">' + content + '</div></div></div>';
            chatContainer.append(messageHTML);
            chatContainer.scrollTop(chatContainer.prop("scrollHeight"));
        }

        function sendRequest(message) {
            $.ajax({
                url: "chatgpt.php",
                type: "POST",
                data: {
                    message: message
                },
                success: function(response) {
                    appendMessage("ChatGPT", response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        var fullscreenBtn = $("#fullscreen-btn");
        var tooltip = fullscreenBtn.find(".tooltip");

        var tooltipWidth = tooltip.outerWidth();
        var btnWidth = fullscreenBtn.outerWidth();
        var tooltipLeft = -(tooltipWidth / 2) + (btnWidth / 2);

        tooltip.css("left", tooltipLeft + "px");
    });
    </script>
</body>

</html>