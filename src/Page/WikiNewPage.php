<?php


namespace Nemundo\Wiki\Page;


use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Site\WikiSite;
use Nemundo\Wiki\Template\WikiTemplate;

class WikiNewPage extends WikiTemplate  // AbstractTemplateDocument
{

    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);

        $form = (new WikiPageContentType())->getForm($layout->col1);
        $form->appendParameter = true;
        $form->redirectSite = WikiSite::$site;

        return parent::getContent();

    }

}