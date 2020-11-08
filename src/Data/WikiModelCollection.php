<?php
namespace Nemundo\Wiki\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WikiModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Wiki\Data\WikiContent\WikiContentModel());
$this->addModel(new \Nemundo\Wiki\Data\WikiPage\WikiPageModel());
}
}