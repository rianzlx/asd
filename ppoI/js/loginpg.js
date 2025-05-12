const form = document.querySelector("form")
const button = form.querySelector("button")
        
form.addEventListener("submit", ev => {
    ev.preventDefault()
    ev.stopPropagation() // perguntar o que isso faz pro varela
    ev.stopImmediatePropagation() // perguntar o que isso faz pro varela
})

console.warn("nao lembro oq era pra fazer :/ (varela disse algo sobre)")
button.addEventListener("click", ev => {
    ev.preventDefault()
    location.href = "index.html"
})