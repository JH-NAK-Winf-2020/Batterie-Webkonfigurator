<?php 
class DB_MasterID{
    function passSqlToDb($sql){
        include './config/connect.php';
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($conn);
        return  $data;
    }
    function getNsatz($masterID){
        //sql MatNr Nachrüstsatz
        $sql = "SELECT nachruestsatz.material as nsatzMaterial, nachruestsatz.label as nsatzLabel, nachruestsatz.kommentar as nsatzKomm FROM nachruestsatz WHERE nachruestsatz.id IN (SELECT master.nachruestsatz FROM master WHERE master.id = $masterID);";
        $result = passSqlToDb($sql);
        return $result;
    }
    
    function getNdetail($masterID){
        //sql MatNr Nachrüstdetail
        $sql = "SELECT nachruestsatzdetail.material as ndetailMaterial, nachruestsatzdetail.label as ndetailLabel FROM nachruestsatzdetail WHERE nachruestsatzdetail.nachruestsatz IN (SELECT nachruestsatz.id FROM nachruestsatz WHERE nachruestsatz.id = (SELECT master.nachruestsatz FROM master WHERE master.id = $masterID));";
        $result = passSqlToDb($sql);
        return $result;
    }
    function getZusatz($masterID){
        //sql MatNr Nachrüstsatz Zusatzmaterial
        $sql = "SELECT zusatzmaterial.material as zuMaterial, zusatzmaterial.label as zuLabel, zusatzmaterial.hinweis as zuHinweis FROM zusatzmaterial WHERE zusatzmaterial.id IN (SELECT master2zusatzmaterial.zusatzmaterial FROM master2zusatzmaterial WHERE master2zusatzmaterial.master = $masterID);";
        $result = passSqlToDb($sql);
        return $result;
    }
    
    function getLade($masterID){
        //sql MatNr Ladegerät
        $sql = "SELECT ladegeraet.material as laMaterial, ladegeraet.label as laLabel, ladegeraet.klasse as laKlasse FROM ladegeraet WHERE ladegeraet.id IN (SELECT master2ladegeraet.ladegeraet FROM master2ladegeraet WHERE master2ladegeraet.master = $masterID);";
        $result = passSqlToDb($sql);
        return $result;
    }

    function getLadeoption($masterID){
        //sql MatNr Ladegerätoption
        $sql = "SELECT ladegeraeteoption.material, ladegeraeteoption.label, ladegeraeteoption.kommentar FROM ladegeraeteoption WHERE ladegeraeteoption.id IN (SELECT master2ladegeraeteoption.ladegeraeteoption FROM master2ladegeraeteoption WHERE master2ladegeraeteoption.master = $masterID);";
        $result = passSqlToDb($sql);
        return $result;
    }
}
?>