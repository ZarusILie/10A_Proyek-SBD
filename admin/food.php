<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getscat.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
<?php include "header.php"; ?>

<link rel="stylesheet" type="text/css" href="style.css">

<div class="content">
	<form action="" method="post" enctype="multipart/form-data">
	<table border=0 align="center" bgcolor="white" width="65%" style="box-shadow: 1px 3px 15px 2px;" cellpadding="10" cellspacing="15" >
	

	<tr align="center">
			<td class="title">Upload New Menu</td><td><a href="view_food.php" style="color: red; text-decoration: none;">View All Menu</a></td>
    </tr>
    

   <tr align="center">   
   		

   	   <tr align="center">
   	   	    <td> Enter Title</td>
   	   	    <td><input type="text" name="title" value="" placeholder="" class="text" required></td>
   	   </tr> 

	<tr align="center"> 
            <td> Enter Menu Price </td>
			<td> <input type="text" name="price" class="text"> </td>
	</tr>

    <tr align="center"> 
            <td> Enter Menu Image </td>
			<td><input type="File" name="img"  placeholder="" class="" required></td>
	</tr>

    <tr>    
    	<td colspan=2 align="center"> <input type="submit" name="s" value="Upload now" class="btn"> </td>
    </tr>

</table>
</form>
<?php
if(isset($_POST['s']))
{
	
		$title = $_POST['title'];
		$price = $_POST['price'];
		$i = "mimg/".$_FILES['img']['name'];
		move_uploaded_file($_FILES['img']['tmp_name'], $i);
		include "connect.php";
		mysqli_query($con,"insert into menu (title,price,image) values('$title','$price','$i')");
		echo "<div style='text-align:center; font-size:1.3em; color:red;'>Data Addedd SuccessFully</div>";
		
}
?>	
</div>
<?php include "footer.php"; ?>