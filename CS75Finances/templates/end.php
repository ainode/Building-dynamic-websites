</div>
<div id="right" style="background-color:#FFD700;height:100%;width:85px;float:right;">
<?php 
	if (!$_SESSION['authenticated'])
		{
?>
<ul><li onclick="show_login_form();"><a href="#">Log in</a></li></ul>
<ul><li><a href="signup.php">Sign up</a></li></ul>
<?php
		}
	else
		{
?>
<ul>
	<li><a href="home.php">Home</a></li>
</ul>
<?php
		}
?>
</div></div>
<div id="footer" style="background-color:#FFA500;clear:both;text-align:center;">
Copyright © 2011 2DayTrades.com</div>
</div>
</body>
</html>

