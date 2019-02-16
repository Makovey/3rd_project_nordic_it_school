document.addEventListener('DOMContentLoaded', function(){
    let catalogElement = document.querySelector('.catalog');

    let renderCatalog = (dataJSON)=>{
        console.log(dataJSON);
        //catalogElement.innerHTML = dataJSON;
        let paginationElement = catalogElement.querySelector('.catalog-pagination');
        let catalogCardsElement = catalogElement.querySelector('.catalog-cards');
        //Здесь надо показывать прелоадре, вместо этого мы пока просто делаем прозрачным каталог
        // catalogElement.style.opacity = 0;
        // catalogElement.style.transition = '0.5s all';
        catalogCardsElement.innerHTML = '';
        dataJSON.productCards.forEach((cardItem)=>{
            let cardItemElement = document.createElement('div');
            cardItemElement.classList.add('catalog-cards-item');
            cardItemElement.innerHTML = `
                <img src='${cardItem.img_src}'>
                <div class='name'>${cardItem.name}</div>
                <div class='price'>${cardItem.price} руб.</div>
                <div class='add-to-basket' data-product-id='${cardItem.id}'>Добавить в корзину</div>
            `;
            cardItemElement.querySelector('.add-to-basket').addEventListener('click', function(){
                let productId = this.getAttribute('data-product-id');
                basketAjaxRender(productId);
            });

            catalogCardsElement.append(cardItemElement);
        });


        paginationElement.innerHTML = '';

        for(let i = 1; i <= dataJSON.paginationInfo.countPage; i++){
            let paginationItemA = document.createElement('a');
            paginationItemA.href=`/catalog.php?page=${i}`;
            paginationItemA.innerHTML = i;
            paginationItemA.classList.add('catalog-pagination-item');
            paginationItemA.setAttribute('data-page', i);
            
            paginationElement.appendChild(paginationItemA);

            paginationItemA.addEventListener('click', function(e){
                e.preventDefault();

                let page = parseInt( this.getAttribute('data-page') );
                renderCatalogDataXHR(page);
            });
        }
    }

    let renderCatalogDataXHR = (page = 1)=>{
        let xhr = new XMLHttpRequest();

        xhr.open('GET',`/catalog_handler.php?page=${page}`);
        xhr.send();

        xhr.onreadystatechange = ()=>{
            if( xhr.readyState != 4 ) return;

            if( xhr.status == 200 ){
                renderCatalog( JSON.parse( xhr.responseText ) );
            }else{
                //Здесь мог бы быть код ошибки
            }
            
        }
    };

    renderCatalogDataXHR(1);

});