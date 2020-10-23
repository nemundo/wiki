<?php
namespace Nemundo\Wiki\Data\WikiPage;
class WikiPageCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WikiPageModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WikiPageModel();
}
}