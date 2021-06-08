<html>
<head><strong><big>Author w/at Least N Books</big></strong>
    <style>
        label {
            width: 190px;
            display: inline-block;
        }
    </style>
    </head> 
<body>

<br/><form action='../result.php' method='post'>
        <label>No. of Books:     </label><input type='number' name='num_book' /><br/>
        <label>Order by:        <select name="order_col">
                                    <option value="NumberOfBooks">No. of Books</option>
                                    <option value="AverageRating">Average Rating</option>
                                        </select> </label>
                                <select name="order_by">
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                        </select>
                                 <br/>
        <input name="author_n_book_query", value='Search' type='submit'/></p>
    </form>
	
    <hr>

	<br>

	<form action="advanced_queries.php">
		<input type="submit" value="Back to Advanced Operations" />
	</form>

</body>
</html>