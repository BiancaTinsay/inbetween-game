<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kakegurui in between</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="style.css">
    <style>
        .responsive-text {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 500;
            color: red;
            text-align: center;
            margin: 10px; /* Adjust margin as needed */
            transition: transform 0.3s;
            cursor: pointer; /* Add cursor pointer to indicate clickable */
        }

        /* Style changes on hover */
        .responsive-text:hover {
            color: #880808; /* Change text color */
            transform: scale(1.1); /* Increase size slightly */
        }

        .responsive-text a {
            text-decoration: none; /* Remove underline from links */
            color: inherit; /* Inherit color from parent */
            display: block; /* Make link fill the entire <h5> area */
            padding: 10px; /* Add padding for better clickability */
        }

        .responsive-img {
            display: block;
            width: 45%;
            height: auto;
            margin: 11% 0% 25% 5%; /* Set margin-top and margin-left to 5% */
        }
        .top-img {
            display: block;
            width: 30%;
            height: auto;
          /* Adjust margin as needed */
            margin-left: 250px;
        }
        .a-text{
          margin-top: 130px;
          margin-left: -850px;
        }

        .a-txt{
          margin-top: -15px;
          margin-left: -850px;

        }

        .a-txts{
          margin-top: -10px;
          margin-left: -850px;

        }

        .form{
          margin-top: -900px;

        }
       


    </style>
</head>
<body>

        <!--music-->
    <audio autoplay loop style="display: none;">
        <source src= "kakegurui-bgm.mp3" type="audio/mpeg">
  </audio>
        


    <div class="image-container">
            <img src="INBETWEEN.png" alt="bg-img" class="responsive-img">
        </a>
        <img src="inspired.png" alt="top-img" class="top-img form">
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h5 class="responsive-text a-text"><a href="intro.php">START GAME</a></h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5 class="responsive-text a-txt "><a href="mechanics.php">MECHANICS</a></h5>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5 class="responsive-text a-txts"><a href="#">EXIT</a></h5>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
