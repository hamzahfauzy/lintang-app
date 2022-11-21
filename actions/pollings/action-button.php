<?php

$button = '<a href="'.routeTo('crud/index',['table'=>'polling_items','polling_id'=>$d->id]).'" class="btn btn-sm btn-success">Lihat</a>';

return $button;