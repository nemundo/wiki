<?php
namespace Nemundo\Wiki\Data\WikiContent;
class WikiContentRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WikiContentModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $pageId;

/**
* @var \Nemundo\Wiki\Data\WikiPage\WikiPageRow
*/
public $page;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

/**
* @var int
*/
public $itemOrder;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->pageId = intval($this->getModelValue($model->pageId));
if ($model->page !== null) {
$this->loadNemundoWikiDataWikiPageWikiPagepageRow($model->page);
}
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->itemOrder = intval($this->getModelValue($model->itemOrder));
}
private function loadNemundoWikiDataWikiPageWikiPagepageRow($model) {
$this->page = new \Nemundo\Wiki\Data\WikiPage\WikiPageRow($this->row, $model);
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
}