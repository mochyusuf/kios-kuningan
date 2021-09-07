<?php
// Include the upload handler class
require_once "handler.php";
require dirname(__FILE__) . "/../config.php";
$uploader = new UploadHandler();

// Specify the list of valid extensions, ex. array("jpeg", "xml", "bmp")
$uploader->allowedExtensions = array(); // all files types allowed by default

// Specify max file size in bytes.
$uploader->sizeLimit = null;

// Specify the input name set in the javascript.
$uploader->inputName = "qqfile"; // matches Fine Uploader's default inputName value by default

// If you want to use the chunking/resume feature, specify the folder to temporarily save parts.
$uploader->chunksFolder = dirname(__FILE__) . "/../../assets/img/kios/chunks";

$method = get_request_method();

function get_request_method() {
    global $HTTP_RAW_POST_DATA;

    if(isset($HTTP_RAW_POST_DATA)) {
    	parse_str($HTTP_RAW_POST_DATA, $_POST);
    }

    if (isset($_POST["_method"]) && $_POST["_method"] != null) {
        return $_POST["_method"];
    }

    return $_SERVER["REQUEST_METHOD"];
}

if ($method == "POST") {
    header("Content-Type: text/plain");

    $result = $uploader->handleUpload(dirname(__FILE__) . "/../../assets/img/kios");

    $result["uploadName"] = $uploader->getUploadName();

    $result["id_kios"] = $uploader->getParam("id_kios");

    $result['uuid'] = $uploader->getParam("qquuid");

    $sql = "INSERT INTO gambar (id_kios,gambar,uuid) VALUES (:id_kios,:gambar,:uuid)";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id_kios', $result["id_kios"], PDO::PARAM_STR);
    $statement->bindValue(':gambar', $result["uploadName"], PDO::PARAM_STR);
    $statement->bindValue(':uuid', $result["uuid"], PDO::PARAM_STR);
    $statement->execute();
    echo json_encode($result);
}
// for delete file requests
else if ($method == "DELETE") {
    $result = $uploader->handleDelete("../../data");
    echo json_encode($result);
}
else {
    header("HTTP/1.0 405 Method Not Allowed");
}
?>