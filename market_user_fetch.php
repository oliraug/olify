<?php

//market_user_fetch.php

include('connection.php');

$query = '';

$output = array();

$query .= "
SELECT * FROM market_user 
WHERE user_type = 'user' AND 
";

if(isset($_POST["search"]["value"]))
{
	$query .= '(loginname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR fullname LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR enabled LIKE "%'.$_POST["search"]["value"].'%") ';
}

if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY user_id DESC ';
}

if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	$status = '';
	if($row["enabled"] == 'Yes')
	{
		$status = '<span class="label label-success">Active</span>';
	}
	else
	{
		$status = '<span class="label label-danger">Inactive</span>';
	}
	$sub_array = array();
	$sub_array[] = $row['user_id'];
	$sub_array[] = $row['loginname'];
	$sub_array[] = $row['fullname'];
	$sub_array[] = $status;
	$sub_array[] = '<button type="button" name="update" id="'.$row["user_id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["user_id"].'" class="btn btn-danger btn-xs delete" data-status="'.$row["enabled"].'">Delete</button>';
	$data[] = $sub_array;
}

$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"    			=> 	$data
);
echo json_encode($output);

function get_total_all_records($connect)
{
	$statement = $connect->prepare("SELECT * FROM market_user WHERE user_type='user'");
	$statement->execute();
	return $statement->rowCount();
}

?>