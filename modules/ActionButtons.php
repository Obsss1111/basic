<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules;

use yii\grid\ActionColumn;
use Yii;
use yii\helpers\Html;
/**
 * Description of ActionButtons
 *
 * @author comin
 */
class ActionButtons extends ActionColumn{
    /**
     * {@inheritdoc}
     * {play} {plus} {heart} {view} {delete}
     */
    public $template = '{play}{heart}{delete}';
    /**
     * {@inheritdoc}
     */
    protected function renderHeaderCellContent() {        
        return 'Управление';
    }

    /**
     * {@inheritdoc}
     */
    protected function initDefaultButtons()
    {
        $this->initDefaultButton('play', 'play');
        $this->initDefaultButton('plus', 'plus');
        $this->initDefaultButton('heart', 'heart');
        $this->initDefaultButton('view', 'menu-right');
        $this->initDefaultButton('delete', 'trash', [
            'data-confirm' => Yii::t('yii', 'Вы действительно хотите удалить запись?'),
            'data-method' => 'post',
        ]);
    }
    /**
     * {@inheritdoc}
     */
    protected function initDefaultButton($name, $iconName, $additionalOptions = [])
    {        
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $additionalOptions) {
                
                switch ($name) {
                    case 'play':
                        $title = Yii::t('yii', 'Play');
                        break;
                    case 'plus':
                        $title = Yii::t('yii', 'Plus');
                        break;
                    case 'heart':
                        $title = Yii::t('yii', 'Heart');
                        break;
                    case 'view':
                        $title = Yii::t('yii', 'View');
                        break;
                    case 'delete':
                        $title = Yii::t('yii', 'Delete');
                        break;
                    default:
                        $title = ucfirst($name);
                }
                
                
                $options = array_merge([
                    'title' => $title,
                    'aria-label' => $title,
                    'data-pjax' => '0',
                    'id' => $title.'_'.$key,
                    'name' => "[$title]",
                    'value' => $title == 'Play' && $model->id_music && $model->rel_path->id_path ? $model->rel_path->path : $key,
                    'onclick' => strtolower($title) . 'Click(this)',
                    'class' => "btn action-btn",
                ], $additionalOptions, $this->buttonOptions);
                $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                return Html::button($icon, $options);
            };
        }
    }
}
