<?php 
    $_db_host = "localhost";           
    $_db_username = "laura"; 
    $_db_password = "test123"; 
	$_db_datenbank = "final_lit"; 
	
    SESSION_START(); 

    # Datenbankverbindung herstellen 
    $link = mysqli_connect($_db_host, $_db_username, $_db_password, $_db_datenbank); 

    # Hat die Verbindung geklappt? 
    if (!$link) 
        { 
        die("Keine Datenbankverbindung m&oumlglich: " . mysqli_error()); 
        } 

    // # Verbindung zur richtigen Datenbank herstellen 
    // $datenbank = mysqli_select_db($_db_datenbank, $link); 

    // if (!$datenbank) 
    //     { 
    //     echo "Kann die Datenbank nicht benutzen: " . mysqli_error(); 
    //     mysqli_close($link);        # Datenbank schliessen 
    //     exit;                    # Programm beenden ! 
    //     } 

    ################################################################## 
 
    # Ist die $_POST Variable submit nicht leer?
    # dann wurden Logindaten eingegeben, die müssen wir überprüfen
//     echo print_r($_POST);
    if (!empty($_POST["submit"])) 
        { 
        # Die Werte die im Loginformular eingegeben wurden "escapen", 
        # damit keine Hackangriffe über den Login erfolgen können!
        $_username = mysqli_real_escape_string($link, $_POST["user"]); 
        $_password = mysqli_real_escape_string($link, $_POST["passwort"]); 

        # Befehl für die MySQL Datenbank 
        $_sql = "SELECT * FROM users WHERE user='".$_username."' AND passwort='".$_password."' LIMIT 1"; 
        # Prüfen, ob der User in der Datenbank existiert
        $_res = mysqli_query($link, $_sql); 
        $_anzahl = @mysqli_num_rows($_res); 

        # Die Anzahl der gefundenen Einträge überprüfen. Maximal 
        # wird 1 Eintrag rausgefiltert (LIMIT 1). Wenn 0 Einträge 
        # gefunden wurden, dann gibt es keinen Usereintrag, der 
        # gültig ist. Keinen wo der Username und das Passwort stimmt 
        # und user_geloescht auch gleich 0 ist
        if ($_anzahl > 0) 
            { 
            echo "Der Login war erfolgreich.<br>"; 

            # In der Session merken, dass der User eingeloggt ist
            $_SESSION["login"] = 1; 

            # Den Eintrag vom User in der Session speichern
            $_SESSION["user"] = mysqli_fetch_array($_res, MYSQLI_ASSOC); 

        //     # Das Einlogdatum in der Tabelle setzen
        //     $_sql = "UPDATE login_usernamen SET letzter_login=NOW() 
        //              WHERE id=".$_SESSION["user"]["id"]; 
        //     mysqli_query($_sql); 
        //     } 
        // else 
        //     { 
        //     echo "Die Logindaten sind nicht korrekt.<br>"; 
        //     } 
         
 # Hier wäre der User jetzt gültig angemeldet! Weiterleitung zur Backend-Oberfläche
//         include "insert3.php";
                header('Location: insert3.php');
//  echo "Hallo, Sie sind jetzt eingeloggt und werden zur Backend-Oberfl&aumlche weitergeleitet"; 
            }
        }

    # Ist der User eingeloggt?
    if (!isset($_SESSION["login"])) 
        { 
        # ist nicht eingeloggt, also Formular anzeigen, die Datenbank 
        # schliessen und das Programm beenden 

        
        header('Location: login-formular.html');
        mysqli_close($link); 
        exit(); 
        }
        
    ?>