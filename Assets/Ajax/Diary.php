<?php
require_once(__DIR__.'/../../Config/config.php');
require_once(__DIR__.'/../../Config/function.php');
checkRequestMethod();

$pages = 1;
$limit = check_string($_POST['limit']);
$search = check_string($_POST['search']);
$order = check_string($_POST['order']);
$sort = check_string($_POST['sort']);
$start = ($pages - 1) * $limit; // Xác định vị trí bắt đầu của kết quả truy vấn

if ($limit !== null && $limit < 0) {
    $limit = PHP_INT_MAX;
}
$query = "SELECT * FROM log_device_ip WHERE id LIKE '%$search%' OR created_at LIKE '%$search%' OR content LIKE '%$search%' ORDER BY $sort $order LIMIT $start, $limit";
$Fetch = $FASTER->get_list($query);

$response = array(
    "status" => true,
    "message" => "Ok!",
    "data" => array(
        "limit" => $limit,
        "pages" => $pages,
        "sort" => $sort,
        "order" => ($order == 'desc' ? 'DESC' : 'ASC'),
        "total" => count($Fetch),
        "items" => $Fetch
    )
);

echo json_encode($response);
?>
