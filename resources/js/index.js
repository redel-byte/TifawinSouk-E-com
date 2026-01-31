const toggleFormBtn = document.getElementById('toggleFormBtn');
const productFormContainer = document.getElementById('productFormContainer');

// Toggle form visibility
document.addEventListener('click',(e)=>{
    if(e.target && e.target.id === 'toggleFormBtn'){
        productFormContainer.toggle('hidden'); 
        console.log('clicked');
    }
})
