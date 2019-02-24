<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 23.02.2019
 * Time: 16:30
 */
?>
<form id="sv" method="post" action="/vote/submit">
    <label>Выберите три лучшие истории:</label>
    <div class="errormsg" role="alert"></div>
    <?php
    if(is_array($data)){
        foreach($data as $k=>$v){
            ?>
            <fieldset id="fs<?php echo $k?>">
            <label><?php echo $v;?></label>
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
            </fieldset><?php
        }
    }
    ?>
    <button form="sv" type="submit" id="submit">Отправить голос</button>
</form>
