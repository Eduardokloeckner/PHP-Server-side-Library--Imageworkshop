<?php

require_once('vendor/PHPImageWorkShop/Core/ImageWorkshopLayer.php');
require_once('vendor/PHPImageWorkShop/Exception/ImageWorkshopException.php');
require_once('vendor/PHPImageWorkShop/ImageWorkshop.php'); 

use PHPImageWorkShop\ImageWorkshop;

$layer = ImageWorkshop::initFromPath('vendor/PHPImageWorkshop/images/image.jpg');
//resize the picture
$layer->resizeInPixel(950, null, true);
 
// This is the text layer
$textLayer = ImageWorkshop::initFromPath('vendor/PHPImageWorkshop/images/mark.png');
$textLayer->resizeInPixel(50, null, true);

// We add the text layer 12px from the Left and 12px from the Bottom ("LB") of the norway layer:
$layer->addLayerOnTop($textLayer, 2, 2, "LB");


$level = 2; // Level 2 in the stack of $group
$sublayer = $textLayer;
$positionX = 80; // Left position in px
$positionY = 40; // top position in px
$position = "LB";
 
$group = ImageWorkshop::initVirginLayer(300, 200); // width: 300px, height: 200px
$sublayerInfos = $group->addLayer($level, $sublayer, $positionX, $positionY, $position);

$backgroundColor = "FFFFFF";
$image = $layer->getResult($backgroundColor);

header('Content-type: image/jpeg');
header('Content-Disposition: filename="image.jpg"');
imagejpeg($image, null, 95); // We chose to show a JPG with a quality of 95%
exit;


?>

