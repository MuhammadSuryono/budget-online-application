const BASE_URL_API = "http://localhost:7003/";
const BASE_URL_API_EXCEL = "http://156.67.218.146:8080/api/v1/excel/";

/***
 *
 * @returns {string}
 * @constructor
 */
function URL_APP() {
    let url = window.location.href;
    let arr = url.split("/");
    const BASE_URL = arr[0] + "//" + arr[2];
    
    let splitHost = arr[2].split(":");
    let otherPath = splitHost[1] === undefined ? "/application" : "";
    
    return BASE_URL + otherPath
}

/***
 *
 * @returns {boolean}
 */
function statusLogin() {
    let isLogin = localStorage.getItem("userIsLogin");
    let status = false;

    if (isLogin) status = true;
    if (typeof isLogin == "undefined") status = false;
    return status;
}

/***
 *
 */
function redirectLogin() {
    window.location.href = URL_APP() + "/login";
}

/***
 *
 * @param angka
 * @returns {string}
 */
function convertRupiah(angka) {
    angka = angka === null ? 0 : angka;
    let	number_string = angka.toString(),
        sisa 	= number_string.length % 3,
        rupiah 	= number_string.substr(0, sisa),
        ribuan 	= number_string.substr(sisa).match(/\d{3}/g);

    if (ribuan) {
        let separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    return rupiah
}

function alertError(title, msg, timeOut = 4000) {
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: timeOut
    };
    toastr.error(msg, title);
}

function LoadingButton(element) {
    element.prop("disabled", true);
    element.html('<i class="fa fa-spinner fa-spin"></i> Loading...');
  }
  
function DisLoadingButton(element, htmlInput) {
    element.prop("disabled", false);
    element.html(htmlInput);
}

function lastPathUrl() {
    return window.location.pathname.split("/").pop();
}

function getQueryUrl(key) {
    const params = new URLSearchParams(window.location.search)
    return params.get(key)
}

function countColumnTable(element) {
    return element.tHead.children[0].children.length
}

function loadingTable(colspan) {
    return `<tr><td colspan="${colspan}" class="text-center"><i class="fa fa-spinner fa-spin"></i> Sedang memuat data...</td></tr>`
}

function noDataTable(colspan) {
    return `<tr><td colspan="${colspan}" class="text-center"><i class="fa fa-times"></i> Tidak ada data</td></tr>`
}

/***
 *
 */
export {
    URL_APP,
    BASE_URL_API,
    statusLogin,
    redirectLogin,
    convertRupiah,
    alertError,
    LoadingButton,
    DisLoadingButton,
    BASE_URL_API_EXCEL,
    lastPathUrl,
    getQueryUrl,
    countColumnTable,
    loadingTable,
    noDataTable
}