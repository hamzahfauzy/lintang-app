<?php

set_flash_msg(['success'=>'LPJ berhasil dikomentari']);
header('location:'.routeTo('workplan_reports/view',['id'=>$insert->workplan_report_id]));
die();