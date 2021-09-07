<?php
    require_once dirname(__FILE__) . "/../config/config.php";
    $username = $password = "";
    $captcha_err = $username_err = $password_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
            if(empty(trim($_POST["username"]))){
                $username_err = 'Masukkan username';
            } else{
                $username = trim($_POST["username"]);
            }
            
            if(empty(trim($_POST['password']))){
                $password_err = 'Masukkan password';
            } else{
                $password = trim($_POST['password']);
            }
			
			if(empty($username_err) && empty($password_err)){
                    if($username == "admin"){
                            if($password == "admin"){
                                $_SESSION['username'] = $username; 
                                $_SESSION['id_admin'] = "1";?>
                                <script>
                                    window.location.replace("<?php echo BASE_URL."admin.php?laman=kios"; ?>");
                                </script>
                                <?php 
                            } else{ ?>
                                <script>
                                    alert("Password Salah");
                                    window.location.replace("<?php echo BASE_URL;?>");
                                </script>
                            <?php  }
                    } else{?>
                        <script>
                            alert("Username Tidak Ditemukan");
                            window.location.replace("<?php echo BASE_URL;?>");
                        </script>
                    <?php }
            }
    }