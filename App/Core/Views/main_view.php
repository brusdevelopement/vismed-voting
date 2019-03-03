<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 2:14
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
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