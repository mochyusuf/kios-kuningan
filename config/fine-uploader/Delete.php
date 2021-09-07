<?php
    require dirname(__FILE__) . "/../config.php";

    $sql = "DELETE FROM gambar WHERE uuid = :uuid";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':uuid',$_POST ['qquuid']);
    $statement->execute();
	
	echo "Data Berhasil Dihapus";
?>