<html>
<head>
<title>User-Auhentication</title>
</head>
<body>
<?php
if (isset($_POST['login']))
{
	$uname=trim($_POST['uname']));
	$upass=trim($_POST['pass']));
	if(empty($uname))
	{
	    $error="enter your name!";
		$code=1;
	}
	else if(empty($upass))
	{
		$error="enter your password!";
		$code=4;
	}
	else if(strlen($upass)<8)
	{
		$error="minimum 8 characters!";
		$code=4;
	}
	else
	{
		$dbhost='local host';
		$dbuser='root';
		$bdpass='';
		$database='users';
		$con=mysql_connect($dbhost,$dbuser,$bdpass,$database);
		if(!$con)
		{
			echo"Failed to connect to MySQL:"
		}mysql_error();
		mysql_select_db($database,$con);
		$sql='SELECT *FROM user_detail WHERE user_name="'.$unmae.'"AND password="'.$upass.'"';
		$result=mygl_query($sql);
		$numrows=mysql_num_rows($result);
		if($numrows>0)
		{
			?>
			<script>
			alert('sucess Login!!');
			document.location.href='index.php';
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert('Error!');
			</script>
			<?php
		}
	}
	?>
	<form method="post">
	<table align="center" width="50%" border="0">
	<tr><td><h3>login Here</h3></td></tr>
	<?php
	if(isset($error))
	{
		?>
		<tr>
		<td id="error"><font color="#FF0000">
		<?php echo $error;?> </font></td>
		</tr>
	<?php
	}
	?>
	<tr>
	<td><input type="text" name="uname" placeholder="User name" value="<?php
if(isset($uname)){echo$uname;}?>"<?php if(isset($code) && $code==1){ echo"autofocus";}?>/>
</td>
</tr>
<tr>
<td><input type="password" name="pass" placeholder="your password"<?php if(isset($code))&& $code==4){ echo"autofocus";}?>/></td>
</tr>
<tr>
<td><button type="submit" name="login" style="color:blue">log me in </button>
</td>
</tr>
</table>
</form>
</body>
</html>


