<html>
<head></head>
<body>

	<form action='result.php' method='post'>
        <label>bookID:         </label> <input type='number' name='bookID' /><br/>
        <label>SID:        </label><input type='number' name='SID' /><br/>
        <label>BorrowDate: </label><input type='date' name='BorrowDate' /><br/>
        <input name="borrow_book", value='Borrow' type='submit'/></p>
    </form>
	
    <hr>

	<br>

	<form action="book.php">
		<input type="submit" value="Back to Book Operations" />
	</form>

</body>
</html>