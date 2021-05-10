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
		$where_string = $where_string." and authors like '%".$authors."%'";
	}
	
	if(empty($average_rating) !== true){
		if(check_average_rating($average_rating) !== true){
			exit("average_rating must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		$where_string = $where_string." and average_rating = ".$average_rating;
	}
    
	if(empty($isbn) !== true){
		if(check_isbn($isbn) !== true){
			exit("isbn must be numeric!");
		}
		$where_string = $where_string." and isbn = ".$isbn;
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
   

	if(empty($bookID) !== true){
		if(check_bookID($bookID) !== true){
			exit("bookID must be numeric!<br><form action=\"index.php\"><input type=\"submit\" value=\"Back to Main Menu\" /></form>");
		}
		$where_string = "bookID = ".$bookID;
		$result = search($conn, $where_string, "borrows");
		if( $result != False){
			foreach( $result as $row){
				#echo $row["ReturnDate"];
				$database_return_date = $row["ReturnDate"];
				$date1 = new DateTime($my_borrow_date);
				$date2 = new DateTime($database_return_date);
				$diff = date_diff($date1, $date2)->d;
				if($diff > 0){
					echo "cannot borrow because this book's return date is ".$database_return_date;
				}	
			}
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