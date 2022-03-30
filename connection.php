<?php

//variable declaration:

$name = filter_input(INPUT_POST,'name' );
$email = filter_input(INPUT_POST,'email' );
$problem = filter_input(INPUT_POST,'prob' );

if(!empty($name)){
    
if(!empty($email)){
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "guessing_game" ;

    // create  database connection:

    $conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);
    if (mysqli_connect_error()){
        die( 'Connect Error('.mysqli_connect_errno().')' .mysqli_connect_error() );
    }
    else{
        $sql = "INSERT INTO help (name,email,problem) 
        values ('$name' , '$email' , '$problem')";
        if($conn->query($sql)){
            echo "New record is inserted successfully!!";
        }
        else{
            echo "Error:".$sql."<br>".$conn->error ;
        }
        $conn->close();
    }


}
else{
    echo "Email should not be empty!!";
    die();
}

}
else{
    echo "Name should not be empty!!";
    die();
}

?>