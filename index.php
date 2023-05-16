<!DOCTYPE html>
<html>
<head>
    <title>FAQ Chatbot</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#userInput').on('keydown', function (e) {
                if (e.which === 13) {
                    var userInput = $(this).val();
                    $(this).val('');

                    // Send user input to PHP for processing
                    $.ajax({
                        url: 'process.php',
                        type: 'POST',
                        data: {
                            userInput: userInput
                        },
                        success: function (response) {
                            var chatbotReply = '<p class="chatbot-reply">' + response + '</p>';
                            $('#chatContainer').append(chatbotReply);
                        }
                    });
                }
            });
        });
    </script>
    <style>
        .chatbot-reply {
            color: white;
            
        }
    </style>
</head>
<body>
<div class="faq" style="color:white;border: 1px ridge purple;border-radius:16px 0px 16px 0px;background: linear-gradient(90deg, #234EB0 3.66%, #9010B0 100%);width:20rem;padding:2%;position: fixed;bottom: 2rem;right: 2rem;">
    <h1>FAQ Chatbot</h1>
        <div id="chatContainer"></div>
        <input type="text" id="userInput" placeholder="Ask a question...">
</div>   
</body>
</html>
