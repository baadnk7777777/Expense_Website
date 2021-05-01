<?php 
   
    include_once('config.php');
    session_start();
    $output ="";
    //var_dump("test");
    if(!empty($_POST['txt_cost']) && !empty($_POST['txt_cate']) && !empty($_POST['date']))
    {
        //$output.= "Have item";
        $sql = "INSERT INTO expenses(user_id,category ,cost ,expense_description,expense_date) 
                    VALUE(:user_id,:category,:cost,:expense_description,:expense_date)";
        $query = $db->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $query->bindParam(':cost', $cost, PDO::PARAM_STR);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':expense_date', $expense_date, PDO::PARAM_STR);
        $query->bindParam(':expense_description', $expense_description, PDO::PARAM_STR);
        
        $user_id = $_SESSION['user_id'];
        $cost = $_POST['txt_cost'];
        $category = $_POST['txt_cate'];
        $expense_date = $_POST['date'];
        $expense_description = $_POST['txt_area'];

        var_dump($user_id);
        var_dump($cost);
        var_dump($category);
        var_dump($expense_date);
        var_dump($expense_description);

        $result = $query->execute();

        $sql = "Select sum(cost) as total_cost FROM expenses WHERE user_id = :user_id";
        $query = $db->prepare($sql);
        $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $user_id = $_SESSION['user_id'];
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() >0) {
                foreach($result as $res3)
                {   
                   
              

        $sql2 = "UPDATE users
                SET current_balance =  balance - :cost
                WHERE user_id = :user_id";

        $query2 = $db->prepare($sql2);
        $query2->bindParam(':cost', $cost, PDO::PARAM_STR);
                }
            }  
        $query2->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        $user_id = $_SESSION['user_id'];
        $cost = $res3->total_cost;

        var_dump($user_id);
        var_dump($cost);

        $result2 = $query2->execute();
        
        if($sql && $sql2)
        {
            $output.="Signup Success!!";
        }
        
    } else {
        $output.="Fail";
    }

    echo $output;

?>