<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');


// for individual posts
if(isset($_GET['q'])) {
    		
    		$servername = 'localhost';
    		$username = "root";
    		$password = '';
    		$q = (string)$_GET['q'];

    		try {
    			$conn = new PDO("mysql:host=$servername;dbname=preach", $username, $password);
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ? why is this neccasarry?
    			//get the row where the id mathces val of q

    			$sql = $conn->prepare("SELECT * FROM posts WHERE Url = :q");
    			$sql->bindValue(':q', $q, PDO::PARAM_STR);

    			$sql->execute();

    			$result = $sql->fetchAll(PDO::FETCH_ASSOC);
    			echo json_encode($result[0]);
    			
    			
    		}
    		catch(PDOException $e) {
    			echo $sql . "Connection failed" . $e->getMessage();
    		}

} else if(isset($_GET['p'])) {

    //grab different data for a different api
    $servername = 'localhost';
            $username = "root";
            $password = '';
            $p = (string)$_GET['p'];
            $pone = (string)((int)$p + 1);
            $ptwo = (string)((int)$p + 2);

            try {
                $conn = new PDO("mysql:host=$servername;dbname=preach", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ? why is this neccasarry?
                //get the row where the id mathces val of q

                $sql = $conn->prepare("SELECT * FROM posts WHERE ID = :p OR ID = :pone OR ID = :ptwo");
                $sql->bindValue(':p', $p, PDO::PARAM_STR);
                $sql->bindValue(':pone', $pone, PDO::PARAM_STR);
                $sql->bindValue(':ptwo', $ptwo, PDO::PARAM_STR);

                $sql->execute();

                $result = $sql->fetchAll(PDO::FETCH_OBJ);

                

                echo json_encode($result, JSON_FORCE_OBJECT);
                
                
            }
            catch(PDOException $e) {
                echo $sql . "Connection failed" . $e->getMessage();
            }

}
