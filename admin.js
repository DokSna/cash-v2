// let source_tr; //будем сохранять строку в этой переменной
// let edit = false;// получаем по id ячейку в той строке, которую будем изменять
// (из ячейки получим нужные элементы строки, обернём в форму и инпуты, назначим обработчик)
function edit_user(userid) {
  // if (edit == false) {
  // edit = true;
  console.log(userid);
  let user_id = "user_id_" + userid;
  let user_full_name = "user_full_name_" + userid;
  let user_login = "user_login_" + userid;
  let user_access_level = "user_access_level_" + userid;
  let user_edit_button = "edit_user_id_" + userid;
  user_id = document.getElementById(user_id);
  user_full_name = document.getElementById(user_full_name);
  user_login = document.getElementById(user_login);
  user_access_level = document.getElementById(user_access_level);
  user_edit_button = document.getElementById(user_edit_button);
  console.log(user_id);
  console.log(user_full_name);
  console.log(user_login);
  console.log(user_access_level);
  console.log(user_edit_button);

  //получяем все три кнопки текущей строки
  let edit_but_active_id = "edit_but_active_" + userid;
  let edit_but_block_id = "edit_but_block_" + userid;
  let edit_but_save_id = "edit_but_save_" + userid;
  edit_but_active_id = document.getElementById(edit_but_active_id);
  edit_but_block_id = document.getElementById(edit_but_block_id);
  edit_but_save_id = document.getElementById(edit_but_save_id);

  // добавим input с id строки
  let source_user_id = user_id.innerHTML;
  source_user_id = '<input class="row_user_id" type="text" readonly name="user_id" value="' + Number(source_user_id) + '">';
  user_id.innerHTML = source_user_id;

  //сохраняем начальное значение что бы отобразить в инпуте
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

  //1. спрячем все 'active' кнопки на строках > на всех таблицах > на странице
  let edit_but_active_all = document.querySelectorAll('.edit_but_active');
  for (let buttony of edit_but_active_all) {
    buttony.classList.add('el_hide');
  }
  //2. и отобразим заблокированные кнопки
  let edit_but_block_all = document.querySelectorAll('.edit_but_block');
  for (let buttony of edit_but_block_all) {
    buttony.classList.remove('el_hide');
  }
  //3. а в текущей строке покажем кнопку 'save'
  edit_but_block_id.classList.add('el_hide');
  edit_but_save_id.classList.remove('el_hide');
}

// найдём все edit кнопки, и повесим на них обработчик событий, а при нажатии будем менять обработчик
function edit_buttons_active() {

  let edit_buttons_tables = document.querySelectorAll('.edit_but_active');
  for (let edit_buttony of edit_buttons_tables) {
    // edit_buttony.disabled = true;
    edit_buttony.classList.add('el_hide');
  }
}

function edit_user_save() {

}
// что бы по Enter форма не отправлялась
// function preventDefault(e) {
//   e.preventDefault();
//   }