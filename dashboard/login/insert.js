function getTable(){
		var tableName = $('#selectTable').val();
		$('#tableColums').load('./insert_colums.php',{
			tableName: tableName
		});
	}
function pushValues(tableName, arrColumns){
	var num = arrColumns.length;
	var values = new Array();
	var allfilled = 'ja';
	for(j=0; j<num; j++){
		var idName = "#"+arrColumns[j]+"";
		if($(idName).val()=='' && arrColumns[j] !='id'){
			alert('Bitte alle Werte fuellen!');
			allfilled = 'nein';
		}else{
			values.push($(idName).val());
		}
	}
	if(allfilled == 'ja'){
	$('#insertValues').load('./insert_values.php',{
		tableName: tableName,
		colums: arrColumns,
		values: values
	});
	}
	}