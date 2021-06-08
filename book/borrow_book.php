<html>
<head><strong><big>Book Checkout</big></strong>
    <style>
        label {
            width: 100px;
            display: inline-block;
        }
    </style>
    </head>
<body>

	<form action='../result.php' method='post'>
        <label>Book ID:         </label><input type='number' name='bookID' /><br/>
        <label>Student ID:        </label><input type='number' name='SID' /><br/>
        <label>Borrow Date: </label><input type='date' name='BorrowDate' /><br/>
        <label>Librarian ID (borrow):        </label><input type='number' name='LID' /><br/>
		<input name="borrow_book", value='Checkout' type='submit'/></p>
    </form>
	
    <hr>

	<br>

	<form action="book.php">
		<input type="submit" value="Back to Book Operations" />
	</form>

</body>
</html>