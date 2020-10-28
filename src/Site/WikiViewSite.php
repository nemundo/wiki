<?php

namespace Nemundo\Wiki\Site;

use Nemundo\Package\FontAwesome\Icon\ViewIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Page\WikiViewPage;

class WikiViewSite extends AbstractIconSite
{

    /**
     * @var WikiViewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'View';
        $this->url = 'view';
        $this->menuActive=false;
        $this->icon=new ViewIcon();
        WikiViewSite::$site=$this;
    }

    public function loadContent()
    {
        (new WikiViewPage())->render();
    }
}