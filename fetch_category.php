<?php

include 'config.php';

$sel = mysqli_query($con,
	"SELECT * FROM olify_category
	INNER JOIN olify_market_user ON olify_market_user.`user_id` = olify_category.`user_id`
");

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE olify_category.category_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_market_user.full_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_category.category_status LIKE "%'.$_POST["search"]["value"].'%" ';
}

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"full_name"					=> $row['full_name'],
	"category_id"				=> $row['category_id'],
	"category_name"				=> $row['category_name'],
	"category_status"			=> $row['category_status'],
	"description"				=> $row['description']
	);
}

function get_all_category_records($con)
{
	$statement = mysqli_query($con, "SELECT * FROM olify_category");
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