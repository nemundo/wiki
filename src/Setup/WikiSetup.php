<?php


namespace Nemundo\Wiki\Setup;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Wiki\Data\WikiType\WikiType;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;

class WikiSetup extends ContentTypeSetup
{

    public function addContentType(AbstractType $contentType) {

        parent::addContentType($contentType);

        $data=new WikiType();
        $data->updateOnDuplicate=true;
        $data->contentTypeId=$contentType->typeId;
        $data->save();

        return $this;


    }

}