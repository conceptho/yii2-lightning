<?php

namespace conceptho\lightning\generators\crud;


use Yii;
use yii\gii\CodeFile;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

class Generator extends \yii\gii\generators\crud\Generator
{
    public $modelName;
    public $ns = "app\services";

    public function getName()
    {
        return 'Conceptho CRUD';
    }

    public function getDescription()
    {
        return "This generator generates a CRUD for the specified models.";
    }

    public function generate()
    {
        $files = parent::generate();

        $params = [
            'modelName' => Inflector::camel2id(StringHelper::basename($this->modelClass)),
            'className' => ucwords(Inflector::camelize(StringHelper::basename($this->modelClass)),"_"),
            'columns' => $this->getColumnNames()
        ];

        $files[] = new CodeFile(
            Yii::getAlias('@' . str_replace('\\', '/', $this->ns)) . '/' . ucfirst($params['modelName']) . '.php',
            $this->render('service.php', $params)
        );

        $files[] = new CodeFile(
            Yii::getAlias('@' . str_replace('\\', '/', $this->ns)) . '/base/' . ucfirst($params['modelName']) . '.php',
            $this->render('servicebase.php', $params)
        );

        return $files;
    }
}