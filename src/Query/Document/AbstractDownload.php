<?php

namespace Dvsa\Olcs\Transfer\Query\Document;

use Dvsa\Olcs\Transfer\Query\AbstractQuery;
use Dvsa\Olcs\Transfer\Query\LoggerOmitResponseInterface;
use Dvsa\Olcs\Transfer\Util\Annotation as Transfer;

/**
 * @author Dmitry Golubev <dmitrij.golubev@valtech.co.uk>
 */
class AbstractDownload extends AbstractQuery implements LoggerOmitResponseInterface
{
    /**
     * @var  string
     * @Transfer\Filter({"name":"Zend\Filter\StringTrim"})
     */
    protected $identifier;

    /**
     * @var  bool
     * @Transfer\Optional
     * @Transfer\Filter({"name":"Zend\Filter\Boolean"})
     */
    protected $isInline;

    /**
     * Get identifier, Eg filename
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Inline or download
     *
     * @return boolean
     */
    public function isInline()
    {
        return $this->isInline;
    }
}
