<?php


namespace App\StudWorks\Order\Service;


use App\StudWorks\Order\Entity\Order;

class OrderStatusProcessor
{
    /**
     * @throws \Exception
     */
    private function throwException()
    {
        throw new \Exception('wrong order status');
    }

    /**
     * @param Order $order
     * @return Order
     * @throws \Exception
     */
    public function pushUnmoderateStatus(Order $order): Order
    {
        if ( $order->getStatus() !== Order::STATUS_FIRST_PAYMENT_DONE) {
            $this->throwException();
        }
        $order->setStatus(Order::STATUS_NOT_MODERATED);
        return $order;
    }

    /**
     * @param Order $order
     * @return Order
     */
    public function pushModerateStatus(Order $order): Order
    {
        if ( $order->getStatus() !== Order::STATUS_FIRST_PAYMENT_DONE) {
            $this->throwException();
        }
        $order->setStatus(Order::STATUS_MODERATED);
        return $order;
    }

    /**
     * @param Order $order
     * @return Order
     */
    public function pushCreateStatus(Order $order): Order
    {
        if ($order->getStatus()) {
            return $this->throwException();
        }
        $order->setStatus(Order::STATUS_CREATED);
        return $order;
    }

    /**
     * @param Order $order
     * @return Order
     * @throws \Exception
     */
    public function pushUnCorrectedStatus(Order $order): Order
    {
        if ( $order->getStatus() !== Order::STATUS_ON_CHECK ) {
            $this->throwException();
        }
        $order->setStatus(Order::STATUS_PROBLEM);
        return $order;
    }

    /**
     * @param Order $order
     * @return Order
     * @throws \Exception
     */
    public function pushCorrectedStatus(Order $order): Order
    {
        if ( $order->getStatus() !== Order::STATUS_ON_CHECK) {
            $this->throwException();
        }
        $order->setStatus(Order::STATUS_WORK_DONE);
        return $order;
    }
}