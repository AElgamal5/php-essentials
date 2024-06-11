<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <h1>
    <?php
    $name = "world";

    echo "Hello " . $name . " from php 1";

    echo "<br>";

    echo "Hello $name from php 2";

    echo "<br>";

    echo 'Hello $name from php 2'; // single quotes not dealing with variables
    
    ?>

  </h1>
</body>

</html>