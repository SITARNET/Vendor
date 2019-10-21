<?php
namespace Sitarnet\Vendors\Controller\Adminhtml\Vendor;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action;
class Index extends Action
{
    const ADMIN_RESOURCE = 'Sitarnet_Vendors::vendor';
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }
    /**
     * Index action
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Sitarnet_Vendors::vendor');
        $resultPage->addBreadcrumb(__('Vendor'), __('Vendor'));
        $resultPage->addBreadcrumb(__('Manage Vendor'), __('Manage Vendor'));
        $resultPage->getConfig()->getTitle()->prepend(__('Vendor'));
        return $resultPage;
    }
}