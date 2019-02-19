<?php include($_SERVER['DOCUMENT_ROOT']."/header.php"); ?>

<div class="wrapper">
    <div class="wrapper_text">
        <h2>Ваша корзина</h2>
        <p>Товары резервируются на определенное время</p>
    </div>

    <div class="basket_frame">
        <div class="frame_left">
            <span>ФОТО</span>
            <span>НАИМЕНОВАНИЕ</span> 
        </div>

        <div class="frame_right">
            <span>РАЗМЕР</span>
            <span>КОЛИЧЕСТВО</span>
            <span>СТОИМОСТЬ</span>
            <span>УДАЛИТЬ</span>
        </div>
    </div>

    <div class="line"></div>

    <div>
        <!-- Товары в корзине -->
    </div>

    <div class="design"></div>

    <div class="bascet_box">
        <div class="wrapper_text">
            <h2>Адрес доставки</h2>
            <p>Все поля обязательны для заполнения</p>
        </div>

        <div class="form_bascet">
            <form action="#">
                <div class="big_field_input">
                    <span>Выберите вариант доставки</span>
                    <select name="delivery" id="delivery">
                        <option>Курьерская служба - 500руб.</option>
                        <option>Доставка почтой - 149руб.</option>
                        <option>Самовывоз - 49руб.</option>
                    </select>
                </div>
            
                <div class="field_input">
                    <span>Имя</span>
                    <input type="text" name="name">
                </div>
            
                <div class="field_input">
                    <span>Фамилия</span>
                    <input type="text" name="surname">
                </div>
                
                <div class="big_field_input">
                    <span>Адрес</span>
                    <input type="text" name="adress" id="adress">
                </div>
                
                <div class="field_input">
                    <span>Город</span>
                    <input type="text" name="city">
                </div>

                <div class="field_input">
                    <span>Индекс</span>
                    <input type="text" name="index">
                </div>
            <br>
                <div class="field_input">
                    <span>Телефон</span>
                    <input type="tel" name="phone">
                </div>
            
                <div class="field_input">
                    <span>E-mail</span>
                    <input type="email" name="email">
                </div>
                
            </form>
        </div>
    </div>
   
    <div class="design"></div>
   
    <div class="bascet_box">
        <div class="wrapper_text">
            <h2>Варианты оплаты</h2>
            <p>Все поля обязательны для заполнения</p>
        </div>

        <div class="bascet_text">
            <p>Стоимость:</p>
            <p>Доставка:</p>
            <p class="orange_text">Итого:</p>
        </div>

        <div class="form_bascet">
            <form action="#">
                <div class="big_field_input">
                    <span>Выберите способ оплаты <img src="images/icons/visa.png" alt="visa"></span>
                    <select name="pay" id="pay">
                        <option>Банковская карта</option>
                        <option>Наличные</option>
                    </select>
                </div>

                <button class="form_btn">ЗАКАЗАТЬ</button>
                
            </form>
        </div>
    </div>

</div>







<?php include($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?>