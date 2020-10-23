<?php
namespace Nemundo\Wiki\Data\WikiContent;
class WikiContentBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WikiContentModel
*/
protected $model;

/**
* @var string
*/
public $pageId;

/**
* @var string
*/
public $contentId;

/**
* @var int
*/
public $itemOrder;

public function __construct() {
parent::__construct();
$this->model = new WikiContentModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->pageId, $this->pageId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
$id = parent::save();
return $id;
}
}