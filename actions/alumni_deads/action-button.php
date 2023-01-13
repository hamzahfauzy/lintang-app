<?php

if(get_role(auth()->user->id)->name == 'administrator')
{
    if($d->status == 'di ajukan')
    {
        return '
        <a href="'.routeTo('alumni_deads/action',['id'=>$d->id,'status'=>'approve']).'" class="btn btn-sm btn-default" onclick="if(confirm(\'Apakah anda yakin menyetujui data ini ?\')){return true}else{return false}">Approve</a>
        <a href="'.routeTo('alumni_deads/action',['id'=>$d->id,'status'=>'pending']).'" class="btn btn-sm btn-default" onclick="pendingNote(this); return false;">Pending</a>
        ';
    }
    if($d->status == 'pending')
    {
        return '
        <a href="'.routeTo('alumni_deads/action',['id'=>$d->id,'status'=>'approve']).'" class="btn btn-sm btn-default" onclick="if(confirm(\'Apakah anda yakin memproses data ini ?\')){return true}else{return false}">Proses</a>
        ';
    }
}

return '';