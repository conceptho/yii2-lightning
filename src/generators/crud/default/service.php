<?php
/**
 * This is the template for generating the service class of a specified table.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $className string class name */

echo "<?php\n";
?>

namespace <?= $generator->ns ?>;

use conceptho\ServiceLayer\Service;

class <?php echo $className; ?> extends base\<?= $className."\n" ?>{

}