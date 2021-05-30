<?php

require_once 'dbConnect.php';
require_once 'functions.php';

if (isset($_POST['insert_book'])){

    $bookID = $_POST["bookID"];
    $title = $_POST["title"];
    $authors = $_POST["authors"];
    $average_rating = $_POST["average_rating"];
    $isbn = $_POST["isbn"];

    if(check_bookID($bookID) !== true){
        exit("bookID must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }

    if(check_title($title) !== true){
        exit("title cannot be empty!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }

    if(check_authors($authors) !== true){
        exit("authors cannot be empty!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }

    if(check_average_rating($average_rating) !== true){
        exit("average_rating must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }

    if(check_isbn($isbn) !== true){
        exit("isbn must be numeric!");
    }

    $result = is_contains($conn, $bookID, "bookID", "books");
    if( $result == true){
		exit("<br>This bookID already exists!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}
	
    insert_book($conn, $bookID, $title, $authors, $average_rating, $isbn);
}


if (isset($_POST['delete_book'])){

    $bookID = $_POST["bookID"];

    if(check_bookID($bookID) !== true){
        exit("<br>bookID must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }
	
	$result = is_contains($conn, $bookID, "bookID", "books");
    if( $result == false){
		exit("<br>This bookID does not exist!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}
	
    remove_book($conn, $bookID);
}

if (isset($_POST['search_book'])){

    $bookID = $_POST["bookID"];
    $title = $_POST["title"];
    $authors = $_POST["authors"];
    $average_rating = $_POST["average_rating"];
	$operation = $_POST["operation"];
	#echo $operation;
    $isbn = $_POST["isbn"];

	$where_string = "";

	if(empty($bookID) !== true){
		if(check_bookID($bookID) !== true){
			exit("bookID must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		$where_string = "bookID = ".$bookID;
	}
	
	if(empty($title) !== true){
		if(check_title($title) !== true){
			exit("title cannot be empty!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		if(empty($where_string) !== true){
			$where_string = "title like '%".$title."%' and ".$where_string;
		}else{
			$where_string = "title like '%".$title."%'";
		}
	}
	
	if(empty($authors) !== true){
		if(check_authors($authors) !== true){
			exit("authors cannot be empty!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		if(empty($where_string) !== true){
			$where_string = "authors like '%".$authors."%' and ".$where_string;
		}else{
			$where_string = "authors like '%".$authors."%'";
		}
	}
	
	if(empty($average_rating) !== true){
		if(check_average_rating($average_rating) !== true){
			exit("average_rating must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		if( $operation == "greater"){
			$operation_symbol = ">";
		}elseif( $operation == "less"){
			$operation_symbol = "<";
		}elseif( $operation == "equal"){
			$operation_symbol = "=";
		}
		
		if(empty($where_string) !== true){
			$where_string = "average_rating ".$operation_symbol." ".$average_rating." and ".$where_string;
		}else{
			$where_string = "average_rating ".$operation_symbol." ".$average_rating;
		}
	}
    
	if(empty($isbn) !== true){
		if(check_isbn($isbn) !== true){
			exit("isbn must be numeric!");
		}
		if(empty($where_string) !== true){
			$where_string = "isbn = ".$isbn." and ".$where_string;
		}else{
			$where_string = "isbn = ".$isbn;
		}
	}
    
	if( empty($where_string)){
		exit("Fill the textboxes!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}
    $result = search($conn, $where_string, "books");
    if( $result != False){
		print_table("books", $result);
		echo "<form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
	}else{
		exit("Not found!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}
}

if (isset($_POST['borrow_book'])){

    $bookID = $_POST["bookID"];
    $SID = $_POST["SID"];
    $my_borrow_date = $_POST["BorrowDate"];
    $LID = $_POST["LID"];

	if(empty($bookID) !== true){
		if(check_bookID($bookID) !== true){
			exit("bookID must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		$result = is_contains($conn, $bookID, "bookID", "books");
		if( $result == false){
			exit("<br>This bookID does not exist!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		$result = is_contains($conn, $SID, "SID", "students");
		if( $result == false){
			exit("<br>This SID does not exist!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		$result = is_contains($conn, $LID, "LID", "librarian");
		if( $result == false){
			exit("<br>This LID does not exist!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		
		$date1 = new DateTime($my_borrow_date);
		$date2 = new DateTime(date("Y-m-d")); #date method returns system's current date.
		$diff = $date1->diff($date2);
		#echo $diff->format("%r%a");
		if($diff->format("%r%a") > 0){
			echo "cannot borrow because borrow date cannot be a past date!";
			exit("<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}	
		
		$where_string = "bookID = ".$bookID;
		$result = search($conn, $where_string, "borrows");
		if( $result != False){
			foreach( $result as $row){
				if( is_null($row["ReturnDate"])){
					#echo $row["ReturnDateDeadline"];
					#database_return_date = $row["ReturnDateDeadline"];
					echo "Cannot borrow because this book is not returned yet.";
					exit("<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
				}else{
					$database_return_date = $row["ReturnDate"];
					$date1 = new DateTime($my_borrow_date);
					$date2 = new DateTime($database_return_date);
					$diff = $date1->diff($date2);
					#echo $diff->format("%r%a");
					if($diff->format("%r%a") > 0){
						echo "cannot borrow because this book's return date is ".$database_return_date;
						exit("<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
					}	
				}
				
			}
			$my_return_date = strtotime("+7 day", strtotime($my_borrow_date));
			#echo $my_return_date;
			#echo date('Y-m-d', $my_return_date);
			insert_borrow($conn, $bookID, $SID, $my_borrow_date, date('Y-m-d', $my_return_date), $LID); 
		}else{
			$my_return_date = strtotime("+7 day", strtotime($my_borrow_date));
			#echo $my_return_date;
			#echo date('Y-m-d', $my_return_date);
			insert_borrow($conn, $bookID, $SID, $my_borrow_date, date('Y-m-d', $my_return_date), $LID);
		}
	}
}

if (isset($_POST['return_book'])){

    $bookID = $_POST["bookID"];
    $SID = $_POST["SID"];
    $my_return_date = $_POST["ReturnDate"];
    $LID = $_POST["LID"];

	if(empty($bookID) !== true){
		if(check_bookID($bookID) !== true){
			exit("bookID must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		$result = is_contains($conn, $bookID, "bookID", "books");
		if( $result == false){
			exit("<br>This bookID does not exist!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		$result = is_contains($conn, $SID, "SID", "students");
		if( $result == false){
			exit("<br>This SID does not exist!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		$result = is_contains($conn, $LID, "LID", "librarian");
		if( $result == false){
			exit("<br>This LID does not exist!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		
		$where_string = "bookID = ".$bookID." and SID = ".$SID." and ReturnDate is NULL";
		$result = search($conn, $where_string, "borrows");
		if( $result != False){
			$row = mysqli_fetch_row($result);
			$deadline = $row[3];
			$date1 = new DateTime($my_return_date);
			$date2 = new DateTime($deadline);
			$diff = $date1->diff($date2); #date2 - date1
			#echo $diff->format("%r%a");
			if($diff->format("%r%a") >= 0){ #no penalty
				update_borrow($conn, $bookID, $SID, $row[2], $my_return_date, $LID, 0);
				echo "Your book is returned without penalty!";
				exit("<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
			}else{ #penalty!
				$penalty = -0.5 * $diff->format("%r%a");
				update_borrow($conn, $bookID, $SID, $row[2], $my_return_date, $LID);
				echo "Your return deadline was ".$deadline;
				echo "<br>Your real return date is ".$my_return_date;
				echo "<br>You are late for ".(-1*$diff->format("%r%a"))." days.";
				echo "<br>You have return penalty: ".$penalty." TL";
				exit("<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
			}
		}else{
			exit("<br>You do not have any borrow record for this book!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
	}
}

if (isset($_POST['insert_student'])){

    $SID = $_POST["SID"];
    $Name = $_POST["Name"];
    $Surname = $_POST["Surname"];
    $Department = $_POST["Department"];
    $Entry_Year = $_POST["Entry_Year"];

    if(check_SID($SID) !== true){
        exit("SID must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }

    if(check_Name($Name) !== true){
        exit("Name cannot be empty!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }

    if(check_Surname($Surname) !== true){
        exit("Surname cannot be empty!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }

    if(check_Department($Department) !== true){
        exit("Department cannot be empty!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }

    if(check_Entry_Year($Entry_Year) !== true){
        exit("Entry_Year must be numeric!");
    }

    $result = is_contains($conn, $SID, "SID", "students");
    if( $result == true){
		exit("<br>This SID already exists!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}
	
    insert_student($conn, $SID, $Name, $Surname, $Department, $Entry_Year);
}


if (isset($_POST['delete_student'])){

    $SID = $_POST["SID"];

    if(check_SID($SID) !== true){
        exit("<br>SID must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }
	
	$result = is_contains($conn, $SID, "SID", "students");
    if( $result == false){
		exit("<br>This SID does not exist!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}
	
    remove_student($conn, $SID);
}

if (isset($_POST['search_student'])) {

	$SID = $_POST["SID"];

	if(check_SID($SID) !== true){
        exit("<br>SID must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
    }
	$sql = "SELECT * FROM students WHERE SID='$SID'";

    if ($result = mysqli_query($conn, $sql)) {
		echo print_table("students", $result);
        echo "<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
    } else {
        echo "Error finding student: " . $conn->error;
    }
	
}

if (isset($_POST['insert_author'])) {

	$name = $_POST["author_name"];
	$year = $_POST["author_bdate"];
	$country = $_POST["author_country"];
	$gender = $_POST["author_gender"];

	if (check_author_name($name) !== true) {
		exit("<br>Name cannot be empty!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}

	if (check_author_bdate($year) !== true) {
		exit("<br>Year must be numeric and less than 2010!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}

	if (check_author_country($country) !== true) {
		exit("<br>Country cannot be empty!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}

	if (check_author_gender($gender) !== true) {
		exit("<br>Gender cannot be empty or numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}

	$sql = "INSERT INTO authors
				VALUES ('$name', '$year', '$country', '$gender')";
	
	if ($result = mysqli_query($conn, $sql)) {
		echo "<br>Author inserted successfully<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
	} else {
		echo "Error inserting author: " . $conn->error;
	}
}

if (isset($_POST['delete_author'])) {

	$name = $_POST["author_name"];

	if (check_author_name($name) !== true) {
		exit("<br>Name cannot be empty!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}

	$exists = "SELECT * FROM authors WHERE Author LIKE ".$name.";";

	if ($exists = mysqli_query($conn, $exists)) {
		exit("<br>This author does not exist!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}
	
	$sql = "DELETE FROM authors WHERE Author LIKE '$name';";

	if ($result = mysqli_query($conn, $sql)) {
		echo "<br>Author deleted successfully<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
	} else {
        echo "Error deleting author: " . $conn->error;
    }
}

if (isset($_POST['author_n_book_query'])) {
	
	$numBook = $_POST["num_book"];
	$order = $_POST["order_by"];
	$orderCol = $_POST["order_col"];

	if (is_numeric($numBook) !== true) {
		exit("<br>No. of Books should be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}

	$sql = "SELECT B.authors as Author, count(*) as NumberOfBooks, round(avg(B.average_rating), 2) as AverageRating
			FROM books as B, authors as A
			WHERE B.authors=A.author
			GROUP BY A.author
			HAVING count(*) > $numBook
			ORDER BY $orderCol $order";
	
	if ($result = mysqli_query($conn, $sql)) {
		echo print_table('author_n', $result);
		echo "<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
	} else {
		echo "Error finding authors: " . $conn->error;
	}
}

if (isset($_POST['average_age_by_rating'])) {

	$rating = $_POST["average_rating"];
	$order = $_POST["order_by"];
	$orderCol = $_POST["order_col"];
	$comparison = $_POST["operation"];

	if (is_numeric($rating) !== true) {
		exit("<br>Rating should be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}

	$sql = "SELECT Category, AVG(publication_date - Bdate) as Average_Age
			FROM books B,authors A, section S
			WHERE B.authors=A.Author and S.sectionid=B.SectionID and average_rating ".$comparison." $rating
			GROUP BY Category
			ORDER BY $orderCol $order";

	if ($result = mysqli_query($conn, $sql)) {
		echo print_table('category_age', $result);
		echo "<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
	} else {
		echo "Error displaying data: " . $conn->error;
	}
}

if (isset($_POST['n_book_before_age'])) {

	$numBook = $_POST["no_of_books"];
	$age = $_POST["age"];
	$order = $_POST["order_by"];
	$orderCol = $_POST["order_col"];

	if (is_numeric($numBook) !== true) {
		exit("<br>No. of Books should be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}

	if (is_numeric($age) !== true) {
		exit("<br>Age should be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
	}

	$sql = "SELECT authors as Author, count(*) as NumberOfBooks
			FROM books B,authors A
			WHERE B.authors=A.Author AND (B.publication_date-Bdate)<$age
			AND A.Author in (	SELECT authors
								FROM books B
								GROUP BY authors
								HAVING count(*)>$numBook)
			GROUP BY authors
			HAVING count(*)>$numBook
			ORDER BY $orderCol $order";

	if ($result = mysqli_query($conn, $sql)) {
		echo print_table('n_book_before_age', $result);
		echo "<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
	} else {
		echo "Error finding authors: " . $conn->error;
	}
}

if (isset($_POST['most_borrowed'])) {

	$sql = "SELECT Month as Month, category, max(C) as NumOfBorrow
			FROM (SELECT category, count(*) as C, MONTH(BorrowDate) as Month
					FROM borrow bo, Books B, section S
					WHERE bo.bookID=B.bookID and B.SectionID=S.sectionid
					GROUP BY MONTH(BorrowDate), Category) as e3
			GROUP BY Month 
			ORDER BY Month";

	if ($result = mysqli_query($conn, $sql)) {
		echo print_table('borrowed', $result);
		echo "<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>";
	} else {
		echo "Error finding authors: " . $conn->error;
	}

}

