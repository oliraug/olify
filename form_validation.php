<?php


?>
<script type="text/javascript">
	function FormValidation() {
		if (document.getElementById('full_name').value='') {
			alert("<?php echo htmlspecialchars(xl('Please Enter Your Full Name'), ENT_QUOTES) ?>");
			document.getElementById('full_name').focus();
			return false;
		}
		if (document.getElementById('login_name').value='') {
			alert("<?php echo htmlspecialchars(xl('Please Enter Your Username'), ENT_QUOTES) ?>");
			document.getElementById('login_name').focus();
			return false;
		}
		if (document.getElementById('password').value='') {
			alert("<?php echo htmlspecialchars(xl('Please Enter Password'), ENT_QUOTES) ?>");
			document.getElementById('password').focus();
			return false;
		}
		if (document.getElementById('phone_no').value='') {
			alert("<?php echo htmlspecialchars(xl('Please Enter your Phone Number'), ENT_QUOTES) ?>");
			document.getElementById('phone_no').focus();
			return false;
		}
		if (document.getElementById('speciality').options[document.getElementById('speciality').selectedIndex].value=='consumer' ||
			document.getElementById('speciality').options[document.getElementById('speciality').selectedIndex].value=='farmer' ||
			document.getElementById('speciality').options[document.getElementById('speciality').selectedIndex].value=='trader' ||) {
			alert("<?php echo htmlspecialchars(xl('Please Select your Speciality'), ENT_QUOTES) ?>");
			document.getElementById('speciality').focus();
			return false;
		}
		if (document.getElementById('olify_sex').checked[document.getElementById('olify_sex').selectedIndex].value=='male' ||
			document.getElementById('olify_sex').checked[document.getElementById('olify_sex').selectedIndex].value=='female') {
			alert("<?php echo htmlspecialchars(xl('Please Select your Sex'), ENT_QUOTES) ?>");
			document.getElementById('olify_sex').focus();
			return false;
		}

		return true;
	}
</script>