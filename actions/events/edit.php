<?php

$id = $_GET['id'];
Page::set_title('Edit Event');
$error_msg = get_flash_msg('error');
$old = get_flash_msg('old');
$fields = [
    'name' => [
        'label' => 'Nama Event',
        'type'  => 'text'
    ],
    'category' => [
        'label' => 'Kategori',
        'type'  => 'options:General|Pengurus|Angkatan|Lintas Angkatan'
    ],
    'description' => [
        'label' => 'Deskripsi',
        'type'  => 'textarea'
    ],
    'start_time' => [
        'label' => 'Waktu Mulai',
        'type'  => 'datetime-local'
    ],
    'end_time' => [
        'label' => 'Waktu Selesai',
        'type'  => 'datetime-local'
    ],
    'place' => [
        'label' => 'Tempat',
        'type'  => 'text'
    ],
    'PIC' => [
        'label' => 'PIC',
        'type'  => 'text'
    ],
    'tag' => [
        'label' => 'Tag',
        'type'  => 'text'
    ],
    'image' => [
        'label' => 'Gambar',
        'type'  => 'file'
    ],
];

if(request() == 'POST')
{
    $_POST['_method'] = 'put';
    if(isset($_FILES['image']) && !empty($_FILES['image']['tmp_name']))
    {
        if (function_exists('curl_file_create')) {
            $_POST['image'] = curl_file_create($_FILES['image']['tmp_name'],$_FILES['image']['type'],$_FILES['image']['name']);
        }else{
            $_POST['image'] = '@' . realpath($_FILES['image']['tmp_name'],$_FILES['image']['type'],$_FILES['image']['name']);
        }
    }

    $url    = "https://gerai.ikarholaz.id/api/events/update/".$id;
    $request = simple_curl($url, 'POST', $_POST, array("Content-Type:multipart/form-data"));
    if($request['status'] == 200)
    {
        set_flash_msg(['success'=>'Event berhasil di update']);
        header('location:'.routeTo('events/index'));
    }
    else
    {
        $content = json_decode($request['content']);
        set_flash_msg(['error'=>$content]);
        header('location:'.routeTo('events/edit',['id'=>$id]));
    }
}
else
{
    $url    = "https://gerai.ikarholaz.id/api/events/show/".$id;
    $data   = simple_curl($url, 'GET');
    $data   = json_decode($data['content'])->data;
}

return compact('error_msg','old','fields','data');