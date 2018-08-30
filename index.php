<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Convert Ber</title>
<link rel="shortcut icon" href="btb_logo.ico" />
<script src="jquery-3.3.1.min.js"></script>
<script>
	$(function(){
		$( "#btn_submit" ).click(function() {
		  $.post( "convert_ber.php", $( "#frm_convert_ber" ).serialize(),function(data){
			  //alert(data);
			  $("#ber_output").val(data);
		  });
		});
		
		$("#btn_clear_input").click(function(){
			$("#ber_input").val("");
		});
		$("#btn_clear_output").click(function(){
			$("#ber_output").val("");
		});
		$("#btn_clear_all").click(function(){
			$("#ber_input").val("");
			$("#ber_output").val("");
		});
	});
	function copyTextarea() {
	  /* Get the text field */
	  var copyText = document.getElementById("ber_output");

	  /* Select the text field */
	  copyText.select();

	  /* Copy the text inside the text field */
	  document.execCommand("copy");

	  /* Alert the copied text */
	  alert("Copied the text: " + copyText.value);
	}
</script>
</head>

<body>
<div>
	<h1>Convert Ber</h1>
</div>
<form id="frm_convert_ber" action="index.php" method="post">
	Input<br>
		<textarea id="ber_input" name="ber_input" rows="10" cols="75"></textarea>
		Select Bot :
		<!--
		<select id="bot_name" name="bot_name">
			<option value="P!N-2ALPHA">P!N-2ALPHA</option>
			<option value="AutoBot">AutoBot</option>
		</select>
		-->
		<button id="btn_submit" type="button">Convert</button>
		<button id="btn_clear_input" type="button">Clear Input</button>
	<br>
	Output<br>
		<textarea id="ber_output" name="ber_output" rows="10" cols="75" readonly></textarea>
		<button id="btn_copy" type="button" onclick="copyTextarea()">Copy Text</button>
		<button id="btn_clear_output" type="button">Clear Output</button>
	<br>
		<button id="btn_clear_all" type="button">Clear All</button>
</form>

<hr>
<div>
	<a >by BTB@กระท่อมน้อย</a>
</div>
<?php
error_log("hello, this is a test!");
?>

</body>

</html>