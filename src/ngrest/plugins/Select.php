<?php

namespace admin\ngrest\plugins;

use admin\ngrest\base\Model;

/**
 * Base class for select dropdowns.
 * 
 * @author nadar
 */
abstract class Select extends \admin\ngrest\base\Plugin
{
    public $initValue = null;

    public $data = [];

    public function renderList($id, $ngModel)
    {
        return $this->createListTag($ngModel);
    }

    public function renderCreate($id, $ngModel)
    {
        return $this->createFormTag('zaa-select', $id, $ngModel, ['initvalue' => $this->initValue, 'options' => $this->getServiceName('selectdata')]);
    }

    public function renderUpdate($id, $ngModel)
    {
        return $this->renderCreate($id, $ngModel);
    }

    public function serviceData()
    {
        return ['selectdata' => $this->data];
    }

    /*
    public function events()
    {
        return [
            Model::EVENT_SERVICE_NGREST => function($e) {
                $e->sender->addNgRestServiceData($this->name, $this->serviceData());
            }
        ];
    }
    */
    
    /*
    public function onAfterNgRestFind($fieldValue)
    {
        if ($this->getModel()->getNgRestCallType() == 'list') {
            foreach ($this->data as $item) {
                if ($item['value'] == $fieldValue) {
                    return $item['label'];
                }
            }
        }

        return $fieldValue;
    }
    */
}