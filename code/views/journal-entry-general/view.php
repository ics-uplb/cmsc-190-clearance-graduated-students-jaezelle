<style type="text/css">
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        font-size: 90%;
    }
    td, th {
       border: 1px solid #dddddd;
       text-align: center;
       padding: 2px;
    }
</style>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JournalEntryGeneral */

$this->title = $model->journal_general_id;
$this->params['breadcrumbs'][] = ['label' => 'General Journals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-entry-general-view</b>">
   <table>
        <tr>
            <td rowspan="2"><b>DATE</b></td>
            <td rowspan="2"><b>JEV No.</b></td>
            <td rowspan="2"><b>PARTICULARS</b></td>
            <td rowspan="2"><b>ACCOUNT CODE</b></td>
            <td></td>
            <td colspan="2"><b>AMOUNT</b></td>
        </tr>
        <tr>
            <td><?php echo sizeof($detailGeneral);?></td>
            <td>Debit</td>
            <td>Credit</td>
        </tr>

        <?php
            $sizeGeneral=0;
            $sizeGeneral = sizeof($detailGeneral);
            echo $sizeGeneral;

            for($i=0; $i<sizeof($detailGeneralJevNo); $i++){            
                echo "<tr>";
                    echo "<td>".$detailGeneralJevNo[$i]->date."</td>";
                    echo "<td>".$detailGeneralJevNo[$i]->jev_number."</td";
                echo"</tr>";
                if(sizeof($detailGeneral)==1){
                        echo "<td>".$detailGeneral[0]->account_name."</td>";//first account name
                        echo "<td>".$detailGeneral[0]->account_code."</td>";
                        echo "<td></td>";
                        if($detailGeneral[0]->type==1){
                            echo "<td></td>";
                            echo "<td>".$detailGeneral[0]->amount."</td>";
                            }else{
                            echo "<td>".$detailGeneral[0]->amount."</td>";
                            echo "<td></td>";
                        }
                }else{
                    echo "<td>".$detailGeneral[0]->account_name."</td>";//first account name
                    echo "<td>".$detailGeneral[0]->account_code."</td>";
                    echo "<td></td>";
                    if($detailGeneral[0]->type==1){
                            echo "<td></td>";
                            echo "<td>".$detailGeneral[0]->amount."</td>";
                            }else{
                            echo "<td>".$detailGeneral[0]->amount."</td>";
                            echo "<td></td>";
                    }
                    for($j=1; $j<sizeof($detailGeneral);$j++){
                        echo "<tr>";
                            echo "<td></td>";
                            echo "<td></td>";

                            echo "<td>".$detailGeneral[$j]->account_name."</td>";//first account name
                            echo "<td>".$detailGeneral[$j]->account_code."</td>";
                            echo "<td></td>";
                            if($detailGeneral[$j]->type==1){
                                    echo "<td></td>";
                                    echo "<td>".$detailGeneral[$j]->amount."</td>";
                                    }else{
                                    echo "<td>".$detailGeneral[$j]->amount."</td>";
                                    echo "<td></td>";
                            }
                        echo "</tr>";
                    }
                }
            }            
        ?>
   
        
    </table>

    
</div>
