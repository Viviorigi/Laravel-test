<?php


function CategoryParent($categories,$checked=0,$parentId=0,$character=' ') {
    foreach($categories as $key => $item){
        if($item->parent_id==$parentId){
            if($checked!=0 && $checked==$item->id){
                echo "<option value='$item->id' selected>$character $item->name</option>";
                
            }else{
                echo "<option value='$item->id'>$character $item->name</option>";              
            }
            unset($categories[$key]);
            CategoryParent($categories,$checked,$item->id,$character.'----');
        }     
    
    }
}

function salepercent($price,$saleprice){
    return round((1-($saleprice/$price))*100);
}