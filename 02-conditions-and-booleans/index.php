<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>

  <?php
  $isRead = true;

  if ($isRead) {
    $msg = "You have read today";
  } else {
    $msg = "You have't read today";
  }

  //'<?=' is equal to  '<?php echo' and no need to semicolon after the var or value
  ?>

  <h1> <?php echo $msg; ?> </h1>
  <h1> <?= $msg ?> </h1>
  <h1> <?= true ?> </h1>
</body>

</html>