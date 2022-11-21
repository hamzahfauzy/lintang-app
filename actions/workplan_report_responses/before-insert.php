<?php

$_POST['workplan_report_responses']['workplan_report_id'] = $_GET['workplan_report_id'];
$_POST['workplan_report_responses']['response_type'] = 'comments';
$_POST['workplan_report_responses']['user_id'] = auth()->user->id;
$_POST['workplan_report_responses']['content'] = $_POST['content'];