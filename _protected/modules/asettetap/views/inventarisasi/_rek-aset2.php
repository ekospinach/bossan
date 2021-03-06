<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
?>
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li id="rek-2-tab" role="presentation" class="active"><a href="#rek-2-content" aria-controls="rek-2-content" role="tab" data-toggle="tab">Kode Aset 2</a></li>
    <li id="rek-3-tab" role="presentation"><a href="#rek-3-content" aria-controls="rek-3-content" role="tab" data-toggle="tab">Kode Aset 3</a></li>
    <li id="rek-4-tab" role="presentation"><a href="#rek-4-content" aria-controls="rek-4-content" role="tab" data-toggle="tab">Kode Aset 4</a></li>
    <li id="rek-5-tab" role="presentation"><a href="#rek-5-content" aria-controls="rek-5-content" role="tab" data-toggle="tab">Kode Aset 5</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="rek-2-content">
        <div class="ref-rek-aset1-index">
            <?= GridView::widget([
                'id' => 'ref-rek-aset2',    
                'dataProvider' => $dataProvider,
                'export' => false, 
                'responsive'=>true,
                'hover'=>true,     
                'resizableColumns'=>true,
                'panel'=>['type'=>'primary', 'heading'=>$this->title],
                'responsiveWrap' => false,        
                'toolbar' => [
                    [
                        // 'content' => $this->render('_search', ['model' => $searchModel, 'Tahun' => $Tahun]),
                    ],
                ],       
                'pager' => [
                    'firstPageLabel' => 'Awal',
                    'lastPageLabel'  => 'Akhir'
                ],
                // 'pjax'=>true,
                // 'pjaxSettings'=>[
                //     'options' => ['id' => 'ref-rek-aset2-pjax', 'timeout' => 5000],
                // ],
                'columns' => [
                    [
                        'attribute' => 'Kd_Aset2',
                        'width' => '60px',
                        'value' => function($model){
                            return $model->Kd_Aset1.'.'.$model->Kd_Aset2;
                        }
                    ],
                    'Nm_Aset2',
                    [
                        'class' => 'kartik\grid\ActionColumn',
                        'template' => '{rek-aset3}',
                        'noWrap' => true,
                        'vAlign'=>'top',
                        'buttons' => [
                                'rek-aset3' => function($url, $model){
                                    return Html::a('<span class="glyphicon glyphicon-forward"></span> Rek 3', $url,
                                    [
                                        'id' => 'rek3-'.$model->Kd_Aset1.$model->Kd_Aset2,
                                        'title' => Yii::t('yii', 'ubah'),
                                        'class' => 'btn btn-xs btn-default',
                                        // 'data-pjax' => 1
                                    ]);
                                },                       
                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="rek-3-content">...</div>
    <div role="tabpanel" class="tab-pane" id="rek-4-content">...</div>
    <div role="tabpanel" class="tab-pane" id="rek-5-content">...</div>
</div>            
<?php 
// $this->registerJs(<<<JS
//     $("a[id^='rek3-']").on("click", function(event){
//         event.preventDefault();
//         var href = $(this).attr("href");
//         var modalBody = $("#modalAset .modal-body");
//         modalBody.html('<i class=\"fa fa-spinner fa-spin\"></i>');
//         $.post(href)
//         .done(function( data ) {
//             modalBody.html(data)
//         });
//     })
// JS
// );
?>
<script>
    $("a[id^='rek3-']").on("click", function(e){
        e.preventDefault()
        // var target = e.target;
        var href = $(this).attr('href');
        // var href = $(this).attr('data-href');
        $('#rek-2-tab').removeClass('active');
        // $('#rek-2-tab').html('<a href=\"#rek-2-content\"  data-toggle=\"tab\" role=\"tab\" title=\"program\"><i class=\"glyphicon glyphicon-rek-2-content\"></i> Program</a>');
        $('#rek-3-tab').attr('class', 'active');
        // $('#program-link').click();
        $('#rek-2-content').removeClass('active in');
        $('#rek-3-content').addClass('active in');
        $('#rek-3-content').html('<i class=\"fa fa-spinner fa-spin\"></i>');
        $.post(href).done(function(data){
            $('#rek-3-content').html(data);
        });
    });    
</script>