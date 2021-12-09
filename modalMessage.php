<?php
function modalTitle($op)
{
  if($op == 'success')
    $title = 'Success!';
  else
    $title = 'Warning!';

  return $title;
}
function modalMessage($op)
{
  if($op == 'success')
    $msg = 'Data has been succesfully updated.';
  else if($op == 'errkod')
    $msg = 'Data was unsuccessfully updated.';

  return $msg;
}

function modalDelTitle($del)
{
  if($del == 'success')
    $title = 'Success!';
  else
    $title = 'Warning!';

  return $title;
}
function modalDelMessage($del)
{
  if($del == 'success')
    $msg = 'The data was successfully deleted.';
  else if($del == 'errkod')
    $msg = 'Data was unsuccessfully deleted.';

  return $msg;
}
?>