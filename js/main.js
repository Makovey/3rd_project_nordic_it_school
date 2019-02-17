let basketElement = document.querySelector('header .basket a');

let basketAjaxRender = (productId = null)=>{
    let xhr = new XMLHttpRequest();

    let path = 'basket_handler.php';

    if( productId != null ){
        path += `?product_id=${productId}`;    
    }

    xhr.open('get', path);
    xhr.send();

    xhr.onreadystatechange = function(){
        if( xhr.readyState == 4 ){
            if( xhr.status == 200 ){
                let data = JSON.parse( xhr.responseText );
                basketElement.innerHTML = `
                    (${data.count}) ${data.price} руб.
                `;   
            }
        }
    }
}
basketAjaxRender();