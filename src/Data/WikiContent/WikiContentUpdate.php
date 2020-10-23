<?php
namespace Nemundo\Wiki\Data\WikiContent;
use Nemundo\Model\Data\AbstractModelUpdate;
class WikiContentUpdate extends AbstractModelUpdate {
/**
* @var WikiContentModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->pageId, $this->pageId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->itemOrder, $this->itemOrder);
parent::update();
}
}