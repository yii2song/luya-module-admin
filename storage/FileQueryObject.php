<?php

namespace admin\storage;

use Yii;
use luya\helpers\Url;
use admin\storage\FolderQuery;

class FileQueryObject extends \yii\base\Object
{
    use \admin\storage\ObjectTrait;
    
    public function getId()
    {
        return $this->itemArray['id'];
    }
    
    public function getFolderId()
    {
        return $this->itemArray['folder_id'];
    }
    
    public function getFolder()
    {
        return (new FolderQuery())->findOne($this->getFolderId());
    }
    
    public function getName()
    {
        return $this->itemArray['name_original'];
    }
    
    public function getSystemFileName()
    {
        return $this->itemArray['name_new_compound'];
    }
    
    /**
     * Delivers the url for nice urls /file/id/hash/hello-world.jpg
     * 
     * @return string
     */
    public function getSource()
    {
        return Yii::$app->storagecontainer->httpPath . '/' . $this->itemArray['name_new_compound'];
    }
    
    /**
     * @return string
     */
    public function getHttpSource()
    {
        return Yii::$app->storagecontainer->httpPath . '/' . $this->itemArray['name_new_compound'];
    }
    
    public function getServerSource()
    {
        return Yii::$app->storagecontainer->serverPath . '/' . $this->itemArray['name_new_compound'];
    }
}
