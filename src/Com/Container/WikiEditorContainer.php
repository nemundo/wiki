<?php


namespace Nemundo\Wiki\Com\Container;


use Nemundo\Com\Container\AbstractRestrictedUserHtmlContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\User\Access\UserRestrictionTrait;
use Nemundo\Wiki\Usergroup\WikiEditorUsergroup;

class WikiEditorContainer extends AbstractRestrictedUserHtmlContainer
{

    use UserRestrictionTrait;

    public function getContent()
    {

        $this->restricted = true;
        $this->addRestrictedUsergroup(new WikiEditorUsergroup());


        return parent::getContent();

    }

}