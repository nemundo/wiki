<?php

namespace Nemundo\Wiki\Site;

use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Wiki\Page\WikiEditPage;

class WikiEditSite extends AbstractEditIconSite
{

    /**
     * @var WikiEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Edit';
        $this->url = 'edit';
        WikiEditSite::$site=$this;
    }

    public function loadContent()
    {
        (new WikiEditPage())->render();
    }
}