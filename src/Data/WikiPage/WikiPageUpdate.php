<?php
namespace Nemundo\Wiki\Data\WikiPage;
use Nemundo\Model\Data\AbstractModelUpdate;
class WikiPageUpdate extends AbstractModelUpdate {
/**
* @var WikiPageModel
*/
public $model;

/**
* @var string
*/
public $title;

/**
* @var string
*/
public $groupId;

public function __construct() {
parent::__construct();
$this->model = new WikiPageModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$this->typeValueList->setModelValue($this->model->groupId, $this->groupId);
parent::update();
}
}