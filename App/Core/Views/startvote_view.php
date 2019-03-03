<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 24.02.2019
 * Time: 22:08
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

?>
    <div class="row">
        <div class="col startvote text-center">
            <a class="btn btn-primary" href="/startvote/submit" role="button"><?php
if($data == 0){
    echo 'Начать голосование';
    } else {
    echo 'Остановить голосование';
    }?></a>
        </div>
    </div>
<?php
