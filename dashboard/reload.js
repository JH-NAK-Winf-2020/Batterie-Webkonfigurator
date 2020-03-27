/*$("#typ").focus();
$(document).on('load', function(){
  $("#search").keyup(function(){
    var newId = $("#id").val();
    if (!$("#typ").val()) {
      var newTyp = "";
      alert('empty');
      //alert('typ');
    } else {
      var newTyp = $("#typ").val();
    }
    if (!$("#kapazitaet").val()) {
      var newKapazitaet = "";
      //alert('kapa');
    } else {
      var newKapazitaet = $("#kapazitaet").val();
    }
    $("#search").empty();
    $("#output").empty();
    alert(newTyp);
    $("#search").load("load.php", {
      id: newId,
      typ: newTyp,
      kapazitaet: newKapazitaet
      });
  });
});*/

function updateData() {
  $("#output").load("load.php", {
    fzgLabel: checkInput("#fahrzeug"), //Fahrzeug.Label
    fzgSop: checkInput("#sop"),       //Fahrzeug.sop
    brLabel: checkInput("#batterieraum"), //Batterieraum.Label
    baKapa: checkInput("#baKapa"),
    baTyp: checkInput("#baTyp"),
    baMaterial: checkInput("#baMaterial")
    });
}
function checkInput(FieldName){
    if (!$(FieldName).val()) {
      return "";
    } else {
      return $(FieldName).val();
    }
}

function selectRow(value){
  var selectedRow = document.getElementById(value);
  var selectInTable = document.getElementsByTagName('tr');
  $(selectedRow).addClass('selected');
  $(selectInTable).not(selectedRow).removeClass('selected');
  
  //selectedRow.toggleClass("selected");
  //selectedRow.not(selectedRow).removeClass("selected");
}
