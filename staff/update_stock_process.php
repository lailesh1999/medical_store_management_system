<?php

include('dbconnect.php');

if(isset($_POST['updatestock']))
{
	session_start();
    $stock_id = $_POST['stock_id'];
	$staff_id = $_SESSION['staff_id'];
    $supplier_id = $_POST['supplier_id'];
    $product_id = $_POST['product_id'];
	$batch_number = $_POST['batch_number'];
    $expiry_date = $_POST['expiry_date'];
    $quantity = $_POST['quantity'];
    $mrp = $_POST['mrp'];
    $price = $_POST['rate'];
    echo $query = "UPDATE stock_tbl SET mrp ='$mrp',rate='$price',quantity='$quantity',supplier_id='$supplier_id',product_id='$product_id',expiry_date='$expiry_date',batch_number='$batch_number',updated_by_id='$staff_id' where stock_id = '$stock_id'";
	$query_res = $link->query($query);
	if($query_res)
	{
		header('location:view_stock.php?msg=3');
	}
	else
	{
	    header('location:view_stock.php?msg=3.1');
	}
	$query1= " insert into purchase_tbl (supplier_id,product_id,invoice_number,quantity,purchase_price,total_price,inserted_by_id) values ('$supplier_id','$product_id','$invoice_number','$quantity','$purchase_price','$total_price','$staff_id')";
}

?>