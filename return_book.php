<html>
<head><strong><big>Return Book</big></strong>
    <style>
        label {
            width: 100px;
            display: inline-block;
        }
    </style>
    </head>
<body>

	<form action='result.php' method='post'>
        <label>Book ID:         </label><input type='number' name='bookID' /><br/>
        <label>Student ID:        </label><input type='number' name='SID' /><br/>
        <label>Return Date: </label><input type='date' name='ReturnDate'/><br/>
        <label>Librarian ID:        </label><input type='number' name='LID' /><br/>
		<input name="return_book", value='Checkout' type='submit'/></p>
    </form>
	
    <hr>

	<br>

	<form action="book.php">
		<input type="submit" value="Back to Book Operations" />
	</form>

</body>
</html>