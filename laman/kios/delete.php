<?php
    require_once dirname(__FILE__) . "/../../config/config.php"; 
    $id = $_POST['id'];

    $sql = "DELETE FROM kios WHERE id_kios = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id',$id);
    try {
        $stmt->execute();
        //echo "Berhasil";
        print("Berhasil");
    } catch (Exception $e) {
        if($sql->errorCode() == 23000){
            print("Tidak Dapat Dihapus");
        }else{
            print("Terjadi Kesalahan");
        }
    }
?>