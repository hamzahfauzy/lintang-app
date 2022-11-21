<?php

$_POST['aspiration_comments']['aspiration_id'] = $_GET['aspiration_id'];
$_POST['aspiration_comments']['author_id'] = auth()->user->id;
$_POST['aspiration_comments']['description'] = $_POST['content'];