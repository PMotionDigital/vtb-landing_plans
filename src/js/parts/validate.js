const urlPost = 'https://pmotion.ru/vtb_land/dist/test.json'; // URL test

const emailInput = document.querySelector('input[type="email"]');
const inputCheck = document.querySelector('input[type="checkbox"]');
const inputSubmit = document.querySelector('button[type="submit"]');
const text = document.querySelector('textarea');
const formInputs = document.querySelectorAll('input');

let correct;
let checked;
let filled;

inputSubmit.classList.add('button--disabled');


emailInput.addEventListener('change', (evt) => {
    const currentValue = evt.target.value;
    const parent = emailInput.closest('.input-row');
    const error = parent.querySelector('.error-message');

    if (!currentValue.includes('@')) {
        errorMessage('E-mail должен содержать "@"', parent);
        parent.classList.add('input-row--uncorrect');
        parent.classList.remove('input-row--correct');

        correct = false;

    } else {
        parent.classList.remove('input-row--uncorrect', 'input-row--error-border');
        parent.classList.add('input-row--correct');

        if(error){
            error.remove();
        }

        correct = true;
    }
});

function errorMessage(text, element) {
    const oldMessage = element.querySelector('.error-message') || undefined;
    if (oldMessage) {
        oldMessage.remove();
    }
    const el = document.createElement('span');
    el.classList.add('error-message');
    el.textContent = text;
    element.appendChild(el);
}

text.addEventListener('input', () => {
    if (text.value !== ''){
        filled = true;
    } else {
        filled = false;
    }
})



// проверяем кликнут ли обязательный чекбокс

inputCheck.addEventListener('change', () => {
    if (inputCheck.checked) {
        checked = true;
    } else {
        checked = false;
    }
});



// проверяем корректность заполнения полей

formInputs.forEach((input) => {
    input.addEventListener('change', () => {
        if (input.value !== '' && checked && correct && filled){
            inputSubmit.classList.remove('button--disabled');
        } else {
            inputSubmit.classList.add('button--disabled');
        }
    })
});




inputSubmit.addEventListener('click', (evt) => {
    evt.preventDefault();

    const data = {
        name: document.querySelector('input[data-name]').value,
        email: emailInput.value,
        message: text.value
    }

    loadData(data);
})



// Функция пост-запроса

function loadData (data) {
    fetch(urlPost, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(result => console.log(data));
}