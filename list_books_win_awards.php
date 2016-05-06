<?php
	
$title = "Books that win awards";

require("template/top.tpl.php");

require_once ("gb/mapper/AwardMapper.php");

$mapper = new gb\mapper\AwardMapper();

$genre_awards = $mapper->findAll();

$country_awards = $mapper->findAllOther();

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
            <td><?php echo $result->getName(); ?> </td>
            <td><?php echo " "; ?> </td>
            <td><?php echo $result->getTotal(); ?> </td>
        </tr>
        <?php
    }
    ?>
    <?php
    foreach($genre_awards as $result) {
        ?>
        <tr>
            <td><?php echo " "; ?> </td>
            <td><?php echo $result->getName(); ?> </td>
            <td><?php echo $result->getTotal(); ?> </td>
        </tr>
        <?php
    }
    ?>
</table>

<?php
	require("template/bottom.tpl.php");
?>