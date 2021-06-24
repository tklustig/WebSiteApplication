<?php
session_start();

function makeDownload($file) {
    header("Content-Disposition: attachment; filename=\"$file\"");
    header("Content-Length: " . filesize($file));
    header("Content-Type: application/octet-stream;");
    readfile($file);
}

function dateiGroesse($file) {
    if (!file_exists($file))
        return 0;
    else {
        $size = filesize($file);
        $massEinheit = array("Byte", "KB", "MB");

        foreach ($massEinheit as $potenz => $Einheit) {
            if ($size / pow(1024, $potenz) < 1024)
                return number_format($size / pow(1024, $potenz), 1, ",", ".") . ' ' . $Einheit;
        }
    }
}

function senden($content) {
    try {
        $heute = date("Y-m-d H:i:s");
        $to = 'kipp.thomas@tklustig.de';
        $subject = 'Installationsprobleme u.a.';
        $nachricht = "eine neue Message vom " . $heute . ":<br>" . $content;
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
        $success = mail($to, $subject, $send_mail, $header);
        $datei = fopen("nachricht.txt", "a+");
        $ausgabe = "$nachricht\r\n";
        if ($success) {
            echo"<p>Folgende Parameter wurden verschickt:<br>Empfänger:$to<br>Betreff: $subject<br>$nachricht</p>";
            echo"<h4>$header</h4>";
            ?>
            <script>
                var alertWidth = 350;
                var alertHeight = 200;
                var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
                var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
                var alertTitle = "<p class='pTitle'><strong>! Info !</strong></p>";
                var alertText = "<p class='pAlert'>Nachricht wurde verschickt -siehe ganz unten-</p>";
                showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
            </script>
            <?php
        } else {
            //echo'<p> Die Mail konnte nicht verschickt werden';
            ?>
            <script>
                var alertWidth = 350;
                var alertHeight = 200;
                var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
                var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
                var alertTitle = "<p class='pTitle'><strong>! Error !</strong></p>";
                var alertText = "<p class='pAlert'>Die Mail konnte nicht verschickt werden</p>";
                showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
            </script>
            <?php
        }
        fputs($datei, $heute);
        fputs($datei, $ausgabe); // schreibt die Nachricht i.d.Datei
        fclose($datei);
    } catch (Exception $e) {
        print_r($e->getMessage() . ' at line ' . $e->getLine() . ' in file ' . $e->getFile());
        return;
    }
}

$filename1 = 'SchachClient.zip';
$filename2 = 'Vokabeltrainer.zip';
$filename3 = 'PuzzleGame.zip';
$filename4 = 'Backgammon.zip';
$filename5 = 'Memory.zip';
$filename6 = 'DirectX_SpaceDemo.zip';
$filename7 = 'Snaker.zip';
$filename8 = 'SpaceShooter.zip';
$filename9 = 'Halma.zip';
$filename10 = 'Pacman.zip';
$filename11 = 'Fibonacci.zip';

