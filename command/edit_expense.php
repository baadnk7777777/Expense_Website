<?php 
   
    include_once('config.php');
    session_start();
    $output ="";
    //var_dump($_POST['edit_id']);
    if(!empty($_POST['txt_balance']) OR !empty($_POST['txt_scope']) OR !empty($_POST['current']))
    {
        //$output.= "Have item";
        $sql = "UPDATE users
        SET balance =  :balance , current_balance = :current_balance , mode = :mode
        WHERE user_id = :user_id";
        $query = $db->prepare($sql);
        $query->bindParam(':balance', $balance, PDO::PARAM_STR);
        $query->bindParam(':current_balance', $current_balance, PDO::PARAM_STR);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':mode', $mode, PDO::PARAM_STR);
        
        $balance = $_POST['txt_balance'];
        $current_balance = $_POST['current'];
        $user_id = $_POST['edit_id'];
        $mode = $_POST['txt_scope'];

        // var_dump($balance);
        // var_dump($current_balance);
        // var_dump($user_id);

       $result = $query->execute();
        
        if($sql)
        {
            $output.="Edit Expenses Success!!";
        }
        
    } else {
        $output.="Fail";
    }

    echo $output;

?>