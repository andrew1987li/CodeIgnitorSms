//in the customers/index view.
function check_select(){
	var count_rows = $("#count_rows").val();

	for(var i=0; i<count_rows; i++)
	{
		var tag_id = "#chk"+i;
		var num_tag_id = "#num"+i;
		if($(tag_id).is(':checked')){
			//alert($(tag_id).val());
			var no = $(tag_id).val();
			$("#customer_no").val(no);
			$("#phonenum").val($(num_tag_id).val());

			return true;
		}
	}
	return false;
}


function send_sms(){
	if(check_select() == true){
		$("#sms_form").attr("action", "/index.php/smsmsg/sendsms");
		$("#sms_form").submit();
	}

}