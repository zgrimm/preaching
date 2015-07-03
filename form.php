<?php 
  if(!defined('Security')) {
    die("Ah ah!");
  }
?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>?q=addpost" method="post" enctype="multipart/form-data">
    <label>Title </label><input type="text" name="title" id="title" /></br/></br>
      <label>Url Slug     </label><input type="text" name="url" id="url" /></br/></br/>
      <label>Youtube ID   </label><input type="text" name="ytid" id="ytid" /></br/></br/>
      <label>Description  </label><input type="text" name="desc" id="desc" /></br/></br/>
      <label>Other Vid 1  </label><input type="text" name="ov1" id="ov1" /></br/></br/>
      <label>Other Vid 2  </label><input type="text" name="ov2" id="ov2" /></br/></br/>
      <label>Other Vid 3  </label><input type="text" name="ov3" id="ov3" /></br/></br/>
      <label>Post Image   </label><input type="file" name="imgUrl" id="imgUrl" /></br/></br/>
      <input type="submit" id="submit" value="Add Post"/>
      </form>
<?php ?>
