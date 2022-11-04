const burger = document.getElementById('toggle');
const page = document.getElementById('page');
const body = document.body;
const box = document.getElementById('menu__box')



burger.addEventListener('click', event => {
    if(body.classList.contains('active')){ //проверяем есть ли класс
        closeSidebar();
    }
    else{
        showSidebar();
    }
});


function showSidebar(){
    let mask = document.createElement('div');
    mask.classList.add('page__mask');
    mask.addEventListener('click', closeSidebar);
    page.appendChild(mask);

    body.classList.add('active');
    box.classList.add('active');

}

function closeSidebar(){
    body.classList.remove('active');
    box.classList.remove('active');
    document.querySelector('.page__mask').remove();
}
