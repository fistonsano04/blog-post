document.addEventListener('DOMContentLoaded', function () {
    const toast = document.getElementById('toastMessage');
    if (toast) {
        setTimeout(() => {
            toast.style.display = 'none';
        }, 5000); // Hide after 5 seconds
    }
});
