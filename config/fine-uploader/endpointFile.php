<?php
    require dirname(__FILE__) . "/../config.php";

    $sql = "SELECT id_gambar,gambar,uuid FROM gambar WHERE id_kios = :id_kios";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id_kios',$_GET['id_kios']);
    $statement->execute();
    
    $result = array();
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $temp = array(
            'id' => $row['id_gambar'],
            'id_gambar' => $row['id_gambar'],
            'name' => $row['gambar'],
            'uuid' => $row['uuid'],
            'thumbnailUrl' => BASE_URL."assets/img/kios/".$row['uuid']."/".$row['gambar'],
        );
        array_push($result,$temp);
    }

    echo json_encode($result);