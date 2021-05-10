<html>
<head><strong><big>Book Search</big></strong>
    <style>
        label {
            width: 100px;
            display: inline-block;
        }
    </style>
    </head> 
<body>

<br/><form action='result.php' method='post'>
        <label>ID:              </label><input type='number' name='bookID' /><br/>
        <label>Title:           </label><input type='text' name='title' /><br/>
        <label>Authors:         </label><input type='text' name='authors' /><br/>
        <label>Rating:    <select name="operation">
                                <option value="equal">=</option>
                                <option value="greater">></option>
                                <option value="less"><</option>
                                    </select>
                                    </label><input type='decimal' name='average_rating' /><br/>
        <label>ISBN:            </label><input type='number' name='isbn' /><br/>
        <input name="search_book", value='Search' type='submit'/></p>
    </form>
	
    <hr>

	<br>

	<form action="book.php">
		<input type="submit" value="Back to Book Operations" />
	</form>

</body>
</html>