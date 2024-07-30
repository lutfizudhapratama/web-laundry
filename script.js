function updateStatus(orderId) {
    if (confirm('Apakah Anda yakin ingin menyelesaikan order ini?')) {
    var form = document.createElement('form');
    form.method = 'post';
    form.action = 'update_status.php';
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'order_id';
    input.value = orderId;
    form.appendChild(input);
    document.body.appendChild(form);
    form.submit();
    }
    }