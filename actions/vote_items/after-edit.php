<?php

set_flash_msg(['success'=>_ucwords(__($table)).' berhasil diupdate']);
header('location:'.routeTo('crud/index',['table'=>$table,'vote_id'=>$edit->vote_id]));
die();