<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Detail Event : <?=$data->name?></h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen fitur event</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?=routeTo('events/index')?>" class="btn btn-warning btn-round">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php foreach($fields as $name => $field): ?>
                            <div class="form-group">
                                <label for=""><?=$field['label']?></label>
                                <?php if($name=='image'): ?>
                                <p><img src="https://gerai.ikarholaz.id/storage/public/<?=$data->{$name}?>" alt="" width="250px"></p>
                                <?php else: ?>
                                <p><?=$data->{$name}?></p>
                                <?php endif ?>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>