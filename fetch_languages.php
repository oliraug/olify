<?php

include 'config.php';

$sel = mysqli_query($con,
	"SELECT * FROM olify_languages
	INNER JOIN olify_markets ON olify_markets.`market_id` = olify_languages.`market_id`
");

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE olify_languages.lang_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_markets.market_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR olify_languages.lang_code LIKE "%'.$_POST["search"]["value"].'%" ';
}

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"market_name"					=> $row['market_name'],
	"lang_name"						=> $row['lang_name'],
	"lang_code"						=> $row['lang_code'],
	"created"						=> $row['created'],
	"lang_status"					=> $row['lang_status']
	);
}

function get_all_category_records($con)
{
	$statement = mysqli_query($con, "SELECT * FROM olify_languages");
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