<?php

include 'config.php';

$sel = mysqli_query($con,
	"select * from olify_message
	LEFT JOIN olify_market_user ON olify_market_user.user_id = olify_message.user_id"
	);

$data = array();

while ($row = mysqli_fetch_array($sel)) {
    $data[] = array(
	"message_id"			=> $row['message_id'],
	"user_id"				=> $row['user_id'],
	"messages"				=> $row['messages'],
	"sent_on"				=> $row['sent_on']
	);
}

echo json_encode($data);
?>