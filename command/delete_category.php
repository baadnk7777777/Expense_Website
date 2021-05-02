<?php 
   
    include_once('config.php');
    session_start();
    $output ="";
    //var_dump($_POST['edit_id']);
        //$output.= "Have item";
        $sql = "DELETE FROM category WHERE  category_id = :category_id ";

        
        

        $query = $db->prepare($sql);
        $query->bindParam(':category_id', $category_id, PDO::PARAM_STR);
        
        $category_id = $_POST['Del_ID'];

        //var_dump($category_id);

       $result = $query->execute();
        
        if($sql)
        {
            $output.="Delete Category Success!!";
        }
    echo $output;

?>