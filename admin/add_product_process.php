<?php
include('dbconnect.php');
if(isset($_POST['addproduct']))
{
	session_start();
	$admin_id = $_SESSION['admin_id'];
	$product_name = $_POST['product_name'];
	$product_description =$_POST['product_description'];
	$product_code=$_POST['product_code'];
	$quantity=$_POST['quantity'];
	$packing = $_POST['packing'];
    $generic_name = $_POST['generic_name'];
    $expiry_date = $_POST['expiry_date'];
    $mrp = $_POST['mrp'];
    $rate = $_POST['rate'];
    $unit_id=$_POST['unit_id'];
	$tax_id=$_POST['tax_id'];
	$category_id = $_POST['category_id'];
	


	echo $query= " insert into product_tbl (unit_id,tax_id,category_id,product_name,product_description,product_code,quantity,
    packing,generic_name,expiry_date,mrp,rate,inserted_by_id) values ('$unit_id','$tax_id','$category_id','$product_name','$product_description','$product_code','$quantity',
    '$packing','$generic_name','$expiry_date','$mrp','$rate','$admin_id')  ";
		$query_res=$link->query($query);
		if($query_res)
		{
			header('location:view_product.php?msg=1');

		}
		else
		{
			header('location:view_product.php?msg=1.1');
		}

}




?>