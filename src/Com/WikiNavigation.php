<?php


namespace Nemundo\Wiki\Com;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Wiki\Site\WikiSite;

class WikiNavigation extends AdminNavigation
{

    public function getContent()
    {

        $this->site = WikiSite::$site;
        return parent::getContent();

    }

}