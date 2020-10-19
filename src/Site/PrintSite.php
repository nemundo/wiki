<?php

namespace Nemundo\Wiki\Site;

use Nemundo\Package\FontAwesome\IconSite\AbstractPrintSite;
use Nemundo\Wiki\Page\PrintPage;

class PrintSite extends AbstractPrintSite
{

    /**
     * @var PrintSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Print';
        $this->url = 'print';
        PrintSite::$site = $this;
    }

    public function loadContent()
    {
        (new PrintPage())->render();
    }
}