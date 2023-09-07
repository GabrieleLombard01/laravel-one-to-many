const placeholder = 'https://marcolanci.it/utils/placeholder.jpg'
        const imageField = document.getElementById('image');
        const previewField = document.getElementById('img-preview');

        imageField.addEventListener('input', () => {
            previewField.src = imageField.value || placeholder;
        });