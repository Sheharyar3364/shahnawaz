<?php
// app/code/FME/Contact/Controller/Index/Post.php

namespace FME\Contact\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use FME\Contact\Model\ContactFactory;
use Magento\Customer\Model\Session as CustomerSession;



class Post extends Action
{
    protected $contactFactory;
    protected $resultRedirectFactory;   
    protected $customerSession;


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        ContactFactory $contactFactory,
        CustomerSession $customerSession,
        ResultFactory $resultFactory
    ) {
        parent::__construct($context);
        $this->contactFactory = $contactFactory;
        $this->customerSession = $customerSession;
        $this->resultRedirectFactory = $resultFactory;
    }

    public function execute()
    {

        if(!$this->customerSession->isLoggedIn()) {
            $this->messageManager->addErrorMessage(__("Please login to submit the form"));
            return $this->resultRedirectFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('contactform');

        } else {

            // Handle form submission here
            $postData = $this->getRequest()->getPostValue();

            // Save form data to database
            $this->saveFormData($postData);
        }

        // Redirect to thank you page
        return $this->resultRedirectFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('contactform/index/thankyou');
    }



    private function saveFormData($data)
    {
            // Save form data to database
            $contactModel = $this->contactFactory->create();
            $contactModel->setData($data);
    
            // Set checkbox values
            $contactModel->setData('web_app', isset($data['web_app']) && $data['web_app'] === 'yes' ? 'yes' : 'no');
            $contactModel->setData('mobile_app', isset($data['mobile_app']) && $data['mobile_app'] === 'yes' ? 'yes' : 'no');
            $contactModel->setData('desktop_app', isset($data['desktop_app']) && $data['desktop_app'] === 'yes' ? 'yes' : 'no');

    
            $contactModel->save();
    }
    
}


