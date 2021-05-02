<?php 
   
    include_once('config.php');
    session_start();
    $output ="";
    //var_dump($_POST['manage_id']);
    if($_POST['txt_scope'] == 1)
        {
            $DAY = 1;
        } else if ($_POST['txt_scope']  == 2)
        {
            $DAY = 7;
        } else if($_POST['txt_scope']  == 3)
        {
            $DAY = 30;
        }
    if(!empty($_POST['txt_balance']) && !empty($_POST['txt_scope']) && !empty($_POST['date']) && !empty($_POST['txt_children']))
    {
        //$output.= "Have item";
        $sql = "UPDATE users
               SET balance =  :balance, mode = :mode, Receiving_date = :receiving, Expiration_date = date_add(:receiving, INTERVAL $DAY DAY), current_balance = :current
               
                 WHERE user_id = :user_id";
        $query = $db->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':balance', $balance, PDO::PARAM_STR);
        $query->bindParam(':mode', $mode, PDO::PARAM_STR);
        $query->bindParam(':receiving', $receiving, PDO::PARAM_STR);
        $query->bindParam(':current', $current, PDO::PARAM_STR);

        $user_id = $_POST['txt_children'];
        $balance = $_POST['txt_balance'];
        $mode = $_POST['txt_scope'];
        $receiving = $_POST['date'];
        $current = $_POST['txt_balance'];
        
      
        
        

        // var_dump($user_id);
        // var_dump($balance);
        // var_dump($mode);
        // var_dump($receiving);
        // var_dump($DAY);

        $result = $query->execute();             
                    
        // $sql2 = "UPDATE users
        //         SET balance =  balance + :income , mode = :mode
               
        //         WHERE user_id = :user_id";

        // $query2 = $db->prepare($sql2);
        // $query2->bindParam(':income', $income, PDO::PARAM_STR);
               
        // $query2->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        // $query2->bindParam(':mode', $mode, PDO::PARAM_STR);

        // $user_id = $_POST['manage_id'];
        // $income = $_POST['txt_balance'];
        // $mode = $_POST['txt_scope'];
        // // var_dump($user_id);
        // // var_dump($income);
        // // var_dump($mode);
                    
        // $result2 = $query2->execute();

        // $sql3 = "UPDATE users
        // SET current_balance = current_balance + :income
       
        // WHERE user_id = :user_id";

        // $query3 = $db->prepare($sql3);
        // $query3->bindParam(':income', $income, PDO::PARAM_STR);
       
        // $query3->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        // $user_id = $_POST['manage_id'];
        // $income = $_POST['txt_balance'];

        // // var_dump($user_id);
        // // var_dump($income);
            
        // $result3 = $query3->execute();
        
        if($sql)
        {
            $output.="Expenses Success!!";
        }
        
    } else {
        $output.="Fail";
    }

    echo $output;

?>