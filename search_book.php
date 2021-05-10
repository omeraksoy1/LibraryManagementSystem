<html>
<head></head>
<body>

	<form action='result.php' method='post'>
        <label>bookID:         </label> <input type='number' name='bookID' /><br/>
        <label>title:        </label><input type='text' name='title' /><br/>
        <label>authors: </label><input type='text' name='authors' /><br/>
        <label>average_rating:    </label><input type='decimal' name='average_rating' /><br/>
        <label>isbn:  </label><input type='number' name='isbn' /><br/>
        <input name="search_book", value='Search' type='submit'/></p>
    </form>
	
    <hr>

	<br>

	<form action="book.php">
		<input type="submit" value="Back to Book Operations" />
	</form>

</body>
</html>