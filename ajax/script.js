'use strict';

let page = 1;
let perPage = 5;
let totalPage = 0;
let totalRecors = 0;
let q = '';


let btnBack = document.querySelector('.footer');
let selectPerPage = document.querySelector('.select-perpage');
let blockBtns = document.querySelector('.block-btns');

let searchBtn = document.querySelector('.btn-search');
searchBtn.addEventListener('click', search);
function search() {
    let txtSearch = document.querySelector('.input-search');
    q = txtSearch.value;
    loadData();
    let options = document.querySelectorAll('.option')
    for( let i = 0; i < options.length; i++ ){
        options[i].outerHTML = "";
      }
}

function renderBlockBtns() {
    const begin = (page - 2 > 1) ? page - 2 : 1;
    const end = (page + 2 > totalPage) ? totalPage : page + 2;
    blockBtns.innerHTML = '';
    for (let i = begin; i <= end; i++) {
        const btn = document.createElement('button');
        btn.classList.add('btn');
        btn.textContent = i;
        if (i === page) btn.classList.add('active');
        blockBtns.append(btn);
    }
};

function renderCountRecord() {
    let from = document.querySelector('.from');
    from.textContent = (page - 1) * perPage + 1;
    let to = document.querySelector('.to');
    to.textContent = (page * perPage > totalRecors) ? totalRecors : page * perPage;
    let total = document.querySelector('.total');
    total.textContent = totalRecors;
}

function loadData() {
    let xhr = new XMLHttpRequest();
    xhr.open('GET',
        `http://cat-facts-api.std-900.ist.mospolytech.ru/facts?page=${page}&per-page=${perPage}&q=${q}`);
    xhr.send();
    xhr.onload = function () {
        if (xhr.status === 200) {
            let response = JSON.parse(xhr.response);
            let posts = document.querySelector('.posts');
            let template = document.querySelector('#post');
            posts.innerHTML = '';
            for (const record of response.records) {
                let clone = template.content.cloneNode(true);
                let text = clone.querySelector('.upper_post');
                text.textContent = record.text;
                let author = clone.querySelector('.author');
                author.textContent = `${record.user?.name?.first} ${record?.user?.name?.last}`;
                let upvotes = clone.querySelector('.upvotes');
                upvotes.textContent = record.upvotes;
                posts.append(clone);
            }
            totalPage = response._pagination.total_pages;
            totalRecors = response._pagination.total_count;
            renderBlockBtns();
            renderCountRecord();
        } else {
            console.log('Ошибка при выполнении запроса');
        }
    };
    xhr.onerror = function () {
        console.log('Ошибка');
    };
}


// рендер и заполнение выпадающего списка для поиска
addEventListener('input', loadDataAutocomplete);
function loadDataAutocomplete() {
    let q2 = document.querySelector('input');
    q2 = q2.value;
    let xhr = new XMLHttpRequest();
    xhr.open('GET',
        `http://cat-facts-api.std-900.ist.mospolytech.ru/autocomplete?q=${q2}`);
    xhr.send();
    xhr.onload = function () {
        if (xhr.status === 200) {
            let response = JSON.parse(xhr.response);
            let section = document.querySelector('.section');
            let template = document.querySelector('#option');
            section.innerHTML = '';
            for (let i = 0; i < 4; i++) {
                let clone = template.content.cloneNode(true)
                let option = clone.querySelector('.option');
                option.textContent = response[i];
                section.append(clone);
            }

        } else {
            console.log('Ошибка при выполнении запроса');
        }
    };
    xhr.onerror = function () {
        console.log('Ошибка');
    };
}


// заполнение инпута по нажатию на выпадающий список
document.querySelector('.section').addEventListener('click', fill)
function fill(event) {
    let text = event.target.textContent;
    let input = document.querySelector('input')
    input.value = text
    let options = document.querySelectorAll('.option')
    for( let i = 0; i < options.length; i++ ){
        options[i].outerHTML = "";
      }
}

function clickFooter(event) {
    const target = event.target;
    if (target.classList.contains('btn-back')) {
        if (page - 1 < 1) {
            return;
        }
        page -= 1;
        loadData();
        return;

    }
    if (target.classList.contains('btn-forward')) {
        if (page + 1 > totalPage) {
            return;
        }
        page += 1;
        loadData();
        return;

    }
    if (target.classList.contains('btn')) {
        page = +target.textContent;
        loadData();

    }
}

btnBack.addEventListener('click', clickFooter);

selectPerPage.addEventListener('change', (event) => {
    perPage = +event.target.value;
    loadData();
});

window.onload = loadData;