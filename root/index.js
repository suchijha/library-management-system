const form = document.querySelector('.container .right form');
const inputs = document.querySelectorAll('.container .right form div input');

form.addEventListener('submit',(e) => {
    e.preventDefault();
    inputs.forEach(input => {
        if(!input.value){
            input.parentElement.classList.add('error');
        }
        else{
            input.parentElement.classList.remove('error');   
        }
    });
});