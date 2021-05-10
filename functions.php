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

function insert_student($conn, $SID, $Name, $Surname, $Department, $Entry_Year){
    $sql = "INSERT INTO students(SID, Name, Surname, Department, Entry_Year) VALUES('$SID', '$Name', '$Surname', '$Department', '$Entry_Year');";
    if ($result = mysqli_query($conn, $sql)) {
        echo "<br>Student inserted successfully<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
    } else {
        echo "<br>Error inserting student: " . $conn->error . "<br>";
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

function search($conn, $where_string, $table_name){
    $is_contains = False;
	$sql = "SELECT * FROM ".$table_name." WHERE ".$where_string.";";
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

}







function diff_lang($conn, $country1, $country2){

    $result = Null;
    ########
    #PLease enter your code here

    ########
    return $result;
}

function diff_lang_join($conn, $countryCode1, $countryCode2){

    $result = Null;
    ########
    #PLease enter your code here

    ########
    return $result;
}

function aggregate_countries($conn,$agg_type, $country_name){

    $result = Null;
    ########
    #PLease enter your code here

    ########
    return $result;
}





function insert_city($conn,$cid, $name, $country_code, $district, $population){


    $sql = "INSERT INTO city(ID, Name, CountryCode, District, Population) VALUES('$cid', '$name', '$country_code', '$district','$population');";
    if ($conn->query($sql) === TRUE) { #We used different function to run our query.
        echo "<br>Record updated successfully<br>";
    } else {
        echo "<br>Error updating record: " . $conn->error . "<br>";
    }
}

function remove_city($conn,$cid){
    $sql = "DELETE FROM city WHERE ID='$cid'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

}

function manipulate_city($conn,$cid,$name){

    $sql = "UPDATE city SET Name='$name' WHERE ID='$cid'" ;
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

}
