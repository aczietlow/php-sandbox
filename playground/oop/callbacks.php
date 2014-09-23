<?php

// My very own function that uses a closure as a callback.

Class Cart{

  protected $items = array();

  protected $total = 0;

  public function addItem($item, $price) {
    $this->items[$item] = $price;
  }

  public function applyDiscount($discount) {
    $discountAmt = 0;

    if (is_callable($discount)) {
      $discountAmt = call_user_func($discount, $this->total);
    }
    $this->total = $this->total - ($this->total * $discountAmt);
  }

  public function getTotal() {
    foreach ($this->items as $item => $price) {
      $this->total = $this->total + $price;
    }
    return $this->total;
  }

  public function checkout() {
    return "You total cost will be $this->total";
  }
}

$discount_callback = function($total) {
  switch ($total) {
    case $total <= 15:
      $discount = .4;
      break;
    case $total > 15:
      $discount = .5;
      break;
    default:
      $discount = 0;
      break;
  }
  return $discount;
};

$cart = new Cart();

$cart->addItem('eggs', 2.50);
$cart->addItem('milk', 5);
$cart->addItem('cereal', 10);

$total = $cart->getTotal();


$cart->applyDiscount($discount_callback);

echo $cart->checkout();
