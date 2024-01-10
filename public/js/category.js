

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









