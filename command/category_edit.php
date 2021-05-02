<?php 
   
    include_once('config.php');
    session_start();
    $output ="";
    //var_dump($_POST['edit_id']);
    if(!empty($_POST['txt_category']))
    {
        //$output.= "Have item";
        $sql = "UPDATE category
        SET category_name =  :category_name
        WHERE category_id = :category_id";
        $query = $db->prepare($sql);
        $query->bindParam(':category_name', $category_name, PDO::PARAM_STR);
        $query->bindParam(':category_id', $category_id, PDO::PARAM_STR);
        
        $category_name = $_POST['txt_category'];
        $category_id = $_POST['edit_id'];

        // var_dump($balance);
        // var_dump($current_balance);
        // var_dump($user_id);

       $result = $query->execute();
        
        if($sql)
        {
            $output.="Edit Category Success!!";
        }
        
    } else {
        $output.="Fail";
    }

    echo $output;

?>