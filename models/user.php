<?php

class User
{
 
    function getUsers()
    {
        // $path = __DIR__ . '/../jsons';
        // $files = scandir($path);
        // $files = array_diff(scandir($path), array('.', '..'));
        // foreach ($files as $file) {

        // $user = file_get_contents('./jsons/' . $files);
        // $data = json_decode($user, true); // decode the JSON into an associative array
        // $number = count($data);
        // }
        // return $data;
    }

    function getUser($id)
    {
        $path = __DIR__ . '/../jsons';

        $file = "./jsons/" . $id . ".json";

        $user = file_get_contents($file);
        $data = json_decode($user, true); // decode the JSON into an associative array
        $number = count($data);
        return $data;
    }

    function createUser($data)
    {

        $jsontext = json_encode($data);

        // $usersdata = $this->getUsers();
        // $count = count($usersdata);


        $path = __DIR__ . '/../jsons';
        $files = scandir($path);
        $files = array_diff(scandir($path), array('.', '..'));

        $count= count($files);
        
        $id = $count+1;

        if (file_put_contents(__DIR__ . "/../jsons/" . $id . ".json", $jsontext)) {
            echo "success";
        } else {
            echo "something went wrong";
        }
    }

    function updateUser($id, $data)
    {
        $jsontext = json_encode($data);

        file_put_contents(__DIR__ . "/../jsons/" . $id . ".json", $jsontext);
    }
}
