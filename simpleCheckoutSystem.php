<?php

/**
 * Item class
 */
class Item{
    
    public $sku;
    public $name;
    public $price;
    
    
    public function __construct($sku,$name,$price){
        
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        
    }
    
    
}

/**
 * Checkout Class
 * 
 */
class Checkout{
    
    public $pricingRules;
    public $addedItems = [];
    
    public function __construct($pricingRules){
        
        $this->pricingRules = $pricingRules;
    }
    
    /**
     * add Item to the main cart
     * @param Item $item
     * @param int $units
     * @return boolean
     */
    public function addToCart(Item $item, int $units){

    if(array_key_exists($item->sku, $this->addedItems)){
        $this->addedItems[$item->sku]['totalUnits'] = $this->addedItems[$item->sku]['totalUnits'] + $units; 
    }else{
        $this->addedItems[$item->sku] = ['totalUnits' => $units, 'name' => $item->name, 'unitPrice' => $item->price, 'sku' => $item->sku];
    }

    return TRUE;
        
    }

    /**
     * Scans a single item for its price based on units added
     * 
     * @param Item $item
     * @return type
     */
    public function scan(Item $item){
        
        $totalPrice = 0;
        if( array_key_exists($item->sku, $this->addedItems) ){
            
            $cartItem = $this->addedItems[$item->sku];
            
            if( $pricingRule = $this->getPricingRule($item)){
                $totalPrice = $this->performPricingRule($cartItem, $pricingRule);
            }else{
                $totalPrice = $cartItem['totalUnits'] * $cartItem['unitPrice'];
            }
        }
        
        return $totalPrice;
    }
    
    /**
     * Calculates the total amount of all items added
     * 
     * @return type
     */
    public function total(){
        
        $total = 0;
        foreach ($this->addedItems as $sku => $cartItem){
            $item = staticData::getItem($sku);
            $itemTotal = $this->scan($item);
            $total = $total + $itemTotal;
        }
        return number_format($total,2);
    }

    /**
     * Perform pricing logic to get price for a single added item
     * 
     * @param array $cartItem
     * @param array $pricingRule
     * @return int
     */
    public function performPricingRule($cartItem, $pricingRule){
        
        $totalPrice = $cartItem['totalUnits'] * $cartItem['unitPrice'];
        if($cartItem['totalUnits'] >= $pricingRule['minPurchaseUnit']){
            $totalPrice = $this->calculateCartItemPrice($cartItem, $pricingRule);
        }
        return $totalPrice;
    }
    
    
    /**
     * Calculate Item price based on different pricing rules
     * 
     * @param array $cartItem
     * @param array $pricingRule
     * @return int
     */
    public function calculateCartItemPrice($cartItem, $pricingRule){
        
        $totalPrice = $cartItem['totalUnits'] * $cartItem['unitPrice'];
        
        if($pricingRule['discountedUnit']){
            $discountedUnits = (int) ($cartItem['totalUnits'] / $pricingRule['minPurchaseUnit']);
            $finalUnits = $cartItem['totalUnits'] - $discountedUnits;
            $totalPrice = $finalUnits * $cartItem['unitPrice'];
        }            
        else if ($pricingRule['discountedPrice']){
            $totalPrice = $cartItem['totalUnits'] * $pricingRule['discountedPrice'];
        }
        else if($pricingRule['bundleWith']){    
            if(
                array_key_exists($pricingRule['bundleWith'], $this->addedItems) && 
                $this->addedItems[$pricingRule['bundleWith']]['totalUnits'] >=  $cartItem['totalUnits']   
              ){
                $totalPrice = 0;
            }
                
        }
        
        return $totalPrice;
    }


    /**
     * Check if a pricing rule exists for a specific Item's SKU
     * 
     * @param Item $item
     * @return boolean
     */
    public function getPricingRule(Item $item){
        
        foreach ($this->pricingRules as $pricingRule){
            if($pricingRule['sku'] == $item->sku){
                return $pricingRule;
            }
        }
        return FALSE;
    }
    
    
    
}


/**
 * 
 * Static Data for pricing rules and item objects
 * 
 */
class staticData{
    
    public static function getPricingRules(){
        $pricingRules = [
            ['sku' => 'atv', 'minPurchaseUnit' => 3, 'discountedUnit' => 1, 'discountedPrice' => FALSE, 'bundleWith' => FALSE ],
            ['sku' => 'ipd', 'minPurchaseUnit' => 5, 'discountedUnit' => FALSE, 'discountedPrice' => 499.99, 'bundleWith' => FALSE ],
            ['sku' => 'vga', 'minPurchaseUnit' => 1, 'discountedUnit' => FALSE, 'discountedPrice' => FALSE, 'bundleWith' => 'mbp' ],
        ];
        return $pricingRules;
    }
    
    public static function getItemsList(){
        
        $items = [
            'ipd' => new Item('ipd', 'Super iPad', 549.99),
            'mbp' => new Item('mbp', 'MacBook Pro', 1399.99),
            'atv' => new Item('atv', 'Apple Tv', 109.50),
            'vga' => new Item('vga', 'VGA Adaptor', 30.00)
        ];
        
        return $items;
    }
    
    public static function getItem($sku){
        $items = self::getItemsList();
        return (isset($items[$sku])) ? $items[$sku] : FALSE;
    }


}



//add items to cart and perform totals
$pricingRules = staticData::getPricingRules();

// scenario 1
$co1 = new Checkout($pricingRules);
$co1->addToCart(staticData::getItem('atv'),3);
$co1->addToCart(staticData::getItem('vga'),1);
$addedItems = $co1->addedItems;
$total1 = $co1->total();
var_dump($addedItems);
echo '<h3>Scenario 1: $'.$total1.'</h3> <hr>';

// scenario 2
$co2 = new Checkout($pricingRules);
$co2->addToCart(staticData::getItem('atv'),2);
$co2->addToCart(staticData::getItem('ipd'),5);
$addedItems2 = $co2->addedItems;
$total2 = $co2->total();
var_dump($addedItems2);
echo '<h3>Scenario 2: $'.$total2.'</h3> <hr>';


// scenario 3
$co3 = new Checkout($pricingRules);
$co3->addToCart(staticData::getItem('mbp'),1);
$co3->addToCart(staticData::getItem('ipd'),1);
$co3->addToCart(staticData::getItem('vga'),1);
$addedItems3 = $co3->addedItems;
$total3 = $co3->total();
var_dump($addedItems3);
echo '<h3>Scenario 3: $'.$total3.'</h3> <hr>';


//var_dump($totalItems);
