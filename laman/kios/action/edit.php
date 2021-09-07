<?php
    require_once dirname(__FILE__) . "/../../../config/config.php";

    $sql = "UPDATE kios SET nama_kios = :nama_kios,luas_kios = :luas_kios ,alamat = :alamat ,nomor_telepon = :nomor_telepon,fasilitas = :fasilitas,latitude = :latitude,longitude = :longitude,harga_pembayaran = :harga_pembayaran,jenis_pembayaran = :jenis_pembayaran WHERE id_kios = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue('id',$_POST['id']);
    $stmt->bindValue(':nama_kios',$_POST['nama_kios']);
    $stmt->bindValue(':luas_kios',$_POST['luas_kios']);
    $stmt->bindValue(':alamat',$_POST['alamat']);
    $stmt->bindValue(':nomor_telepon',$_POST['nomor_telepon']);
    $stmt->bindValue(':fasilitas',$_POST['fasilitas']);
    $stmt->bindValue(':latitude',$_POST['latitude']);
    $stmt->bindValue(':longitude',$_POST['longitude']);
    $stmt->bindValue(':harga_pembayaran',$_POST['harga_pembayaran']);
    $stmt->bindValue(':jenis_pembayaran',$_POST['jenis_pembayaran']);
    $stmt->execute();

    ?>
    <script> 
        window.location.replace('<?php echo BASE_URL;?>admin.php?laman=kios');
    </script>