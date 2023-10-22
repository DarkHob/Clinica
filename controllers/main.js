// Espera a que el documento HTML esté completamente cargado
document.addEventListener('DOMContentLoaded', function () {
    // Inicializa una nueva instancia de jsPDF
    const doc = new jsPDF();

    let nextID = 1; // ID inicial

    function agregarFila() {
        const lista = document.getElementById('medicamentos');
        const listItem = document.createElement('li');
        listItem.className = 'styled-list-item';
        listItem.innerHTML = `
            <div class="list-item-content">
                <span class="list-item-id">${nextID}</span>
                <span class="list-item-field" contenteditable="true"></span>
                <span class="list-item-field" contenteditable="true"></span>
                <span class="list-item-field" contenteditable="true"></span>
            </div>
        `;
        lista.appendChild(listItem);
        nextID++; // Incrementar el ID

        // Hacer scroll hacia la nueva fila
        listItem.scrollIntoView({ behavior: 'smooth' });
    }

    function generarPDF() {
        // Obtén el valor del proveedor seleccionado
        const proveedor = document.getElementById('proveedores').value;

        // Obtén los valores de los medicamentos
        const medicamentoItems = document.querySelectorAll('#medicamentos .list-item-field');
        let medicamentos = [];

        medicamentoItems.forEach(item => {
            medicamentos.push(item.textContent);
        });

        // Genera el contenido del PDF
        let content = 'Proveedor: ' + proveedor + '\n';

        medicamentos.forEach((medicamento, index) => {
            content += `Medicamento ${index + 1}: ${medicamento}\n`;
        });

        // Agrega el contenido al PDF
        doc.text(content, 10, 10);

        // Genera y descarga el PDF
        doc.save('mi_documento.pdf');
    }
});
