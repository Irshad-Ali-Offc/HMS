document.querySelector('input[name="name"]').addEventListener('input', function () {
    this.value = this.value.replace(/[^A-Za-z\s]/g, '');
});


document.querySelector('input[name="cnic"]').addEventListener('input', function () {
    let value = this.value.replace(/[^0-9]/g, '').slice(0, 13);
    if (value.length > 5 && value.length <= 12) {
        value = value.slice(0, 5) + '-' + value.slice(5);
    }
    if (value.length > 12) {
        value = value.slice(0, 5) + '-' + value.slice(5, 12) + '-' + value.slice(12);
    }
    this.value = value;
});

document.querySelector('input[name="contact"]').addEventListener('input', function () {
    this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);
});