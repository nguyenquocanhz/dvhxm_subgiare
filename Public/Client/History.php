<?php
    require_once(__DIR__.'/../../Config/config.php');
    require_once(__DIR__.'/../../Config/function.php');
    $title = 'Lịch sử giao dịch';
    require_once(__DIR__.'/../../Theme/HeaderUser.php');
    require_once(__DIR__.'/../../Theme/Nav.php');
    require_once(__DIR__.'/../../Theme/Sidebar.php');
    CheckLogin();
?>
<?php
    require_once(__DIR__.'/../../Theme/FooterUser.php');
?>