/*
 * Function checknum() avoids typing of characters on keydown event and only types numbers,arrows,backspace,delete and tab.
 * @author Rushikesh
 * @field phone field where id=phone
 */
function checknum(){
	var input = document.getElementById('phone');
	if(input == null){
		return true;
	}else{
		input.onkeydown = function(e) {
		var k = e.which;
		if ( (k < 48 || k > 57) && (k < 96 || k > 105) && (k < 36 || k > 41) && (k != 8) &&(k != 9)&&(k != 46)) {
			e.preventDefault();
			return false;
		}
	}
	}
	
} 
/*
 * Function check_num() avoids typing of characters on keydown event and only types numbers,arrows,backspace,delete,comma and tab.
 * @author Rushikesh
 * @field multi phone number field where id=multino
 */
function check_num(){
	var input = document.getElementById('multino');
	if(input == null){
		return true;
	}else{
	input.onkeydown = function(e) {
		var k = e.which;
		if ( (k < 48 || k > 57) && (k < 96 || k > 105) && (k < 36 || k > 41) && (k != 8)&&(k != 188)&&(k != 9)&&(k != 46)) {
			e.preventDefault();
			return false;
		}
	}
	}
}
/*
 * Function multiphone_onblur() on blur checks the multi phone numberfield
 * @author Rushikesh
 * @field multi phone number field where id=multino
 */
function multiphone_onblur(){
	document.getElementById("multi_number").innerHTML = ""; 
	var x = document.getElementById("multino");
	 if(isNaN(parseInt(x.value))) {
		document.getElementById("multi_number").innerHTML = "<p class='error'>Only numeric allowed!!</p>";     
		x.value = "";
	}
}
/*
 * Function phone_onblur() on blur checks the phone numberfield
 * @author Rushikesh
 * @field phone number field where id=phone
 */
function phone_onblur(){
	document.getElementById("phone_number").innerHTML = ""; 
	var x = document.getElementById("phone");
	 if(isNaN(parseInt(x.value))) {
		document.getElementById("phone_number").innerHTML = "<p class='error'>Only numeric allowed!!</p>";               
		x.value = "";
	}
}

function prospect_phone_number(){
	var input = document.getElementById('prospect_phone_number');
	if(input == null){
		return true;
	}else{
		input.onkeydown = function(e) {
		var k = e.which;
		if ( (k < 48 || k > 57) && (k < 96 || k > 105) && (k < 36 || k > 41) && (k != 8) &&(k != 9)&&(k != 46)) {
			e.preventDefault();
			return false;
		}
            }
	}
	
}


/*
 * Function validate_qa_form() validates the qa form for validation
 * @access public
 * @author Rushikesh Joshi
 */
function validate_qa_form(){

	var qt = $("select[name='qatype']").val();
	var qn = document.getElementById("qa_name").value;

	if( qt == "0"){ //console.log("qatype if");
		$("select[name='qatype']").next('.qa_error').show();
		return false;
	}else{ console.log("qatype else");
		$('select[name="qatype"]').next('.qa_error').hide();
	}

	if(qn == ""){ //console.log("qaname if");
		$("input[name='qa_name']").next('.qa_error').show();
		return false;
	}else{ //console.log("qaname else");
		$('input[name="qa_name"]').next('.qa_error').hide();
	}

	var arr_question = $('.question input[name="question1[]"]').get();

	var flag = false;

	$.each(arr_question, function() {
	

		if($(this).val() == ""){//console.log("questions");
			$(this).next('.qa_error').show();
			flag = true;
		}else{
			$(this).next('.qa_error').hide();
		}
	});

	if(flag){
		return false;
	}
	

	var arr_value= $('.question select[name="possible_value[]"]').get();

	var flag1 = false; 

	$.each(arr_value, function() {
	

		if($(this).val() == 0){//console.log("question value");
			$(this).next('.qa_error').show();
			flag1 = true;
		}else{
			$(this).next('.qa_error').hide();
		}
	});
	if(flag1){
		return false;
	}
	
	

	var arr_score= $('.question select[name="score_yes[]"]').get();
	var flag2 = false; 

	$.each(arr_score, function() {
	

		if($(this).val() == 0){//console.log("score value");
			$(this).next('.qa_error').show();
			flag2 = true;
		}else{
			$(this).next('.qa_error').hide();
		}
	});
	if(flag2){
		return false;
	}

	$(".qa_error").hide();

    num=0;

        $(".live").each(function(){ //console.log(".live function");

           if($(this).is(":checked"))
           { //console.log(".live function if loop ");
             /*if($(this).parents("tr").find(".quest_value").val() == "yes")
             { //console.log(".live function .quest_value == yes");*/
                num=parseInt(num)+parseInt($(this).parents("tr").find(".quest_score").val());
		console.log(num);
             //}
           }

        });

        $('input[name=score_hidden_value]').val(num);
        if(num != "100"){ console.log(num);
            $(" .score_error").show();
            return false;
        }else{ //console.log("num != 100 else");
            $(" .score_error").hide();
        }
}

