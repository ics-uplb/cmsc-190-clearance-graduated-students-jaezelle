<style type="text/css">

/*not default*/
.wrap >.sidenav {
    float: left; 
    width: 20%; 
    margin: 6% 4% 5%;
}
.wrap >.container {
    width: 70%;
    float: right;
    margin-top: 2%;
}
</style>
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

?>

<?php $this->beginContent('@app/views/layouts/main.php'); ?>
	<div class="sidenav">
   <?php
        use kartik\widgets\SideNav; //side nav extension
	
			echo SideNav::widget([
                'type' => SideNav::TYPE_DEFAULT,
                'heading' => 'Administrator',
                'items' => [
                    ['label' => 'Journal Entry', 'icon' => 'home', 'items' => [
                        ['label' => 'Check Disbursements Journal', 'url' => ['journal-entry/index', 'journal_type'=>1]],
                        ['label' => 'Cash Disbursements Journal', 'url' => ['journal-entry/index', 'journal_type'=>2]],
                        ['label' => 'Cash Receipts Journal', 'url' => ['journal-entry-cash-receipt/index']],
                        ['label' => 'General Journal', 'url' => ['journal-entry-general/index']],
                    ]],
                    ['label' => 'Posted Journal', 'icon' => 'home', 'url' => ['post-entry/index']],
                    ['label' => 'General Ledger', 'icon' => 'home', 'url' => ['general-ledger/index']],
                    ['label' => 'Trial Balance', 'icon' => 'home', 'url' => ['trial-balance/view']],
                    //['label' => 'Financial Performance', 'icon' => 'home', 'url' => ['financial-position/index']],
                    //['label' => 'Financial Position', 'icon' => 'home', 'url' => ['financial-position/index']],
                    ['label' => 'Accounts', 'icon' => 'user', 'items' => [
                        ['label' => 'Change Password', 'url' => ['user/password']],
                        ['label' => 'Administrator', 'url' => ['user/admin']],
                        ['label' => 'Employee', 'url' => ['user/employee']],
                    ]],

                ],
            ]);
		?>
    </div>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

       <?= $content?>
    </div>



<?php $this->endContent() ?>