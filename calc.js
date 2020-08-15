function summ_one() {
  // ka5.innerHTML = kup5000.value;
  // ka5.innerHTML = this.value;
  // jo - это имя для 'this'
  let ded;  //родитель
  ded = this.parentElement;  //получаем ячейку td где input
  let pre_el = ded.previousElementSibling;
  let next_el = ded.nextElementSibling;
  let nominal;  //сюда поместим номинал
  let quantity;  //сюда поместим количество
  let summa_el;  //сумма элемента (конкретно этого номинала)
  nominal = Number(pre_el.innerHTML);  //смотрим что в предыдущей ячейке таблицы написано
  quantity = Number(this.value);
  summa_el = nominal * quantity;
  next_el.innerHTML = summa_el;
}
function summ_one_kop() {
  // есть ньюанс в js с не целыми числами
  let ded;  //родитель
  ded = this.parentElement;  //получаем ячейку td где input
  let pre_el = ded.previousElementSibling;
  let next_el = ded.nextElementSibling;
  let nominal;  //сюда поместим номинал
  let quantity;  //сюда поместим количество
  let summa_el;  //сумма элемента (конкретно этого номинала)
  nominal = Number(pre_el.innerHTML * 100);  //смотрим что в предыдущей ячейке таблицы написано
  quantity = Number(this.value);
  summa_el = nominal * quantity;
  next_el.innerHTML = Number(summa_el / 100).toFixed(2);
}
function amount_total() {
  let pole_AmountTotal = document.getElementById('summa');
  let poleKupSumm = document.getElementById('kupSumm');
  let pole_monetSumm = document.getElementById('monetSumm');
  pole_AmountTotal.innerHTML = (Number(poleKupSumm.innerHTML) + Number(pole_monetSumm.innerHTML)).toFixed(2);
}
function amount_of_bills(){
  // купюры
  let summkup5000 = Number(document.getElementById('kup5000').parentElement.nextElementSibling.innerHTML);
  let summkup2000 = Number(document.getElementById('kup2000').parentElement.nextElementSibling.innerHTML);
  let summkup1000 = Number(document.getElementById('kup1000').parentElement.nextElementSibling.innerHTML);
  let summkup500  = Number(document.getElementById('kup500').parentElement.nextElementSibling.innerHTML);
  let summkup200  = Number(document.getElementById('kup200').parentElement.nextElementSibling.innerHTML);
  let summkup100  = Number(document.getElementById('kup100').parentElement.nextElementSibling.innerHTML);
  let summkup50   = Number(document.getElementById('kup50').parentElement.nextElementSibling.innerHTML);
  let summkup10   = Number(document.getElementById('kup10').parentElement.nextElementSibling.innerHTML);
// console.log(summkup5000);
  // сумма купюр
  let poleKupSumm = document.getElementById("kupSumm");
  let summaKup = Number(summkup5000 + summkup2000 + summkup1000 + summkup500 + summkup200 + summkup100 + summkup50 + summkup10);
  poleKupSumm.innerHTML = summaKup;
  amount_total();
}
function amount_of_coins(){
  // купюры
  let summ_moneta10  = Number(document.getElementById('moneta10').parentElement.nextElementSibling.innerHTML);
  let summ_moneta5   = Number(document.getElementById('moneta5').parentElement.nextElementSibling.innerHTML);
  let summ_moneta2   = Number(document.getElementById('moneta2').parentElement.nextElementSibling.innerHTML);
  let summ_moneta1   = Number(document.getElementById('moneta1').parentElement.nextElementSibling.innerHTML);
  let summ_copeyka50 = Number(document.getElementById('copeyka50').parentElement.nextElementSibling.innerHTML) * 100;
  let summ_copeyka10 = Number(document.getElementById('copeyka10').parentElement.nextElementSibling.innerHTML) * 100;
  let summ_copeyka5  = Number(document.getElementById('copeyka5').parentElement.nextElementSibling.innerHTML) * 100;
  let summ_copeyka1  = Number(document.getElementById('copeyka1').parentElement.nextElementSibling.innerHTML) * 100;
  // сумма купюр
  let pole_monetSumm = document.getElementById("monetSumm");
  let summaMonet = Number(summ_moneta10 + summ_moneta5 + summ_moneta2 + summ_moneta1) + (Number(summ_copeyka50 + summ_copeyka10 + summ_copeyka5 + summ_copeyka1)) / 100;
  pole_monetSumm.innerHTML = summaMonet.toFixed(2);
  amount_total();
}
// повесим собития на элементы
kup5000.addEventListener("input", summ_one);
kup2000.addEventListener("input", summ_one);
kup1000.addEventListener("input", summ_one);
kup500.addEventListener("input", summ_one);
kup200.addEventListener("input", summ_one);
kup100.addEventListener("input", summ_one);
kup50.addEventListener("input", summ_one);
kup10.addEventListener("input", summ_one);

