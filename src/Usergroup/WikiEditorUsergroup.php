<?php
namespace Nemundo\Wiki\Usergroup;
use Nemundo\User\Usergroup\AbstractUsergroup;
class WikiEditorUsergroup extends AbstractUsergroup {
protected function loadUsergroup() {
$this->usergroup = 'WikiEditor';
$this->usergroupId = 'a2b480b4-35d8-4780-82eb-e9f60a6574b7';
}
}