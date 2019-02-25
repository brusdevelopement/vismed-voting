<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 24.02.2019
 * Time: 22:08
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
