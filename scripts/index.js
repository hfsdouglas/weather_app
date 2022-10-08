const optionState = document.getElementById('states')
const formCities = document.getElementById('cities')

function loadCities() {
    let id = optionState.options[optionState.selectedIndex].id
    let xhr = new XMLHttpRequest()

    xhr.onload = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(id);
            formCities.innerHTML = xhr.responseText
        }
    }

    xhr.open('GET', "class/STATE_ID.php?q=" + id)
    xhr.send()
}

