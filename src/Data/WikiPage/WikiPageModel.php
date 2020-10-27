<?php
namespace Nemundo\Wiki\Data\WikiPage;
class WikiPageModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $title;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $groupId;

/**
* @var \Nemundo\Content\Index\Group\Data\Group\GroupExternalType
*/
public $group;

protected function loadModel() {
$this->tableName = "wiki_wiki";
$this->aliasTableName = "wiki_wiki";
$this->label = "Wiki Page";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "wiki_wiki";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "wiki_wiki_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->title = new \Nemundo\Model\Type\Text\TextType($this);
$this->title->tableName = "wiki_wiki";
$this->title->fieldName = "title";
$this->title->aliasFieldName = "wiki_wiki_title";
$this->title->label = "Title";
$this->title->allowNullValue = false;
$this->title->length = 255;

$this->groupId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->groupId->tableName = "wiki_wiki";
$this->groupId->fieldName = "group";
$this->groupId->aliasFieldName = "wiki_wiki_group";
$this->groupId->label = "Group";
$this->groupId->allowNullValue = true;

}
public function loadGroup() {
if ($this->group == null) {
$this->group = new \Nemundo\Content\Index\Group\Data\Group\GroupExternalType($this, "wiki_wiki_group");
$this->group->tableName = "wiki_wiki";
$this->group->fieldName = "group";
$this->group->aliasFieldName = "wiki_wiki_group";
$this->group->label = "Group";
}
return $this;
}
}