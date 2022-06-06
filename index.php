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
    $wordlist_data = file_get_contents("words.json");
    $soundlist_data = file_get_contents("sounds.json");
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
                        <p id="printer" class="text-white" style="font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif"></p>
                    </div>
                    <div class="col">
                        <button id="audio_control" class="btn btn-primary d-none">Listen <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="width:1em;height:1em;vertical-align:auto" fill="#FFFFFF"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M361 215C375.3 223.8 384 239.3 384 256C384 272.7 375.3 288.2 361 296.1L73.03 472.1C58.21 482 39.66 482.4 24.52 473.9C9.377 465.4 0 449.4 0 432V80C0 62.64 9.377 46.63 24.52 38.13C39.66 29.64 58.21 29.99 73.03 39.04L361 215z"/></svg></button>
                        <audio id="player" class="d-none"></audio>
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
    var wordlist = <?php echo $wordlist_data;?>;
    var soundlist = <?php echo $soundlist_data;?>;

    $("#generator").on("click", function(){
        function randomInteger(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        if ($("#audio_control").hasClass("d-none")) {
            $("#audio_control").removeClass("d-none")
        }

        if ($("#audio_control").prop("disabled")) {
            $("#player")[0].pause()
            $("#audio_control").prop("disabled", false)
        }
        
        var arraylength = wordlist["wordlist"].length;
        var selector = randomInteger(0, arraylength - 1);

        $("#printer").empty();
        $("#printer").append(wordlist["wordlist"][selector]);
        $("#player").attr("src", soundlist["soundlist"][selector]);
        $("#player").load();

        
    })

    $("#audio_control").on("click", function() {
        $("#audio_control").attr("disabled", "true")
        $("#player")[0].play()
        var audio_duration = $("#player").prop("duration") * 1000
        setTimeout(function () {
            $("#audio_control").prop("disabled", false)
        }, audio_duration)
    })
</script>

</html>