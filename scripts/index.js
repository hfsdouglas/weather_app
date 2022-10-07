const formCities = document.getElementById('cities')
const optionState = document.querySelector('option:checked')

const id = optionState.getAttribute('value')

console.log(data)

let ajax = new XMLHttpRequest()

ajax.onreadystatechange = event => {
    formCities.innerHTML = ajax.responseText
}

ajax.open('GET', 'class/CITIES.php?q='+id, true)
ajax.send()
