<?php
       try {
        $conn=new PDO("mysql:host=localhost;dbname=qlbh",'root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       }
       catch (PDOException $e) {
        echo"Kết nối thất bại: " . $e->getMessage();
       }
       $search_name=$_POST['search_name'];
       $sql = "SELECT prd_name, prd_id FROM products WHERE status = 1 AND prd_name LIKE '%" . $search_name . "%'";
       try{
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result=$stmt->fetchAll();
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        echo json_encode($result)
?>