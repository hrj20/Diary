$(document).ready(personal);
function personal(){
		init_list();

function init_list(){
	console.log("in init_list");
	$.ajax({
		type:'GET',
		url: 'getAcademicsData.php',
		dataType : 'json',
		success:handle_success_data,
		error: handle_error
	});

	function handle_success_data(data){
		console.log(data);
			$.each(data, function(i, item){
			// console.log(i , '==>', item.);
			updateTable(item.id, item.title, item.notes, item.date, item.category);
			// count = item.id;
			// id_p_list.push([item.id, item.date]);
			});
		}
	function handle_error(ts){
			console.log(ts.responseText);
		}
	}
	function updateTable(id1, title, notes, date, category){
	console.log(event,date);
	var table_body = $("#table_body");
	var newelement = "";
	newelement += "<tr id="+ id1 +">";
	var th_head="<th>";
	newelement += th_head;
	newelement += title;
	newelement += "</th>";
	newelement += th_head;
	newelement += date;
	
	// newelement += "</th>";
	// newelement += th_head;
	// newelement += time;
	// newelement += "</th>";
	// newelement += th_head;
	// newelement += repetition;
	// newelement += "</th>";

	newelement += "<th style='padding-left:2.5%'>";
	newelement += "<span class='input-group-addon' style='width:70%;border-radius:5px;border:0;'>"
	newelement += "<span class='glyphicon glyphicon-remove' id="
	newelement += id1;
	newelement += "></span></span>";
	newelement += "</th>";
	console.log(newelement);
	table_body.append(newelement);
	$("#input_pl").val("");
}
}