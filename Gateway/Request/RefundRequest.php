<?php

/**
 * @author Mygento Team
 * @copyright Copyright 2017 Mygento (https://www.mygento.ru)
 * @package Mygento_Cloudpayments
 */

namespace Mygento\Cloudpayments\Gateway\Request;

use Magento\Payment\Gateway\Data\PaymentDataObjectInterface;

class RefundRequest implements \Magento\Payment\Gateway\Request\BuilderInterface
{
    /**
     * Builds ENV request
     *
     * @param array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        if (!isset($buildSubject['payment'])
            || !$buildSubject['payment'] instanceof PaymentDataObjectInterface
        ) {
            throw new \InvalidArgumentException('Payment data object should be provided');
        }

        $payment = $buildSubject['payment']->getPayment();
        $txnId = str_replace(['-refund', '-capture'], '', $payment->getParentTransactionId());

        return [
            'TransactionID' => $txnId,
            'Amount' => $buildSubject['amount']
        ];
    }
}
