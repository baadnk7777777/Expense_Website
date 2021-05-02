<?php 
   
    include_once('config.php');
    session_start();
    $output ="";
    //var_dump($_POST['manage_id']);
    if(!empty($_POST['txt_balance']) && !empty($_POST['txt_scope']) && !empty($_POST['date']))
    {
        //$output.= "Have item";
        $sql = "INSERT INTO transaction(user_id,cost ,transaction_date) 
                    VALUE(:user_id,:cost,:transaction_date)";
        $query = $db->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':cost', $cost, PDO::PARAM_STR);
        $query->bindParam(':transaction_date', $transaction_date, PDO::PARAM_STR);
        
        $user_id = $_POST['manage_id'];
        $cost = $_POST['txt_balance'];
        $transaction_date = $_POST['date'];

        // var_dump($user_id);
        // var_dump($cost);
        // var_dump($transaction_date);

        $result = $query->execute();             
                    
        $sql2 = "UPDATE users
                SET balance =  balance + :income , mode = :mode
               
                WHERE user_id = :user_id";

        $query2 = $db->prepare($sql2);
        $query2->bindParam(':income', $income, PDO::PARAM_STR);
               
        $query2->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query2->bindParam(':mode', $mode, PDO::PARAM_STR);

        $user_id = $_POST['manage_id'];
        $income = $_POST['txt_balance'];
        $mode = $_POST['txt_scope'];
        // var_dump($user_id);
        // var_dump($income);
        // var_dump($mode);
                    
        $result2 = $query2->execute();

        $sql3 = "UPDATE users
        SET current_balance = current_balance + :income
       
        WHERE user_id = :user_id";

        $query3 = $db->prepare($sql3);
        $query3->bindParam(':income', $income, PDO::PARAM_STR);
       
        $query3->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        $user_id = $_POST['manage_id'];
        $income = $_POST['txt_balance'];

        // var_dump($user_id);
        // var_dump($income);
            
        $result3 = $query3->execute();
        
        if($sql && $sql2 && $sql3)
        {
            $output.="Expenses Success!!";
        }
        
    } else {
        $output.="Fail";
    }

    echo $output;

?>