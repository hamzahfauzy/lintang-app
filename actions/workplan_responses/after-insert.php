<?php

set_flash_msg(['success'=>'Program kerja berhasil dikomentari']);
header('location:'.routeTo('workplans/view',['id'=>$insert->workplan_id]));
die();