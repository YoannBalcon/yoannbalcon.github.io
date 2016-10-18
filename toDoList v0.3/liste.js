var todoText = document.getElementById('todoTxt');
var addTodoBouton = document.getElementById('addTodoBtn');
var liste = document.getElementById('todoList');
var btnE;
var modal = document.getElementById('editModal');
var id = 0;
var modalCloseBtn = document.getElementById('closeModal');

function addTodo() {
    var todo = document.createElement("li");
    var saisie = document.createTextNode(todoText.value);
    var editBtn = document.createElement("span");
    todo.className = "todoLi" + id;
    editBtn.className = 'btnE';
    editBtn.innerHTML = '<a href="#"><i id ="btnEdit" class="fa fa-pencil" aria-hidden="true"></i></a>';
    var eraseBtn = document.createElement("span");
    eraseBtn.className = 'btnX';
    eraseBtn.innerHTML = '<a href="#"><i id= "btnErase" class="fa fa-times" aria-hidden="true"></i></a>';
    eraseBtn.addEventListener('click', delTodo);
    editBtn.addEventListener('click', editTodo);
    todo.addEventListener('click', doneTodo);
    if (todoText.value === '') {
        alert("Attention, il faut écrire quelque chose; sinon le vilain monsieur ne va pas être content!");
    } else {
        liste.appendChild(todo);
        todo.appendChild(saisie);
        todo.appendChild(editBtn);
        todo.appendChild(eraseBtn);
        console.log(Number(id));
        id++;
    }

    todoText.value = '';
}
console.log(Number(id));

function editTodo() {
    var baliseLi = document.getElementById('osef');
    var todoName = document.getElementById('todoName');
    console.log(todoName);
    console.log(baliseLi);

    var liContent = this.li;
    liContent = document.getElementById('modal-content');

    modal.style.display = "block";
}

var delTodo = function() {
    var li = this.parentNode;
    li.remove();
}

// var editTodo = function(){
// }

var doneTodo = function() {
    this.classList.toggle("rayer");
}

todoText.addEventListener('keypress', function(event) {
    if (event.keyCode == 13) addTodo();
}, false);

var closeModal = function () {
  modal.style.display = "none";
}


modalCloseBtn.addEventListener('click', closeModal);
addTodoBouton.addEventListener('click', addTodo);
