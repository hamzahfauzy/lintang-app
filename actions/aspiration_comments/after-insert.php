<?php

set_flash_msg(['success'=>'Aspirasi berhasil dikomentari']);
header('location:'.routeTo('aspirations/view',['id'=>$insert->aspiration_id]));
die();