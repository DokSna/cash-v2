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
    let user_access_level = "user_access_level_" + userid;
    user_id = document.getElementById(user_id);
    user_full_name = document.getElementById(user_full_name);
    user_login = document.getElementById(user_login);
    user_access_level = document.getElementById(user_access_level);
    console.log(user_id);
    console.log(user_full_name);
    console.log(user_login);
    console.log(user_access_level);

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

    // Edit access_level
    let source_user_access_level = user_access_level.innerHTML;
    let edit_user_access_level
    if (source_user_access_level == "админ") {
      edit_user_access_level = '<select name="user_access_level"><option value=0>нет</option><option value=1>сотрудник</option><option value=2 selected>админ</option></select>';
    }
    else if (source_user_access_level == "сотрудник") {
      edit_user_access_level = '<select name="user_access_level"><option value=0>нет</option><option value=1 selected>сотрудник</option><option value=2>админ</option></select>';
    } else {
      edit_user_access_level = '<select name="user_access_level"><option value=0 selected>нет</option><option value=1>сотрудник</option><option value=2>админ</option></select>';
    }
    user_access_level.innerHTML = edit_user_access_level;

    // заблокируем кнопки на остальных строках на всех таблицах на странице
    // let button_one = document.querySelector('.setting_but');
    // console.log(button_one);
    let buttons_tables = document.querySelectorAll('.setting_but');
    for (let buttony of buttons_tables) {
      buttony.disabled = true;
    }
    // buttons_tables.disabled = false;


    // // Edit Admin
    // let source_user_admin = user_admin.innerHTML;
    // let edit_user_admin
    // if (source_user_admin == "да") {
    //   edit_user_admin = '<select name="user_access_level"><option value="no">нет</option><option value="yes" selected>да</option></select>';
    // }
    // else {
    //   edit_user_admin = '<select name="user_access_level"><option value="no" selected>нет</option><option value="yes">да</option></select>';
    // }
    // user_admin.innerHTML = edit_user_admin;

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