<html>
<head><strong><big>Delete Author</big></strong>
    <style>
        label {
            width: 80px;
            display: inline-block;
        }
    </style>
    </head>
<body>

    <form action='result.php' method='post'>
        <label>Name:                </label><input type='text' name='author_name' /><br/>
        <input name="delete_author", value='Delete' type='submit'/></p>
    </form>
    <hr>

	<br>

	<form action="author.php">
		<input type="submit" value="Back to Author Operations" />
	</form>

</body>
</html>