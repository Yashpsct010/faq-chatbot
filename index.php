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
                            var chatbotReply = '<p id = "chatbot-reply" class="chatbot-reply"style="text-align:right">' + userInput + '</p>';
                            // var chatbotReply = '<p id = "chatbot-reply" class="chatbot-reply">' + userInput +'<br>'+ response + '</p>';
                            var chatbot = '<p id = "chatbot-reply" class="chatbot-reply" style="text-align:left">' + response + '</p>';
                            $('#chatContainer').append(chatbotReply);
                            $('#chatContainer').append(chatbot);
                        }
                    });
                }
            });
        });
    </script>
    <script>
function clearContent(){
    document.getElementById('faq');
    document.body.style.width = '10px';
    document.getElementById('chatContainer').style.display="none";

}
function openContent(){
    document.getElementById('chatContainer').style.display="block";
    document.body.style.width = '10%';
}
    </script>
    <style>
        .chatbot-reply {
            color: white;
            
        }
        .close{
            border-radius: 16px;
            color:white;
            float:right;
            padding:2%;
            width:25%;
            background: linear-gradient(90deg, rgba(83, 0, 255, 1) 0%, rgba(231, 172, 204, 1) 100%);
        }
    </style>
</head>
<body>
 
    <div class="faq" id="faq" style="color:white;border: 1px ridge purple;border-radius:16px 0px 16px 0px;background: linear-gradient(90deg, #234EB0 3.66%, #9010B0 100%);width:15rem;padding:1%;position: fixed;bottom: 2rem;right: 2rem;">
        <input class="close" type="button" id="close" value="close" onclick="clearContent()">
        <input class="close" type="button" id="open" value="open" onclick="openContent()">
        <div class="chatbot" id="chatbot">
        <h1 style="display:inline">FAQ Chatbot</h1>
            <div id="chatContainer" style="display:none">

                <input type="text" id="userInput" placeholder="Ask a question..."style = "float:right;width:80%;border-radius:16px;padding:1rem;position:relative">
            </div>
    </div>   
    </div>   
</body>
</html>
