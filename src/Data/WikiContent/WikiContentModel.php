<?php
namespace Nemundo\Wiki\Data\WikiContent;
class WikiContentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $pageId;

/**
* @var \Nemundo\Wiki\Data\WikiPage\WikiPageExternalType
*/
public $page;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
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

protected function loadModel() {
$this->tableName = "wiki_wiki_content";
$this->aliasTableName = "wiki_wiki_content";
$this->label = "Wiki Content";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "wiki_wiki_content";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "wiki_wiki_content_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->pageId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->pageId->tableName = "wiki_wiki_content";
$this->pageId->fieldName = "page";
$this->pageId->aliasFieldName = "wiki_wiki_content_page";
$this->pageId->label = "Page";
$this->pageId->allowNullValue = true;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "wiki_wiki_content";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "wiki_wiki_content_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$this->itemOrder = new \Nemundo\Model\Type\Number\NumberType($this);
$this->itemOrder->tableName = "wiki_wiki_content";
$this->itemOrder->fieldName = "item_order";
$this->itemOrder->aliasFieldName = "wiki_wiki_content_item_order";
$this->itemOrder->label = "Item Order";
$this->itemOrder->allowNullValue = true;

}
public function loadPage() {
if ($this->page == null) {
$this->page = new \Nemundo\Wiki\Data\WikiPage\WikiPageExternalType($this, "wiki_wiki_content_page");
$this->page->tableName = "wiki_wiki_content";
$this->page->fieldName = "page";
$this->page->aliasFieldName = "wiki_wiki_content_page";
$this->page->label = "Page";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "wiki_wiki_content_content");
$this->content->tableName = "wiki_wiki_content";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "wiki_wiki_content_content";
$this->content->label = "Content";
}
return $this;
}
}