<?php

namespace Nemundo\Wiki\Site;

use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Parameter\WikiParameter;

class WikiDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var WikiDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'WikiDelete';
        $this->url = 'wikidelete';
        WikiDeleteSite::$site = $this;
    }

    public function loadContent()
    {

        $wikiType = new WikiPageContentType((new WikiParameter())->getValue());
        $wikiType->deleteType();

        WikiSite::$site->redirect();

        //(new UrlReferer())->redirect();

    }
}