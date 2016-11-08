var todoText = document.getElementById('todoTxt');
var addTodoBouton = document.getElementById('addTodoBtn');
var liste = document.getElementById('todoList');
var btnE;
var modal = document.getElementById('editModal');
var id = 0;
var modalCloseBtn = document.getElementById('closeModal');



function addTodo() {
    var todo = document.createElement('li');
        todo.className = "todoLi" + id;

    var saisie = document.createElement('span');
        saisie.className= "todoSaisie";
        saisie.innerHTML= todoText.value;

    var editBtn = document.createElement('span');
        editBtn.className = 'btnE';
        editBtn.innerHTML = '<a href="#"><i id ="btnEdit" class="fa fa-pencil" aria-hidden="true"></i></a>';

    var eraseBtn = document.createElement('span');
        eraseBtn.className = 'btnX';
        eraseBtn.innerHTML = '<a href="#"><i id= "btnErase" class="fa fa-times" aria-hidden="true"></i></a>';

    var prio = document.getElementById('priority');
    var priorite=prio.options[prio.selectedIndex].value;

    if (todoText.value === '') {
        alert("Attention, il faut écrire quelque chose; sinon le vilain monsieur ne va pas être content!");
    }
    else {
        liste.appendChild(todo);
        todo.appendChild(saisie);
        todo.appendChild(editBtn);
        todo.appendChild(eraseBtn);
        console.log(Number(id));
        id++;
        todoText.value = '';

    }

    if(priorite=='A'){
    todo.className="urgent"
  }
    else if (priorite =='B') {
    todo.className="important"
  }
    else if (priorite == 'C') {
    todo.className="secondaire"
  }


  eraseBtn.addEventListener('click', delTodo);
  editBtn.addEventListener('click', editTodo);
  saisie.addEventListener('click', doneTodo);

}

var delTodo = function() {
    var li = this.parentNode;
    li.remove();
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

var closeModal = function () {
  modal.style.display = "none";
}


// var editTodo = function(){
// }

var doneTodo = function() {
    this.parentNode.classList.toggle("rayer");
}

todoText.addEventListener('keypress', function(event) {
    if (event.keyCode == 13) addTodo();
}, false);

modalCloseBtn.addEventListener('click', closeModal);
addTodoBouton.addEventListener('click', addTodo);









var xhr = new XMLHttpRequest();
xhr.open("GET", "http://10.105.49.50:8090/api/v1/todos", true);
xhr.onload = function (e) {
if (xhr.readyState === 4) {
  if (xhr.status === 200) {
    console.log(xhr.responseText);

    var todos = JSON.parse(xhr.responseText);
    console.log(todos);
    console.log(todos[0].task);

  } else {
    console.error(xhr.statusText);
  }
}
};
xhr.onerror = function (e) {
console.error(xhr.statusText);
};
xhr.send(null);
