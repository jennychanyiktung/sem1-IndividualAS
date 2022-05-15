// <!--Name : CHAN YIK TUNG, STUDENT ID: 21000500s -->
let btnResset = document.getElementById('reset');
let inputs = document.querySelectorAll('input');
let selects = document.querySelectorAll('select');

btnResset.addEventListener('click', () =>{
    inputs.forEach(input => input.value = '');
    selects.forEach(select => select.value = '');
});

