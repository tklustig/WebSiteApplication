<?php

session_start();
$url = 'index.php';
if (!empty($_REQUEST["message"])) {
    if (!empty($_REQUEST['MsgBox'])) {
        $_SESSION['message'] = $_REQUEST['MsgBox'];
        $heute = date("Y-m-d H:i:s");
        $to = 'kipp.thomas@tklustig.de';
        $subject = 'Installationsprobleme u.a.';
        $nachricht = "eine neue Message vom " . $heute . ":<br>" . $_POST['MsgBox'];
        $fromName = "Thomas Kipp";
        $fromEmail = "kipp.thomas@tklustig.de";
        $header = 'MIME-Version: 1.0' . "\r\n";
        $header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $header .= 'From:  ' . $fromName . ' <' . $fromEmail . '>' . " \r\n" .
                'Reply-To: ' . $fromEmail . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        $umlaute = array("ä", "ö", "ü", "Ä", "Ö", "Ü", "ß");
        $ersetzen = array("ae", "oe", "ue", "Ae", "Oe", "Ue", "ss");
        $send_mail = str_replace($umlaute, $ersetzen, $nachricht);
        mail($to, $subject, $send_mail, $header);
        $datei = fopen("nachricht.txt", "a+");
        $ausgabe = "$nachricht\r\n";
        echo"Folgende Parameter wurden verschickt:<br><br>Absender:$fromEmail<br>Empfänger:$to<br>Betreff:$subject<br>$nachricht<br>Rumpf:$header";
        fputs($datei, $heute);
        fputs($datei, $ausgabe); // schreibt die Nachricht i.d.Datei
        fclose($datei);
    } else
        echo"<p><font size= 6>Sie haben keine Nachricht hinterlassen - folglich wurde auch nix gemailt...</p></font>";
    echo "<p><a href='index.php' title='Zurück zum Formular'>Zurück zum Formular</a></p>";
}else {
    echo '<script language="javascript">window.location="' . $url . '";</script>';
    return;
}
?>



