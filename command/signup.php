<?php 
   
    include_once('config.php');
    $output ="";
    if(!empty($_POST['txt_us']) && !empty($_POST['txt_em']) && !empty($_POST['txt_ps']))
    {
        //$output.= "Have item";
        $sql = "INSERT INTO users(username,fullname ,lastname , email, password, role) 
                    VALUE(:username,:fullname,:lastname, :email, :password, :role)";
        $query = $db->prepare($sql);
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);

        $query->bindParam(':role', $role, PDO::PARAM_STR);
        
        $username = $_POST['txt_us'];
        $fullname = $_POST['txt_fn'];
        $lastname = $_POST['txt_ln'];
        $email = $_POST['txt_em'];
        $password= $_POST['txt_ps'];


        $role = $_POST['txt_role'];

        $result = $query->execute();
        
        if($sql)
        {
            $output.="Signup Success!!";
        }
        
    } else {
        $output.="Fail";
    }

    echo $output;

?>