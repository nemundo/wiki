<?php


namespace Nemundo\Wiki\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Wiki\Com\Container\WikiEditorContainer;
use Nemundo\Wiki\Com\WikiTypeDropdown;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Data\Wiki\WikiReader;
use Nemundo\Wiki\Parameter\WikiParameter;
use Nemundo\Wiki\Site\Content\ContentEditSite;
use Nemundo\Wiki\Site\Content\ContentRemoveSite;
use Nemundo\Wiki\Site\PrintSite;
use Nemundo\Wiki\Site\WikiDeleteSite;
use Nemundo\Wiki\Site\WikiSite;
use Nemundo\Wiki\Template\WikiTemplate;

class WikiPage extends WikiTemplate
{

    public function getContent()
    {

        $layout = new BootstrapThreeColumnLayout($this);
        $layout->col1->columnWidth = 2;
        $layout->col2->columnWidth = 5;
        $layout->col3->columnWidth = 5;

        $list = new BootstrapHyperlinkList($layout->col1);

        $reader = new WikiReader();
        $reader->addOrder($reader->model->title);
        foreach ($reader->getData() as $wikiRow) {

            $site = clone(WikiSite::$site);
            $site->title = $wikiRow->title;
            $site->addParameter(new WikiParameter($wikiRow->id));
            $list->addSite($site);

        }


        $wikiParameter = new WikiParameter();
        if ($wikiParameter->exists()) {

            $wikiId = $wikiParameter->getValue();
            $wikiType = new WikiPageContentType($wikiId);

            //$contentTable = new ContentLogTable($layout->col3);
            //$contentTable->contentType = $wikiType;

            $title = new AdminTitle($layout->col2);
            $title->content = $wikiType->getSubject();

            //$container=new ApplicationAddContentTypeContainer($layout->col2);
            //$container->application=new WikiApplication();

            $container=new WikiEditorContainer($layout->col2);

            $dropdown = new WikiTypeDropdown($container);

            $btn = new AdminIconSiteButton($container);
            $btn->site = clone(PrintSite::$site);
            $btn->site->addParameter(new WikiParameter($wikiId));

            $btn = new AdminIconSiteButton($container);
            $btn->site = clone(WikiDeleteSite::$site);
            $btn->site->addParameter(new WikiParameter($wikiId));

            foreach ($wikiType->getChild() as $child) {

                $type = $child->getContentType();
                $type->getView($layout->col2);


                $container=new WikiEditorContainer($layout->col2);

                $site = clone(ContentEditSite::$site);
                $site->addParameter(new ContentParameter($type->getContentId()));
                $site->addParameter($wikiParameter);

                $btn = new AdminIconSiteButton($container);
                $btn->site = $site;

                $site = clone(ContentRemoveSite::$site);
                $site->addParameter(new ContentParameter($type->getContentId()));
                $site->addParameter($wikiParameter);

                $btn = new AdminIconSiteButton($container);
                $btn->site = $site;


            }


            //$container = new CmsEditorContainer($layout->col2);
            //$container->contentType = $wikiType;

        }

        return parent::getContent();

    }

}