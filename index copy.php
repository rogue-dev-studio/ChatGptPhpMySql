<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT with PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>ChatGPT with PHP</h1>
        <div id="chat-container" class="mb-3"></div>
        <div class="input-group">
            <input id="user-input" type="text" class="form-control" placeholder="Type your message here">
            <div class="input-group-append">
                <button id="send-btn" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var chatContainer = $("#chat-container");
            var userInput = $("#user-input");
            var sendBtn = $("#send-btn");

            sendBtn.click(function() {
                var userMessage = userInput.val();
                if (userMessage.trim() !== "") {
                    appendMessage("user", userMessage);
                    userInput.val("");
                    sendRequest(userMessage);
                }
            });

            function appendMessage(role, content) {
                var messageClass = (role === "user") ? "text-right" : "text-left";
                var messageHTML = '<div class="mb-2 ' + messageClass + '"><span class="badge badge-pill badge-secondary">' + role + '</span> ' + content + '</div>';
                chatContainer.append(messageHTML);
                chatContainer.scrollTop(chatContainer.prop("scrollHeight"));
            }

            function sendRequest(message) {
                $.ajax({
                    url: "chatgpt.php",
                    type: "POST",
                    data: { message: message },
                    success: function(response) {
                        appendMessage("ChatGPT", response);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    </script>
</body>

</html>
<?php
// include('chatbot.php');