<?php
	
$title = "Books that win awards";

require("template/top.tpl.php");
require_once("gb/controller/WinAwardController.php");

require_once ("gb/mapper/AwardMapper.php");
$awardController = new gb\controller\WinAwardController();
$awardController->process();

$mapper = new gb\mapper\AwardMapper();


if (isset($_POST["search"])&&!empty($_POST["from_time"])&&!empty($_POST["to_time"])){
$genre_awards = $awardController->getSearchResultGenres();
$country_awards = $awardController->getSearchResultCountries();
echo count($genre_awards)+count($country_awards) . " entries found"."<br>";}
else{
$genre_awards = $mapper->findAll();
$country_awards = $mapper->findAllOther();
 echo count($genre_awards)+count($country_awards) . " entries found"."<br>";
}
?>    
<form method="post">
<table style="width: 100%">

<tr>
    <td colspan="4">
    <table style="width: 100%">        
     
         <tr>
            <td>From time</td>
            <td><input type="text" name ="from_time"   ></td>
            <td>To time</td>
            <td><input type="text" name ="to_time" ></td>            
        </tr>
        <tr>
            <td >&nbsp;</td>            
            <td><input type ="submit" name="search" value="Search" ></td>
            <td >&nbsp;</td>
            <td >&nbsp;</td>
    
        </tr>
    </table>
    </td>
</table>
</form>


<table style="width: 100%">
    <tr>
        <td>Country name</td>
        <td>Genre name</td> 
        <td>Total number of books</td>
    </tr>
    <?php
    foreach($country_awards as $result) {
        ?>
        <tr>
            <td><?php echo $result->getCountry(); ?> </td>
            <td><?php echo ""; ?> </td>
            <td><?php echo $result->getTotal(); ?> </td>
        </tr>
        <?php
    }
    ?>
    <?php
    foreach($genre_awards as $result) {
        ?>
        <tr>
            <td><?php echo ""; ?> </td>
            <td><?php echo $result->getGenre(); ?> </td>
            <td><?php echo $result->getTotal(); ?> </td>
        </tr>
        <?php
    }
    ?>
</table>

<?php
	require("template/bottom.tpl.php");
?>