/**/
function start_qa_form(){
     //alert("asdsa"); die(); 
           var cc = $("#call_center").val();
           var an = $("#agent_name").val();
           var cd = $("#call_date").val();
           var qd = $("#qa_date").val();
           var ppn = $("#prospect_phone_number").val();
           var ppnl = $("#prospect_phone_number").val().length;
           
           if(cc == ""){
               $(" .new_qa_error").show();
               return false;
           }
           
           if(an == ""){
               $(" .new_qa_error").show();
               return false;
           }
           
           if(cd == ""){
               $(".new_qa_error").show();
               return false;
           }
           
           if(qd == ""){
               $(".new_qa_error").show();
               return false;
           }
           
           if(ppn == ""){
               $(".new_qa_error").show();
               return false;
           }
           
           if(ppn != ""  && ppnl != "10"){
               $("#prospect_phone_number .new_qa_error").hide();
               $(".new_qa_error").hide();
               $("#prospect_number").html("<p class=\"error\">Only 10 digits allowed</p>");
              return false;
           }
           $(".new_qa_error").hide();
	   
	var test=false;
	   
	$.ajax({
	  async: false,
	  data: { number: ppn },
	  type: 'post',
	  url: '../qamanagement/phone_no_chk',
	  success : function(data){
		if(data !=0){
			$(".duplicate_error").show();
			test=false;
		}
		else{
			test=true;
		}
	  }
	});
	
	if(!test)
	{
		return test;
	}
	   
    $(".duplicate_error").hide();

}

$(document).ready(function(){
	/*
	 * Function validates the search call recordings page for values
	 * @author Rushikesh
	 * @ return false if the form is posted null
	 */
		
	$("#search_record").click(function(){ 

		var s = $("#select_date").val();
		var sd = $("#startdate").val();
		var ed= $("#enddate").val();
		var sp = $("#phone").val();  
		var spl = $("#phone").val().length; 
		var mp = $("#multino").val();
		var mu = $("#multinofile").val();
		if(s == "" && sd == "" && ed == "" && sp == "" && mp == "" && mu == ""){
			$(".record_error").show();
				return false;
		}else if((sd != "" && ed == "") || (sd == "" && ed != "")){
				$(".record_error").show();
				return false;
		}
		if(sp != ""  && spl != "10"){ //alert("in Sp = "+sp);
			$("#phone_number").html("<p class=\"error\">Only 10 digits allowed</p>");
				return false;
		}else{
			$(".record_error").hide();
			$("#phone_number").hide();
			return true;
		}
		$("#phone_number").hide();
		$(".record_error").hide();
		return true;
	});

	/*
	 * Function display the multi phone textarea on click of radiobutton of multiphone
	 * @author Rushikesh
	 */
	$("#multiphone").click(function(){
		$("#multi_phone").css("display","block");
		$("#single_phone").css("display","none");
	});
	/*
	 * Function display the phone textbox on click of radiobutton of singlephone
	 * @author Rushikesh
	 */
	$("#singlephone").click(function(){
		$("#single_phone").css("display","block");
		$("#multi_phone").css("display","none");
	});

	/**/
	$(".qa_form_builder").click(function(){
		$(".qa_form").toggle("slow");
	});
	
	/**/
	$(".create_new").click(function(){
		$(".create_new_form").toggle("slow");
	});
	

});
