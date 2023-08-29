const cepInput = document.getElementById('cep');
const searchButton = document.getElementById('search');
const resultContainer = document.getElementById('result');

searchButton.addEventListener('click', function () {
    const valueSearch = cepInput.value.trim();
    fetch('/search', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'url': '/search',
            'X-CSRF-Token': window.csrfToken
        },
        body: JSON.stringify({
            cep: valueSearch
        }),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro HTTP! Código: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.cep) {
                const newRow = document.createElement('tr');

                const fields = ['cep', 'localidade', 'uf', 'logradouro', 'bairro'];

                fields.forEach(field => {
                    const cell = document.createElement('td');
                    cell.textContent = data.cep[field];
                    newRow.appendChild(cell);
                });

                resultBody.appendChild(newRow);
            }
        })
        .catch(error => {
            alert('Cep enválido');
        });
});
