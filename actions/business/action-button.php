<?php

if(get_role(auth()->user->id))
{
    if($d->status == 'di ajukan')
    {
        return '
        <a href="'.routeTo('business/action',['id'=>$d->id,'status'=>'pending']).'" class="btn btn-sm btn-default">Pending</a>
        <a href="'.routeTo('business/action',['id'=>$d->id,'status'=>'dalam proses']).'" class="btn btn-sm btn-default">Proses</a>
        <a href="'.routeTo('business/action',['id'=>$d->id,'status'=>'sukses masuk listing']).'" class="btn btn-sm btn-default">Setuju</a>
        <a href="'.routeTo('business/action',['id'=>$d->id,'status'=>'tidak bisa di hubungi']).'" class="btn btn-sm btn-default">Tolak</a>
        ';
    }
    if($d->status == 'pending')
    {
        return '
        <a href="'.routeTo('business/action',['id'=>$d->id,'status'=>'dalam proses']).'" class="btn btn-sm btn-default">Proses</a>
        <a href="'.routeTo('business/action',['id'=>$d->id,'status'=>'sukses masuk listing']).'" class="btn btn-sm btn-default">Setuju</a>
        <a href="'.routeTo('business/action',['id'=>$d->id,'status'=>'tidak bisa di hubungi']).'" class="btn btn-sm btn-default">Tolak</a>
        ';
    }
    if($d->status == 'dalam proses')
    {
        return '
        <a href="'.routeTo('business/action',['id'=>$d->id,'status'=>'sukses masuk listing']).'" class="btn btn-sm btn-default">Setuju</a>
        <a href="'.routeTo('business/action',['id'=>$d->id,'status'=>'tidak bisa di hubungi']).'" class="btn btn-sm btn-default">Tolak</a>
        ';
    }
}

return '';