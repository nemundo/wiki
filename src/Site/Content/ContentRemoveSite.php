<?php

namespace Nemundo\Wiki\Site\Content;

use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;


class ContentRemoveSite extends AbstractDeleteIconSite
{

    /**
     * @var ContentDeleteSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Remove Content';
        $this->url = 'content-remove';
        ContentRemoveSite::$site = $this;
    }

    public function loadContent()
    {

        $parameter = new ContentParameter();
        $parameter->contentTypeCheck = false;

        $type = $parameter->getContentType();
        $type->removeFromParent();

        (new UrlReferer())->redirect();

    }
}