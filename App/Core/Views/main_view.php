<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 2:14
 */
// Выводим
if($data){
echo $data;
} else {
    ?>
    <div class="container">
        <div class="row">
            <div class="col text-center mt-2">
                <div class="h3 font-italic task">Результаты голосования</div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center mt-2">
                <div class="h5 font-italic pollers">(Проголосовали: <?php
                    if($referal){
                        echo --$referal;
                    } else {
                        echo 0;
                    }
                    ?>)</div>
            </div>
        </div>
    </div>
    <div id="chart_div"></div>
    <?php
}