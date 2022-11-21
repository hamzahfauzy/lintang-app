<?php

$button = '<a href="'.routeTo('crud/index',['table'=>'vote_items','vote_id'=>$d->id]).'" class="btn btn-sm btn-success">Lihat</a>';

return $button;