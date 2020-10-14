<?php

namespace Nemundo\Wiki\Site\Content;

use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Wiki\Parameter\WikiParameter;
use Nemundo\Wiki\Site\WikiSite;

class ContentEditSite extends AbstractEditIconSite
{

    /**
     * @var ContentEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Content Edit';
        $this->url = 'contentedit';

        ContentEditSite::$site = $this;

    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;

        //$contentParameter->addAllowedContentTypeCollection(new WikiContentTypeCollection());

        $contentType = $contentParameter->getContentType();  // $contentRow->getContentType();
        $form = $contentType->getForm($page);
        //$form->dataId=$contentRow->id;

        $form->redirectSite = WikiSite::$site;
        $form->redirectSite->addParameter(new WikiParameter());

        $page->render();

    }
}