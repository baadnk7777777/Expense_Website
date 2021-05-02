<?php 
   
    include_once('config.php');
    session_start();
    $output ="";
    //var_dump($_POST['edit_id']);
        //$output.= "Have item";
        $sql = "UPDATE users 
                    SET balance = :balance, mode = :mode, current_balance = :current_balance, Receiving_date = :Receiving_date, Expiration_date = :Expiration_date
                    WHERE  user_id = :user_id ";

        
        $query = $db->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        $query->bindParam(':mode', $mode, PDO::PARAM_STR);
        $query->bindParam(':balance', $balance, PDO::PARAM_STR);
        $query->bindParam(':current_balance', $current_balance, PDO::PARAM_STR);
        $query->bindParam(':Receiving_date', $Receiving_date, PDO::PARAM_STR);
        $query->bindParam(':Expiration_date', $Expiration_date, PDO::PARAM_STR);

        $mode = "";
        $balance = "";
        $current_balance = "";
        $Receiving_date = "";
        $Expiration_date = "";
        $user_id = $_POST['Del_ID'];

        //var_dump($category_id);

       $result = $query->execute();
        
        if($sql)
        {
            $output.="Delete Category Success!!";
        }
    echo $output;

?>