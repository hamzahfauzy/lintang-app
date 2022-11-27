<?php
if(get_role(auth()->user->id)->name != 'administrator')
{
    $where = ($where ? ' AND ' : 'WHERE ') . 'user_id='.auth()->user->id;
}
$db->query = "SELECT * FROM $table $where ORDER BY ".$columns[$order[0]['column']]." ".$order[0]['dir']." LIMIT $start,$length";
$data  = $db->exec('all');

$total = $db->exists($table,$where,[
    $columns[$order[0]['column']] => $order[0]['dir']
]);

return compact('data','total');