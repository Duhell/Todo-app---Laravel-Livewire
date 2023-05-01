function openModal(){
    document.getElementById('task-modal').classList.remove('hidden')
    document.getElementById('task').focus()
}

function closeModal(){
    document.getElementById('task-modal').classList.add('hidden');
}

// add animation when deleting a data

function deleteAnimation(element){
    element.classList.remove('animate-slide-in')
    element.classList.add('animate-slide-out')
    setTimeout(()=>{
        element.remove()
    },1000)
}
