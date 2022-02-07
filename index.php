<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">


    <!-- bootstrap select  -->

    <script data-require="jquery@2.2.4" data-semver="2.2.4" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <link data-require="bootstrap@3.3.7" data-semver="3.3.7" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script data-require="bootstrap@3.3.7" data-semver="3.3.7" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css" />


</head>

<body>


    <?php

    $path    = './jsons';
    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..'));

    ?>


    <div class="container mt-5">

<?php 
    if((isset($_REQUEST['action']) && $_REQUEST['action']=='edit'))
    {
        include_once "./edit.php";
    }
    ?>



<?php 
    if(!isset($_REQUEST['action']))
    {

        ?>

<h1>ALL USERS</h1>



        <table id="myTable" class="mt-3">

            <thead>
                <tr>
                    <td>Name</td>
                    <td>Designation</td>
                    <td>Age</td>
                    <td>Location</td>
                    <td>Joining Date</td>
                    <td>Roles</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($files as $file) {
                    $user = file_get_contents('./jsons/' . $file);
                    $data = json_decode($user, true); // decode the JSON into an associative array
                    $number = count($data);

                    $id = str_replace('.json', '', $file);

                    // echo "<pre>";
                    // print_r($data);
                    // echo "</pre>";

                ?>
                    <tr>

                        <td><?= $data['name'] ?></td>
                        <td><?= $data['designation']  ?></td>
                        <td><?= $data['age']  ?></td>
                        <td><?= $data['location']  ?></td>
                        <td><?= $data['joining_date']  ?></td>

                        <td>
                            <select class="selectpicker" multiple name="" id="" title="Roles">

                                <?php
                                foreach ($data['roles'] as $role) {

                                    echo  " <option selected  disabled> $role </option>";
                                }
                                ?>
                            </select>
                        </td>

                        <td>
                            <select data-id="<?= $id ?>"  class="selectpicker action" title="Choose Action">
                                <option value="edit">Edit</option>
                                <option value="delete">Delete</option>
                            </select>
                        </td>

                    </tr>

                <?php

                }

                ?>
            </tbody>
        </table>

<?php
}
?>
    </div>

    <!-- bootstrap 5 js bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- datatables -->


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>




    <script type="text/javascript" src="./assets/js/script.js"> </script>

</body>

</html>