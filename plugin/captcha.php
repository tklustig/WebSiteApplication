<?php

if (isset($_REQUEST['push']) && empty($_REQUEST['cap'])) {
    ?>
    <script>
        var alertWidth = 350;
        var alertHeight = 200;
        var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
        var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
        var alertTitle = "<p class='pTitle'><strong>! Warnung !</strong></p>";
        var alertText = "<p class='pAlert'>Bitte Captchacode eingeben";
        showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
    </script>
    <?php

} else if (isset($_REQUEST['push']) && !empty($_REQUEST['cap'])) {
    if (isset($_SESSION['captcha']) && $_REQUEST['cap'] == $_SESSION['captcha']['code']) {
        $boolIsSolved = true;
        ?>
        <script>
            var alertWidth = 350;
            var alertHeight = 200;
            var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
            var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
            var alertTitle = "<p class='pTitle'><strong>! Warnung !</strong></p>";
            var alertText = "<p class='pAlert'>Captcha wurde gelöst";
            showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
        </script>
        <?php

    } else {
        $boolIsSolved = false;
        ?>
        <script>
            var alertWidth = 350;
            var alertHeight = 200;
            var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
            var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
            var alertTitle = "<p class='pTitle'><strong>! Warnung !</strong></p>";
            var alertText = "<p class='pAlert'>Captcha wurde nicht gelöst";
            showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
        </script>
        <?php

    }
}
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
$captcha = '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
echo $captcha;
var_dump($boolIsSolved);
?>


