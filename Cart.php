<?php


class Cart
{
    private array $items = [];  //inte skriva här 

    //TODO Skriv getter för items
    public function getItems() {
        return $this -> items;
    }

    /*
     Skall lägga till en produkt i kundvagnen genom att
     skapa ett nytt cartItem och lägga till i $items array.
     Metoden skall returnera detta cartItem.

     VG: Om produkten redan finns i kundvagnen
     skall istället quantity på cartitem ökas.
     */
    public function addProduct($product)
    {
        $cartItem = new CartItem($product, 1);
        $this->items[$product->getId()] = $cartItem;
        return $cartItem;
    }

    //Skall ta bort en produkt ur kundvagnen (använd unset())
    public function removeProduct($product)
    {
        unset($this->items[$product->getId()]);
    }

    //Skall returnera totala antalet produkter i kundvagnen
    //OBS: Ej antalet unika produkter
    public function getTotalQuantity()
    {
        $totQuantity = count($this->items);
        return $totQuantity;
    }

    //Skall räkna ihop totalsumman för alla produkter i kundvagnen
    //VG: Tänk på att ett cartitem kan ha olika quantity
    public function getTotalSum()
    {
        $calcPrice = 0;
        foreach ($this->items as $item){
        $calcPrice += $item->getProduct()->getPrice();
        }
        
        $totSum = 0+$calcPrice;
        return $totSum;
    }
}