if (!empty($_REQUEST["download1"])) { // Prüfe ERST, ob das Formular schon gesendet wurde (= Ein Knopf gedrückt wurde)
    if (file_exists($filename1) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename1);
        $_SESSION['captchaIsSolved'] = false;
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
} else if (!empty($_REQUEST["download2"])) {
    if (file_exists($filename2) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename2);
        $_SESSION['captchaIsSolved'] = false;
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
} else if (!empty($_REQUEST["download3"])) {
    if (file_exists($filename2) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename3);
        $_SESSION['captchaIsSolved'] = false;
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
} else if (!empty($_REQUEST["download4"])) {
    if (file_exists($filename4) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename4);
        $_SESSION['captchaIsSolved'] = false;
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
} else if (!empty($_REQUEST["download5"])) {
    if (file_exists($filename5) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename5);
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
} else if (!empty($_REQUEST["download6"])) {
    if (file_exists($filename6) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename6);
        $_SESSION['captchaIsSolved'] = false;
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
} else if (!empty($_REQUEST["download7"])) {
    if (file_exists($filename7) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename7);
        $_SESSION['captchaIsSolved'] = false;
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
} else if (!empty($_REQUEST["download8"])) {
    if (file_exists($filename8) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename8);
        $_SESSION['captchaIsSolved'] = false;
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
} else if (!empty($_REQUEST["download9"])) {
    if (file_exists($filename9) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename9);
        $_SESSION['captchaIsSolved'] = false;
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
} else if (!empty($_REQUEST["download10"])) {
    if (file_exists($filename10) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename10);
        $_SESSION['captchaIsSolved'] = false;
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
} else if (!empty($_REQUEST["download11"])) {
    if (file_exists($filename11) && isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
        makeDownload($filename11);
        $_SESSION['captchaIsSolved'] = false;
    } else {
        ?>
        <script>
            confirm('Bitte das Captcha korrekt eingeben');
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- definiere Metatags-->
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta charset='utf-8'><!-- charset[utf-8:]  definiert den deutschen Zeichensatz -->
        <meta name='msvalidate.01' content='8B12875037645A4090EE64488042FDA9' /><!--validiert die Website für Bing und Yahoo-->
        <meta name='date' content='2017-02-3T08:49:37+02:00'>		<!-- Angaben, wann die Seite publiziert wurde-->
        <meta name='keywords' content='DownloadArea'>	<!-- versorgt die Spider der Suchmaschinen mit Informationen zwecks Suchbegriffen -->
        <meta name='description' content='WebSites, Download'>	<!-- Beschreibung, die in den Suchmaschinen erscheinen soll. -->
        <meta name='robots' content='index,follow'>			<!-- Links sollen mitindiziert werden //NOINDEX:Seite soll nicht aufgenommen werden//NOFOLLOW Links werden nicht verfolgt-->
        <meta name='audience' content='alle'>				<!-- definiert die Zielgruppe der Website  -->
        <meta name='page-topic' content='Dienstleistung'>		<!-- Zuordnungsdefinition für die Suchmaschine -->
        <meta name='revisit-after' CONTENT='7 days'>			<!-- definiert den erneuten Besuch des Spiders//hier:nach sieben Tagen  -->
        <title>Download Area</title>
        <script src="https://code.jquery.com/jquery-latest.js"></script>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
        <link rel='icon' href='data:;base64,iVBORw0KGgo='>              
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
        <script src='plugin/ckeditor/ckeditor.js'></script>
        <script src='js/Alert.js'></script>
        <script src='js/detectBrowser.js'></script>
        <link href='css/style.css' rel='stylesheet'>
    </head>
    <body>
        <script>
            var breiteCheck = window.innerWidth < 990 ? true : false;
            if (breiteCheck) {
                var alertWidth = 350;
                var alertHeight = 200;
                var xAlertStart = screen.top;
                var yAlertStart = screen.left;
                var alertTitle = "<p class='pTitle'><strong>! Warnung !</strong></p>";
                var alertText = "<p class='pAlert'>Für die mathematische Dummheit von Smartphonebenutzern ist diese Website ungeeignet!</p>";
                var ausgabe = 'Für die mathematische Dummheit von Smartphonebenutzern ist diese Website ungeeignet!\nApplikation wird blockiert, bis ausreichend Bildschirmfläche vorhanden ist!';
                confirm(ausgabe);
                open(location, '_self').close();
            }
            var output = detect();
            document.body.innerHTML = output;
        </script>     
        <script>
            $(document).ready(function () {
                rotiere_pic(0);
            });

            function rotiere_pic(photo_aktuell) {
                var anzahl = $('#photos img').length;
                photo_aktuell = photo_aktuell % anzahl;
                $('#photos img').eq(photo_aktuell).fadeOut(function () {
                    $('#photos img').each(function (i) {
                        $(this).css(
                                'zIndex', ((anzahl - i) + photo_aktuell) % anzahl
                                );
                    });
                    $(this).show();
                    setTimeout(function () {
                        rotiere_pic(++photo_aktuell);
                    }, 750);
                });
                $("#photos img").css({position: 'absolute', top: '18%', right: '4%', height: '50pt', width: '80pt'});
            }
        </script>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Home
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">      
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="phpinfo.php" target="_blank">PHP Info</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Websites
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="https://tklustig.de/Bewerbungen/index.php" target="_blank">Bewerbungen</a>
                            <a class="dropdown-item" href="https://tklustig.de/SpaceShooter/ShooterJavaScript/index.html" target="_blank">JavaScript-2D-Shooter</a>
                            <a class="dropdown-item" href="https://tklustig.de/temperatur/index.php" target="_blank">Temperaturmessungen</a>
                            <a class="dropdown-item" href="https://tklustig.de/Yii2_ErkanImmo/frontend/web/index.php"target="_blank">Maklerapplikation(kostenpflichtig)</a>
                            <a class="dropdown-item" href="https://tklustig.de/Yii2_PsychoApp/frontend/web/index.php"target="_blank">PsychoApp(kostenpflichtig)</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="col-md-12">
            <img class="imgCounter" src="counter.php" title="Pic1" alt="Picture1">
        </div>
        <div id="photos"><!-- Die CSS Anweisungen werden in der JS Funktion rotiere_pic() über den css Selektor implementiert -->
            <img alt="moi_1" src="img/moi_coloured.jpg">
            <img alt="moi_2" src="img/moi_coloured_large.jpg">
            <img alt="moi_3" src="img/moi_large_sw.jpg">
            <img alt="moi_4" src="img/moi_sw.jpg">
        </div>
        <div class="jumbotron">
            <div class = "container">
                <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-inline" method="post">
                    <div class="row">                                                  
                        <div class="col-md-6">
                            <div class="page-header">
                                <h2>Downloadbereich <small>Laden Sie meine Applikationen runter.... </small></h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nachrichten hier!</label>
                                <textarea  rows="6"cols="175" id="comment"  name="MsgBox" placeholder="MessageBox:Nachrichten hier!"><?php
                                    if (!empty($_REQUEST['MsgBox'])) {
                                        echo $_REQUEST['MsgBox'];
                                    }
                                    ?>
                                </textarea>
                                <script>
                                    CKEDITOR.replace('comment');
                                </script>
                            </div>                     
                            <br>
                            <input type="submit" name="message" class="btn btn-success btn-sm"  value="Absenden">
                            <button class="btn btn-primary btn-sm" onclick="Reload()">Reload Page</button>
                        </div>               
                        <input class="solve" type=text name="cap" placeholder="Captcha:">
                        <input class="butCap" type="submit" name="push" value="Captcha prüfen">  
                        <div class="well">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="alert alert-info" role="alert"><strong>Lösen Sie zunächst das Captcha</strong> und Pushen Sie sodann auf einen der Downloadbuttons, um die entsprechende Applikation runterzuladen. Entpacken Sie die komprimierte Datei in einen beliebigen Ordner und starten Sie die jeweilige EXE-Datei.</div>
                                    <ul>
                                        <li>
                                            Steuern Sie unter 'My Websites' auch meine Webseiten an. Letztere ist kostenpflichtig, alle anderen sind Open Source.
                                        </li>
                                        <li>
                                            Bei Problemen lesen Sie - sofern vorhanden- die ReadmeFirst.txt aufmerksam durch
                                        </li>
                                        <li>
                                            Sollten dennoch Probleme während der Installation auftreten, die Applikation läuft partout nicht, dann schicken Sie mir bitte eine Nachricht in der MessageBox.
                                        </li>
                                        <li>
                                            u.U. kann die Zip File durch den Download beschädigt und somit nicht extrahiert werden. In diesem Falle hilft <a href="https://www.diskinternals.com/zip-repair/" target="_blank">dieses</a> Tool weiter.
                                        </li>
                                    </ul>
                                </div>                        
                                <div class="panel-footer">
                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <th>Rubrik</th>
                                                    <th>Applikation</th>
                                                    <th>Programmiersprache</th>
                                                    <th>Download</th>
                                                    <th>Dateigröße(Bytes)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Logik</td>
                                                    <td>Schach-Client</td>
                                                    <td>C#</td>
                                                    <td><input type="submit" name="download1" class="btn btn-info btn-sm" value="<?= $filename1; ?>"></td>
                                                    <td><?= dateiGroesse($filename1); ?></td>
                                                </tr>                        
                                                <tr>
                                                    <td>Sprachen</td>
                                                    <td>Vokabeltrainer</td>
                                                    <td>C#</td>
                                                    <td><input type="submit" name="download2" class="btn btn-info btn-sm"  value="<?= $filename2; ?>"></td>
                                                    <td><?= dateiGroesse($filename2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>DirectX</td>
                                                    <td>Puzzle zusammen setzen</td>
                                                    <td>DarkBasic</td>
                                                    <td><input type="submit" name="download3" class="btn btn-info btn-sm" value="<?= $filename3; ?>"></td>
                                                    <td><?= dateiGroesse($filename3); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Glück</td>
                                                    <td>Backgammon (Human vs. PC)</td>
                                                    <td>VB.NET</td>
                                                    <td><input type="submit" name="download4" class="btn btn-info btn-sm" value="<?= $filename4; ?>"></td>
                                                    <td><?= dateiGroesse($filename4); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Logik</td>
                                                    <td>Memory(special edition)</td>
                                                    <td>C#</td>
                                                    <td><input type="submit" name="download5" class="btn btn-info btn-sm" value="<?= $filename5; ?>"></td>
                                                    <td><?= dateiGroesse($filename5); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>DirectX</td>
                                                    <td>3D Shooter (Demoversion)</td>
                                                    <td>C++</td>
                                                    <td><input type="submit" name="download6" class="btn btn-info btn-sm" value="<?= $filename6; ?>"></td>
                                                    <td><?= dateiGroesse($filename6); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>DirectX</td>
                                                    <td>Spiel</td>
                                                    <td>DarkBasic</td>
                                                    <td><input type="submit" name="download7" class="btn btn-info btn-sm" value="<?= $filename7; ?>"></td>
                                                    <td><?= dateiGroesse($filename7); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>DirectX</td>
                                                    <td>Spiel</td>
                                                    <td>DarkBasic</td>
                                                    <td><input type="submit" name="download8" class="btn btn-info btn-sm" value="<?= $filename8; ?>"></td>
                                                    <td><?= dateiGroesse($filename8); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Logik</td>
                                                    <td>Halma</td>
                                                    <td>C#</td>
                                                    <td><input type="submit" name="download9" class="btn btn-info btn-sm" value="<?= $filename9; ?>"></td>
                                                    <td><?= dateiGroesse($filename9); ?></td>
                                                </tr>
                                                <tr>
                                                    <td>WPF</td>
                                                    <td>Pacman</td>
                                                    <td>C#</td>
                                                    <td><input type="submit" name="download10" class="btn btn-info btn-sm" value="<?= $filename10; ?>"></td>
                                                    <td><?= dateiGroesse($filename10); ?></td>
                                                </tr>	
                                                <tr>
                                                    <td>Mathematik</td>
                                                    <td>Fibonacci</td>
                                                    <td>C#</td>
                                                    <td><input type="submit" name="download11" class="btn btn-info btn-sm" value="<?= $filename11; ?>"></td>
                                                    <td><?= dateiGroesse($filename10); ?></td>
                                                </tr>													
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </form>
    <script>
        function Reload() {
            alert("Inhalt wird über JavaScript neu geladen...");
            location.reload();
        }
    </script>
    <?php
//verarbeite Trigger1: Absenden-Submitbutton wurde gepusht und Messagebox ist nicht leer
    if (isset($_REQUEST['message']) && !empty($_REQUEST['MsgBox'])) {
        if (isset($_SESSION['captchaIsSolved']) && $_SESSION['captchaIsSolved'] == true) {
            senden($_REQUEST['MsgBox']);
            $_SESSION['captchaIsSolved'] = false;
        } else {
            ?>
            <script>
                confirm('Bitte das Captcha korrekt eingeben');
            </script>
            <?php
        }
        //verarbeite Trigger2:Absenden-Submitbutton wurde gepusht und Messagebox ist leer
    } else if (isset($_REQUEST['message']) && empty($_REQUEST['MsgBox'])) {
        ?>
        <script>
            var alertWidth = 350;
            var alertHeight = 200;
            var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
            var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
            var alertTitle = "<p class='pTitle'><strong>! Warnung !</p></strong>";
            var alertText = "<label class='pAlert'>Bitte vermeiden Sie unnötigen Traffic und schreiben Sie eine Nachricht.</label>";
            showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
        </script>
        <?php
    }
    //verarbeite Trigger3: Check-Submittbutton wurde gedrückt und Captchabox ist leer
    if (isset($_REQUEST['push']) && empty($_REQUEST['cap'])) {
        ?>
        <script>
            var alertWidth = 350;
            var alertHeight = 200;
            var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
            var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
            var alertTitle = "<p class='pTitle'><strong>! Warnung !</strong></p>";
            var alertText = "<p class='pAlert'>Bitte Captchacode eingeben</p>";
            showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
        </script>
        <?php
        $_SESSION['captchaIsSolved'] = false;
        //verarbeite Trigger4:Check-Submitbutton wurde gedrückt und Captchbox ist nicht leer
    } else if (isset($_REQUEST['push']) && !empty($_REQUEST['cap'])) {
        //verarbeite Trigger4.1:Captcha wurde korrekt eingegeben
        if (isset($_SESSION['captcha']) && $_REQUEST['cap'] == $_SESSION['captcha']['code']) {
            ?>
            <script>
                var alertWidth = 350;
                var alertHeight = 200;
                var xAlertStart = window.innerWidth / 2 - alertWidth / 2;
                var yAlertStart = window.innerHeight / 2 - alertHeight / 2;
                var alertTitle = "<p class='pTitle'><strong>! Success !</strong></p>";
                var alertText = "<p class='pAlert'>Captcha wurde gelöst</p>";
                showAlert(alertWidth, alertHeight, xAlertStart, yAlertStart, alertTitle, alertText);
            </script>
            <?php
            $_SESSION['captchaIsSolved'] = true;
            //verarbeite Trigger5:Captcha wurde inkorrekt eingegeben
        } else {
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
            $_SESSION['captchaIsSolved'] = false;
        }
    }
    require_once ("SimplePhpCaptcha.php");
    $_SESSION['captcha'] = simple_php_captcha();
    $captcha = '<img class="imgCaptcha" src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
    echo $captcha;
    if (!empty($_REQUEST))
        $_REQUEST = array();
    /* alternativ 
      foreach ($_REQUEST as $element) {
      unset($element);
      } */
    ?>
</body>
</html>

