<?php


namespace Nemundo\Wiki\Page;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Content\Index\Group\Check\GroupCheck;
use Nemundo\Content\Index\Group\User\GroupMembership;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Layout\BootstrapThreeColumnLayout;
use Nemundo\Package\Bootstrap\Listing\BootstrapHyperlinkList;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;
use Nemundo\Wiki\Com\Container\WikiEditorContainer;
use Nemundo\Wiki\Com\WikiTypeDropdown;
use Nemundo\Wiki\Config\WikiConfig;
use Nemundo\Wiki\Content\WikiPageContentType;
use Nemundo\Wiki\Data\WikiContent\WikiContentReader;
use Nemundo\Wiki\Data\WikiPage\WikiPageReader;
use Nemundo\Wiki\Parameter\WikiPageParameter;
use Nemundo\Wiki\Site\Content\ContentEditSite;
use Nemundo\Wiki\Site\Content\ContentRemoveSite;
use Nemundo\Wiki\Site\Content\ContentSortableSite;
use Nemundo\Wiki\Site\ContentViewSite;
use Nemundo\Wiki\Site\PrintSite;
use Nemundo\Wiki\Site\WikiDeleteSite;
use Nemundo\Wiki\Site\WikiEditSite;
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

        $showList = true;
        if (WikiConfig::$groupRestricted) {
            if (!(new GroupMembership())->hasGroup()) {
                $showList = false;
            }
        }


        if ($showList) {

            $reader = new WikiPageReader();
            $reader->model->loadGroup();

            if (WikiConfig::$groupRestricted) {
                foreach ((new GroupMembership())->getGroupIdList() as $groupId) {
                    $reader->filter->orEqual($reader->model->groupId, $groupId);
                }
            }


            $reader->addOrder($reader->model->title);
            foreach ($reader->getData() as $wikiRow) {

                $site = clone(WikiSite::$site);
                $site->title = $wikiRow->title . ' (' . $wikiRow->group->group . ')';
                $site->addParameter(new WikiPageParameter($wikiRow->id));
                $list->addSite($site);

            }


            $wikiParameter = new WikiPageParameter();
            if ($wikiParameter->exists()) {

                $wikiId = $wikiParameter->getValue();
                $wikiType = new WikiPageContentType($wikiId);

                $wikiRow = $wikiType->getDataRow();

                $showItem = true;
                if (WikiConfig::$groupRestricted) {
                    $showItem = (new GroupCheck())->isMemberOfGroupId($wikiRow->groupId);
                }

                if ($showItem) {



                    $title = new AdminTitle($layout->col2);
                    $title->content = $wikiType->getSubject();


                    $btn=new AdminIconSiteButton($layout->col2);
                    $btn->site=$wikiType->getViewSite();



                    $container = new WikiEditorContainer($layout->col2);

                    new WikiTypeDropdown($container);

                    $btn = new AdminIconSiteButton($container);
                    $btn->site = clone(WikiEditSite::$site);
                    $btn->site->addParameter(new WikiPageParameter($wikiId));

                    $btn = new AdminIconSiteButton($container);
                    $btn->site = clone(PrintSite::$site);
                    $btn->site->addParameter(new WikiPageParameter($wikiId));

                    $btn = new AdminIconSiteButton($container);
                    $btn->site = clone(WikiDeleteSite::$site);
                    $btn->site->addParameter(new WikiPageParameter($wikiId));

                    $sortableDiv = new JquerySortable($layout->col2);
                    $sortableDiv->id = 'cms_sortable_';
                    $sortableDiv->sortableSite = ContentSortableSite::$site;

                    $contentReader = new WikiContentReader();
                    $contentReader->model->loadContent();
                    $contentReader->model->content->loadContentType();
                    $contentReader->filter->andEqual($contentReader->model->pageId, $wikiId);
                    $contentReader->addOrder($contentReader->model->itemOrder);
                    foreach ($contentReader->getData() as $contentRow) {

                        $div = new Div($sortableDiv);
                        $div->id = 'item_' . $contentRow->id;

                        $type = $contentRow->content->getContentType();
                        $type->getView($div);


                        $btn = new AdminIconSiteButton($div);
                        $btn->site =clone(ContentViewSite::$site);
                        $btn->site->addParameter(new ContentParameter($type->getContentId()));


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

                    }




                    $ul=new UnorderedList($layout->col3);


                    $contentReader = new WikiContentReader();
                    $contentReader->model->loadContent();
                    $contentReader->model->content->loadContentType();
                    $contentReader->filter->andEqual($contentReader->model->pageId, $wikiId);
                    $contentReader->addGroup($contentReader->model->content->contentTypeId);
                    //addOrder($contentReader->model->itemOrder);

                    $count=new CountField($contentReader);

                    foreach ($contentReader->getData() as $contentRow) {


                        $number= $contentRow->getModelValue($count);
                        $ul->addText($contentRow->content->contentType->contentType.' ('.$number.')');



                        /*
                        $div = new Div($sortableDiv);
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
                        $btn->site = $site;*/

                    }

                } else {

                    $p = new Paragraph($layout->col2);
                    $p->content = 'Kein Zugriff';

                }


            }

        }

        return parent::getContent();

    }

}