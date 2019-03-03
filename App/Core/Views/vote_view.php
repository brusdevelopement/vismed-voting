<?php
/**
 * Created by Brusilovskiy Maxim.
 * User: Maxim.Brusilovskiy
 * Date: 23.02.2019
 * Time: 16:30
 * @author		Maxim Brusilovskiy <brys@starlink.ru>
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
?>
<div class="container">
<form class="justify-content-center" id="sv" method="post" action="/vote/submit">
    <div class="row">
        <div class="col text-center">
            <label class="h3 font-italic task">Выберите три лучшие истории:</label>
        </div>
    </div>
    <div class="errormsg alert alert-danger" role="alert" style="display: none;"></div>
    <?php
    if(is_array($data)){
        foreach($data as $k=>$v){
            ?>
            <div class="row form-group" id="fs<?php echo $k?>">
            <div class="col text-right font-weight-bold">

                <label><?php echo $v;?></label>
            </div>
            <div class="col font-weight-bold">

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="<?php echo $k?>" id="inlineRadio1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1 балл</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="<?php echo $k?>" id="inlineRadio2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2 балла</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="<?php echo $k?>" id="inlineRadio3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3 балла</label>
                </div>
            </div>
            </div><?php
        }
    }
    ?>
    <div class="col text-center">
        <button class="btn btn-primary" form="sv" type="submit" id="submit">Отправить голос</button>
    </div>
</form>
</div>