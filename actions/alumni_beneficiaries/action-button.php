<?php

if(get_role(auth()->user->id)->name == 'administrator')
{
    if($d->status == 'di ajukan')
    {
        return '
        <a href="'.routeTo('alumni_beneficiaries/action',['id'=>$d->id,'status'=>'approve']).'" class="btn btn-sm btn-default">Approve</a>
        <a href="'.routeTo('alumni_beneficiaries/action',['id'=>$d->id,'status'=>'pending']).'" class="btn btn-sm btn-default">Pending</a>
        ';
    }
    if($d->status == 'pending')
    {
        return '
        <a href="'.routeTo('alumni_beneficiaries/action',['id'=>$d->id,'status'=>'approve']).'" class="btn btn-sm btn-default">Proses</a>
        ';
    }
}

return '';