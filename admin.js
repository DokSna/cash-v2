let edit = false;// получаем по id ячейку в той строке, которую будем изменять
// (из ячейки получим нужные элементы строки, обернём в форму и инпуты, назначим обработчик)
function edit_user(userid) {
  if (edit == false) {
    edit = true;
  console.log(userid);
  let user_id         = "user_id_" + userid;
  let user_full_name  = "user_full_name_" + userid;
  let user_login      = "user_login_" + userid;
  let user_employee   = "user_employee_" + userid;
  let user_admin   = "user_admin_" + userid;
  user_id         = document.getElementById(user_id);
  user_full_name  = document.getElementById(user_full_name);
  user_login      = document.getElementById(user_login);
  user_employee   = document.getElementById(user_employee);
  user_admin      = document.getElementById(user_admin);
  console.log(user_id);
  console.log(user_full_name);
  console.log(user_login);
  console.log(user_employee);
  console.log(user_admin);

  // меняем функцию на onclick
  // edit_user_but_
  // edit FullName
  let source_user_full_name = user_full_name.innerHTML;
  let edit_user_full_name = '<input class="edit_line" type="text" name="full_name" placeholder="Введите свое полное имя" required pattern="[А-ЯЁ][а-яё]{1,32}\s[А-ЯЁ][а-яё]{1,32}\s[А-ЯЁ][а-яё]{1,32}$" title="Введите Фамилию Имя и Отчество (через пробелы c Заглавной буквы, 6-98 русских символов)." value="' 
    + source_user_full_name + '">';
    user_full_name.innerHTML = edit_user_full_name;

  }
}