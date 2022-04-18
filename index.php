<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spelling</title>
    <link rel="stylesheet" href="./CSS/Styles/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/Styles/personal_styles.css">
    <script src="./JS/bootstrap.min.js"></script>
    <script src="./JS/JQuery3-6-0.js"></script>
</head>

<!-- Load the json wordlist info -->
<?php
    $json_data = file_get_contents("words.json");
?>

<body class="bg-dark">
    <div class="jumbotron d-flex justify-content-center align-items-center" style="height: 80vh;">
        <div class="container text-center border border-2 border-danger rounded-3 w-75">
            <header class="text-center m-2 text-white">
                <h1>Spelling</h1>
            </header>
            <main class="m-3 text-center">
                <div class="row mb-2">
                    <div class="col">
                        <button class="btn btn-primary" id="generator">Generate Words</button>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <p id="printer" class="text-white"></p>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <footer class="text-white text-center">
        <p>Made by some crow, study kids ;)</p>
    </footer>
</body>

<script type="text/javascript">
    var wordlist = <?php echo $json_data;?>;
    $("#generator").on("click", function(){
        function randomInteger(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
        
        var arraylength = wordlist["wordlist"].length;
        var selector = randomInteger(0, arraylength - 1);

        $("#printer").empty();
        $("#printer").append(wordlist["wordlist"][selector]);
    })
</script>

</html>