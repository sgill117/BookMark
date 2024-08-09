const openPopupButtons = document.querySelectorAll('[data-modal-target]')
const closePopupButtons = document.querySelectorAll('[data-close-button]')
openPopupButtons.forEach(button => {
    button.addEventListener('click', () => {
        const popup = document.querySelector(button.dataset.modalTarget)
        openPopup(popup);
    })

})
closePopupButtons.forEach(button => {
    button.addEventListener('click', () => {
        const popup = button.closest('.pop-up');
        closePopup(popup);
    })

})
function openPopup(popup){

   const  userInput = document.getElementById('userInput').value;
   const  userInputBox = document.getElementById('userInput')
   const popupHeader = document.getElementById('popupHeader');
   popupHeader.textContent = userInput;
   popup.classList.add('active');

   userInputBox.value = '';
}

function closePopup(popup){
    const textarea =  popup.querySelector('textarea');

    popup.classList.remove('active');
    addPopupScreen(popup);

    textarea.value = '';
 }

 function addPopupScreen(popup) {
    const newPopup = document.createElement('div');
    newPopup.classList.add('pop-up', 'active');
    newPopup.innerHTML = `
        <h3>${document.getElementById('popupHeader').textContent}</h3>
        <p>${popup.querySelector('textarea').value}</p>
    `;
    document.body.appendChild(newPopup);

 }
 

