<?php 
    $_db_host = "localhost";           
    $_db_username = "laura"; 
    $_db_password = "test123"; 
	$_db_datenbank = "final_lit"; 
	
    SESSION_START(); 

    // Datenbankverbindung herstellen 
    $link = mysqli_connect($_db_host, $_db_username, $_db_password, $_db_datenbank); 

    // Hat die Verbindung geklappt? 
    if (!$link) 
        { 
        die("Keine Datenbankverbindung m&oumlglich: " . mysqli_error()); 
        } 

    ################################################################## 
 
    // Ist die $_POST Variable submit nicht leer?
    // dann wurden Logindaten eingegeben, die �berpr�ft werden m�ssen
    if (!empty($_POST["submit"])) 
        { 
        // Die Werte die im Loginformular eingegeben wurden "escapen", 
        //um Datena bzusichern, bevor sie per Query an MySQL �bermittelt werden
        $_username = mysqli_real_escape_string($link, $_POST["user"]); 
        $_password = mysqli_real_escape_string($link, $_POST["passwort"]); 

        // Befehl f�r die MySQL Datenbank 
        $_sql = "SELECT * FROM users WHERE user='".$_username."' AND passwort='".$_password."' LIMIT 1"; 
        // Pr�fen, ob der User in der Datenbank existiert
        $_res = mysqli_query($link, $_sql); 
        $_anzahl = @mysqli_num_rows($_res); 

        // Die Anzahl der gefundenen Eintr�ge �berpr�fen. Maximal 
        // wird 1 Eintrag rausgefiltert (LIMIT 1). Wenn 0 Eintr�ge 
        // gefunden wurden, dann gibt es keinen Usereintrag der 
        // g�ltig ist. Keinen, wo der Username und das Passwort stimmt 
        if ($_anzahl > 0) 
            { 
            echo "Der Login war erfolgreich.<br>"; 

            // In der Session merken, dass der User eingeloggt ist
            $_SESSION["login"] = 1; 

            // Den Eintrag vom User in der Session speichern
            $_SESSION["user"] = mysqli_fetch_array($_res, MYSQLI_ASSOC); 
        
            }else{
               
                //kein gueltiges Passwort
                $_SESSION["login"] = 0; 
            }   
        }

    // Ist der User eingeloggt?
        if (!isset($_SESSION["login"]) || $_SESSION["login"] != 1) {
        // ist nicht eingeloggt, also login-Formular anzeigen, die Datenbank 
        // schliessen und das Programm beenden 
        header('Location: login-formular.html');
     
        mysqli_close($link); 
        exit(); 
            }
        //erfolgreiches Login und weiterleiten zur Insert-Seite (insert3.php)
        if (isset($_SESSION["login"])) {
             if ($_SESSION["login"] == 1){
                 header('Location: insert3.php');
             }}     
    ?>