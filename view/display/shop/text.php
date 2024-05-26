<?php
// Obligatoire
    if(!isset($obj)) {throw new Exception("obj is not set");}else{if(!is_object($obj)) {throw new Exception("obj is not set");}}

// Conseillé
    if(!isset($is_link)){ $is_link = false; }else{ if(!is_bool($is_link)){ $is_link = false; } }
    $onclick = "";
    if($is_link){
        $onclick = "ondblclick=\"Shop.open('".$obj->getUniqid()."');\"";
    }    
?>

<p class="text_resume_tooltops-show" data-target="#shop<?=$obj->getUniqid()?>"  <?=$onclick?>>
    <?=$obj->getFile('logo', new Style(['format' => Content::FORMAT_ICON, 'class' => "pe-1"]))?><?=$obj->getName()?>
</p>
<div id="shop<?=$obj->getUniqid()?>" class="box_resume_tooltips"  style="display:none;">
    <div class="d-flex flew-row flex-nowrap">
        <div>
            <p class="bold"><?=$obj->getName()?></p>
            <div class="d-flex justify-content-between">
                <?=$obj->getLocation(Content::FORMAT_ICON)?>
                <?=$obj->getPrice(Content::FORMAT_BADGE)?>
            </div>
            <p> Marchand·e : 
                <?php if(!empty($npc)){ echo $npc->getName(); }  else { echo "Aucun"; } ?>
            </p>
        </div>
    </div>
    <?=$obj->getDescription()?> 
</div>