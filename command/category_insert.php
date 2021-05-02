<?php 
   
    include_once('config.php');
    session_start();
    $output ="";
    //var_dump("test");
    if(!empty($_POST['txt_category']))
    {
        //$output.= "Have item";
        $sql = "INSERT INTO category(category_name) 
                    VALUE(:category_name)";
        $query = $db->prepare($sql);
        $query->bindParam(':category_name', $category_name, PDO::PARAM_STR);
        
        $category_name = $_POST['txt_category'];

        // var_dump($user_id);
        // var_dump($cost);
        // var_dump($category);
        // var_dump($expense_date);
        // var_dump($expense_description);

        $result = $query->execute();  
                   
              
        
        if($sql)
        {
            $output.="Add Category Success!!";
        }
        
    } else {
        $output.="Fail";
    }

    echo $output;

?>