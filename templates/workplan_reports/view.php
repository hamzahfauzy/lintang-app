<?php load_templates('layouts/top') ?>
    <div class="content">
        <div class="panel-header <?=config('theme')['panel_color']?>">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Detail LPJ : <?=$data->title?></h2>
                        <h5 class="text-white op-7 mb-2">Memanajemen fitur LPJ</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                        <a href="<?=routeTo('crud/index',['table'=>'workplan_reports'])?>" class="btn btn-warning btn-round">Kembali</a>
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
                            
                            <?php 
                            foreach($fields as $key => $field): 
                                $label = $field;
                                $type  = "text";
                                if(is_array($field))
                                {
                                    $field_data = $field;
                                    $field = $key;
                                    $label = $field_data['label'];
                                    if(isset($field_data['type']))
                                    $type  = $field_data['type'];
                                }
                                $label = _ucwords($label);
                                $data_value = Form::getData($type,$data->{$key},true);
                                if($type == 'number')
                                {
                                    $data_value = number_format($data_value);
                                }
                                if($type == 'file')
                                {
                                    $data_value = '<a href="'.asset($data_value).'" target="_blank">Lihat File</a>';
                                }
                            ?>
                            <div class="form-group">
                                <label for=""><?=$label?></label>
                                <p><?=$data_value?></p>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h2>Tanggapan</h2>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <?php if(get_role(auth()->user->id)->name == 'administrator'): ?>
                                    <button class="btn btn-outline-primary"><i class="fas fa-fw fa-thumbs-up"></i> Setuju (<?=$data->agree?>)</button>
                                    <button class="btn btn-outline-primary"><i class="fas fa-fw fa-thumbs-down"></i> Tidak Setuju (<?=$data->disagree?>)</button>
                                    <button class="btn btn-outline-primary"><i class="fas fa-fw fa-microphone-slash"></i> Abstain (<?=$data->abstain?>)</button>
                                    <a href="<?=routeTo('workplan_reports/broadcast',['id'=>$data->id])?>" onclick="if(confirm('Apakah anda yakin akan menyiarkan LPJ ini ?')){return true}else{return false}" class="btn btn-outline-primary"><i class="fas fa-fw fa-bullhorn"></i> Siarkan Program Kerja</a>
                                <?php else: ?>
                                    <a href="<?=routeTo('workplan_reports/response',['id'=>$data->id,'response'=>'agree'])?>" class="btn btn-outline-primary"><i class="fas fa-fw fa-thumbs-up"></i> Setuju (<?=$data->agree?>)</a>
                                    <a href="<?=routeTo('workplan_reports/response',['id'=>$data->id,'response'=>'disagree'])?>" class="btn btn-outline-primary"><i class="fas fa-fw fa-thumbs-down"></i> Tidak Setuju (<?=$data->disagree?>)</a>
                                    <a href="<?=routeTo('workplan_reports/response',['id'=>$data->id,'response'=>'abstain'])?>" class="btn btn-outline-primary"><i class="fas fa-fw fa-microphone-slash"></i> Abstain (<?=$data->abstain?>)</a>
                                <?php endif ?>
                            </div>

                            <div class="form-comment">
                                <form action="<?=routeTo('crud/create',['table'=>'workplan_report_responses','workplan_id'=>$data->id])?>" method="post">
                                    <div class="form-group mb-2 mt-3" style="padding:0">
                                        <textarea name="content" id="" cols="30" class="form-control" style="resize:none;" placeholder="Komentar anda disini..."></textarea>
                                    </div>
                                    <div class="form-group" style="padding:0">
                                        <button class="btn btn-success">Posting Komentar</button>
                                    </div>
                                </form>
                            </div>

                            <!-- List komentar -->
                            <div class="list-group mt-3">
                                <?php foreach($data->comments as $comment): ?>
                                <a href="#" class="list-group-item list-group-item-action flex-column align-items-start pl-0 pr-0">
                                    <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><b><?=$comment->user->name?></b></h5>
                                    <small><?=$comment->date?></small>
                                    </div>
                                    <p class="mb-1"><?=nl2br($comment->content)?></p>
                                </a>
                                <?php endforeach ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php load_templates('layouts/bottom') ?>