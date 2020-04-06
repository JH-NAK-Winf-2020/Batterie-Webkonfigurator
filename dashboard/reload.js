function updateData() {
  $(document).ready(function(){
  $("#output").load("load.php", {
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
    // if (!$(FieldName).val()) {
    //   return "";
    // } else if($(FieldName).val()=='(leer)'){
    //   return "(leer)";
    // }else{
    //   return $(FieldName).val();
    // }
    if (!$(FieldName).val()) {
      return "";
    }else{
      return $(FieldName).val();
    }
}

function onInputChange(){
  $("#DropDowns").load("loadInput.php", {
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
    $("#outputNSatz").load("output_Material.php", {
      masterID: value
    });

}

function resetInput(){
  document.getElementById('fahrzeug').val('');
  document.getElementById('asLabel').val('');

  $("#DropDowns").load("loadInput.php", {
    fzgLabel: "",
    fzgSop: "",
    brLabel: "", 
    baKapa: "",    
    baTyp: "",
    asLabel: ""
  });
}

  function getInfoAu(){
      $(document).ready(function(){
        alert("Geben Sie hier Attribute ein, die das Zugangssystem des Fahrzeug beschreiben: zB:'ISM'");
      });
  }
