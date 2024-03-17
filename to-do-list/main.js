'use strict';

let btn = document.querySelector('#create');


function loadData() {

    const requestOptions = {
        method: "GET",
        redirect: "follow"
    };

    fetch("http://tasks-api.std-900.ist.mospolytech.ru/api/tasks?api_key=50d2199a-42dc-447d-81ed-d68a443b697e", requestOptions)
        .then((response) => response.text())
        .then((result) => render(JSON.parse(result)))
        .catch((error) => console.error(error));
}

function render(data) {
    let toDoList = document.querySelector('#to-do-list')
    let doneList = document.querySelector('#done-list')
    let template = document.querySelector('#liTask')
    toDoList.innerHTML = ''
    doneList.innerHTML = ''
    for (let i = 0; i < data.tasks.length; i++) {
        let clone = template.content.cloneNode(true)
        clone.querySelector('#task-template').setAttribute('data-id', data.tasks[i].id)
        let name = clone.querySelector('.task-name')
        let desc = clone.querySelector('.task-description')
        name.textContent = data.tasks[i].name
        desc.textContent = data.tasks[i].desc
        if (data.tasks[i].status == 'to-do') {
            toDoList.append(clone)
        } else {
            doneList.append(clone)
        }
    }
}





function createItem(value) {
    const list = document.querySelector(`#${value.select}-list`);
    const item = document.getElementById('task-template').cloneNode(true);
    item.querySelector('.task-name').textContent = value.name;
    item.dataset.id = value.id
    item.querySelector('.task-description').textContent = value.desc;
    item.classList.remove('d-none');
    list.append(item);
}

btn.addEventListener('click', function (event) {
    let modal = event.target.closest('.modal');
    let name = modal.querySelector('#nameTask').value;
    console.log(name);
    let desc = modal.querySelector('#textTask').value;
    console.log(desc);
    let select = modal.querySelector('#select').value;
    console.log(select);
    
    const formdata = new FormData();
    formdata.append("name", name);
    formdata.append("desc", desc);
    formdata.append("status", select);

    const requestOptions = {
        method: "POST",
        body: formdata,
        redirect: "follow"
    };

    fetch("http://tasks-api.std-900.ist.mospolytech.ru/api/tasks?api_key=50d2199a-42dc-447d-81ed-d68a443b697e", requestOptions)
        .then((response) => response.text())
        .then((result) => console.log(result))
        .then((response) => loadData(response))
        .catch((error) => console.error(error));
});

const showShowModal = document.querySelector('#showModal');
showShowModal.addEventListener('show.bs.modal', showModal)

function showModal(event) {
    let task = event.relatedTarget.closest('#task-template');
    let name = task.querySelector('.task-name').textContent;
    let desc = task.querySelector('.task-description').textContent;
    event.target.querySelector('#showNameTask').value = name;
    event.target.querySelector('#showTextTask').value = desc;
};


const showEditModal = document.querySelector('#editModal');
showEditModal.addEventListener('show.bs.modal', editModal)
let nameE = null
let descE = null
let idE = null
function editModal(event) {
    let task = event.relatedTarget.closest('#task-template');
    nameE = task.querySelector('.task-name').textContent;
    descE = task.querySelector('.task-description').textContent;
    idE = task.getAttribute('data-id')
    event.target.querySelector('#editNameTask').value = nameE;
    event.target.querySelector('#editTextTask').value = descE;
    
}
const btnE = document.querySelector('#save');
    btnE.addEventListener('click', function (event) {
        const modal = event.target.closest('#editModal');
        nameE = modal.querySelector('#editNameTask').value;
        descE = modal.querySelector('#editTextTask').value;
        const formdata = new FormData();
        formdata.append("name", nameE);
        formdata.append("desc", descE);

        const requestOptions = {
            method: "PUT",
            body: formdata,
            redirect: "follow"
        };

        fetch(`http://tasks-api.std-900.ist.mospolytech.ru/api/tasks/${idE}?api_key=50d2199a-42dc-447d-81ed-d68a443b697e`, requestOptions)
            .then((response) => response.text())
            .then((result) => {console.log(result); loadData()})
            .catch((error) => console.error(error));
        

        

    });
let idSel = null
let showRemoveModal = document.querySelector('#removeModal');
showRemoveModal.addEventListener('show.bs.modal', removeModal)

function removeModal(event) {
    let task = event.relatedTarget.closest('#task-template');
    console.log(task)
    let name = task.querySelector('.task-name').textContent;
    idSel = task.getAttribute('data-id')
    event.target.querySelector('#removeNameTask').textContent = name;
    
}
const btnR = document.querySelector('#removeModalBtn');
    btnR.addEventListener('click', function () {
        
        const requestOptions = {
            method: "DELETE",
            redirect: "follow"
          };
          
          fetch(`http://tasks-api.std-900.ist.mospolytech.ru/api/tasks/${idSel}?api_key=50d2199a-42dc-447d-81ed-d68a443b697e`, requestOptions)
            .then((response) => response.text())
            .then((result) => {console.log(result); loadData()})
            .catch((error) => console.error(error));
    });

// window.onload = function () {

//     for (let i = 0; i < localStorage.length; ++i) {
//         let key = localStorage.key(i);
//         if (key.startsWith('task')) {
//             const value = JSON.parse(localStorage.getItem(key));
//             createItem({ id: key, ...value })
//         }
//     }
// };

loadData()