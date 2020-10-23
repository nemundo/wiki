<?php

namespace Nemundo\Wiki\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class WikiPageParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'page';
    }
}