<?php
// app/code/FME/Contact/Model/Contact.php

namespace FME\Contact\Model;

use Magento\Framework\Model\AbstractModel;

class Contact extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\FME\Contact\Model\ResourceModel\Contact::class);
    }
}
