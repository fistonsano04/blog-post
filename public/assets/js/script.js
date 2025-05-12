document.addEventListener('DOMContentLoaded', function () {
    const toast = document.getElementById('toastMessage');
    if (toast) {
        setTimeout(() => {
            toast.style.display = 'none';
        }, 5000); // Hide after 5 seconds
    }
});


document.addEventListener('DOMContentLoaded', () => {
    const tagsInput = document.getElementById('tags-input');
    const tagsContainer = document.getElementById('tags-container');
    const hiddenTagsInput = document.getElementById('tags');
    let tags = [];

    tagsInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            const tag = tagsInput.value.trim();
            if (tag && !tags.includes(tag)) {
                tags.push(tag);
                updateTags();
            }
            tagsInput.value = '';
        }
    });

    tagsContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('remove-tag')) {
            const tagToRemove = e.target.dataset.tag;
            tags = tags.filter(tag => tag !== tagToRemove);
            updateTags();
        }
    });

    function updateTags() {
        tagsContainer.innerHTML = '';
        tags.forEach(tag => {
            const tagElement = document.createElement('span');
            tagElement.classList.add('tag');
            tagElement.innerHTML = `${tag} <span class="remove-tag" data-tag="${tag}">&times;</span>`;
            tagsContainer.appendChild(tagElement);
        });
        tagsContainer.appendChild(tagsInput);
        hiddenTagsInput.value = tags.join(',');
    }
});
