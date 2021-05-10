<html>
<title>Home</title>
    <head><style>
    /* Set additional styling options for the columns */
    .column {
    float: left;
    }

    /* Set width length for the left, right and middle columns */
    .any {
    width: 20%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }

    .vl {
    border-left: 2px solid black;
    height: 500px;
    left: 20%;
    }
    
    </style></head>
    
    <body>
    <center><big><big><big><big><strong>Library Management System</strong></big></big></big></big></center>

    <div class="row">
        <div class="column any" style="background-color:#FFFFFF;">
            <h2>Book Search</h2>
            <p><strong>By Title</strong></p>
                <form action='result.php' method='post'>
                    <label>Book Title: </label><input type='text' name='book_title'/>
                    <input name="book_search_title", value='Search' type='submit'/></p><br/>
                </form>
            <p><strong>By ID Number</strong></p>
                <form action='result.php' method='post'>
                        <label>Book ID: </label><input type='text' name='book_id'/>
                        <input name="book_search_id", value='Search' type='submit'/></p><br/>
                    </form>
            <p><strong>By Rating</strong></p>
                <form action='result.php' method='post'>
                        <label>Rating: </label><input type='text' name='book_rating'/>
                        <select name="operation">
                            <option value="greater">MORE THAN</option>
                            <option value="less">   LESS THAN</option>
                            <option value="equal">  EXACTLY</option>
                            </select>
                        <input name="book_search_rating", value='Search' type='submit'/></p><br/>
                    </form>
        </div>
        <div class="column any" style="background-color:#FFFFFF;">
            <h2>Author Search</h2>
            <p><strong>By Name</strong></p>
                <form action='result.php' method='post'>
                    <label>Author Name: </label><input type='text' name='author_name'/><br/>
                    <input name="author_search_name", value='Search' type='submit'/></p> <br/>
                </form>
        </div>
        <div class="column any" style="background-color:#FFFFFF;">
            <h2>Publisher Search</h2>
            <p></p>
        </div>
        <div class="column any" style="background-color:#FFFFFF;">
            <h2>Student Search</h2>
            <p></p>
        </div>
        <div class="column any" style="background-color:#FFFFFF;">
            <h2>Column 5</h2>
            <p></p>
        </div>
    </div>

    </body>
</html>