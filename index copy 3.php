<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT with PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .container h1 {
            background-color: #075e54;
            color: #fff;
            padding: 15px;
            margin: 0;
            border-radius: 8px 8px 0 0;
        }

        #chat-container {
            padding: 15px;
            max-height: 400px;
            overflow-y: scroll;
        }

        .input-group {
            padding: 15px;
            border-top: 1px solid #ddd;
            background-color: #f6f6f6;
        }

        .input-group input {
            border-radius: 20px;
        }

        .input-group-append button {
            border-radius: 50%;
        }

        .message-container {
            display: flex;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .user-message {
            background-color: #dcf8c6;
        }

        .chatgpt-message {
            background-color: #fff;
        }

        .message-content {
            padding: 10px;
        }

        .message-role {
            font-size: 12px;
            color: #888;
            margin-bottom: 5px;
        }
    </style>
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

            userInput.keypress(function(event) {
                if (event.keyCode === 13) {
                    sendBtn.click();
                }
            });

            function appendMessage(role, content) {
                var messageClass = (role === "user") ? "user-message" : "chatgpt-message";
                var avatarURL = (role === "user") ? "user_avatar.png" : "chatgpt_avatar.png";
                var messageHTML = '<div class="message-container"><img src="' + avatarURL + '" class="avatar"><div class="message-content"><div class="message-role">' + role + '</div>' + content + '</div></div>';
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
