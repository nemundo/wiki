<?php
namespace Nemundo\Wiki\Data\WikiPage;
class WikiPageBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WikiPageModel
*/
protected $model;

/**
* @var string
*/
public $title;

public function __construct() {
parent::__construct();
$this->model = new WikiPageModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->title, $this->title);
$id = parent::save();
return $id;
}
}