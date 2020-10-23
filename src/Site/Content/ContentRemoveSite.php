<?php

namespace Nemundo\Wiki\Site\Content;

use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Wiki\Data\WikiContent\WikiContentDelete;
use Nemundo\Wiki\Parameter\WikiPageParameter;


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

        /*$parameter = new ContentParameter();
        $parameter->contentTypeCheck = false;

        $type = $parameter->getContentType();
        $type->removeFromParent();*/

        //?content=43&wiki=10

        $pageId=(new WikiPageParameter())->getValue();
        $contentId=(new ContentParameter())->getValue();

        $delete=new WikiContentDelete();
        $delete->filter->andEqual($delete->model->pageId, $pageId);
        $delete->filter->andEqual($delete->model->contentId, $contentId);
        $delete->delete();

        (new UrlReferer())->redirect();

    }

}