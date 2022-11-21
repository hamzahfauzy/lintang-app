<?php

$data = $_POST['workplan_reports'];
$data['file_path'] = $_FILES;
Validation::run([
    'workplan_id' => [
        'required','exists:workplans,id,'.$_POST['workplan_reports']['workplan_id']
    ],
    'title' => [
        'required'
    ],
    'file_path'  => [
        'required','file'
    ]
], $data);

$file_upload = do_upload($_FILES['file_path'], 'uploads');

$_POST['workplan_reports']['file_path'] = $file_upload;