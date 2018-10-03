<?php

include 'config.php';

$sel = mysqli_query($con,
	"SELECT * FROM olify_currency");

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE olify_currency.currency_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_currency.created LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_currency.currency_status LIKE "%'.$_POST["search"]["value"].'%" ';
}

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"currency_name"					=> $row['currency_name'],
	//"icon_image"					=> $row['icon_image'],
	"created"						=> $row['created'],
	"modified"						=> $row['modified'],
	"currency_status"				=> $row['currency_status']
	);
}

function get_all_category_records($con)
{
	$statement = mysqli_query($con, "SELECT * FROM olify_currency");
	if($result = mysqli_query($con, $statement)){
		$rowCount = mysqli_num_rows($result);
		printf($rowCount);
		mysqli_free_result($result);
		}
}

/*$data = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=>	$rowCount,
	"recordsFiltered"	=>	get_all_category_records($con),
	"data"				=>	$data
);*/
echo json_encode($data);
?>