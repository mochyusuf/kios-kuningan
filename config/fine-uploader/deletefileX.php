<?php
    require dirname(__FILE__) . "/../config.php";

    $sql = "DELETE FROM gambar WHERE uuid = :uuid";
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':uuid',$POST ['qquuid']);
    $statement->execute();

?>
<script>
    console.log("<?=$POST ['qquuid']?>");
</script>
