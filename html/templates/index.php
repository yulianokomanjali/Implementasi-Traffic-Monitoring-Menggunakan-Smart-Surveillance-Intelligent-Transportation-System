<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Video streaming</title>
     <style>
          .container{
               margin: 0;
               padding: 0;
               width: 100%;
               height: 100vh;
               background-color: #E2D8F8;
               color: black;
               text-align: center;
          }
          
     </style>
</head>
<body class = "container">
     <h1>Vehicle Counting</h1>
     <?php
     echo "yano";
     ?>
     <img src="{{ url_for('video_feed') }}" style="width:500px;height: 400px;">
     <img src="{{ url_for('video_feed1') }}" style="width:500px;height: 400px;">
    
</body>
</html>