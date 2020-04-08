function updateData() {
  $(document).ready(function(){
  $("#output").load("./infoTable/load_infoTable.php", {
    fzgLabel: checkInput("#fahrzeug"), //Fahrzeug.Label
    fzgSop: checkInput("#sop"),       //Fahrzeug.sop
    brLabel: checkInput("#batterieraum"), //Batterieraum.Label
    baKapa: checkInput("#baKapa"),    
    baTyp: checkInput("#baTyp"),
    asLabel: checkInput("#asLabel")
    });
    onInputChange();
  });   
}

function checkInput(FieldName){
    if (!$(FieldName).val()) {
      return "";
    }else{
      return $(FieldName).val();
    }
}

function onInputChange(){
  $("#DropDowns").load("./input/load_input.php", {
    fzgLabel: checkInput("#fahrzeug"),
    fzgSop: checkInput("#sop"),
    brLabel: checkInput("#batterieraum"), 
    baKapa: checkInput("#baKapa"),    
    baTyp: checkInput("#baTyp"),
    asLabel: checkInput("#asLabel")
    });

}

function selectRow(value){
  var selectedRow = document.getElementById(value);
  var selectInTable = document.getElementsByTagName('tr');
  $(selectedRow).addClass('selected');
  $(selectInTable).not(selectedRow).removeClass('selected');
    //   $("#outputNSatz").load("load_NSatz.php", {
    // masterID: value //passender MasterID 
    // });
    $("#outputNSatz").load("./output/nsatzTable.php", {
      masterID: value
    });

}

function resetInput(){
  $(document).ready(function(){
  document.getElementById('fahrzeug').value = '';
  document.getElementById('asLabel').value = '';

  $("#DropDowns").load("./input/load_input.php", {
    fzgLabel: "",
    fzgSop: "all",
    brLabel: "all", 
    baKapa: "all",    
    baTyp: "all",
    asLabel: ""
  });
  $("#output").load("./infoTable/load_infoTable.php", {
    fzgLabel: '', //Fahrzeug.Label
    fzgSop: 'all',       //Fahrzeug.sop
    brLabel: 'all', //Batterieraum.Label
    baKapa: 'all',    
    baTyp: 'all',
    asLabel: ''
    }); 
  });
}

  function getInfoAu(){
      $(document).ready(function(){
        alert("Geben Sie hier Attribute ein, die das Zugangssystem des Fahrzeug beschreiben: zB:'ISM'");
      });
  }
    function getInfoAll(){
      $(document).ready(function(){
        var message= "Konfigurator zur Identifikation fahrzeugspezifischer Li-Ionen Nachrüstsätze./n Für die Identifikation benötigen Sie folgende Fahrzeuginformationen /n -	Fahrzeug Typ, z.B. ECE 225/n -	Fahrzeug Baujahr/n -	Zugangssystem z.B. Cancode/Candis, Minidisplay Schaltschloss oder Minidisplay TransponderKey/n Batterieraum z.B. SBE (seitliche Batterie entnahmen), Batterieraum L, M oder S/nDiese fahrzeugspezifische Informationen finden Sie z.B. in der JETI unter Angabe der Fahrzeugseriennummer.";
        alert(message);
    });
  }
    function getInfoAu(){
      $(document).ready(function(){
        alert("Geben Sie hier Attribute ein, die das Zugangssystem des Fahrzeug beschreiben: zB:'ISM'");
      });
  }
