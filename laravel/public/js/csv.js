const downloadButton = document.getElementById('downloadCSV');
const LimparButton = document.getElementById('limparTabela');

downloadButton.addEventListener('click', function () {

    const tableData = [];
    const tableRows = document.querySelectorAll('#cepTable tbody tr');

    tableRows.forEach(row => {
        const rowData = [];
        row.querySelectorAll('td').forEach(cell => {
            rowData.push(cell.textContent);
        });
        tableData.push(rowData);
    });

    fetch('/download', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': window.csrfToken
        },
        body: JSON.stringify({
            data: tableData
        })
    })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Erro HTTP! Código: ${response.status}`);
            }
            return response.blob();
        })
        .then(blob => {

            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');

            a.style.display = 'none';
            a.href = url;
            a.download = 'dados.csv';

            document.body.appendChild(a);
            a.click();

            window.URL.revokeObjectURL(url);
        })
        .catch(error => {
            console.error('Erro na solicitação Fetch:', error);
        });
});

LimparButton.addEventListener('click', function () {
    resultBody.innerHTML = '';

});
