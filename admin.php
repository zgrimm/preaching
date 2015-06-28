<?php
$username = "admin";
$password = "GracieFighter36$$";
$nonsense = "chunknastywithacherryontop";

if (isset($_COOKIE['PrivatePageLogin'])) {
   if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)) {
?>

    <!-- LOGGED IN CONTENT HERE -->
    <!-- Process the add post form -->
    <?php 
    	if(isset($_GET['q']) && $_GET['q'] == 'addpost') {
    		
    		
    		$servername = 'localhost';
    		$username = "root";
    		$password = '';
    		$title = (string)$_POST['title'];
    		$url = (string)$_POST['url'];
    		$ytid = (string)$_POST['ytid'];
    		$descr = (string)$_POST['desc'];
    		$ov1 = (string)$_POST['ov1'];
    		$ov2 = (string)$_POST['ov2'];
    		$ov3 = (string)$_POST['ov3'];

    		//update table after successful conection
    		try {
    			$conn = new PDO("mysql:host=$servername;dbname=preach", $username, $password);
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    			$sql = $conn->prepare("INSERT INTO posts (Title, Url, YtId, Description, Vid1, Vid2, Vid3) VALUES (:title, :url, :ytid, :descr, :ov1, :ov2, :ov3)");

    			$sql->bindValue(':title', $title, PDO::PARAM_STR);
    			$sql->bindValue(':url', $url, PDO::PARAM_STR);
    			$sql->bindValue(':ytid', $ytid, PDO::PARAM_STR);
    			$sql->bindValue(':descr', $descr, PDO::PARAM_STR);
    			$sql->bindValue(':ov1', $ov1, PDO::PARAM_STR);
    			$sql->bindValue(':ov2', $ov2, PDO::PARAM_STR);
    			$sql->bindValue(':ov3', $ov3, PDO::PARAM_STR);

    			$sql->execute();

    			echo "succesfull post";	

    		}
    		catch(PDOException $e)
    		{
    			echo  $sql . "Connection failed: " . $e->getMessage();
    		}

    		//close conection
    		$conn = null;
    		//reload page
    	}


     ?>
    <h1> Add A New Post </h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?q=addpost" method="post">
    	<label>Title </label><input type="text" name="title" id="title" /></br/></br>
    	<label>Url Slug </label><input type="text" name="url" id="url" /></br/></br/>
    	<label>Youtube ID </label><input type="text" name="ytid" id="ytid" /></br/></br/>
    	<label>Description </label><input type="text" name="desc" id="desc" /></br/></br/>
    	<label>Other Vid 1 </label><input type="text" name="ov1" id="ov1" /></br/></br/>
    	<label>Other Vid 2  </label><input type="text" name="ov2" id="ov2" /></br/></br/>
    	<label>Other Vid 3  </label><input type="text" name="ov3" id="ov3" /></br/></br/>
    	<input type="submit" id="submit" value="Add Post"/>


<?php
      exit;
   } else {
      echo "Bad Cookie.";
      exit;
   }
}

if (isset($_GET['p']) && $_GET['p'] == "login") {
   if ($_POST['user'] != $username) {
      echo "Sorry, that username does not match.";
      exit;
   } else if ($_POST['keypass'] != $password) {
      echo "Sorry, that password does not match.";
      exit;
   } else if ($_POST['user'] == $username && $_POST['keypass'] == $password) {
      setcookie('PrivatePageLogin', md5($_POST['keypass'].$nonsense));
      header("Location: $_SERVER[PHP_SELF]");
   } else {
      echo "Sorry, you could not be logged in at this time.";
   }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post">
<label><input type="text" name="user" id="user" /> Name</label><br />
<label><input type="password" name="keypass" id="keypass" /> Password</label><br />
<input type="submit" id="submit" value="Login" />
</form>