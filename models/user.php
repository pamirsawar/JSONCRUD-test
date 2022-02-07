<?php

class User
{

    public $name;
    public $designation;
    public $age;
    public $location;
    public $joining_date;
    public $roles;

    function getUsers()
    {
        $path = __DIR__ . '/../jsons';
        $files = scandir($path);
        $files = array_diff(scandir($path), array('.', '..'));

        $user = file_get_contents('./jsons/' . $files);
        $data = json_decode($user, true); // decode the JSON into an associative array
        $number = count($data);
        return $data;
    }

    function getUser($id){
        $path = __DIR__ . '/../jsons';

        $file="./jsons/".$id.".json";

        $user = file_get_contents($file);
        $data = json_decode($user, true); // decode the JSON into an associative array
        $number = count($data);
        return $data;
    }

    function createUser($data){

        $jsontext= json_encode($data);
 
        $id="test";

         file_put_contents(__DIR__ . "/../jsons/".$id.".json", $jsontext);
     }

    function updateUser($id,$data){

       $jsontext= json_encode($data);

        file_put_contents(__DIR__ . "/../jsons/".$id.".json", $jsontext);
    }
}
