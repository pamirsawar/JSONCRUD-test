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

</head>

<body>


    <?php
    $path    = './jsons';
    $files = scandir($path);

    $files = array_diff(scandir($path), array('.', '..'));

    ?>


    <div class="container mt-5">

        <table id="myTable">

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
                    $number= count($data);

                    echo "<pre>";
                    print_r($data);
                    echo "</pre>";

                    $i=0;
                ?>
                    <tr>

                        <td><?= $data['name'] ?></td>
                        <td><?= $data['designation']  ?></td>
                        <td><?= $data['age']  ?></td>
                        <td><?= $data['location']  ?></td>
                        <td><?= $data['joining_date']  ?></td>
                        <td><?php 
                        
                        // print_r($data['roles']);

                        echo "<select multiple>";

                    //    {
?>
                         <option value='<?=$roles ?>' <?php if($data['roles'][$i]=='admin') echo "selected" ?> >admin</option>   
                         <option value='<?=$roles ?>' <?php if($data['roles'][$i+1]=='sales') echo "selected" ?> >sales</option>  
                         <option value='<?=$roles ?>' <?php if($data['roles'][$i+2]=='reporting') echo "selected" ?> >reporting</option>   
                         <option value='<?=$roles ?>' <?php if($data['roles'][$i+3]=='development') echo "selected" ?> >development</option>  

                         <?php 
                    //    }
                        echo "</select>";

                        ?></td>

                        <td>
                            <select>
                                <option value="">Edit</option>
                                <option value="">Delete</option>
                            </select>
                        </td>

                    </tr>

                <?php

$i=0;
                        // if($i<$number){
                        //     $i++;
                        // }

                }
                ?>
            </tbody>

        </table>

    </div>

    <!-- bootstrap 5 js bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- datatables -->


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>