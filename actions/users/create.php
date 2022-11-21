<?php
Page::set_title('Tambah Pengguna');
if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);

    $_POST['users']['password'] = md5($_POST['users']['password']);

    $file = do_upload($_FILES['pic'],'uploads');
    $_POST['users']['pic'] = $file;

    $db->insert('users',$_POST['users']);

    set_flash_msg(['success'=>'Pengguna berhasil ditambahkan']);
    header('location:'.routeTo('users/index'));
}