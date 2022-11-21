<?php

$_POST['workplan_responses']['workplan_id'] = $_GET['workplan_id'];
$_POST['workplan_responses']['response_type'] = 'comments';
$_POST['workplan_responses']['user_id'] = auth()->user->id;
$_POST['workplan_responses']['content'] = $_POST['content'];