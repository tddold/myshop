{*Page product*}
<h3>{$rsProduct[0]['name']}</h3>

<img width="575" src="/images/products/{$rsProduct[0]['image']}"/>
<br/>
Цена: {$rsProduct[0]['price']}
<br/>

<a id="addCart_{$rsProduct[0]['id']}" href="#" onClick="addToCart({$rsProduct[0]['id']});
        return false;" alt='Add to cart'>Add to cart</a>
<p>Описание: <br />{$rsProduct[0]['description']}</p>
