<?php
function prepareAndExecute ($var, $connection)
{
  $statement = $connection->prepare($var);
  return $statement->execute();
};

 ?>
