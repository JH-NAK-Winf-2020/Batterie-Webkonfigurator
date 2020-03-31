function updateData() {
  $("#output").load("load.php", {
    fzgLabel: checkInput("#fahrzeug"), //Fahrzeug.Label
    fzgSop: checkInput("#sop"),       //Fahrzeug.sop
    brLabel: checkInput("#batterieraum"), //Batterieraum.Label
    baKapa: checkInput("#baKapa"),    
    baTyp: checkInput("#baTyp"),
    baMaterial: checkInput("#baMaterial"),
    asLabel: checkInput("#asLabel")
    });
}

function updateDropDown(){
  $("#input").load("loadInput.php",{
    

  });
}
function onInputChange(value){
  alert(value);
  $("#input").load("loadInput.php", {
    fzgSop: value
    });
}

function selectRow(value){
  var selectedRow = document.getElementById(value);
  var selectInTable = document.getElementsByTagName('tr');
  $(selectedRow).addClass('selected');
  $(selectInTable).not(selectedRow).removeClass('selected');
    $("#outputNSatz").load("load_NSatz.php", {
    masterID: value //passender MasterID 
    });
}
