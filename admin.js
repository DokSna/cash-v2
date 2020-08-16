// let source_tr; //будем сохранять строку в этой переменной
let edit = false;// получаем по id ячейку в той строке, которую будем изменять
// (из ячейки получим нужные элементы строки, обернём в форму и инпуты, назначим обработчик)
function edit_user(userid) {
  if (edit == false) {
    edit = true;
    console.log(userid);
    let user_id = "user_id_" + userid;
    let user_full_name = "user_full_name_" + userid;
    let user_login = "user_login_" + userid;
    let user_employee = "user_employee_" + userid;
    let user_admin = "user_admin_" + userid;
    user_id = document.getElementById(user_id);
    user_full_name = document.getElementById(user_full_name);
    user_login = document.getElementById(user_login);
    user_employee = document.getElementById(user_employee);
    user_admin = document.getElementById(user_admin);
    console.log(user_id);
    console.log(user_full_name);
    console.log(user_login);
    console.log(user_employee);
    console.log(user_admin);

    // меняем функцию на onclick
    // edit_user_but_
    // edit FullName
    let source_user_full_name = user_full_name.innerHTML;
    // let edit_user_full_name = '<input class="edit_line" type="text" name="full_name" placeholder="Введите свое полное имя" required pattern="[А-ЯЁ][а-яё]{1,32}\s[А-ЯЁ][а-яё]{1,32}\s[А-ЯЁ][а-яё]{1,32}$" title="Введите Фамилию Имя и Отчество (через пробелы c Заглавной буквы, 6-98 русских символов)." value="' + source_user_full_name + '">';
    let edit_user_full_name = '<input class="edit_line" type="text" name="full_name" placeholder="Введите свое полное имя" required pattern="[А-ЯЁ][а-яё]{1,32}\\s[А-ЯЁ][а-яё]{1,32}\\s[А-ЯЁ][а-яё]{1,32}$" title="Введите Фамилию Имя и Отчество (через пробелы c Заглавной буквы, 6-98 русских символов)." value="' + source_user_full_name + '">';
    user_full_name.innerHTML = edit_user_full_name;

    // Edit Login
    let source_user_login = user_login.innerHTML;
    let edit_user_login = '<input type="text" name="login" placeholder="Введите логин" required pattern="[A-Za-z0-9]{3,30}" title="Используйте только латинские буквы (A-Z, a-z) и цифры (0-9). Длина от 3-х до 30-ти символов." value="' + source_user_login + '">';
    user_login.innerHTML = edit_user_login;

    // Edit employee
    let source_user_employee = user_employee.innerHTML;
    let edit_user_employee
    if (source_user_employee == "да") {
      edit_user_employee = '<select name="user_employee"><option value="no">нет</option><option value="yes" selected>да</option></select>';
    }
    else {
      edit_user_employee = '<select name="user_employee"><option value="no" selected>нет</option><option value="yes">да</option></select>';
    }
    user_employee.innerHTML = edit_user_employee;

    // Edit Admin
    let source_user_admin = user_admin.innerHTML;
    let edit_user_admin
    if (source_user_admin == "да") {
      edit_user_admin = '<select name="user_employee"><option value="no">нет</option><option value="yes" selected>да</option></select>';
    }
    else {
      edit_user_admin = '<select name="user_employee"><option value="no" selected>нет</option><option value="yes">да</option></select>';
    }
    user_admin.innerHTML = edit_user_admin;

    // получаем строку и обёртываем всё содержимое в форму
    // let row_user = user_id.parentElement;
    // row_user.insertAdjacentHTML('afterbegin', "<form action='vendor/edit-row.php' method='post'>");
    // row_user.insertAdjacentHTML('beforeend', "</form>");

    // source_tr = user_id.parentElement;
    // let edit_tr = '<form action="vendor/edit-row.php" method="post">' + source_tr.innerHTML + '</form>';
    // let new_tr = source_tr;
    // new_tr.innerHTML = edit_tr;
    // evt.preventDefault();
  }

}
// function preventDefault(e) {
//   e.preventDefault();
//   }