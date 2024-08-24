function previewFile(key, label){
    const key_photo = document.querySelector('#' + key);
    const label_photo = document.querySelector('#' + label);
 
    label_photo.textContent = key_photo.files[0].name;
}