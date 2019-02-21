connectToBase();
[].forEach.call(document.getElementsByTagName('select'),select=>{select.onchange=connectToBase;});
function connectToBase(){
    let responseDiv=document.querySelector('.response'),
        xhr=new XMLHttpRequest(),
        categoryValue=document.querySelector('[name="category"]').value,
        sizeValue=document.querySelector('[name="size"]').value,
        priceValue=document.querySelector('[name="price"]').value;
    xhr.open('post','filters.php');
    xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhr.send(`category=${categoryValue}&size=${sizeValue}&price=${priceValue}`);
    xhr.onreadystatechange=function(){
        if(this.readyState!=4)return;
        if(this.status==200){
            let response='';
            JSON.parse(this.responseText).forEach((element,index)=>{
                if(element==null)return;
                response+=`<span class='crimson-color-text'>${index+1} товар:</span> ${element.name}, категория - ${element.category}, размер - ${element.size}, стоимость - ${element.price}<br>`;
            });
            responseDiv.innerHTML=response||'<span class="crimson-color-text">Ни один товар не подходит под данные критерии.</span>';
        }else responseDiv.innerHTML='<span class="crimson-color-text">Ошибка подключения к базе данных.</span>';
    };
}