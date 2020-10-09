<?php

namespace Nemundo\Wiki\Site;

use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\FontAwesome\Site\AbstractEditIconSite;
use Nemundo\Wiki\Parameter\WikiParameter;
use Nemundo\Wiki\Type\WikiContentTypeCollection;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\DataParameter;
use Nemundo\Content\Site\ContentItemSite;
use Nemundo\Web\Site\AbstractSite;

class ContentEditSite extends AbstractEditIconSite
{

    /**
     * @var ContentEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'ContentEdit';
        $this->url = 'contentedit';

        ContentEditSite::$site=$this;

    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();


        $contentParameter=new ContentParameter();
        $contentParameter->addAllowedContentTypeCollection(new WikiContentTypeCollection());

        $contentType = $contentParameter->getContentType();  // $contentRow->getContentType();
        $form = $contentType->getForm($page);
        //$form->dataId=$contentRow->id;

        $form->redirectSite= WikiSite::$site;
        $form->redirectSite->addParameter(new WikiParameter());

        $page->render();

    }
}