<?php
$username = "admin";
$password = "GracieFighter36$$";
$nonsense = "chunknastywithacherryontop";

if (isset($_COOKIE['PrivatePageLogin'])) {
   if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)) {
?>

    <!-- LOGGED IN CONTENT HERE -->
    <?php 
        if(isset($_GET['e'])) {
          // grab the data for row with slug=q
          $servername = 'localhost';
          $username = "root";
          $password = '';
          $slug = $_GET['e'];

          try {
            $conn = new PDO("mysql:host=$servername;dbname=preach", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $conn->prepare("SELECT * FROM posts WHERE Url = :slug");
            $sql->bindValue(':slug', $slug, PDO::PARAM_STR);
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

          }
          catch(PDOException $e)
          {
            echo  $sql . "Connection failed: " . $e->getMessage();
          }

          ?>
            <h1> Update Post </h1>
           <form action="<?php echo $_SERVER['PHP_SELF']; ?>?q=updatepost" method="post">
             <input type="hidden" name="ID" id="ID" value="<?php echo $result[0]["ID"]; ?>">
             <label>Title </label><input type="text" name="title" id="title" value="<?php echo $result[0]["Title"];  ?>" /></br/></br>
             <label>Url Slug </label><input type="text" name="url" id="url" value="<?php echo $result[0]["Url"];  ?>" /></br/></br/>
             <label>Youtube ID </label><input type="text" name="ytid" id="ytid" value="<?php echo $result[0]["YtId"];  ?>" /></br/></br/>
             <label>Description </label><input type="text" name="desc" id="desc" value="<?php echo $result[0]["Description"];  ?>" /></br/></br/>
            <label>Other Vid 1 </label><input type="text" name="ov1" id="ov1" value="<?php echo $result[0]["Vid1"];  ?>" /></br/></br/>
             <label>Other Vid 2  </label><input type="text" name="ov2" id="ov2" value="<?php echo $result[0]["Vid2"];  ?>" /></br/></br/>
             <label>Other Vid 3  </label><input type="text" name="ov3" id="ov3" value="<?php echo $result[0]["Vid3"];  ?>" /></br/></br/>
             <label>Post Image Url  </label><input type="text" name="imgUrl" id="imgUrl" value="<?php echo $result[0]["imgUrl"];  ?>" /></br/></br/>
              <input type="submit" id="submit" value="Update Post"/>
          </form>
           <h2><a href="adminall.php"> See All Posts</a></h2>

       <?php exit;}

    	   else if(isset($_GET['q']) && $_GET['q'] == 'addpost') {
    		
    		
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
        $imgUrl = (string)$_POST['imgUrl'];

    		//update table after successful conection
    		try {
    			$conn = new PDO("mysql:host=$servername;dbname=preach", $username, $password);
    			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    			$sql = $conn->prepare("INSERT INTO posts (Title, Url, YtId, Description, Vid1, Vid2, Vid3, imgUrl) VALUES (:title, :url, :ytid, :descr, :ov1, :ov2, :ov3, :imgUrl)");

    			$sql->bindValue(':title', $title, PDO::PARAM_STR);
    			$sql->bindValue(':url', $url, PDO::PARAM_STR);
    			$sql->bindValue(':ytid', $ytid, PDO::PARAM_STR);
    			$sql->bindValue(':descr', $descr, PDO::PARAM_STR);
    			$sql->bindValue(':ov1', $ov1, PDO::PARAM_STR);
    			$sql->bindValue(':ov2', $ov2, PDO::PARAM_STR);
    			$sql->bindValue(':ov3', $ov3, PDO::PARAM_STR);
          $sql->bindValue(':imgUrl', $imgUrl, PDO::PARAM_STR);

    			$sql->execute();

    			echo "succesfull post";	

    		}
    		catch(PDOException $e)
    		{
    			echo  $sql . "Connection failed: " . $e->getMessage();
    		}

    		//close conection
    		$conn = null;
    		//reload page ?>
         <h1> Add A New Post </h1>
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>?q=addpost" method="post">
               <label>Title </label><input type="text" name="title" id="title" /></br/></br>
               <label>Url Slug </label><input type="text" name="url" id="url" /></br/></br/>
               <label>Youtube ID </label><input type="text" name="ytid" id="ytid" /></br/></br/>
               <label>Description </label><input type="text" name="desc" id="desc" /></br/></br/>
               <label>Other Vid 1 </label><input type="text" name="ov1" id="ov1" /></br/></br/>
               <label>Other Vid 2  </label><input type="text" name="ov2" id="ov2" /></br/></br/>
                <label>Other Vid 3  </label><input type="text" name="ov3" id="ov3" /></br/></br/>
                <label>Post Image Url  </label><input type="text" name="imgUrl" id="imgUrl" /></br/></br/>
                <input type="submit" id="submit" value="Add Post"/>
             </form>
             <h2><a href="adminall.php"> See All Posts</h2>
             <?php
    	 exit;
      } else if(isset($_GET['q']) && $_GET['q'] == 'updatepost') {
         
        $servername = 'localhost';
        $username = "root";
        $password = '';
        $ID = (string)$_POST['ID'];
        $title = (string)$_POST['title'];
        $url = (string)$_POST['url'];
        $ytid = (string)$_POST['ytid'];
        $descr = (string)$_POST['desc'];
        $ov1 = (string)$_POST['ov1'];
        $ov2 = (string)$_POST['ov2'];
        $ov3 = (string)$_POST['ov3'];
        $imgUrl = (string)$_POST['imgUrl'];

        //update table after successful conection
        try {
          $conn = new PDO("mysql:host=$servername;dbname=preach", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          $sql = $conn->prepare("UPDATE posts SET Title=:title, Url=:url, YtId=:ytid, Description=:descr, Vid1=:ov1, Vid2=:ov2, Vid3=:ov3, imgUrl=:imgUrl WHERE ID=:ID ");

          $sql->bindValue(':title', $title, PDO::PARAM_STR);
          $sql->bindValue(':url', $url, PDO::PARAM_STR);
          $sql->bindValue(':ytid', $ytid, PDO::PARAM_STR);
          $sql->bindValue(':descr', $descr, PDO::PARAM_STR);
          $sql->bindValue(':ov1', $ov1, PDO::PARAM_STR);
          $sql->bindValue(':ov2', $ov2, PDO::PARAM_STR);
          $sql->bindValue(':ov3', $ov3, PDO::PARAM_STR);
          $sql->bindValue(':imgUrl', $imgUrl, PDO::PARAM_STR);
          $sql->bindValue(':ID', $ID, PDO::PARAM_STR);

          $sql->execute();

          echo "succesfull update"; 

        }
        catch(PDOException $e)
        {
          echo  $sql . "Connection failed: " . $e->getMessage();
        }

        //close conection
        $conn = null;
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
                <label>Post Image Url  </label><input type="text" name="imgUrl" id="imgUrl" /></br/></br/>
                <input type="submit" id="submit" value="Add Post"/>
             </form>
             <h2><a href="adminall.php"> See All Posts</h2>



<?php
      exit;
    } else {
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
                <label>Post Image Url  </label><input type="text" name="imgUrl" id="imgUrl" /></br/></br/>
                <input type="submit" id="submit" value="Add Post"/>
             </form>
             <h2><a href="adminall.php"> See All Posts</h2>
             <?php
    }
        exit;
} 


   else {
      echo "Bad Cookie.";
      exit;
   }

}

if (isset($_GET['l']) && $_GET['l'] == "login") {
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
if (!isset($_COOKIE['PrivatePageLogin']) || $_COOKIE['PrivatePageLogin'] != md5($password.$nonsense)) {
   
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?l=login" method="post">
<label><input type="text" name="user" id="user" /> Name</label><br />
<label><input type="password" name="keypass" id="keypass" /> Password</label><br />
<input type="submit" id="submit" value="Login" />
</form>
<?php } ?>