<?php

$data = $_POST['workplans'];
$data['file_path'] = $_FILES;
Validation::run([
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
    'file_path'  => [
        'required','file'
    ],
    'budget'  => [
        'required','number'
    ],
], $data);

$file_upload = do_upload($_FILES['file_path'], 'uploads');

$_POST['workplans']['author_id'] = auth()->user->id;
$_POST['workplans']['file_path'] = $file_upload;