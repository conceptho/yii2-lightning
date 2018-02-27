<?php
/**
 * This is the template for generating the service class of a specified table.
 */

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\model\Generator */
/* @var $className string class name */

echo "<?php\n";
?>

namespace <?= $generator->ns ?>\base;

use conceptho\ServiceLayer\Response;
use conceptho\ServiceLayer\Service;
use app\models\<?php echo $className; ?> as <?php echo $className; ?>Model;

class <?php echo $className; ?> extends Service
{
    public function actionCreate(<?php echo $className; ?>Model $<?php echo $modelName; ?>)
    {
        return new Response($this->saveModel($<?php echo $modelName; ?>), ['<?php echo $modelName; ?>' => $<?php echo $modelName; ?>]);
    }

    public function actionUpdate(<?php echo $className; ?>Model $<?php echo $modelName; ?>)
    {
        return new Response($this->saveModel($<?php echo $modelName; ?>), ['<?php echo $modelName; ?>' => $<?php echo $modelName; ?>]);
    }

    public function actionDelete(<?php echo $className; ?>Model $<?php echo $modelName; ?>)
    {
        $<?php echo $modelName; ?>->deleted = 1;
        return new Response($this->saveModel($<?php echo $modelName; ?>), ['<?php echo $modelName; ?>' => $<?php echo $modelName; ?>]);
    }
}