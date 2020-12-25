<?php include 'templates/header/header.php'; ?>
    <main>
        <section class="intro">
            <div class="section-title type-2 wrapper">
                <h1 class="col-lg-10 col-xs-12">Строим инвестиционные планы на 2021 год!</h1>
            </div>
            <img src="/dist/img/background.png" alt="" class="intro_image">
        </section>

        <section class="description">
            <div class="wrapper dis-flex justify-content-center">
                <div class="description_desc col-lg-10 col-xs-12 dis-flex flex-direction-col align-items-center">
                    <h2>Сотрудники ВТБ поделились с вами своими планами на 2021 год. </h2>
                    <p class="col-lg-9 col-xs-12">Кто-то хочет впервые купить акции фармацевтических 
                        компаний, кто-то — расширить кругозор по работе с брокером, кто-то — создать ликвидный портфель. 
                        А что нового планируете вы? Поделитесь своими идеями, а мы в течение года поможем вам с реализацией этих планов!</p>
                </div>
            </div>
            <div class="form-main col-lg-6 col-xs-12 wrapper">
                <div class="input-row">
                    <input type="text" placeholder="Имя Фамилия" required data-name>
                </div>
                <div class="input-row">
                    <input type="email" placeholder="E-mail" required data-mail>
                </div>
                <div class="input-row">
                    <textarea maxlength="500" placeholder="Ваша цель на 2021 год" required data-target></textarea>
                </div>
                <div class="input-row">
                    <input type="checkbox" class="input-checkbox" id="personal">
                    <label for="personal" class="checkbox-label">Я даю согласие на обработку персональных данных</label>
                </div>
            </div>
            <button type="submit" class="button form-button" data-get-certificate>Отправить!</button>
        </section>
    </main>
<?php include 'templates/footer/footer.php'; ?>