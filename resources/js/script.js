let contact = document.querySelector('#contact')

contact.addEventListener('click', ()=>{
    window.scrollBy(0,3000)
})



document.addEventListener('scroll', ()=>{
    let nav = document.querySelector('#nav')
    if(window.scrollY > 290){
        nav.classList.add("bg30")
    }
    else{
        nav.classList.remove("bg30")
    }
    
})