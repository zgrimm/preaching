<?php 
header('Access-Control-Allow-Origin: *'); // restrict this for security?
header('Content-Type: application/json');

$newVote = json_decode(file_get_contents('php://input'), true);


if(isset($newVote['r']) && isset($newVote['postslug'])) {
    
    $legalVals = array(1,2,3,4,5);
    
    if(in_array((int)$newVote['r'], $legalVals )){		
           
    		$servername = 'localhost';
    		$username = "root";
    		$password = '';
    		$r = (int)$newVote['r'];
    		$postslug = (string)$newVote['postslug']; 

    		try {
    			$conn = new PDO("mysql:host=$servername;dbname=preach", $username, $password);
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ? why is this neccasarry?


    			$sql = $conn->prepare("UPDATE posts SET numVotes = numVotes + 1, votePoints = votePoints + :r WHERE Url = :postslug");
    			$sql->bindValue(':postslug', $postslug, PDO::PARAM_STR);
    			$sql->bindValue(':r', $r, PDO::PARAM_INT);
    			$sql->execute();
               
    			
    			
    		}
    		catch(PDOException $e) {
    			echo $sql . "Connection failed" . $e->getMessage();
    		}
    }
    else {
        echo "fail";
        die();
    }        

} 
?>