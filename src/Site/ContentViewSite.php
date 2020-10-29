<?php

namespace Nemundo\Wiki\Site;

use Nemundo\Package\FontAwesome\Icon\ViewIcon;
use Nemundo\Package\FontAwesome\Site\AbstractIconSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Page\ContentViewPage;

class ContentViewSite extends AbstractIconSite
{

    /**
     * @var ContentViewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'ContentView';
        $this->url = 'ContentView';
        $this->icon=new ViewIcon();
        ContentViewSite::$site=$this;
    }

    public function loadContent()
    {
        (new ContentViewPage())->render();
    }
}