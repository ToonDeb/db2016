<?php
namespace gb\controller;

require_once("gb/controller/PageController.php");
require_once("gb/mapper/BookMapper.php" );
require_once( "gb/mapper/Mapper.php" );

class BookController extends PageController {
    private $selectedBookUri;
	private $books;
    
    function process() {
        if (isset($_POST["search"])) {
			$mapper = new \gb\mapper\BookMapper();
			$con = $mapper->getConnectionManager();
			$selectStmt = "SELECT b.*,count(*) as chapters FROM (SELECT a.*,COUNT(*) as awards from book a, wins_award b, has_genre c where b.book_uri = a.uri and a.uri = c.book_uri and c.genre_uri = " ."\"" . $_POST["genre"] . "\" GROUP BY a.uri) as b, chapter where b.uri = chapter.book_uri GROUP BY b.uri";        
						//   SELECT b.*,count(*) as chapters FROM (SELECT a.*,COUNT(*) as awards from book a, wins_award b, has_genre c where b.book_uri = a.uri and a.uri = c.book_uri and c.genre_uri like "%Aviation%" GROUP BY a.uri) as b, chapter where b.uri = chapter.book_uri GROUP BY b.uri
			$books = $con->executeSelectStatement($selectStmt, array()); 
			$this->books = $mapper->getCollection($books);
        }

        
        if (isset($_POST["update"])) {
            $this->updateBookChapter($_GET["book_uri"], $_POST["chapter"], $_POST["new_text"]);
        }
        
        if (isset($_POST["add_chapter"])) {
            $this->addBookChapter($_GET["book_uri"], $_POST["chapter_number"], $_POST["new_text"]);
        }
        
        if (isset($_GET["book_uri"])) {
            $this->selectedBookUri = $_GET["book_uri"];
        }
    }
	
    
    function updateBookChapter($uri, $chapter_number, $new_text) {
        $mapper = new \gb\mapper\BookMapper();
        $con = $mapper->getConnectionManager();
        $updateStmt = "UPDATE chapter SET text = " ."\"" . $new_text . "\" WHERE book_uri =" ."\"" . $uri . "\" and chapter_number = " . $chapter_number .";";
        $con->executeUpdateStatement($updateStmt, array());
    }
    function addBookChapter($uri, $chapter_number, $new_text) {
        $mapper = new \gb\mapper\BookMapper();
        $con = $mapper->getConnectionManager();
        $insertStmt = "INSERT INTO chapter (book_uri, chapter_number, text) VALUES (" ."\"" . $uri . "\"," ."\"" . $chapter_number . "\", " ."\"" . $new_text . "\");";
        $con->executeUpdateStatement($insertStmt, array());
    }
    
    function getSelectedBookUri() {
        return $this->selectedBookUri;
    }
	
	function getSearchResult() {
        return $this->books;
    }
}

?>