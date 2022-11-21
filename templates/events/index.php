<?php load_templates('layouts/top') ?>
    <style>a.page-link.active{background:#007bff;color:#FFF;}</style>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Event</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data Event</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <?php if(is_allowed(get_route_path('events/create',[]),auth()->user->id)): ?>
                            <a href="<?=routeTo('events/create',[])?>" class="btn btn-secondary btn-round">Buat Event</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php if($success_msg): ?>
                            <div class="alert alert-success"><?=$success_msg?></div>
                            <?php endif ?>
                            <?php if(isset($datas->data) && !empty($datas->data)): ?>
                            <div class="table-responsive table-hover table-sales">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>Nama</th>
                                            <th>Kategori</th>
                                            <th>Waktu Mulai</th>
                                            <th>Waktu Selesai</th>
                                            <th>Tempat</th>
                                            <th>Status</th>
                                            <th class="text-right">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($datas->data as $index => $data): ?>
                                        <tr>
                                            <td>
                                                <?=$first_counter+1+$index?>
                                            </td>
                                            <td><?=$data->name?></td>
                                            <td><?=$data->category?></td>
                                            <td><?=$data->start_time?></td>
                                            <td><?=$data->end_time?></td>
                                            <td><?=$data->place?></td>
                                            <td><?=$data->status?></td>
                                            <td>
                                                <?php
                                                $action = '';
                                                if(is_allowed(get_route_path('events/view',[]),auth()->user->id)):
                                                    $action .= '<a href="'.routeTo('events/view',['id'=>$data->id]).'" class="btn btn-sm btn-success"><i class="fas fa-eye"></i> Lihat</a>';
                                                endif;
                                                if($data->status == 'pengajuan'):
                                                if(is_allowed(get_route_path('events/accept',[]),auth()->user->id)):
                                                    $action .= '<a href="'.routeTo('events/accept',['id'=>$data->id]).'" onclick="if(confirm(\'apakah anda yakin akan mensetujui event ini ?\')){return true}else{return false}" class="btn btn-sm btn-primary"><i class="fas fa-check"></i> Setujui</a>';
                                                endif;
                                                if(is_allowed(get_route_path('events/decline',[]),auth()->user->id)):
                                                    $action .= '<a href="'.routeTo('events/decline',['id'=>$data->id]).'" onclick="if(confirm(\'apakah anda yakin akan menolak event ini ?\')){return true}else{return false}" class="btn btn-sm btn-danger"><i class="fas fa-times"></i> tolak</a>';
                                                endif;
                                                endif;
                                                if(is_allowed(get_route_path('events/edit',[]),auth()->user->id)):
                                                    $action .= '<a href="'.routeTo('events/edit',['id'=>$data->id]).'" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i> Edit</a>';
                                                endif;
                                                if(is_allowed(get_route_path('events/delete',[]),auth()->user->id)):
                                                    $action .= '<a href="'.routeTo('events/delete',['id'=>$data->id]).'" onclick="if(confirm(\'apakah anda yakin akan menghapus data ini ?\')){return true}else{return false}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</a>';
                                                endif;

                                                echo $action;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php foreach($datas->links as $link): ?>
                                    <li class="page-item"><a class="page-link <?=$link->active?'active':''?>" href="<?=routeTo('nra/index',['page'=>get_params($link->url)['page']])?>"><?=ucwords(__($link->label))?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </nav>
                            <?php else: ?>
                            <i>Tidak ada data</i>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>