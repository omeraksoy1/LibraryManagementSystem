<html>
<head><strong><big>No. of Books by a Certain Age </big></strong>
    <style>
        label {
            width: 190px;
            display: inline-block;
        }
    </style>
    </head> 
<body>

<br/><form action='result.php' method='post'>
        <label>Age:      </label><input type='number' name='age' /><br/>
        <label>No. of Books:    <select name="operation">
                                    <option value="greater">></option>
                                        </select> </label><input type='number' name='no_of_books' /><br/>
        <label>Order by:        <select name="order_col">
                                    <option value="NumberOfBooks">No. of Books</option>
                                    <option value="Author">Name</option>
                                        </select> </label>
                                <select name="order_by">
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                        </select>
                                 <br/>
        <input name="n_book_before_age", value='Search' type='submit'/></p>
    </form>
	
    <hr>

	<br>

	<form action="advanced_queries.php">
		<input type="submit" value="Back to Advanced Operations" />
	</form>

</body>
</html>