<?php
include ('header.php');
?>
<html>
<body>
<div class="container" style="margin-top:200px;">
		<div class="well text-center">
			<h1>Upload file pdf</h1>
			<hr>
			<div class="col-md-8 col-md-offset-2">
				<form enctype="multipart/form-data" method="POST" action="hasil_upload.php">
                                      File yang di upload : <center><input type="file" name="fupload"><br></center>
                                      Deskripsi File : <br>
                                   <textarea name="deskripsi" rows="8" cols="40"></textarea><br>
                                     <input type=submit value=Upload>
                                 </form>



				<br>
				<div class="progress" style="display:none">
					<div id="progressBar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
						<span class="sr-only">0%</span>
					</div>
				</div>
				<div class="msg alert alert-info text-left" style="display:none"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	</html>
</body>
	<?php
	include ('footer.php');
	?>