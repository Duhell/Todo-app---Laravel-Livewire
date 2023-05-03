
// Functions for modal
window.addEventListener('load',function(){
    let addBTN = document.querySelector(".addBTN");
    let closeBTN = document.querySelector(".closeBTN");
    addBTN.addEventListener("click", () => openModal());
    closeBTN.addEventListener('click',()=>closeModal())

    function openModal() {
        document.getElementById("task-modal").classList.remove("hidden");
        document.getElementById("task").focus();
    }

    function closeModal() {
        document.getElementById("task-modal").classList.add("hidden");
    }
})




// End Modal

// add animation when deleting a data

function deleteAnimation(element){
    element.classList.remove('animate-slide-in')
    element.classList.add('animate-slide-out')
    setTimeout(()=>{
        element.remove()
    },1000)
}



