<?php

require_once("gb/controller/AwardController.php");
$AwardController = new gb\controller\AwardController();
$AwardController->process();
$awards = $AwardController->getAwardInfo();

$title = "book_uri =" . $AwardController->getSelectedBookUri();
require("template/top.tpl.php");
?>

    <table style="width: 100%">
        <tr>
            <td>Award name</td>
            <td>Date</td>
            <td>Description</td>
            <td>Genre</td>
            <td>Country</td>
            <?php
            foreach($awards as $award) {
            ?>
        <tr>
            <td><?php echo $award->getAwardName(); ?></td>
            <td><?php echo $award->getDate(); ?></td>
            <td><?php echo $award->getDescription(); ?></td>
            <td><?php echo $award->getGenre(); ?></td>
            <td><?php echo $award->getCountryName(); ?></td>
        </tr>
        <?php
        }
        ?>
    </table>

<?php
require("template/bottom.tpl.php");
?>