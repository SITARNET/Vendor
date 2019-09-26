<?php

namespace Sitarnet\Vendors\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Vendor extends AbstractSource
{
    /**
     * @var \Sitarnet\Vendors\Model\Vendor
     */
    protected $_model;
    /**
     * Vendor constructor.
     * @param \Sitarnet\Vendors\Model\Vendor $model
     */
    public function __construct(\Sitarnet\Vendors\Model\Vendor $model)
    {
        $this->_model = $model;
    }
    /**
     * Create options array
     *
     * @return array
     */
    public function getAllOptions()
    {
        $options = [];
        $modelCollection = $this->_model->getCollection()
            ->addFieldToSelect('entity_id')
            ->addFieldToSelect('name')
            ->addFieldToSelect('description');
        foreach ($modelCollection as $item){
            $options[] = [
                'label' => $item->getName(),
                'value' => $item->getId(),
            ];
        }
        return $options;
    }
}