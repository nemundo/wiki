<?php


namespace Nemundo\Wiki\Site;


use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Group\WikiEditorGroup;
use Nemundo\Wiki\Page\WikiNewPage;
use Nemundo\Process\Group\Site\AbstractGroupRestrictedSite;

class WikiNewSite extends AbstractSite  // AbstractGroupRestrictedSite
{

    protected function loadSite()
    {

        $this->title = 'New';
        $this->url = 'new';
        //$this->groupRestricted = true;
        //$this->addRestrictedGroup(new WikiEditorGroup());

    }


    public function loadContent()
    {

        (new WikiNewPage())->render();

    }

}