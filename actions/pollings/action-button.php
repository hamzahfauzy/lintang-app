<?php

$button = '<a href="'.routeTo('crud/index',['table'=>'polling_items','polling_id'=>$d->id]).'" class="btn btn-sm btn-success">Lihat Item</a>';
$button .= '<a href="'.routeTo('pollings/view',['id'=>$d->id]).'" class="btn btn-sm btn-default">Polling</a>';

return $button;