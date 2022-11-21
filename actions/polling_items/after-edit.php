<?php

set_flash_msg(['success'=>_ucwords(__($table)).' berhasil diupdate']);
header('location:'.routeTo('crud/index',['table'=>$table,'polling_id'=>$edit->polling_id]));
die();