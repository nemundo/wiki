<?php


namespace Nemundo\Wiki\Page;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Wiki\Com\WikiTypeDropdown;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Data\Wiki\WikiReader;
use Nemundo\Wiki\Parameter\WikiParameter;
use Nemundo\Wiki\Site\WikiSite;
use Nemundo\Wiki\Template\WikiTemplate;
use Nemundo\Process\Cms\Com\Container\CmsEditorContainer;
use Nemundo\Content\Com\Table\ContentLogTable;

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


            $dropdown=new WikiTypeDropdown($layout->col2);


            //$container = new CmsEditorContainer($layout->col2);
            //$container->contentType = $wikiType;

        }

        return parent::getContent();

    }

}