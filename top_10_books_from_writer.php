<?php

$title = "Top 10 books writen by a writer";

require("template/top.tpl.php");

//require_once ("gb/mapper/SpouseMapper.php");

//$mapper = new gb\mapper\SpouseMapper();

//$allSpouses = $mapper->findAll();

//require_once("gb/controller/BookController.php");
//require_once("gb/domain/Genre.php");
//require_once("gb/mapper/GenreMapper.php");
//require_once("gb/domain/Book.php");
require_once("gb/mapper/WriterMapper.php");
require_once("gb/domain/Writer.php");
require_once("gb/controller/WonAwardsController.php");

$wonAwardsController = new gb\controller\WonAwardsController();
$wonAwardsController->process();


$writerMapper = new gb\mapper\WriterMapper();
$allWriters = $writerMapper->getWritersWithAward();

?>
    <form method="post">
        <table style="width: 100%">

            <tr>
                <td colspan="4">
                    <table style="width: 100%">
                        <tr>
                            <td>Writer</td>
                            <td colspan="3" style="width: 85%">
                                <select style="width: 50%" name="writer">
                                    <option value="">--------Writers ---------- </option>
                                    <?php
                                    foreach($allWriters as $writer) {
                                        echo "<option value=\"", $writer->getUri(), "\">", $writer->getFullName(), "</option>" ;
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

$books = $wonAwardsController->getSearchResult();
print count($books) . " books found";
if (count($books) > 0) {
    ?>
    <table style="width: 100%">
        <tr>
            <td>Book name</td>
            <td>Amount</td>
            <?php
            foreach($books as $book) {
            ?>
        <tr>
            <td><a href=awards_by_book.php?book_uri=<?php echo $book->getUri();?>> <?php echo $book->getBookName(); ?></a></td>
            <td><?php echo $book->getAmount(); ?></td>

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