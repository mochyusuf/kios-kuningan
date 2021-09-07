<?php
    // Start Session
    require_once dirname(__FILE__) . "/../config/config.php"; 
    // Unset all of the session variables
    $_SESSION = array();
    // Destroy session.
    session_destroy();
    // Redirect to login page?>
        <script>
            window.location.replace("<?php echo BASE_URL; ?>");
        </script>
        <?php 
    exit;
?>