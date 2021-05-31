<html>
<head><strong><big>Author Birth Country by Gender & Rating </big></strong>
    <style>
        label {
            width: 150;
            display: inline-block;
        }
    </style>
    </head> 
<body>

<br/><form action='result.php' method='post'>
        <label>Average Rating:     <select name="operation">
                                    <option value=">">></option>
                                    <option value="<"><</option>
                                        </select> </label><input type='decimal' name='average_rating' /><br/>
        <label>Gender:     <select name="gender">
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                        </select></label><br/>
        <label>Order by:        <select name="order_col">
                                    <option value="Bcountry">Country</option>
                                    <option value="numAuthors">Number of Authors</option>
                                        </select> </label>
                                <select name="order_by">
                                    <option value="asc">Ascending</option>
                                    <option value="desc">Descending</option>
                                        </select>
                                 <br/>
        <input name="author_nationality", value='Search' type='submit'/></p>
    </form>

    <hr>

	<br>

	<form action="advanced_queries.php">
		<input type="submit" value="Back to Advanced Operations" />
	</form>

</body>
</html>