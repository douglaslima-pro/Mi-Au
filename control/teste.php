<?php

$id = "00015";
$senha = "douglas123";

echo "id: $id<br>senha: $senha";

$hash = sha1($id.$senha);

echo "<br><br>hash: $hash";

?>