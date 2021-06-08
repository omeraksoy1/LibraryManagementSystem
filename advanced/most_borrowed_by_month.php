<html>
<head><strong><big>Most Borrowed Category by Month</big></strong>
    <style>
        label {
            width: 150px;
            display: inline-block;
        }
    </style>
    </head> 
<body>

<br/><form action='../result.php' method='post'>
        <label>Order by:        <select name="order_col">
                                    <option value="Month">Month</option>
                                    <option value="NumOfBorrow">Number of Borrows</option>
                                        </select> </label>
                                <select name="order_by">
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                        </select>
                            <br/>
                <input name="most_borrowed", value='Display' type='submit'/></p>
    </form>

    <hr>

	<br>

	<form action="advanced_queries.php">
		<input type="submit" value="Back to Advanced Operations" />
	</form>

</body>
</html>