<?php

require "../core/autoload.php";


// get all individual polling unit results

$resultsPerPage = 10;
$page = isset($_GET['page']) ? (int)$_GET['page']  : 1;
$start = ($page - 1 )* $resultsPerPage;

$query = "SELECT *, announced_pu_results.party_score, 
            announced_pu_results.party_abbreviation, 
            ward.ward_name, lga.lga_name
            FROM `polling_unit`
            join announced_pu_results on  polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid
            JOIN ward on polling_unit.ward_id = ward.ward_id
            JOIN lga ON polling_unit.lga_id = lga.lga_id
            LIMIT $start, $resultsPerPage";
$stmt = $conn->prepare($query);
$stmt->execute();
$records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

if(count($records) > 0)
{
    $records = $records;
}

//count the number of pages 
$sqlCount = "SELECT COUNT(*) AS total
                FROM `polling_unit`
                join announced_pu_results on  polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid
                JOIN ward on polling_unit.ward_id = ward.ward_id
                JOIN lga ON polling_unit.lga_id = lga.lga_id";
$countResult = $conn->query($sqlCount);
$rowCount = $countResult->fetch_assoc()['total'];
$totalPages = ceil($rowCount / $resultsPerPage);
 