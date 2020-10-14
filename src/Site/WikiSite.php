<?php

namespace Nemundo\Wiki\Site;


use Nemundo\Wiki\Page\WikiPage;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Site\Content\ContentAddSite;
use Nemundo\Wiki\Site\Content\ContentDeleteSite;
use Nemundo\Wiki\Site\Content\ContentEditSite;
use Nemundo\Wiki\Site\Content\ContentRemoveSite;


class WikiSite extends AbstractSite
{

    /**
     * @var WikiSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Wiki';
        $this->url = 'wiki';
        WikiSite::$site = $this;

        new WikiNewSite($this);
        new WikiDeleteSite($this);
        //new AdminSite($this);
        //new ContentTypeAddSite($this);
        new ContentAddSite($this);
        new ContentDeleteSite($this);
        new ContentEditSite($this);
        new ContentRemoveSite($this);

    }


    public function loadContent()
    {

        (new WikiPage())->render();

    }

}