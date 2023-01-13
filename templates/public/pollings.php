<?php load_templates('layouts/public-top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Polling : <?=$data->title?></h2>
                        <h5 class="text-white op-7 mb-2">Statistik Polling</h5>
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

                            <h2><?=$data->title?></h2>
                            <?php if(!$isDoPolling && $data->status == 'Aktif'): ?>
                            <form action="" method="post">
                            <?php foreach($data->items as $item): ?>
                            <div class="form-group pl-0">
                                <input type="radio" name="options" id="options-<?=$item->id?>" value="<?=$item->id?>">
                                <label for="options-<?=$item->id?>">
                                <?=$item->name?>
                                </label>
                            </div>
                            <?php endforeach ?>
                            <button class="btn btn-primary">Submit</button>
                            </form>
                            <?php else: ?>
                            <?php foreach($data->items as $item): ?>
                            <div class="form-group pl-0">
                                <label for="options-<?=$item->id?>">
                                <?=$item->name?> (<?=number_format($item->counter/$data->counter*100,2)?>)
                                </label>
                            </div>
                            <?php endforeach ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/public-bottom') ?>