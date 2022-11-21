<?php

set_flash_msg(['success'=>_ucwords(__($table)).' berhasil dihapus']);
header('location:'.routeTo('crud/index',['table'=>$table,'vote_id'=>$delete->vote_id]));
die();