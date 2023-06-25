<?php
// Obligatoire
    if(!isset($obj)) {throw new Exception("obj is not set");}else{if(!is_object($obj)) {throw new Exception("obj is not set");}}

// Conseillé
    if(!isset($user)) {$user = ControllerConnect::getCurrentUser();}else{if(get_class($user) != "User") {$user = ControllerConnect::getCurrentUser();}}
    if(!isset($bookmark_icon)) {$bookmark_icon =  Style::ICON_REGULAR;}else{if(!is_string($bookmark_icon)) {$bookmark_icon =  Style::ICON_REGULAR;}}
    if(!isset($style)){ $style = new Style; }else{ if(!get_class($style) == "Style"){ $style = new Style; } }
?>

<div class="card mb-3">
    
    <div class="row g-0">
        <div class="row justify-content-between mb-1">
            <div class="col-auto"><?=$obj->getIs_unbewitchable(Content::FORMAT_EDITABLE)?></div>
            <div class="col-auto row justify-content-between">
                <div class="col-auto">
                    <?=$obj->getUsable(Content::FORMAT_EDITABLE)?>
                </div>                      
            </div>
        </div>
        <div class="nav-item-divider back-main-d-2"></div>
        <p class='size-0-7 mb-1'>Etat <?=$obj->getId(Content::FORMAT_BADGE);?> | Créé le <?=$obj->getTimestamp_add(Content::DATE_FR);?> | Modifié le <?=$obj->getTimestamp_updated(Content::DATE_FR);?></p>
        <p class="card-text  my-2"><?=$obj->getDescription(Content::FORMAT_EDITABLE)?></p>
        <div class="nav-item-divider back-main-d-2"></div>
    </div>
    <p class="text-right font-size-0-8 m-1"><a class='btn btn-sm btn-animate btn-border-red' onclick="Condition.remove('<?=$obj->getUniqid()?>')"><i class="fa-solid fa-trash"></i> Supprimer</a></p>
</div>