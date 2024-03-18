<?php
namespace FME\Contact\Block;

use Magento\Framework\View\Element\Template;
use Magento\Customer\Model\Session as CustomerSession;

class Contact extends Template
{
    protected $customerSession;

    public function __construct(
        Template\Context $context,
        CustomerSession $customerSession,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->customerSession = $customerSession;
        $this->setTemplate('FME_Contact::contact.phtml');
    }

    public function getLoggedInCustomerName()
    {
        if ($this->customerSession->isLoggedIn()) {
            $customer = $this->customerSession->getCustomer();
           // var_dump($customer->getData()); // Log customer data
            return $this->escapeHtml($customer->getName());
        }
        return ''; // Or a placeholder for non-logged-in users
    }


    public function getLoggedInCustomerEmail()
    {
        if ($this->customerSession->isLoggedIn()) {
            return $this->escapeHtml($this->customerSession->getCustomer()->getEmail());
        }
        return ''; // Or a placeholder for non-logged-in users
    }
}
