<?php
$link = ($params->get('type_link') == 'menu_item') ? JRoute::_('index.php?Itemid=' . $params->get('menu')) : $params->get('external_url');
$target = ($params->get('type_link') == 'menu_item') ? "" : "_blank";
$class = (!empty($params->get('class_button'))) ? 'btn-' . $params->get('class_button') : '';
$title = (!empty($params->get('title'))) ? '<span>' . $params->get('title') . '</span>' : '';
$image = '';
if ($params->get('type_image') == 'icon' && !empty(trim($params->get('icon')))) {
    $image = '<i class="' . $params->get('icon') . '"></i>';
} elseif ($params->get('type_image') == 'image' && !empty(trim($params->get('image')))) {
    $image = '<img src="' . $params->get('image') . '" alt="' . $title . '" />';
}

if (!function_exists('replaceStr')) {
    function replaceStr($search, $replace, $subject)
    {
        $pos = strrpos($subject, $search);
        
        return $pos !== false ? substr_replace($subject, $replace, $pos, strlen($search)) : $subject;
    }
}

?>
<div id="modbutton" class="<?= $params->get('header_class') ?> <?= $params->get('class_button') ?>">
    <a href="<?= $link ?>" class="btn <?= $class ?>" target="<?= $target ?>">
        <?= $image ?> <?=  replaceStr(" ","<br>",$title) ?>
    </a>
</div>