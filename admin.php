<?php 
    require_once dirname(__FILE__) . "/config/config.php"; 
    require_once dirname(__FILE__) . "/template/header.php"; 

    switch ($_GET['laman']) {
        case 'dashboard':
            include_once 'laman/dashboard.php';
            break;
        
        case 'kios':
            include_once 'laman/kios.php';
            break;

        case 'tambah_kios':
            include_once 'laman/kios/add.php';
            break;
			
        case 'gambar_kios':
            include_once 'laman/kios/gambar.php';
            break;
			
        case 'ubah_kios':
            include_once 'laman/kios/edit.php';
            break;
        default:
            include_once 'error_404.php';
            break;
    }

    require_once dirname(__FILE__) . "/template/footer.php"; 
?>