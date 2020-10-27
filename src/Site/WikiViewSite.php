<?php

namespace Nemundo\Wiki\Site;

use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Page\WikiViewPage;

class WikiViewSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'View';
        $this->url = 'view';
        $this->menuActive=false;
    }

    public function loadContent()
    {
        (new WikiViewPage())->render();
    }
}