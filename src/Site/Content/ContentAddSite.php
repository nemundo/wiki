<?php

namespace Nemundo\Wiki\Site\Content;

use Nemundo\Com\Template\TemplateDocument;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Event\WikiEvent;
use Nemundo\Wiki\Parameter\WikiPageParameter;

class ContentAddSite extends AbstractSite
{

    /**
     * @var ContentAddSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Content Add';
        $this->url = 'contenttypeadd';
        $this->menuActive = false;
        ContentAddSite::$site = $this;
    }

    public function loadContent()
    {

        $page = new TemplateDocument();

$wikiId = (new WikiPageParameter())->getValue();
        $wikiType = new WikiPageContentType($wikiId);

        $type = (new ContentTypeParameter())->getContentType();

        $event= new WikiEvent();
        $event->pageId=$wikiId;
        $type->addEvent($event);
        //$type->parentId = $wikiType->getContentId();

        $form = $type->getForm($page);
        $form->redirectSite = $wikiType->getViewSite();

        $page->render();


        /*
                $wikiType = new WikiPageContentType((new WikiParameter())->getValue());

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


        //(new UrlReferer())->redirect();

    }
}