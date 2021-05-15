<?php


function check_bookID($bookID){
    return is_numeric($bookID);
}

function check_title($title){
    return strlen($title) > 0;
}

function check_authors($authors){
    return strlen($authors) > 0;
}

function check_average_rating($average_rating){
    return is_numeric($average_rating);
}

function check_isbn($isbn){
    return is_numeric($isbn);
}

function is_contains($conn, $string, $needle, $table_name){
    $is_contains = False;
	$sql = "SELECT * FROM ".$table_name." WHERE ".$needle." = ".$string.";";
    if ($result = mysqli_query($conn, $sql)) {
		$rowCount = mysqli_num_rows($result);
		if( $rowCount > 0){
			return True;
		}else{
			return False;
		}
    }
    return False;
}

function insert_book($conn, $bookID, $title, $authors, $average_rating, $isbn){
    $sql = "INSERT INTO books(bookID, title, authors, average_rating, isbn) VALUES('$bookID', '$title', '$authors', '$average_rating', '$isbn');";
    if ($result = mysqli_query($conn, $sql)) {
        echo "<br>Book inserted successfully<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
    } else {
        echo "<br>Error inserting book: " . $conn->error . "<br>";
    }
}

function remove_book($conn, $bookID){
    $sql = "DELETE FROM books WHERE bookID='$bookID'";
    if ($result = mysqli_query($conn, $sql)) {
        echo "<br>Book deleted successfully<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
    } else {
        echo "Error deleting book: " . $conn->error;
    }
}

function update_borrow($conn, $bookID, $SID, $BorrowDate, $my_return_date, $LID){
	$sql = "UPDATE borrows SET ReturnDate = '".$my_return_date."', LID_return = ".$LID." WHERE bookID=".$bookID." and SID = ".$SID." and BorrowDate = '".$BorrowDate."'";
    #echo $sql;
	if ($result = mysqli_query($conn, $sql)) {
        echo "<br>Borrow updated successfully!";
    } else {
        echo "Error updating borrow: " . $conn->error;
    }
}

function insert_student($conn, $SID, $Name, $Surname, $Department, $Entry_Year){
    $sql = "INSERT INTO students(SID, Name, Surname, Department, Entry_Year) VALUES('$SID', '$Name', '$Surname', '$Department', '$Entry_Year');";
    if ($result = mysqli_query($conn, $sql)) {
        echo "<br>Student inserted successfully<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
    } else {
        echo "<br>Error inserting student: " . $conn->error . "<br>";
    }
}

function insert_borrow($conn, $bookID, $SID, $my_borrow_date, $my_return_date, $LID){
	$sql = "INSERT INTO borrows(bookID, SID, BorrowDate, ReturnDateDeadline, LID_borrow) VALUES('$bookID', '$SID', '$my_borrow_date', '$my_return_date', '$LID');";
    if ($result = mysqli_query($conn, $sql)) {
        echo "<br>Borrow operation is successful!";
		echo "<br>Your return date deadline is ".$my_return_date;
		echo "<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
	} else {
        echo "<br>Error in borrow: " . $conn->error . "<br>";
    }
}

function remove_student($conn, $SID){
    $sql = "DELETE FROM students WHERE SID='$SID'";
    if ($result = mysqli_query($conn, $sql)) {
        echo "<br>Student deleted successfully<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
    } else {
        echo "Error deleting student: " . $conn->error;
    }
}

function check_SID($SID){
    return is_numeric($SID);
}

function check_Name($Name){
    return strlen($Name) > 0;
}

function check_Surname($Surname){
    return strlen($Surname) > 0;
}

function check_Department($Department){
    return strlen($Department) > 0;
}

function check_Entry_Year($Entry_Year){
    return is_numeric($Entry_Year);
}

# control functions for author

function check_author_name($name) {
    return strlen($name) > 0;
}

function check_author_bdate($year) {
    return is_numeric($year) and $year < 2010;
}

function check_author_country($country) {
    return strlen($country) > 0;
}

function check_author_gender($gender) {
    return strlen($gender) > 0 and ctype_alpha($gender);
}

function search($conn, $where_string, $table_name){
    $is_contains = False;
	$sql = "SELECT * FROM ".$table_name." WHERE ".$where_string.";";
	#echo $sql;
    if ($result = mysqli_query($conn, $sql)) {
		$rowCount = mysqli_num_rows($result);
		if( $rowCount > 0){
			#return mysqli_fetch_row($result);
			return $result;
		}else{
			return False;
		}
    }
    return False;
}

function print_table($table_name, $result){

    if ($table_name === 'books'){

        ?><br>

        <table border='1'>

        <tr>

        <th>bookID</th>

        <th>title</th>

        <th>authors</th>

        <th>average_rating</th>

        <th>isbn</th>

        </tr>

        <?php


        foreach($result as $row){

            echo "<tr>";

            echo "<td>" . $row['bookID'] . "</td>";

            echo "<td>" . $row['title'] . "</td>";

            echo "<td>" . $row['authors'] . "</td>";

            echo "<td>" . $row['average_rating'] . "</td>";

            echo "<td>" . $row['isbn'] . "</td>";

            echo "</tr>";
        }

        echo "</table>";
    }

    if ($table_name === 'students'){

        ?><br>

        <table border='1'>

        <tr>

        <th>SID</th>

        <th>Name</th>

        <th>Surname</th>

        <th>Department</th>

        <th>Entry_Year</th>

        <th>Mail</th>

        </tr>

        <?php


        foreach($result as $row){

            echo "<tr>";

            echo "<td>" . $row['SID'] . "</td>";

            echo "<td>" . $row['Name'] . "</td>";

            echo "<td>" . $row['Surname'] . "</td>";

            echo "<td>" . $row['Department'] . "</td>";

            echo "<td>" . $row['Entry_Year'] . "</td>";

            echo "<td>" . $row['Mail'] . "</td>";

            echo "</tr>";
        }

        echo "</table>";
    }

}
