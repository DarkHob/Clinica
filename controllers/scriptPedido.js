$(document).ready(function () {
    const medicamentoInput = document.getElementById("medicamento");
    const resultadoBusqueda = document.getElementById("resultadoBusqueda");
    const tablaPedidos = document.getElementById("tablaPedidos").getElementsByTagName('tbody')[0];

    let typingTimer;
    const doneTypingInterval = 500;

    medicamentoInput.addEventListener("input", function () {
        clearTimeout(typingTimer);
        const medicamento = this.value;

        if (medicamento.length > 2) {
            typingTimer = setTimeout(function () {
                buscarMedicamento(medicamento, resultadoBusqueda);
            }, doneTypingInterval);
        } else {
            resultadoBusqueda.innerHTML = ""; // Limpiar resultados anteriores
        }
    });

    function buscarMedicamento(medicamento, resultado) {
        $.ajax({
            url: "../models/buscarmedicamento.php",
            method: "POST",
            data: { query: medicamento },
            success: function (data) {
                resultado.innerHTML = data;
                $(".agregar").click(function () {
                    const medicamentoDiv = $(this).parent();
                    const nombreMedicamento = medicamentoDiv.find(".nombre").text();
                    const descripcionMedicamento = medicamentoDiv.find(".descripcion").text();
                    agregarMedicamentoATabla(nombreMedicamento, descripcionMedicamento);
                });
            }
        });
    }

    function agregarMedicamentoATabla(nombreMedicamento, descripcionMedicamento) {
        const row = tablaPedidos.insertRow();
        const cellMedicamento = row.insertCell(0);
        cellMedicamento.innerHTML = nombreMedicamento + '<br>' + descripcionMedicamento;
        const cellCantidad = row.insertCell(1);
        cellCantidad.innerHTML = '<input type="number" class="form-control" name="cantidad[]" placeholder="Cantidad" required>';
        const cellAcciones = row.insertCell(2);
        const quitarButton = document.createElement("button");
        quitarButton.className = "btn btn-danger";
        quitarButton.textContent = "Quitar";
        quitarButton.addEventListener("click", function () {
            quitarMedicamento(row);
        });
        cellAcciones.appendChild(quitarButton);
    }

    function quitarMedicamento(row) {
        tablaPedidos.deleteRow(row.rowIndex);
    }
});
