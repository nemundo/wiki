<?php


namespace Nemundo\Wiki\Page;


use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Group\User\UserContentType;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\User\Type\UserSessionType;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Site\WikiSite;
use Nemundo\Wiki\Template\WikiTemplate;

class WikiNewPage extends WikiTemplate
{

    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);


        $type = new WikiPageContentType();
        $type->groupId = (new UserContentType((new UserSessionType())->userId))->getGroupId();
        $form = $type->getForm($layout->col1);

        $form->appendParameter = true;
        $form->redirectSite = WikiSite::$site;

        return parent::getContent();

    }

}