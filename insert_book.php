<html>
<head><strong><big>Insert Book</big></strong>
    <style>
        label {
            width: 80px;
            display: inline-block;
        }
    </style>
    </head>
<body>

    <form action='result.php' method='post'>
        <label>ID:         </label><input type='number' name='bookID' /><br/>
        <label>Title:        </label><input type='text' name='title' /><br/>
        <label>Authors: </label><input type='text' name='authors' /><br/>
        <label>Rating:    </label><input type='number' name='average_rating' /><br/>
        <label>ISBN:  </label><input type='number' name='isbn' /><br/>
        <input name="insert_book", value='Insert' type='submit'/></p>
    </form>
    <hr>

	<br>

	<form action="book.php">
		<input type="submit" value="Back to Book Operations" />
	</form>

</body>
</html>