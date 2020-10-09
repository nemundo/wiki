<?php


namespace Nemundo\Wiki\Content;


use Nemundo\Wiki\Content\Page\WikiPageContentView;
use Nemundo\Wiki\Data\Wiki\Wiki;
use Nemundo\Wiki\Data\Wiki\WikiDelete;
use Nemundo\Wiki\Data\Wiki\WikiReader;
use Nemundo\Wiki\Data\Wiki\WikiUpdate;
use Nemundo\Wiki\Parameter\WikiParameter;
use Nemundo\Wiki\Site\WikiSite;
use Nemundo\Content\Type\AbstractMenuContentType;

class WikiPageContentType extends AbstractMenuContentType
{

    public $title;


    protected function loadContentType()
    {

        $this->typeId = 'b94ec710-d1bd-4430-8866-4a7f9a493c52';
        $this->typeLabel = 'Wiki Page';
        $this->formClass = WikiPageContentForm::class;
        $this->listClass = WikiPageContentList::class;
        $this->viewSite = WikiSite::$site;
        $this->viewClass=WikiPageContentView::class;
        $this->parameterClass = WikiParameter::class;

    }


    protected function onCreate()
    {

        $data = new Wiki();
        $data->title = $this->title;
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

        $update = new WikiUpdate();
        $update->title = $this->title;
        $update->updateById($this->dataId);

    }


    protected function onIndex()
    {

        $wikiRow = $this->getDataRow();
        //$this->addSearchText($wikiRow->title);

    }


    protected function onDelete()
    {
        (new WikiDelete())->deleteById($this->dataId);
    }


    public function getDataRow()
    {

        return (new WikiReader())->getRowById($this->dataId);

    }


    public function getSubject()
    {

        $wikiRow = $this->getDataRow();
        $subject = $wikiRow->title;

        return $subject;

    }

}