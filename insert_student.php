<html>
<head></head>
<body>

    <form action='result.php' method='post'>
        <label>SID:         </label> <input type='number' name='SID' /><br/>
        <label>Name:        </label><input type='text' name='Name' /><br/>
        <label>Surname: </label><input type='text' name='Surname' /><br/>
        <label>Department:    </label><input type='text' name='Department' /><br/>
        <label>Entry_Year:  </label><input type='number' name='Entry_Year' /><br/>
        <input name="insert_student", value='Insert' type='submit'/></p>
    </form>
    <hr>

	<br>

	<form action="student.php">
		<input type="submit" value="Back to Student Operations" />
	</form>

</body>
</html>