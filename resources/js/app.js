

const inputImage = document.getElementById('InputImage')
const imagePreview = document.getElementById('imagePreview')
const imagePreviewText = document.getElementById('imagePreviewText')


imagePreviewText.innerText = "No se selecciono una imagen"

inputImage.addEventListener('change', (event) => {
    const input = event.target

    if ( !input.files.length ) return

    const file = input.files[0]
    const objectURL = URL.createObjectURL(file)
    imagePreviewText.classList.add('hidden')

    imagePreview.src = objectURL
})
