<?php
$username = "admin";
$password = "GracieFighter36$$";
$nonsense = "chunknastywithacherryontop";

if (isset($_COOKIE['PrivatePageLogin'])) {
   if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)) {

   	$servername = 'localhost';
    $username = "root";
    $password = '';

    try {
    	$conn = new PDO("mysql:host=$servername;dbname=preach", $username, $password);
    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    	$sql = $conn->prepare("SELECT * FROM posts");

    	$sql->execute();

    	$result = $sql->fetchAll(PDO::FETCH_ASSOC);

    	
    }
    catch(PDOException $e) {
    	echo $sql . "Connection failed: " . $e->getMessage();
    }
    $conn = null;

    ?>
		<table border="1" style="width:100%">
		<tr>
			<td>ID</td>
			<td>TITLE</td>
			<td>POST URL</td>
			<td>YouTube ID</td>
			<td>Description</td>
			<td>Vid1</td>
			<td>Vid2</td>
			<td>Vid3</td>
			<td>image Url</td>
		</tr>
    	<?php foreach($result as $post){ ?>
			<tr>
				<td><?php echo $post["ID"]; ?></td>
				<td><a href="admin.php?e=<?php echo $post['Url']; ?>"><?php echo $post["Title"];  ?></a></td>
				<td><?php echo $post["Url"];  ?></td>
				<td><?php echo $post["YtId"];  ?></td>
				<td><?php echo $post["Description"];  ?></td>
				<td><?php echo $post["Vid1"];  ?></td>
				<td><?php echo $post["Vid2"];  ?></td>
				<td><?php echo $post["Vid3"];  ?></td>
				<td><?php echo $post["imgUrl"];  ?></td>
				
			</tr>


    	<?php }

     ?>

	</table>
	<a href="admin.php">Add a new Post</a>
    

<?php
      exit;
   } else {
      echo "Bad Cookie.";
      exit;
   }
} else {
	header("Location: admin.php");
}

