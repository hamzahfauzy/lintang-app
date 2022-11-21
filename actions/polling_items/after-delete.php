<?php

set_flash_msg(['success'=>_ucwords(__($table)).' berhasil dihapus']);
header('location:'.routeTo('crud/index',['table'=>$table,'polling_id'=>$delete->polling_id]));
die();