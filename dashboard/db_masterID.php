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
        $result = $this->passSqlToDb($sql);
        return $result;
    }
    
    function getNdetail($masterID){
        //sql MatNr Nachrüstdetail
        $sql = "SELECT nachruestsatzdetail.material as ndetailMaterial, nachruestsatzdetail.label as ndetailLabel FROM nachruestsatzdetail WHERE nachruestsatzdetail.nachruestsatz IN (SELECT nachruestsatz.id FROM nachruestsatz WHERE nachruestsatz.id = (SELECT master.nachruestsatz FROM master WHERE master.id = $masterID));";
        $result = $this->passSqlToDb($sql);
        return $result;
    }
    function getZusatz($masterID){
        //sql MatNr Nachrüstsatz Zusatzmaterial
        $sql = "SELECT zusatzmaterial.material as zuMaterial, zusatzmaterial.label as zuLabel, zusatzmaterial.hinweis as zuHinweis FROM zusatzmaterial WHERE zusatzmaterial.id IN (SELECT master2zusatzmaterial.zusatzmaterial FROM master2zusatzmaterial WHERE master2zusatzmaterial.master = $masterID);";
        $result = $this->passSqlToDb($sql);
        return $result;
    }
    
    function getLadeg($masterID){
        //sql MatNr Ladegerät
        $sql = "SELECT ladegeraet.material as laMaterial, ladegeraet.label as laLabel, ladegeraet.klasse as laKlasse FROM ladegeraet WHERE ladegeraet.id IN (SELECT master2ladegeraet.ladegeraet FROM master2ladegeraet WHERE master2ladegeraet.master = $masterID);";
        $result = $this->passSqlToDb($sql);
        return $result;
    }

    function getLadeoption($masterID){
        //sql MatNr Ladegerätoption
        $sql = "SELECT ladegeraeteoption.material as loMaterial, ladegeraeteoption.label as loLabel, ladegeraeteoption.kommentar as loKomm FROM ladegeraeteoption WHERE ladegeraeteoption.id IN (SELECT master2ladegeraeteoption.ladegeraeteoption FROM master2ladegeraeteoption WHERE master2ladegeraeteoption.master = $masterID);";
        $result = $this->passSqlToDb($sql);
        return $result;
    }
    
    function getNart($masterID){
        $sql = "SELECT nachruestart.label as naLabel FROM nachruestart WHERE nachruestart.id IN (SELECT master.nachruestart FROM master WHERE master.id = $masterID);";
        $result = $this->passSqlToDb($sql);
        return $result;
    }
    function getAuMaterial($masterID){
        //Ausstattung to Material (von MasterID nach Materialnummer)
        $sql = "SELECT ausstattung2material.material as auMaterial FROM ausstattung2material WHERE ausstattung2material.ausstattung IN (SELECT master.ausstattung FROM master WHERE master.id = $masterID);";
        $result = $this->passSqlToDb($sql);
        return $result;
    }

    function getBaMaterial($masterID){
        //Batterie Materialnr (von MasterID Batterienummer)
        $sql = "SELECT batterie.material as baMaterial, batterie.abmessung as baAbmessung, batterie.kapazitaet as baKapa FROM batterie WHERE batterie.id = (SELECT master.batterie FROM master WHERE master.id = $masterID);";
        $result = $this->passSqlToDb($sql);
        return $result;
    }
    
    function getZusatzInfo($masterID){
        //zusatzinfo
        $sql = "SELECT zusatzinfo.text as zuText, zusatzinfo.art as zuArt FROM zusatzinfo WHERE zusatzinfo.id IN (SELECT master2zusatzinfo.zusatzinfo FROM master2zusatzinfo WHERE master2zusatzinfo.master = $masterID);";
        $result = $this->passSqlToDb($sql);
        return $result;
    }    
}
?>