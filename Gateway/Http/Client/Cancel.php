<?php

/**
 * @author Mygento Team
 * @copyright Copyright 2017 Mygento (https://www.mygento.ru)
 * @package Mygento_Cloudpayments
 */

namespace Mygento\Cloudpayments\Gateway\Http\Client;

class Cancel extends Client
{
    public function placeRequest(\Magento\Payment\Gateway\Http\TransferInterface $transferObject)
    {
        $this->_helper->addLog('Void request');
        $this->_helper->addLog($transferObject->getBody());
        $response = $this->sendRequest('/payments/void', $transferObject->getBody());
        $this->_helper->addLog('Void response');
        $this->_helper->addLog($response);
        return json_decode($response, true);
    }
}
