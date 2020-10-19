<?php


namespace Nemundo\Wiki\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Page\WikiNewPage;
use Nemundo\Wiki\Usergroup\WikiEditorUsergroup;


class WikiNewSite extends AbstractSite
{

    protected function loadSite()
    {

        $this->title = 'New';
        $this->url = 'new';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new WikiEditorUsergroup());

    }


    public function loadContent()
    {

        (new WikiNewPage())->render();

    }

}