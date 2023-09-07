const titleField = document.getElementById('title');
const slugField = document.getElementById('slug');

titleField.addEventListener('input', () => {
    slugField.value = titleField.value.trim().toLowerCase().split(' ').join('-');
});