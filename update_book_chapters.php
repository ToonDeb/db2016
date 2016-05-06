<?php

require_once("gb/mapper/ChapterMapper.php");
require_once("gb/controller/BookController.php");

$bookController = new gb\controller\BookController();
$bookController->process();

$title = "book_uri =" . $bookController->getSelectedBookUri();
$uri = $bookController->getSelectedBookUri();
require("template/top.tpl.php");


$uri = '"'.$uri.'"';
$chapterMapper = new gb\mapper\ChapterMapper($uri);
$allChapters = $chapterMapper->findAll();
?>
    <form method="post">
        <table style="width: 100%">

            <tr>
                <td colspan="2">
                    <table style="width: 100%">
                        <tr>
                            <td>Chapter</td>
                            <td style="width: 85%">
                                <select style="width: 50%" name="chapter" >
                                    <option value="0">--------Chapter ---------- </option>
                                    <?php
                                        foreach($allChapters as $chapter) {
                                            echo "<option value=\"", $chapter->getChapter_number(), "\">", $chapter->getChapter_number(), "</option>" ;
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Old text:</td>
                            <td><textarea name="old_text" cols="60" rows="6">
                                    <?php

                                    ?>
                                </textarea></td>
                            
                        </tr>
                        <tr>
                            <td>New text:</td>
                            <td><textarea name="new_text" cols="60" rows="6"></textarea></td>
                        </tr>
                        <tr>
                            <td >&nbsp;</td>
                            <td><input type ="submit" name="update" value="Update" ></td>
                        </tr>
                    </table>
                </td>
        </table>
    </form>



<?php
require("template/bottom.tpl.php");
?>