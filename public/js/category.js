// Import Function
import {inputEmpty , displayMessage} from "./config.js";

const openBtn = document.getElementById('btnAdd');
const closeBtn = document.getElementById('btnClose');
const overlayCategory = document.getElementById('overlayCategory');
const titleFrom = document.getElementById('nameFrom');

// Display Form Category
openBtn.addEventListener('click' , () =>{
    if (overlayCategory.classList.contains('hidden')) {
        overlayCategory.classList.remove('hidden');
        titleFrom.innerText = 'Add new Category';
        $('#upCategory').hide();
        $('#addCategory').show();
    }
})
// Close From Category
closeBtn.addEventListener('click' , () =>{
    overlayCategory.classList.add('hidden');
})









