<html>
<head><strong><big>Insert Author</big></strong>
    <style>
        label {
            width: 120px;
            display: inline-block;
        }
    </style>
    </head>
<body>

    <form action='result.php' method='post'>
        <label>Name:                </label><input type='text' name='author_name' /><br/>
        <label>Year of Birth:       </label><input type='text' name='author_bdate' /><br/>
        <label>Country of Birth:    </label><input type='text' name='author_country' /><br/>
        <label>Gender:              </label><input type='text' name='author_gender' /><br/>
        <input name="insert_author", value='Insert' type='submit'/></p>
    </form>
    <hr>

	<br>

	<form action="author.php">
		<input type="submit" value="Back to Author Operations" />
	</form>

</body>
</html>