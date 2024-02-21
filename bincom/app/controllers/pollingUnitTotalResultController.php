<?php

require "../core/autoload.php";

$lgas = findALL('lga', ['state_id' => 25]);

if($_SERVER['REQUEST_METHOD'] == "POST" && count($_POST) > 0)
{
    $lga_id = $_POST['lga'];

    $query =   "SELECT lga.lga_name, 
    ward.ward_name, 
    polling_unit.polling_unit_number, 
    polling_unit.polling_unit_name,
    announced_pu_results.party_abbreviation, 
    SUM(announced_pu_results.party_score) AS total_party_score
    FROM polling_unit
    JOIN announced_pu_results ON polling_unit.uniqueid = announced_pu_results.polling_unit_uniqueid
    JOIN ward ON polling_unit.ward_id = ward.ward_id
    JOIN lga ON polling_unit.lga_id = lga.lga_id
    WHERE lga.lga_id = $lga_id
    GROUP BY lga.lga_name, ward.ward_name, polling_unit.polling_unit_id, announced_pu_results.party_abbreviation
     ";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    if(count($records) > 0)
    {
        $records = $records;
    }

}

