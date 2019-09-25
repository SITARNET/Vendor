<?php

namespace Sitarnet\Vendors\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;
use Sitarnet\Vendors\Model\Vendor;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var Vendor
     */
    protected $_vendor;
    /**
     * UpgradeData constructor.
     * @param Vendor $vendor
     * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
     */

    private $eavSetupFactory;

    public function __construct(Vendor $vendor, \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->_vendor = $vendor;
        $this->eavSetupFactory = $eavSetupFactory;
    }
    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @throws \Exception
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.0.2') < 0) {

            $vendors = [
                ['name' => 'Adidas', 'description' => 'To start with – here are some more 
                interesting facts and figures.'],
                ['name' => 'Nike', 'description' => 'To start with – here are some more 
                interesting facts and figures.'],
                ['name' => 'Puma', 'description' => 'To start with – here are some more 
                interesting facts and figures.'],
                ['name' => 'Reebok', 'description' => 'To start with – here are some more 
                interesting facts and figures.'],
                ['name' => 'Armani', 'description' => 'To start with – here are some more 
                interesting facts and figures.'],
            ];

            $vendorsIds = [];
            foreach ($vendors as $data) {
                $vendor = $this->_vendor->setData($data)->save();
                $vendorsIds[] = $vendor->getId();
            }

            $eavSetup = $this->eavSetupFactory->create();
            $eavSetup->addAttribute(\Magento\Catalog\Model\Product::ENTITY,
                'my_vendor',
                [
                    'group' => 'Vendor group',
                    'type' => 'varchar',
                    'backend' => '',
                    'fronend' => '',
                    'label' => 'My Custom Vendor',
                    'input' => 'select',
                    'note' => 'My Vendor',
                    'class' => '',
                    'source' => 'Sitarnet\Vendors\Model\Attribute\Source\Vendor',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => true,
                    'used_in_product_listing' => true,
                    'unique' => false,
                ]
            );

        }

        $setup->endSetup();
    }
}