<?php

namespace Dvsa\OlcsTest\Transfer\Router;

use Zend\Http\AbstractMessage;
use Zend\Stdlib\RequestInterface;

class RequestWithoutGetMethodStub extends AbstractMessage implements RequestInterface
{

    public function setMetadata($spec, $value = null)
    {
    }

    public function setContent($content)
    {
    }

    public function getContent()
    {
    }

}