<html>
<head><strong><big>Average Author Age by Average Rating and Category </big></strong>
    <style>
        label {
            width: 150px;
            display: inline-block;
        }
    </style>
    </head> 
<body>

<br/><form action='result.php' method='post'>
        <label>Average Rating:     <select name="operation">
                                    <option value="greater">></option>
                                    <option value="less"><</option>
                                        </select> </label><input type='decimal' name='average_rating' /><br/>
        <label>Order by:        <select name="order_col">
                                    <option value="category">Category</option>
                                    <option value="Average_Age">Avg. Age</option>
                                        </select> </label>
                                <select name="order_by">
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                        </select>
                                 <br/>
        <input name="average_age_by_rating", value='Search' type='submit'/></p>
    </form>
	
    <hr>

	<br>

	<form action="advanced_queries.php">
		<input type="submit" value="Back to Advanced Operations" />
	</form>

</body>
</html>