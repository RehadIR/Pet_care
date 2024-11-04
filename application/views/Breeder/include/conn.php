      <?php
		$con = mysql_connect("localhost","root","") or die (mysql_error());
        mysql_select_db("petcare", $con) or die (mysql_error());
		?>