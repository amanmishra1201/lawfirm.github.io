<?php
session_start();
if(!isset($_SESSION['username'])){
	header("location:login.php");


}
elseif($_SESSION['usertype']=='admin'){
	header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e0e0e0; /* Grey background */
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        a {
            display: block;
            text-align: center;
            margin: 10px 0;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .section {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            background: #f5f5f5; /* Light grey background */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }
        .section h2 {
            background-color: #333; /* Dark grey background for headers */
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            margin: -10px -10px 10px;
            font-size: 18px;
        }
        .section-content {
            display: none;
            padding: 10px;
        }
        .section-content.show {
            display: block;
        }
        .file-upload-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        .file-upload-button:hover {
            background: #0056b3;
        }
        .file-upload {
            display: none;
        }
        .feedback {
            text-align: center;
        }
        .feedback-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .emoji-container {
            font-size: 24px;
            margin: 10px 0;
        }
        .emoji-container span {
            cursor: pointer;
            margin: 0 10px;
        }
        .emoji-container span.selected {
            font-size: 30px;
        }
        .feedback-form button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .feedback-form button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Client Home(Its Your Home:)</h1>
        <a href="logout.php">Logout</a>

        <div class="section" onclick="toggleSection('case-details')">
            <h2>Your Case Details</h2>
            <div id="case-details" class="section-content">
                <p><strong>Case Number:</strong> 123/2019 MACC Jagdesh Vs State of MP</p>
                <p><strong>Next Hearing Date:</strong> 27/09/2019</p>
                <p><strong>Purpose of Hearing:</strong> Judgement</p>
            </div>
        </div>

        <div class="section" onclick="toggleSection('payment-info')">
            <h2>Payment</h2>
            <div id="payment-info" class="section-content">
                <p><strong>Amount Paid:</strong> <span id="payment-amount">7000</span> on <span id="payment-date">7/08/2024</span></p>
            </div>
        </div>

        <div class="section" onclick="toggleSection('advocate-details')">
            <h2>Advocate Details</h2>
            <div id="advocate-details" class="section-content">
                <p><strong>Name:</strong> Ram Prakash Mishra</p>
                <p><strong>Contact:</strong> 9926252109</p>
            </div>
        </div>

        <div class="section" onclick="toggleSection('files')">
            <h2>Files</h2>
            <div id="files" class="section-content">
                <label for="file-upload" class="file-upload-button">Upload File</label>
                <input type="file" id="file-upload" class="file-upload">
            </div>
        </div>

        <div class="section" onclick="toggleSection('feedback')">
            <h2>Feedback</h2>
            <div id="feedback" class="section-content feedback">
                <form class="feedback-form">
                    <div class="emoji-container">
                        <span onclick="addEmoji('😡')">😡</span>
                        <span onclick="addEmoji('😠')">😠</span>
                        <span onclick="addEmoji('😐')">😐</span>
                        <span onclick="addEmoji('😊')">😊</span>
                        <span onclick="addEmoji('😍')">😍</span>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleSection(sectionId) {
            var sectionContent = document.getElementById(sectionId);
            var allSections = document.querySelectorAll('.section-content');
            allSections.forEach(function(content) {
                if (content !== sectionContent) {
                    content.classList.remove('show');
                }
            });
            sectionContent.classList.toggle('show');
        }

        function selectEmoji(emoji) {
            document.getElementById('feedback-text').value = `Selected emoji: ${emoji}`;
            var emojis = document.querySelectorAll('.emoji-container span');
            emojis.forEach(function(span) {
                span.classList.remove('selected');
                if (span.textContent === emoji) {
                    span.classList.add('selected');
                }
            });
        }
    </script>
</body>
</html>
