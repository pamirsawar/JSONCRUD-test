<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $path    = './jsons';
    $files = scandir($path);

    $files = array_diff(scandir($path), array('.', '..'));

    ?>

    <pre>
        <?php print_r($files) ?>
    </pre>


    <?php
    foreach ($files as $file) {
        $user = file_get_contents('./jsons/' . $file);
        $json = json_decode($user, true); // decode the JSON into an associative array
        echo "<pre>";
        print_r($json);
        echo "</pre>";
    }

    ?>

</body>

</html>