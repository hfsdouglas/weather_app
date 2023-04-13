var estados_select = document.querySelector('.estados');
var cidades_select = document.querySelector('.cidades');

let url_estados = 'service/estados/';


fetch(url_estados).then(response => {
    response.json().then(estados => {
        estados.map(estado => {
            let option = document.createElement("option");
            option.textContent = `${estado.nome} - (${estado.sigla})`;
            option.className = 'estado';
            option.dataset.sigla = estado.sigla;
            option.id = estado.id;
            option.value = estado.nome;
            estados_select.appendChild(option);
        });    
    });
});

estados_select.addEventListener('change', event => {
    cidades_select.disabled = true;
    cidades_select.innerHTML = `<option selected><i>Selecione uma Cidade</i></option>`;
    let estados = document.querySelectorAll('.estado');
    estados.forEach(estado => {
        if (estado.value === event.target.value) {
            let url_cidades = `service/cidades/?id=${estado.id}`;
            fetch(url_cidades).then(response => {
                response.json().then(cidades => {
                    cidades.map(cidade => {
                        let option = document.createElement("option");
                        option.textContent = `${cidade.nome}`;
                        option.className = 'cidade';
                        option.id = cidade.id;
                        option.value = cidade.nome;
                        cidades_select.appendChild(option);
                        cidades_select.disabled = false;
                    });
                })
            })
        }
    });
});

