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
            margin: 0;
            display: flex;
            align-items: flex-start;
            justify-content: center;
        }

        .container {
            width: 100%;
            max-width: 500px;
            height: 100vh;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .container h1 {
            background-color: #075e54;
            color: #fff;
            padding: 15px;
            margin: 0;
            border-radius: 8px 8px 0 0;
        }

        #chat-container {
            flex-grow: 1;
            padding: 15px;
            max-height: calc(100% - 150px); /* Adjust the height based on your needs */
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
            align-self: flex-end;
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

        .fullscreen-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #888;
            background: none;
            border: none;
            cursor: pointer;
        }

        /* For fullscreen mode */
        .fullscreen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
        }

        .fullscreen .container {
            max-width: 100%;
            height: 100%;
            border-radius: 0;
            box-shadow: none;
        }

        .fullscreen #chat-container {
            max-height: calc(100% - 150px);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>ChatGPT with PHP</h1>
        <button id="fullscreen-btn" class="fullscreen-button" onclick="toggleFullscreen()">
            <i id="fullscreen-icon" class="bi bi-arrows-fullscreen"></i>
        </button>
        <div id="chat-container" class="mb-3"></div>
        <div class="input-group">
            <input id="user-input" type="text" class="form-control" placeholder="Type your message here">
            <div class="input-group-append">
                <button id="send-btn" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        var fullscreenBtn = document.getElementById("fullscreen-btn");
        var fullscreenIcon = document.getElementById("fullscreen-icon");

        function toggleFullscreen() {
            if (document.fullscreenElement) {
                exitFullscreen();
            } else {
                enterFullscreen();
            }
        }

        function enterFullscreen() {
            var container = document.querySelector('.container');
            container.classList.add('fullscreen');
            fullscreenIcon.classList.remove("bi-arrows-fullscreen");
            fullscreenIcon.classList.add("bi-arrows-fullscreen-exit");
        }

        function exitFullscreen() {
            var container = document.querySelector('.container');
            container.classList.remove('fullscreen');
            fullscreenIcon.classList.remove("bi-arrows-fullscreen-exit");
            fullscreenIcon.classList.add("bi-arrows-fullscreen");
        }

        // Rest of your code...
    </script>
</body>

</html>
