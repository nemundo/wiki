<?php


namespace Nemundo\Wiki\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Inline\Span;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;
use Nemundo\Process\Cms\Data\Cms\CmsReader;
use Nemundo\Process\Cms\Site\CmsSortableSite;
use Nemundo\Wiki\Com\Container\WikiEditorContainer;
use Nemundo\Wiki\Com\WikiTypeDropdown;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Data\Wiki\WikiReader;
use Nemundo\Wiki\Data\WikiContent\WikiContentReader;
use Nemundo\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Wiki\Parameter\WikiPageParameter;
use Nemundo\Wiki\Site\Content\ContentEditSite;
use Nemundo\Wiki\Site\Content\ContentRemoveSite;
use Nemundo\Wiki\Site\Content\ContentSortableSite;
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

        $reader = new WikiPageReader();
        $reader->addOrder($reader->model->title);
        foreach ($reader->getData() as $wikiRow) {

            $site = clone(WikiSite::$site);
            $site->title = $wikiRow->title;
            $site->addParameter(new WikiPageParameter($wikiRow->id));
            $list->addSite($site);

        }


        $wikiParameter = new WikiPageParameter();
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
            $btn->site->addParameter(new WikiPageParameter($wikiId));

            $btn = new AdminIconSiteButton($container);
            $btn->site = clone(WikiDeleteSite::$site);
            $btn->site->addParameter(new WikiPageParameter($wikiId));


            $sortableDiv = new JquerySortable($layout->col2);
            //$sortableDiv->tagName = 'div';
            $sortableDiv->id = 'cms_sortable_';  //.$this->editorName;
            $sortableDiv->sortableSite = ContentSortableSite::$site;  // CmsSortableSite::$site;


            /*
            $cmsReader = new CmsReader();
            $cmsReader->model->loadContent();
            $cmsReader->model->content->loadContentType();
            $cmsReader->filter->andEqual($cmsReader->model->parentId, $parentId);
            $cmsReader->addOrder($cmsReader->model->itemOrder);
            foreach ($cmsReader->getData() as $cmsRow) {


                $div = new Div($sortableDiv);
                $div->id = 'item_' . $cmsRow->id;

                $widget=  new AdminWidget($div);*/



            $contentReader=new WikiContentReader();
            $contentReader->model->loadContent();
            $contentReader->model->content->loadContentType();
            $contentReader->filter->andEqual($contentReader->model->pageId, $wikiId);
            $contentReader->addOrder($contentReader->model->itemOrder);
            foreach ($contentReader->getData() as $contentRow) {

                $div=new Div($sortableDiv);
                $div->id = 'item_' . $contentRow->id;

                $type = $contentRow->content->getContentType();
                $type->getView($div);


                $site = clone(ContentEditSite::$site);
                $site->addParameter(new ContentParameter($type->getContentId()));
                $site->addParameter($wikiParameter);

                $btn = new AdminIconSiteButton($div);
                $btn->site = $site;

                $site = clone(ContentRemoveSite::$site);
                $site->addParameter(new ContentParameter($type->getContentId()));
                $site->addParameter($wikiParameter);

                $btn = new AdminIconSiteButton($div);
                $btn->site = $site;


                //$span=new Span($div);
                //$span->content='item order: '.$contentRow->itemOrder;

            }



            /*

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


            }*/


            //$container = new CmsEditorContainer($layout->col2);
            //$container->contentType = $wikiType;

        }

        return parent::getContent();

    }

}