<?php


namespace Nemundo\Wiki\Content;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Wiki\Data\Wiki\WikiReader;
use Nemundo\Wiki\Parameter\WikiPageParameter;
use Nemundo\Wiki\Site\WikiSite;
use Nemundo\Content\View\AbstractContentList;

class WikiPageContentList extends AbstractContentList
{

    public function getContent()
    {

        $this->redirectSite = WikiSite::$site;
        $this->redirectParameter =new WikiPageParameter();

        $list = new BootstrapHyperlinkList($this);

        $reader = new WikiReader();
        $reader->addOrder($reader->model->title);
        foreach ($reader->getData() as $wikiRow) {



            /*$site = clone(WikiSite::$site);
            $site->title = $wikiRow->title;
            $site->addParameter(new WikiParameter($wikiRow->id));

            $list->addSite($site);*/

            $site = $this->getRedirectSite($wikiRow->id);
            $site->title=$wikiRow->title;
            $list->addSite($site);

        }

        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}