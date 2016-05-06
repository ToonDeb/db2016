<?php
	
$title = "Update chapters of books";

require("template/top.tpl.php");
require_once("gb/controller/BookController.php");
require_once("gb/domain/Genre.php");
require_once("gb/mapper/GenreMapper.php");
require_once("gb/domain/Book.php");

$bookController = new gb\controller\BookController();
$bookController->process();

$genreMapper = new gb\mapper\GenreMapper();
$allGenres = $genreMapper->findAll();

?>    
<form method="post">
<table style="width: 100%">

<tr>
    <td colspan="4">
    <table style="width: 100%">        
        <tr>
            <td>Genre</td>            
            <td colspan="3" style="width: 85%">
                <select style="width: 50%" name="genre">
                    <option value="">--------Book genres ---------- </option>
   
                    <?php
                        foreach($allGenres as $genre) {
                            echo "<option value=\"", $genre->getUri(), "\">", $genre->getGenreName(), "</option>" ;
                        }
                    
                    ?>                    
                </select>
            </td>          
        </tr>
        <tr>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
            <td><input type ="submit" name="search" value="Search" ></td>
            <td >&nbsp;</td>
    
        </tr>
    </table>
    </td>
</table>
</form>

<?php

   $books = $bookController->getSearchResult();
    print count($books) . " books found";
    if (count($books) > 0) {
?>
<table style="width: 100%">
    <tr>
        <td>Book name</td>
        <td>Chapters</td>
        <td>Add chapters</td>     </tr>

<?php
        foreach($books as $book) {
 ?>		
    
    <tr>
	
        <td><a href="update_book_chapters.php?book_uri=<?php echo $book->getUri(); ?>"><?php echo $book->getBookName(); ?></a></td>
        <td><a href="update_book_chapters.php?book_uri=<?php echo $book->getUri(); ?>"><?php echo $book->getChapters(); ?></a></td>
        <td><a href="add_book_chapters.php?book_uri=<?php echo $book->getUri(); ?>">Add chapter</a></td>
    </tr>
    
    <?php        
        }
?>
</table>
<?php        
        }
?>
<?php
	require("template/bottom.tpl.php");
?>