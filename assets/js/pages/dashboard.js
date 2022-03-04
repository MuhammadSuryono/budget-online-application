$(function () {
    $('.selectpicker').selectpicker();
})

const selectType = document.getElementById('type');
selectType.addEventListener("change", function () {
    console.log(selectType.value)
})