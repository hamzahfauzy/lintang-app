<?php

$button = '<a href="'.routeTo('crud/index',['table'=>'vote_items','vote_id'=>$d->id]).'" class="btn btn-sm btn-success">Lihat Kandidat</a>';
$button .= '<a href="'.routeTo('votes/view',['id'=>$d->id]).'" class="btn btn-sm btn-default">Voting</a>';
return $button;