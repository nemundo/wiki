<?php
namespace Nemundo\Wiki\Site;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Page\WikiEditPage;
class WikiEditSite extends AbstractEditIconSite {
protected function loadSite() {
$this->title = 'Edit';
$this->url = 'edit';
}
public function loadContent() {
(new WikiEditPage())->render();
}
}