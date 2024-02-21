<?php
require "../core/autoload.php";

$polls = findALL('polling_unit');
$partys = findALL('party');
$user_ip = $_SERVER['REMOTE_ADDR'];
$success = "";

if($_SERVER['REQUEST_METHOD'] == "POST" && count($_POST) > 0)
{
    //

    $var = [];
    $var['polling_unit_uniqueid'] =  htmlentities(strip_tags($_POST['polling_unit_uniqueid']));
    $var['party_abbreviation'] = strtoupper(htmlentities(strip_tags($_POST['party_abbreviation'])));
    $var['party_score'] = htmlentities(strip_tags($_POST['party_score']));
    $var['entered_by_user'] = "AYOMIDE";
    $var['date_entered'] = date("Y-m-d H:i:s");
    $var['user_ip_address'] = $user_ip;

    create('announced_pu_results',$var);
    $success = "New Polling unit result has been stored!";
    
}
