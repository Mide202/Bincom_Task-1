<?php

// connections
$conn = mysqli_connect(SERVER,USER,PASSWORD,DBNAME);

if (empty($conn)) {

    die("connection failed");
}


function dd($data)
{
    echo "<pre>";
    print_r($data);
}

function executeQuery($query, $data)
{
    global $conn;
    $stmt = $conn->prepare($query);
    $values = array_values($data); 
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

function findALL($table, $conditions = [])
{
    global $conn;
    $query = "select * from $table";
    if(empty($conditions))
    {
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;

    } else {

        $i = 0;
        foreach ($conditions as $key => $value) 
        {
            if ($i === 0) {

                $query = $query . " where $key=?";

            }else {

                $query = $query . " and $key=?";
            }
            $i++;
        }
        $stmt = executeQuery($query, $conditions);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function create($table,$data)
{
    global $conn;
    $query = "insert into $table set ";
    $i = 0;
    foreach ($data as $key => $value) 
    {
        if ($i === 0) {
            $query = $query . " $key=?";
        }else {
            $query = $query . ", $key=?";
        }
        $i++;
    }
    $stmt = executeQuery($query, $data);
    $id = $stmt->insert_id;
    return $id;
}