<?php


namespace Nemundo\Wiki\Event;


use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Wiki\Data\WikiContent\WikiContent;
use Nemundo\Wiki\Data\WikiContent\WikiContentCount;
use Nemundo\Wiki\Data\WikiContent\WikiContentValue;

class WikiEvent extends AbstractContentEvent
{

    public $pageId;

    public function onCreate(AbstractType $contentType)
    {

        $itemOrder = 0;
        $count = new WikiContentCount();
        $count->filter->andEqual($count->model->pageId, $this->pageId);
        if ($count->getCount() > 0) {
            $value = new WikiContentValue();
            $value->field = $value->model->itemOrder;
            $value->filter->andEqual($value->model->pageId, $this->pageId);
            $itemOrder = $value->getMaxValue();
            $itemOrder++;
        }

        $data = new WikiContent();
        $data->pageId = $this->pageId;
        $data->contentId = $contentType->getContentId();
        $data->itemOrder = $itemOrder;
        $data->save();

    }

}