<?php

$data = $_POST['workplans'];
$validation = [
    'supervision_id' => [
        'required','exists:users,id,'.$_POST['workplans']['supervision_id']
    ],
    'executor_id' => [
        'required','exists:users,id,'.$_POST['workplans']['executor_id']
    ],
    'category_id' => [
        'required','exists:categories,id,'.$_POST['workplans']['category_id']
    ],
    'title' => [
        'required'
    ],
    'content' => [
        'required'
    ],
    'budget'  => [
        'required','number'
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
    $_POST['workplans']['file_path'] = $file_upload;
}