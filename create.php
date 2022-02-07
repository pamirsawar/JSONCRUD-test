<?php

require './models/user.php';

$user = new User();

if (isset($_POST['create'])) {

    $userdata['name'] = $_POST['name'];
    $userdata['designation'] = $_POST['designation'];
    $userdata['age'] = $_POST['age'];
    $userdata['location'] = $_POST['location'];
    $userdata['joining_date'] = $_POST['joining_date'];

    $roles = explode(',', $_POST['roles']);

    $userdata['roles'] = $roles;


    echo "<pre>";

    print_r($userdata);

    echo "</pre>";



    // $user->updateUser($_POST['id'], $userdata);

    // header('location: ./index.php');
    // exit();
}


$data = $user->getUser($_REQUEST['id']);

$rolestring = implode(',', $data['roles']);

?>


<div class="row">

    <h1>Edit Record</h1>

    <div class="col-4">

        <form action="./create.php" method="post">

            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="Name" >
            </div>

            <div class="mb-3">
                <label for="Designation" class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control" id="Designation" >
            </div>

            <div class="mb-3">
                <label for="Age" class="form-label">Age</label>
                <input type="text" name="age" class="form-control" id="Age" >
            </div>

            <div class="mb-3">
                <label for="Location" class="form-label">Location</label>
                <input type="text" name="location" class="form-control" id="Location" >
            </div>

            <div class="mb-3">
                <label for="Joining_Date" class="form-label">Joining Date</label>
                <input type="date" name="joining_date" class="form-control" id="Joining_Date" >
            </div>

            <div class="mb-3">
                <label for="Roles" class="form-label">Roles</label> <br>
                <select class="selectpicker" name="roles" multiple id="edit-roles">

                    <option value="admin" <?php if (strpos($rolestring, 'admin') !== false) echo "selected" ?>> admin </option>

                    <option value="sales" <?php if (strpos($rolestring, 'sales') !== false) echo "selected" ?>> sales </option>

                    <option value="reporting" <?php if (strpos($rolestring, 'reporting') !== false) echo "selected" ?>> reporting</option>

                    <option value="development" <?php if (strpos($rolestring, 'development') !== false) echo "selected" ?>> development</option>

                </select>
            </div>

            <input type="hidden" name="roles" id="roles">
            <input type="submit" name="create" class="btn btn-primary btn-md pull-right" value="Update">

        </form>
    </div>
</div>