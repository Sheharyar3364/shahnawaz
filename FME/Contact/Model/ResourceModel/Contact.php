<?php
// app/code/FME/Contact/Model/ResourceModel/Contact.php

namespace FME\Contact\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Contact extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('fme_contact_form', 'contact_id');
    }
}
