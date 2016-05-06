<?php
	
$title = "Writers whose spouses are writers";

require("template/top.tpl.php");

require_once ("gb/mapper/SpouseMapper.php");

$mapper = new gb\mapper\SpouseMapper();

$allSpouses = $mapper->findAll();
?>    
<form method="post">
<table style="width: 100%">

<tr>
        <td>Writer</td>
        <td>Spouse</td>
        <td>From time</td>  
        <td>To time </td>
    </tr>
    <?php
        foreach($allSpouses as $spouse) {
            ?>
            <tr>
                <td><?php echo $spouse->getWriterUri(); ?> </td>
                <td><?php echo $spouse->getPersonUri(); ?> </td>
                <td><?php echo $spouse->getFrom(); ?> </td>
                <td><?php echo $spouse->getTo(); ?> </td>
            </tr>
            <?php
        }
            ?>
</table>
</form>

<?php
	require("template/bottom.tpl.php");
?>