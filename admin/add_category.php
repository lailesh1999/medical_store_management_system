<!DOCTYPE html>
 <html>
 <head>
   <title></title> 
<?php

    include('includes/stylesheet.php');
  
     include("dbconnect.php");
     include('secure.php');
?>    
 </head>
 <body>
 
 <?php

    include('includes/sidenav.php');
?>
<div class="main-content" id="panel">


<?php
  
  include('includes/topnav.php');
  //include('includes/header.php');
?>
<div style="padding-left:9%;padding-top:3%;" >
    <div class="card w-75 " style="border:4px solid grey;">
    
    <div class="card-body" text-center style="width: 100%;">
        <h1 class="card-title" style="text-align:center;">ADD MEDICINE CATEGORY</h1>
        <form method="POST" action="add_category_process.php" enctype="multipart/form-data">
        <div class="card-body">
			<div class="form-group">
				<label>ENTER CATEGORY NAME</label>
    				<input type="text" class="form-control"  name="category_name" onkeyup="myVali(this.value)" required>
                    <b id="b1" style="color:red;"></b>
  			</div>

 					 <button type="submit" id="submit" name="addcategory" class="btn btn-success" disabled>ADD CATEGORY</button>
           <input type="reset" class="btn btn-primary" />&nbsp<a href="index.php" class="btn btn-secondary">CANCEL</a>
           <br>
           </div>
        
		</div>
			
	</div>	</div>
</form>
    </div>
    </div>
</div>
<?php
include("dbconnect.php");
 $query = " SELECT * from category_tbl where deleted='0' and status='0' ";
 $query_res = $link->query($query);
 if(isset($_GET['msg']))
 {
    if($_GET['msg']== 1)
    {
        ?>

                            <div class="container" style="padding-left: 13%;">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>!!!!!DATA HAS BEEN ADDED SUCESSFULLY!!!!!</strong> 
								</div>
							</div>
<?php

 }
}
if(isset($_GET['msg']))
 {
    if($_GET['msg']== 1.1)
    {
        ?>

                            <div class="container" style="padding-left: 6%;">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>!!!!!DATA HAS NOT BEEN INSERTED!!!!!</strong> 
								</div>
							</div>
<?php

 }
}
 if(isset($_GET['msg']))
 {
    if($_GET['msg']== 2)
    {
        ?>

                            <div class="container">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>!!!!!DATA HAS BEEN DELETED SUCESSFULLY!!!!!</strong> 
								</div>
							</div>
<?php
    }


 }
 if(isset($_GET['msg']))
 {
    if($_GET['msg']== 2.1)
    {
        ?>

                            <div class="container">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>!!!!!DATA HAS NOT BEEN DELETED!!!!!</strong> 
								</div>
							</div>
<?php

 }
}
if(isset($_GET['msg']))
 {
    if($_GET['msg']== 3)
    {
        ?>

                            <div class="container">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>DATA HAS BEEN UPDATED</strong> 
								</div>
							</div>
<?php

 }
}

if(isset($_GET['msg']))
 {
    if($_GET['msg']== 3.1)
    {
        ?>

                            <div class="container">
								
                                <div class="alert alert-success alert-dismissible fade show">
									<button type="button" onclick="diss()" class="close" data-dismiss="alert">&times;</button>
									<strong>DATA HAS NOT UPDATED</strong> 
								</div>
							</div>
<?php

 }
}
 ?>
<div style="padding-left: 20%;padding-top: 5%;">

 	<table class="table table-hover" id="example1" style="width: 95%;">
   <thead class="table-danger"><tr><th>MEDICINE ID</th>
 						<th>MEDICINE TYPE</th>
 						<th>EDIT</th>
 						<th>DELETE</th>
 					</tr>
 			</thead>

		 <?php
 	 			while($rows = mysqli_fetch_array($query_res))
 	 			{
 				//foreach($query_res as $rows )
 					//{
 						$category_id = $rows['category_id'];
 						$category_name = $rows["category_name"];

		 ?>
 			<tr><td> <?php echo " $category_id"; ?></td>
 				<td><?php echo " $category_name"; ?></td>
 				<td><a  onclick="myEdit(<?php echo "$category_id"; ?>)" class="btn btn-primary" style="color:white; ">EDIT</a> </td>
 				<td> <a onclick="myFun(<?php echo "$category_id"; ?>)"  class = "btn btn-danger" style="color:white; ">DELETE</a></td>
			</tr>
	
<?php 
 					}
				




?>
</table>
        </div>



<?php
include('includes/script.php');
?>
</div>
</script>
</body>
 </html>
 <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script type="text/javascript">

	function myFun(cid){
        $.ajax({
          type:'GET',
          url:'validationAjax/ajax_delete_cat_name_validate.php?cid='+cid,
          success: function(result){
            //alert(result);
            if(result == 1){
                alert("DATA CANNOT BE DELETED");
            }
            else
            {
                        var edit = confirm("ARE YOU SURE TO DELETE DATA");
                if(edit){
                    window.location="delete_category.php?category_id="+cid;
                }
            }
        }})

        
        
    }
</script>
<script type="text/javascript">

	function myEdit(cid){
		var edit = confirm("ARE YOU SURE TO EDIT DATA");
		if(edit){
			window.location="update_category.php?category_id="+cid;
		}
		
    }
</script>
<script type="text/javascript">

    function diss(){
		
			window.location="add_category.php";
	
		
    }

 </script> 

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script type="text/javascript">

function myVali(val1)
{
    var bt = document.getElementById('submit');
  //alert(val1);
  $.ajax({
          type:'GET',
          url:'validationAjax/ajax_cat_name_validate.php?valiCat='+val1,
          success: function(result){
           // alert(result);
            if(result == 1){
                document.getElementById('b1').innerHTML = "CATEGORY NAME IS ALREADY PRESENT";
                bt.disabled = true;
            }
            else
            {
                bt.disabled = false;
                document.getElementById('b1').innerHTML = " ";
            }
    


             
    }});

}

</script>