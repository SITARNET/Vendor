<?php

namespace Sitarnet\Vendors\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Vendor extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('sitarnet_vendors', 'entity_id');
    }
}