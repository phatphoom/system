<?php
include "database.php";

if (isset($_POST['word'])) {
    $word = $_POST['word'];
    $url = "https://api.dictionaryapi.dev/api/v2/entries/en/" . urlencode($word);
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    if (!$response || strpos($response, '200' === false)) {
        echo "faild to fetch ";
    }

    if (empty($data)) {
        echo "word not found";
        exit;
    }
    if (!empty($data)) {
        foreach ($data as $entry) {
            echo "Word: " . $entry['word'] . "<br>";
            echo "Part of Speech: " . $entry['meanings'][0]['partOfSpeech'] . "<br>";
            echo "Definition: " . $entry['meanings'][0]['definitions'][0]['definition'] . "<br>";
            echo "<br>";
        }
    } else {
        echo "Word not found";
    }

    // Store the data in a database
    // Your database insertion code here
    $sql = "INSERT INTO history (word) VALUES ('$word')";
    if ($conn->query($sql) === true) {
        return true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/rightnow.css">
</head>


<body>
    <h1>Dicstionary</h1>
    <form method="POST" action="" id="dictionaryForm">
        <input type="text" name="word" placeholder="Enter a word">
        <input type="submit" value="Submit">
    </form>
    <a href="logout.php" class="logout">logout</a>
    <div id="resultContainer"></div>
    <!-- <a href="history.php" class="history">history</a> -->
    <!-- <a href="" class="histpop">show history</a> -->
    <button class="histpop">show history</button>
    <div class="phppages" style="display: none;">
    </div>
    <script>
        document.getElementById('dictionaryForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            var form = event.target;
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    var resultContainer = document.getElementById('resultContainer');
                    resultContainer.innerHTML = xhr.responseText;
                }
            };
            xhr.send(formData);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(() => {
            $(".histpop").click(() => {
                $(".phppages").toggle();
                if ($(".phppages").is(":visible")) {
                    $(".phppages").load("histpop.php")
                } else {
                    $('#phppages').empty();
                }
                if ($(".histpop").text() === "show history") {
                    $(".histpop").text("hidden history")
                } else {
                    $(".histpop").text("show history")
                }
                // $(".histpop").hide();
            })
        })
    </script>

</body>

</html>