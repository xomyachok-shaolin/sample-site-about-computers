<?php
if (mail("test@test.com", "Test", "Test message")) {
	echo "Send";
} else {
   echo "Error";
}
?>
