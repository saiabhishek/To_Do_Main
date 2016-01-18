<style type="text/css">
table
{
   	border-collapse: collapse;
   	border-spacing: 0;
   	 
}

.bordered 
{
   	border: solid #ccc 1px;
}
table, th, td
{
   	border: 1px solid black;
}
</style>

<?php include_once('access2.php');
error_reporting(E_ALL ^ E_NOTICE);
	if($_POST['textbox_inp1']!==null && $_POST['date_inp1']!==null && $_POST['usr_time']!==null)//if the input from text box is having some value then this if command works
	{
		$text_input = $_POST['textbox_inp1'];//getting data from text box and placing in $text_input
		$date_input = $_POST['date_inp1'];//getting data from date box and placing in $date_input
		$time_input = $_POST['usr_time'];//getting data from time box and placing in $time_input
	
	$insert_values = "INSERT INTO todotabel(Data,DOT,time) VALUES('$text_input','$date_input','$time_input')";//inserting values in tabel todotabel from database tododb
	if ($conn->query($insert_values) === TRUE)//this condition will continue if the inserting values in tabel is done 
		{
   
		} 
	else //if there is any failure in inserting we can retrieve an error 
		{
    		echo "Error: " . $insert_values . "<br>" . $con->error;
		}
		
	}
$display="SELECT * FROM todotabel";//displaying method from tabel is stored in $display
$display_2 = mysqli_query($conn,$display);//query will process for displayin of tabel
?>
<html>
<head>
<title> To-Do</title>
</head>
<body>
<h1>To-Do</h1>
</body>
<table> 
<form name="Data" action="action2.php" method="post">
<h4>Your work to do</h4>
<?php 
	if(mysqli_num_rows($display_2)>0)//here if the rows in the tabel is not empty then displays result
	{
		while($row=mysqli_fetch_assoc($display_2))//here the fetch command will retrieve the values which are retrived from query of $display2 and associated link will be carried out
		{
			?>
			<tabel>
			<tr>
				<td><input type="checkbox" name="checked_id[]" value="<?php echo $row['id']; ?>" /> </td><!here each row will be assigned with id value such that it can be easy distunguish between multiple same content files>
				<td width="750"><?php echo $row['Data']; ?></td><!the data which is present in Data column will be printed>
				<td><?php echo $row['DOT']; ?></td><!the data which is present in DOT column will be printed>
				<td><?php echo $row['time']; ?></td><!the data which is present in time column will be printed>
			</tr>
		<?php
		}
		?>
			<td colspan=4 align ="right"> <input type="submit" value="Delete" name="delete_multi" /></td>
		<?php
	}
	else//if there are no values in the tabel this command works
	{
		?>
		<tr><td>No Work to do</td></tr>
		<?php 
	}

		?>
		
		</table>
	</form>
<body>
<p class="paragraph">
<form name="Inp" action="display.php" method="post">

What are you about to do?<br>
<textarea type="textarea" cols="40" rows="5" style="width:500px; height:50px;" name="textbox_inp1"></textarea><br><br>
When are u about to do?<br><br>
<input type="date" name="date_inp1">
<input type="time" name="usr_time">
<input type="submit" value="Add">
</form>
</p>
</body>
</html>

