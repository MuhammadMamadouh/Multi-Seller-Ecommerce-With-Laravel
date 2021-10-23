<?php


namespace App\Classes;


use App\Models\Coupon;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;

class CouponConditions
{

    private $coupon;
    private $valid;
    private $message;
    public $end_date;
    public $start_date;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
        $this->applyConditions();
    }

    private function applyConditions()
    {
        switch ($this->coupon) {
            case $this->notActive():
                $this->setMessage('Sorry, coupon is not active');
                $this->setValid(false);
                break;
            case $this->notValidQuantity():
                $this->setMessage('Sorry, This coupon is only applicable for quantities above ' . $this->coupon->quantity . ' units');
                $this->setValid(false);
                break;
            case $this->notStarted():
                $this->setMessage('Sorry, coupon activation is not started yet');
                $this->setValid(false);
                break;
            case $this->isExpired():
                $this->setMessage('Sorry, coupon is Expired');
                $this->setValid(false);
                break;
            case  $this->exceedMinimumSpend():
                $this->setMessage('This coupon is only applicable for total above ' . $this->coupon->minimum_spend . ' $');
                $this->setValid(false);
                break;
            case  $this->exceedMaximumSpend():
                $this->setMessage('This coupon is only applicable for total below ' . $this->coupon->maximum_spend . ' $');
                $this->setValid(false);
                break;
            default :
                $this->setMessage('coupon has been applied successfully');
                $this->setValid(true);
                break;
        }
    }

    private function exceedMaximumSpend(): bool
    {
        return \Cart::getSubTotal() > $this->coupon->maximum_spend;
    }

    private function exceedMinimumSpend(): bool
    {
        return \Cart::getSubTotal() < $this->coupon->minimum_spend;
    }

    /**
     * check if the amount of items of cart has reached the
     * @return bool
     */
    private function notValidQuantity(): bool
    {
        $quantity = \Cart::getContent()->count();
        return $quantity > $this->coupon->quantity;
    }

    /**
     * Check if the coupon is active
     * @return bool
     */
    private function notActive()
    {
        return $this->coupon->status === 'inactive';
    }

    /**
     * check if the coupon has started
     * @return bool
     */
    private function notStarted(): bool
    {
        $this->start_date = Carbon::createFromDate($this->coupon->start_at);
        return (now()->lessThan($this->start_date));
    }

    /**
     * check if the coupon has started
     * @return bool
     */
    private function isExpired()
    {
        $this->end_date = Carbon::createFromDate($this->coupon->end_at);
        return now()->greaterThan($this->end_date);
    }


    /**
     * @param mixed $coupon
     */
    public function setCoupon($coupon): void
    {
        $this->coupon = $coupon;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {

        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function isValid()
    {
        return $this->valid;
    }


    /**
     * @param bool $valid
     */
    public function setValid(bool $valid): void
    {
        $this->valid = $valid;
    }

}
