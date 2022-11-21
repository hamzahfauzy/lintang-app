<?php load_templates('layouts/top') ?>
    <style>a.page-link.active{background:#007bff;color:#FFF;}</style>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notif Perubahan Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="notif_update" method="post" action="<?=routeTo('nra/send-notif')?>" id="notif_update" name="notif_update" enctype="multipart/form-data">
                    <input type="hidden" name="NRA" id="NRA" value="">
                    <div class="form-group">
                        <label for="">Rekomendasi Status</label>
                        <?= Form::input('options:- Pilih -|approved|pending|fail|dead', 'recommendation', ['class'=>"form-control"]) ?>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="description" id="content" cols="30" rows="5" class="form-control" style="resize:none;" placeholder="Deskripsi..."></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="NRA.value=''">Close</button>
                <button type="button" class="btn btn-primary" onclick="notif_update.submit()">Kirim Notif Ke Admin</button>
            </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Cek Registrasi</h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen data registrasi alumni</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
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
                            <?php if(isset($datas->data)): ?>
                            <div class="table-responsive table-hover table-sales">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th width="20px">#</th>
                                            <th>NRA</th>
                                            <th>Nama</th>
                                            <th>Tahun Lulus</th>
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
                                            <td><?=$data->NRA?></td>
                                            <td><?=$data->name?></td>
                                            <td><?=$data->graduation_year?></td>
                                            <td><?=$data->approval_status?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-success" onclick="NRA.value='<?=$data->NRA?>'"><i class="fas fa-fw fa-bell"></i> Notif Perubahan Status</button>
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