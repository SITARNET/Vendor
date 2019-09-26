<?php

namespace Sitarnet\Vendors\Model\ResourceModel\Vendor;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = \Sitarnet\Vendors\Model\Vendor::VENDORS_ID;
    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Sitarnet\Vendors\Model\Vendor', 'Sitarnet\Vendors\Model\ResourceModel\Vendor');
    }
}