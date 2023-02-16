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
    $product_id = $_GET['product_id'];
      $query = " SELECT * from product_tbl   where product_id = '$product_id'";
  $query_res = $link->query($query);
  while($rows = mysqli_fetch_array($query_res))
  
  {
                      
                      $product_id = $rows['product_id'];
                      $category_id=$rows['category_id'];
                      $unit_id=$rows['unit_id'];
                      $tax_id=$rows['tax_id'];
                      $supplier_id = $rows['supplier_id'];
 					            $product_name = $rows["product_name"];
                        $packing = $rows['packing'];
                        $generic_name = $rows['generic_name'];
                       


?>
<div style="padding:7%;">
    <div class="card w-75">
    
    <div class="card-body" style="border:4px solid grey;">
        <h1 class="card-title">UPDATE MEDCINE</h1>
        <form method="POST"  action="update_product_process.php" >
        <input type="hidden" name="product_id" value="<?php echo $rows['product_id'] ?>">
			<div class="form-group">
            <label>SELECT UNIT</label>
        <select  class="form-control" name="unit_id" id="unit_id">
<?php
            $query = "select * from unit_tbl where status ='0' and deleted = '0' ";
            $query_result = $link->query($query);
            while($rows = mysqli_fetch_array($query_result))
            {
              $unid = $rows['unit_id'];
              $unit_name =  $rows['unit_name'];
              ?>
              <option value="<?php echo $unid; ?> " <?php if($unit_id == $unid){ echo "selected" ; }?>> <?php echo $unit_name; ?> </option>
           
            <?php
            }
?>
        </select><br>
						 <label>SELECT TAX NAME</label>
        				<select name="tax_id" class="form-control" onchange="dispTaxRate(this.value)">
        
<?php
            			$query = "select * from tax_tbl where status ='0' and deleted = '0' ";
            			$query_result = $link->query($query);
            			while($rows = mysqli_fetch_array($query_result))
            			{
              					$tax1_id = $rows['tax_id'];
              					$tax_name =  $rows['tax_name'];
              					//$tax_rate = $rows['tax_rate'];
              ?>
              			<option value="<?php echo $tax1_id; ?>" <?php if($tax_id == $tax1_id) { echo "selected";}?>> <?php echo $tax_name; ?> </option>


           
            <?php
            }
?>
	 </select>
	 <br>
         <label>SELECT TAX RATE</label>
        <select name="tax_id" class="form-control" id="tax_id" >


        </select><br>
        <label>SELECT CATEGORY</label>
        <select name="category_id" class="form-control" id="category_id" onchange="dispSubCat(this.value)"">
<?php
            $query = "select * from category_tbl where status ='0' and deleted = '0' ";
            $query_result = $link->query($query);
            while($rows = mysqli_fetch_array($query_result))
            {
              $cat_id = $rows['category_id'];
              $category_name =  $rows['category_name'];
              ?>
              <option value="<?php echo $cat_id; ?> " <?php if($cat_id == $category_id){ echo "selected"; }?>> <?php echo $category_name; ?> </option>

           
            <?php
            }
?>
</select><br>
<label>SELECT CATEGORY</label>
        <select class="form-control" name="supplier_id" id="supplier_id" ">
<?php
            $query = "select * from supplier_tbl where status ='0' and deleted = '0' ";
            $query_result = $link->query($query);
            while($rows = mysqli_fetch_array($query_result))
            {
              $supplier_id1 = $rows['supplier_id'];
              $supplier_name =  $rows['supplier_name'];
              ?>
              <option value="<?php echo $supplier_id1; ?> " <?php if($supplier_id1 == $supplier_id){ echo "selected"; }?>> <?php echo $supplier_name; ?> </option>
            <?php
            }
?>
</select><br>
    				<label>Enter product name</label>
    				<input type="text" class="form-control" name="product_name" value="<?php echo $product_name ; ?> "required>
    				
    				<label>Enter product packing</label>
    				<input type="text" class="form-control" name="packing" value="<?php echo $packing ; ?> "       id="price" required>
    				<label>Enter generic name</label>
    				<input type="text" class="form-control"  name="generic_name" value="<?php echo $category_name ; ?>"  required>
    				
  	       <br>
 					 <button type="submit" name="updateproduct" class="btn btn-info">UPDATE PRODUCT</button>
           <button type="reset" name="updateproduct" class="btn btn-danger">RESET</button>
 					 <a href="view_product.php" class="btn btn-secondary">CANCLE</a>
			</div>
		</form>

<?php
}
include('includes/script.php');
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  


function dispTaxRate(val1)
{
  //alert(val1);
  $.ajax({
   
          type:'GET',
          url:'ajax_tax_rate.php?tax_id='+val1,
          success: function(result){
            //alert(result);
            document.getElementById("tax_id").innerHTML = result;
          




    }});

}

function sellPrice()  
{
            var numVal1 = Number(document.getElementById("price").value);
            var numVal2 = Number(document.getElementById("discount").value);
            var totalValue = (numVal1 -(numVal2/100)*numVal1);
            document.getElementById("total").value = totalValue.toFixed(2);
}


</script>
</body>
 </html>
