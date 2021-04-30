<?php 

session_start();
$output = "";
//var_dump("Test");
include_once ('config.php');

    if(!empty ($_POST['txt_em']) && !empty($_POST['txt_ps']))
    {
        

        $sql = "SELECT* FROM users WHERE email  = :email";
        $query = $db->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $email = $_POST['txt_em'];
        $password = $_POST['txt_ps'];
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        if($query->rowCount() > 0) {
            foreach($result as $res) {
                if($res->email == $email && $res->password == $password)
                {
                    //$output.="login success";
                    $_SESSION['name'] = $res->username;
                    $_SESSION['user_id'] = $res->user_id;
                    $_SESSION['role'] = $res->role;
                   // $output.="ok";
                   echo "ok";
                    //Header("Location: ../dashboard.php");
                }
                else{
                    echo "login fail something wrong";
                   // header('location: index.php');
                }
            }
        }

        //$output.="Text in come";
    }else {
        //header('location: index.php');
    }

   // echo $output;
?>