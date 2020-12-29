// Общие правила логики абсолютно для всех модалок

const modal = document.querySelectorAll('[data-modal]');
const modalBtn = document.querySelectorAll('[data-modal-btn]');
const modalClose = document.querySelectorAll('[data-modal-close]');

// вешаем событие открытие модалки на кнопку

modalBtn.forEach((btn)=> {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
    
        let _this = e.currentTarget;
        let curModal = _this.dataset['modalBtn'];
    
        //modal.classList.remove('modal--open');
        document.querySelector(`[data-modal="${curModal}"]`).classList.add('modal--open');
    });
});

// закрываем модалку

modalClose.forEach((btn)=> {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
    
        let _this = e.currentTarget;
    
        _this.closest('[data-modal]').classList.remove('modal--open');
    
    })
})

