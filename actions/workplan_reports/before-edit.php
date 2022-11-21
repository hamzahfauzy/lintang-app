<?php

$data = $_POST['workplan_reports'];
$validation = [
    'workplan_id' => [
        'required','exists:workplans,id,'.$_POST['workplan_reports']['workplan_id']
    ],
    'title' => [
        'required'
    ],
];

if(isset($_FILES['file_path']['name']) && !empty($_FILES['file_path']['name']))
{
    $data['file_path'] = $_FILES;
    $validation['file_path'] = [
        'required','file'
    ];
}

Validation::run($validation, $data);

if(isset($_FILES['file_path']['name']) && !empty($_FILES['file_path']['name']))
{
    $file_upload = do_upload($_FILES['file_path'], 'uploads');
    $_POST['workplan_reports']['file_path'] = $file_upload;
}