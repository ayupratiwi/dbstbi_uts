<?php
include ('header.php');
?>
<html>
<body>
<div class="container-fluid text-center" style="margin-top:100px;">
  <div class="well text-center">
  <form enctype="multipart/form-data" method="post" action="hasilquery.php">
    <div class="input-group">
      <input type="text" class="form-control" size="30" placeholder="cari kata" required name="katakunci" id="kata">
      <div class="input-group-btn">
        <button type="submit" class="btn btn-danger" name="submit" value="submit">Cari</button>
      </div>
    </div>
  </form>
  </div>
</div>
</body>
</html>

  <?php
include ('footer.php');
?>