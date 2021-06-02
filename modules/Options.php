<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules;

use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
/**
 * Description of Options
 *
 * @author comin
 */
class Options extends \yii\bootstrap4\Widget {
    
    /**
     * Основной тег, содержащий дочерние элементы
     * @var string 
     */
    public $mainTag = 'div';
    
    /**
     * Заголовок блока
     * @var string 
     */
    public $title = 'Операции';    
    
    /**
     * Шаблон ссылка
     * @var string 
     */
    public $linkTemplate = '<a href="{url}" {css} {attr}>{label}</a>';
    
    /**
     * Шаблон элементов
     * @var string 
     */
    public $labelTemplate = '<li {css} {attr}>{label}</li>';

    public $titleTag = 'li';
    /**
     * CSS для заголовка
     * @var array
     */
    public $titleOptions = [];
    
    /**
     * Содержимое блока
     * @var array 
     */
    public $items = [];
    
    /**
     * CSS блока 
     * @var array 
     */
    public $options = ['class' => 'list-group'];
    
    /**
     * CSS для ссылок
     * @var array
     */
    public $linkOptions = [];
    
    /**
     * CSS элементов
     * @var array
     */
    public $itemOptions = [];
    
    /**
     * CSS подзаготовка
     * @var array 
     */
    public $labelOptions = [];
    
    public function run() 
    {
        echo Html::tag($this->mainTag, $this->renderItems(), $this->options);
    }
    protected function renderItems() 
    {
        $options = $this->itemOptions;
        Html::addCssClass($options, $this->titleOptions);
        $lines = [];
        $lines[] = Html::tag($this->titleTag, $this->title, $options);
        foreach ($this->items as $keyItem => $item) {
            $lines[] = $this->renderItem($item);
        }
        return implode("\n", $lines);
    }
    protected function renderItem($item)
    {      
        $options = $this->itemOptions;
        Html::addCssClass($options, $item['css']);
        
        if (isset($item['url'])) {
            $template = ArrayHelper::getValue($item, 'template', $this->linkTemplate);
            Html::addCssClass($options, $this->linkOptions);
            return strtr($template, [
                '{url}' => Html::encode(Url::to($item['url'])),
                '{label}' => $item['label'],
                '{attr}' => Html::renderTagAttributes(ArrayHelper::getValue($item, 'linkOptions', [])),
                '{css}' => Html::renderTagAttributes($options),
            ]);
        }

        $template = ArrayHelper::getValue($item, 'template', $this->labelTemplate);
        Html::addCssClass($options, $this->labelOptions);
        return strtr($template, [
            '{label}' => $item['label'],
            '{css}' => Html::renderTagAttributes($options),
            '{attr}' => $item['labelOptions'],
        ]);


        
    }
}
