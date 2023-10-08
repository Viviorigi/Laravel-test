<?php

namespace App\Helper;

class Cart{
    private $items=[];
    private $total_quantity=0;
    private $total_price=0;

    public function __construct() {
        $this->items = session('cart') ? session('cart'):[];

    }
    //phuong thuc lay danh sach san pham trong gio hang
    public function list()  {
        return $this->items;
    }

    //them moi san pham vao gio hang
    public function add($product,$quantity = 1)  {
        $item=[
            'product_id'=>$product->id,
            'price'=>$product->sale_price >0 ? $product->sale_price : $product->price,
            'name'=>$product->name,
            'image'=>$product->image,
            'quantity'=>$quantity
        ];
        $this->items[$product->id]=$item;
        session(['cart'=>$this->items]);
    }

    //cap nhat gio hang


    //xoa san pham khoi gio hang

    //xoa het san pham 

    //tinh tong tien
    public function getTotalPrice()  {
        $total_price=0;
        foreach ($this->items as  $item) {
            $total_price+=$item['price']*$item['quantity'];
        }
        return   $total_price;
    }

    public function getTotalQuantity()  {
        $total_quantity=0;
        foreach ($this->items as  $item) {
            $total_quantity+=$item['quantity'];
        }
        return   $total_quantity;
    }
}