<?php


namespace Nemundo\Wiki\Content;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Wiki\Content\Page\WikiPageContentView;
use Nemundo\Wiki\Data\WikiPage\WikiPage;
use Nemundo\Wiki\Data\WikiPage\WikiPageDelete;
use Nemundo\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Wiki\Data\WikiPage\WikiPageUpdate;
use Nemundo\Wiki\Parameter\WikiPageParameter;
use Nemundo\Wiki\Site\WikiSite;
use Nemundo\Wiki\Site\WikiViewSite;

class WikiPageContentType extends AbstractContentType  // AbstractMenuContentType
{

    public $title;

    public $groupId;


    protected function loadContentType()
    {

        $this->typeId = 'b94ec710-d1bd-4430-8866-4a7f9a493c52';
        $this->typeLabel = 'Wiki Page';
        $this->formClass = WikiPageContentForm::class;
        //$this->listClass = WikiPageContentList::class;
        $this->viewSite = WikiViewSite::$site;
        $this->viewClass = WikiPageContentView::class;
        $this->parameterClass = WikiPageParameter::class;

    }


    protected function onCreate()
    {

        $data = new WikiPage();
        $data->title = $this->title;
        $data->groupId=$this->groupId;
        $this->dataId = $data->save();

    }


    protected function onUpdate()
    {

        $update = new WikiPageUpdate();
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
        (new WikiPageDelete())->deleteById($this->dataId);
    }


    public function getDataRow()
    {

        return (new WikiPageReader())->getRowById($this->dataId);

    }


    public function getSubject()
    {

        $wikiRow = $this->getDataRow();
        $subject = $wikiRow->title;

        return $subject;

    }

}