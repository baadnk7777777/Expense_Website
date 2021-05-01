<?php 
   
    include_once('config.php');
    session_start();
    $output ="";
    //var_dump("test");
    if(!empty($_POST['txt_cost']) && !empty($_POST['txt_cate']) && !empty($_POST['date']))
    {
        //$output.= "Have item";
        $sql = "INSERT INTO expenses(children_id,cost ,category ,expense_date,expense_detail) 
                    VALUE(:children_id,:cost,:category,:expense_date,:expense_detail)";
        $query = $db->prepare($sql);
        $query->bindParam(':children_id', $children_id, PDO::PARAM_STR);
        $query->bindParam(':cost', $cost, PDO::PARAM_STR);
        $query->bindParam(':category', $category, PDO::PARAM_STR);
        $query->bindParam(':expense_date', $expense_date, PDO::PARAM_STR);
        $query->bindParam(':expense_detail', $expense_detail, PDO::PARAM_STR);
        
        $children_id = $_SESSION['user_id'];
        $cost = $_POST['txt_cost'];
        $category = $_POST['txt_cate'];
        $expense_date = $_POST['date'];
        $expense_detail = $_POST['txt_area'];

        var_dump($children_id);
        var_dump($cost);
        var_dump($category);
        var_dump($expense_date);
        var_dump($expense_detail);

        $result = $query->execute();

        $sql2 = "UPDATE children_detail
                SET balance =  balance - :cost
                WHERE user_id = :user_id";

        $query2 = $db->prepare($sql2);
        $query2->bindParam(':cost', $cost, PDO::PARAM_STR);
        $query2->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        $user_id = $_SESSION['user_id'];
        $cost = $_POST['txt_cost'];

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