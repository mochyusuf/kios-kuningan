<?php
    require_once dirname(__FILE__) . "/config/config.php"; 

    switch ($_GET['data']) {
        case 'kios':
            if (isset($_GET['id_kios'])) {
                $sql_kios = "SELECT
							ki_1.id_kios,
						   ki_1.nama_kios,
						   ki_1.luas_kios,
						   ki_1.alamat,
						   ki_1.nomor_telepon,
						   ki_1.fasilitas,
						   ki_1.latitude,
						   ki_1.longitude,
						   ki_1.harga_pembayaran,
						   ki_1.jenis_pembayaran,
						   (
							  SELECT
								 IF(
								 (SELECT
									COUNT(ga_1.id_gambar) AS Jumlah 
								 FROM
									gambar ga_1
								 WHERE
									ga_1.id_kios = ki_1.id_kios > 0 ), 
									(SELECT 
										CONCAT('".BASE_URL."', 'assets/img/kios/', ga_2.uuid, '/' ,ga_2.gambar) 
									FROM
									   gambar ga_2
									WHERE
									   ga_2.id_kios = ki_1.id_kios LIMIT 1), 
									   '".BASE_URL."/assets/img/icon.png') 
						   )
						   AS gambar_kios 
						FROM
						   kios ki_1 WHERE ki_1.id_kios = :id_kios
						ORDER BY
						   ki_1.nama_kios ASC";
                $stmt_kios = $pdo->prepare($sql_kios);
                $stmt_kios->bindValue(':id_kios',$_GET['id_kios']);
                $stmt_kios->execute();

                $row = $stmt_kios->fetch(PDO::FETCH_ASSOC);
				$row_2 = array('kios' => $row);
                echo json_encode($row_2, JSON_UNESCAPED_SLASHES);
				
            }else{
                $sql_kios = "SELECT
							ki_1.id_kios,
						   ki_1.nama_kios,
						   ki_1.luas_kios,
						   ki_1.alamat,
						   ki_1.nomor_telepon,
						   ki_1.fasilitas,
						   ki_1.latitude,
						   ki_1.longitude,
						   ki_1.harga_pembayaran,
						   ki_1.jenis_pembayaran,
						   (
							  SELECT
								 IF(
								 (SELECT
									COUNT(ga_1.id_gambar) AS Jumlah 
								 FROM
									gambar ga_1
								 WHERE
									ga_1.id_kios = ki_1.id_kios > 0 ), 
									(SELECT
									   CONCAT('".BASE_URL."', 'assets/img/kios/', ga_2.uuid, '/' , ga_2.gambar) 
									FROM
									   gambar ga_2
									WHERE
									   ga_2.id_kios = ki_1.id_kios LIMIT 1), 
									   '".BASE_URL."/assets/img/icon.png') 
						   )
						   AS gambar_kios 
						FROM
						   kios ki_1
						ORDER BY
						   ki_1.nama_kios ASC";
                $stmt_kios = $pdo->prepare($sql_kios);
                $stmt_kios->execute();
                $row = $stmt_kios->fetchAll(PDO::FETCH_ASSOC);
				$row_2 = array('kios' => $row);
                echo json_encode($row_2,JSON_HEX_TAG);
            }
            break;
		
        case 'cari':
			if (isset($_GET['nama_kios'])) {
                $sql_kios = "SELECT
						ki_1.id_kios,
					   ki_1.nama_kios,
					   ki_1.luas_kios,
					   ki_1.alamat,
					   ki_1.nomor_telepon,
					   ki_1.fasilitas,
					   ki_1.latitude,
					   ki_1.longitude,
					   ki_1.harga_pembayaran,
					   ki_1.jenis_pembayaran,
					   (
						  SELECT
							 IF(
							 (SELECT
								COUNT(ga_1.id_gambar) AS Jumlah 
							 FROM
								gambar ga_1
							 WHERE
								ga_1.id_kios = ki_1.id_kios > 0 ), 
								(SELECT
								   CONCAT('".BASE_URL."', 'assets/img/kios/', ga_2.uuid , '/' , ga_2.gambar) 
								FROM
								   gambar ga_2
								WHERE
								   ga_2.id_kios = ki_1.id_kios LIMIT 1), 
								   '".BASE_URL."/assets/img/icon.png') 
					   )
					   AS gambar_kios 
					FROM
					   kios ki_1
					   
					   WHERE ki_1.nama_kios LIKE :nama_kios
					ORDER BY
					   ki_1.nama_kios ASC";
                $stmt_kios = $pdo->prepare($sql_kios);
                $stmt_kios->bindValue(':nama_kios', $_GET['nama_kios']."%");
                $stmt_kios->execute();

                $row = $stmt_kios->fetchAll(PDO::FETCH_ASSOC);
				$row_2 = array('kios' => $row);
                echo json_encode($row_2, JSON_UNESCAPED_SLASHES);
            }
            break;
			
			case 'gambar':
				if (isset($_GET['id_kios'])) {
					$sql_kios = "SELECT
							ga_2.id_gambar,
						   ga_2.id_kios,
						   CONCAT('".BASE_URL."', 'assets/img/kios/', ga_2.uuid , '/', ga_2.gambar) AS gambar_kios
						FROM
						   gambar ga_2
						   
						   WHERE ga_2.id_kios = :id_kios
						ORDER BY
						   ga_2.id_gambar ASC";
					$stmt_kios = $pdo->prepare($sql_kios);
					$stmt_kios->bindValue(':id_kios', $_GET['id_kios']);
					$stmt_kios->execute();

					$row = $stmt_kios->fetchAll(PDO::FETCH_ASSOC);
					$row_2 = array('gambar' => $row);
					echo json_encode($row_2);
				}
            break;
			
			case 'gambar_kosong':
				$row = BASE_URL."/assets/img/icon.png";
				$row_2 = array('gambar' => $row);
                echo json_encode($row_2, JSON_UNESCAPED_SLASHES);
            break;
        
        default:
            # code...
            break;
    }
?>