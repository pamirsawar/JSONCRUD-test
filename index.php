<?php

require_once "./inc/header.php";

?>



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

    if(!isset($_REQUEST['action']))
    {

        ?>

<h1>ALL USERS</h1>

<a href="./create.php" class="btn btn-primary mb-2 pull-right"> Create </a>

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

                    // echo "count of users".$number;

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

<?php

require_once "./inc/footer.php";

?>