document.addEventListener('DOMContentLoaded', function () {
    const precioInput = document.getElementById('precio');
    const cantidadInput = document.getElementById('cantidad');
    const precioTotalInput = document.getElementById('precio_total');

    function calcularPrecioTotal() {
        const precio = parseFloat(precioInput.value) || 0;
        const cantidad = parseInt(cantidadInput.value) || 0;
        const precioTotal = precio * cantidad;
        precioTotalInput.value = precioTotal.toFixed(2);
    }

    precioInput.addEventListener('input', calcularPrecioTotal);
    cantidadInput.addEventListener('input', calcularPrecioTotal);
});