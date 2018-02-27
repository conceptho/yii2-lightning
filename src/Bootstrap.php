<?php

namespace conceptho\lightning;


use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

class Bootstrap implements BootstrapInterface
{
    public $customGenerators = [
        'conceptho-model' => [
            'class' => 'conceptho\lightning\generators\model\Generator',
            'baseClass' => 'yii\db\ActiveRecord',
            'generateQuery' => true,
            'queryNs' => '@app\models\query',
            'enableI18N' => true,
            'messageCategory' => 'models',
            'templates' => [
                'default' => '@app/lightning/generators/model/default'
            ]
        ],
        'conceptho-crud' => [
            'class' => 'conceptho\lightning\generators\crud\Generator',
            'enableI18N' => true,
            'templates' => [
                'default' => '@app/lightning/generators/crud/default'
            ]
        ]
    ];

    public function bootstrap($app)
    {
        if ($app->hasModule('gii')) {
            $module = $app->getModule('gii');
            $module->generators = ArrayHelper::merge($module->generators, $this->customGenerators);
        }
    }
}