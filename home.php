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
    </style></head>
    <body>
    <center><big><big><big><big><strong>Library Management System</strong></big></big></big></big></center>

    <div class="row">
        <div class="column any" style="background-color:#FFFFFF;">
            <h2>Book Search</h2>
            <p> <form action='lib_result.php' method='post'>
                    <label>Book Title: </label><input type='text' name='population_insert' /><br/>
                    <input name="book_search", value='Search' type='submit'/></p>
    </form></p>
        </div>
        <div class="column any" style="background-color:#FFFFFF;">
            <h2>Author Search</h2>
            <p>Data..</p>
        </div>
        <div class="column any" style="background-color:#FFFFFF;">
            <h2>Publisher Search</h2>
            <p>Data..</p>
        </div>
        <div class="column any" style="background-color:#FFFFFF;">
            <h2>Column 4</h2>
            <p>Data..</p>
        </div>
        <div class="column any" style="background-color:#FFFFFF;">
            <h2>Column 5</h2>
            <p>Data..</p>
        </div>
    </div>

    </body>
</html>