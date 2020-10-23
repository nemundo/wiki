<?php
namespace Nemundo\Wiki\Data\WikiContent;
class WikiContentExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $pageId;

/**
* @var \Nemundo\Wiki\Data\WikiPage\WikiPageExternalType
*/
public $page;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $itemOrder;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WikiContentModel::class;
$this->externalTableName = "wiki_wiki_content";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->pageId = new \Nemundo\Model\Type\Id\IdType();
$this->pageId->fieldName = "page";
$this->pageId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->pageId->aliasFieldName = $this->pageId->tableName ."_".$this->pageId->fieldName;
$this->pageId->label = "Page";
$this->addType($this->pageId);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType();
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->itemOrder->aliasFieldName = $this->itemOrder->tableName . "_" . $this->itemOrder->fieldName;
$this->itemOrder->label = "Item Order";
$this->addType($this->itemOrder);

}
public function loadPage() {
if ($this->page == null) {
$this->page = new \Nemundo\Wiki\Data\WikiPage\WikiPageExternalType(null, $this->parentFieldName . "_page");
$this->page->fieldName = "page";
$this->page->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->page->aliasFieldName = $this->page->tableName ."_".$this->page->fieldName;
$this->page->label = "Page";
$this->addType($this->page);
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content");
$this->content->fieldName = "content";
$this->content->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->content->aliasFieldName = $this->content->tableName ."_".$this->content->fieldName;
$this->content->label = "Content";
$this->addType($this->content);
}
return $this;
}
}