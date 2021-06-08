<html>
<head><strong><big>Delete Book</big></strong>
    <style>
        label {
            width: 50px;
            display: inline-block;
        }
    </style>
    </head>
<body>

    <form action='../result.php' method='post'>
        <label>ID: </label><input type='number' name='bookID' /><input name="delete_book", value='Delete' type='submit'/></p>
    </form>
    <hr>

	<br>

	<form action="book.php">
		<input type="submit" value="Back to Book Operations" />
	</form>

</body>
</html>