
    // JavaScript to update the image preview when the file input changes
    document.getElementById('user_image').addEventListener('change', function () {
        const fileInput = this;
        const imagePreview = document.getElementById('image_preview');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            imagePreview.src = ''; // Clear the preview if no file is selected
        }
    });


    
    // JavaScript to update the image preview when the file input changes
    document.getElementById('user_image2').addEventListener('change', function () {
        const fileInput = this;
        const imagePreview = document.getElementById('image_preview2');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            imagePreview.src = ''; // Clear the preview if no file is selected
        }
    });