moneta10.addEventListener("input", summ_one);
moneta5.addEventListener("input", summ_one);
moneta2.addEventListener("input", summ_one);
moneta1.addEventListener("input", summ_one);
copeyka50.addEventListener("input", summ_one_kop);
copeyka10.addEventListener("input", summ_one_kop);
copeyka5.addEventListener("input", summ_one_kop);
copeyka1.addEventListener("input", summ_one_kop);

// будем считать суммы купюр
kup5000.addEventListener("input", amount_of_bills);
kup2000.addEventListener("input", amount_of_bills);
kup1000.addEventListener("input", amount_of_bills);
kup500.addEventListener("input", amount_of_bills);
kup200.addEventListener("input", amount_of_bills);
kup100.addEventListener("input", amount_of_bills);
kup50.addEventListener("input", amount_of_bills);
kup10.addEventListener("input", amount_of_bills);

// будем считать суммы монет
moneta10.addEventListener("input", amount_of_coins);
moneta5.addEventListener("input", amount_of_coins);
moneta2.addEventListener("input", amount_of_coins);
moneta1.addEventListener("input", amount_of_coins);
copeyka50.addEventListener("input", amount_of_coins);
copeyka10.addEventListener("input", amount_of_coins);
copeyka5.addEventListener("input", amount_of_coins);
copeyka1.addEventListener("input", amount_of_coins);



// function calc() {
//   // купюры
//   let kolkup5000 = +document.getElementById('kup5000').value * 5000;
//   let kolkup2000 = +document.getElementById('kup2000').value * 2000;
//   let kolkup1000 = +document.getElementById('kup1000').value * 1000;
//   let kolkup500 = +document.getElementById('kup500').value * 500;
//   let kolkup200 = +document.getElementById('kup200').value * 200;
//   let kolkup100 = +document.getElementById('kup100').value * 100;
//   let kolkup50 = +document.getElementById('kup50').value * 50;
//   let kolkup10 = +document.getElementById('kup10').value * 10;
//   // монеты - рубли
//   let kolmoneta10 = +document.getElementById('moneta10').value * 10;
//   let kolmoneta5 = +document.getElementById('moneta5').value * 5;
//   let kolmoneta2 = +document.getElementById('moneta2').value * 2;
//   let kolmoneta1 = +document.getElementById('moneta1').value * 1;
//   // монеты - копейки
//   let kolcopeyka50 = +document.getElementById('copeyka50').value * 0.5;
//   let kolcopeyka10 = +document.getElementById('copeyka10').value * 0.1;
//   let kolcopeyka5 = +document.getElementById('copeyka5').value * 0.05;
//   let kolcopeyka1 = +document.getElementById('copeyka1').value * 0.01;

//   // сумма купюр
//   let poleKupSumm = document.getElementById("kupSumm");
//   let summaKup = Number(kolkup5000 + kolkup2000 + kolkup1000 + kolkup500 + kolkup200 + kolkup100 + kolkup50 + kolkup10);
//   poleKupSumm.innerHTML = summaKup;

//   // сумма монет
//   let poleMonetSumm = document.getElementById("monetSumm");
//   let summaMonet = Number(kolmoneta10 * 100 + kolmoneta5 * 100 + kolmoneta2 * 100 + kolmoneta1 * 100 + kolcopeyka50 * 100 + kolcopeyka10 * 100 + kolcopeyka5 * 100 + kolcopeyka1 * 100) / 100;
//   poleMonetSumm.innerHTML = summaMonet.toFixed(2);

//   // общая сумма
//   let summ = document.getElementById('summa');
//   summ.value = Number(summaKup + summaMonet).toFixed(2);

//   // summ.innerHTML = Number(summaKup + summaMonet).toFixed(2);
// }

// разблокирует кнопку отправить форму наличка, когда выбран магазин
// function choice() {
//   // $(this).parent().find(':checked').length
//   let show = document.getElementById('submitgo');
//   show.disabled = false;
// }

function write_form(line) {
  let address_shop;
  let name_shop;
  let roditel;
  roditel = parentElement;
  console.log(roditel);
  // address_shop  = line.previousSibling;
  // name_shop     = address_shop.previousSibling;
  // console.log(name_shop);
  // console.log(address_shop);
  console.log(456);
}