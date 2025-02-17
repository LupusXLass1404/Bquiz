<?php
    $row = $News -> find($_GET['id']);
?>
<pre>
<?=$row['text'];?>
</pre>

