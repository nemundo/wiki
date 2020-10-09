<?php

namespace Nemundo\Wiki\Parameter;

use Nemundo\Web\Parameter\AbstractUrlParameter;

class WikiParameter extends AbstractUrlParameter
{
    protected function loadParameter()
    {
        $this->parameterName = 'wiki';
    }
}