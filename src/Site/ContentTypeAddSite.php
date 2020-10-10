<?php

namespace Nemundo\Wiki\Site;

use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Parameter\WikiParameter;

class ContentTypeAddSite extends AbstractSite
{

    /**
     * @var ContentTypeAddSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'ContentType Add';
        $this->url = 'contenttypeadd';
        $this->menuActive=false;
        ContentTypeAddSite::$site = $this;
    }

    public function loadContent()
    {



        $wikiType=new WikiPageContentType((new WikiParameter())->getValue());

        $type = (new ContentTypeParameter())->getContentType();
        $type->parentId = $wikiType->getContentId();
$type->saveType();



        //$type->deleteType();

/*
        $contentId = (new ContentParameter())->getValue();

        $contentReader = new ContentReader();
        $contentReader->model->loadContentType();
        $contentRow = $contentReader->getRowById($contentId);
        $type = $contentRow->getContentType();
        $type->deleteType();*/


        (new UrlReferer())->redirect();

    }
}