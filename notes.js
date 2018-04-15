
$(document).ready(notes);
function notes(){
	init_list();

function init_list(){
	console.log("in init_list");
	$.ajax({
		type:'GET',
		url: 'getnotesData.php',
		dataType : 'json',
		success:handle_success_data,
		error: handle_error
	});

	function handle_success_data(data){
		//console.log(data);
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
	var th_head='<th><span id="'+id1+'" class="tooltip" title="'+notes+'" style="width:1000px;height:40px"></span>';
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

$("#confirm").click(function(e){
		var date=$("#date").val();
		var title=$("#title").val();
		var category=$("#sel").val();
		var description=$("#note").val();
		console.log(date);
		console.log(title);
		console.log(category);
		if(date.length==0){alert("Enter the date");$("#date").focus();return false;}
		else{console.log(date);}
		if(title.length==0){alert("Enter the title");$("#title").focus();return false;}
		else{console.log(title);}
		if(description.length==0){alert("Enter the description");$("#note").focus();return false;}
		else{console.log(description);}
		if(category.length==0){alert("Enter the category");$("#sel").focus();return false;}
		else{console.log(category);}

		
		var formdata={
				title:title,
				notes:description,
				date:date,
				category:category
							}
		console.log(formdata);
		$.ajax({
				url:'notesData.php',
				type:"POST",
				data:formdata,
				dataType:'text',
				success:handle_success,
				error:handle_error
			});
		function handle_success(){
			//alert("done");
			$(this).closest('form').find("input[type=text], textarea").val("");
			$("#eventform")[0].reset();
			reset();
			init_list();
		}
		function handle_error(){
			alert("gadbad");
		}
		function reset(){
			count = 0;
			console.log("in reset");
			$("#table_body").empty();
		}
	});

$(document).on('click','.glyphicon',function(e){
		console.log("Clicked");
		var primary_id = e.currentTarget.id;
		console.log( "primary_id : " , primary_id);
		var datanew = {id:String(primary_id)};
		$.ajax({
		type:"POST",
		data:datanew,
		url:'viewnotes.php',
		dataType:'text',
		success:handle_put_success,
		error:handle_error,
		});
	});
	function handle_put_success(data){
		console.log(data);
		console.log("removed");
		reset();
		init_list();
	}
	function handle_error(){
		console.log("not removed");
	}
	function reset(){
			count = 0;
			console.log("in reset");
			$("#table_body").empty();
		}
	
	}