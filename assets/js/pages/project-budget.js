import {convertRupiah, countColumnTable, lastPathUrl, loadingTable, noDataTable} from "../api/module.js";
import {httpRequestUrlApp} from "../api/index.js";

const bodyTableItemBudget = document.getElementById("body-item-budget")
const tableListItemBudget = document.getElementById("table-item-budget")
let totalColumn = countColumnTable(tableListItemBudget)
let idSubmission = lastPathUrl()

bodyTableItemBudget.innerHTML = loadingTable(totalColumn)

httpRequestUrlApp(`/project/pengajuan/${idSubmission}/items`,'GET', {}, function (res) {
    let json = JSON.parse(res)
    let data = json.data

    if (json.status === true) {
        let html = ''
        if (data.length > 0) {
            data.forEach(function (val, index) {
                html += `
                    <tr>
                        <td>${val.no}</td>
                        <td>${val.rincian}</td>
                        <td>${val.kota}</td>
                        <td>${val.status}</td>
                        <td>${val.penerima}</td>
                        <td>Rp. ${convertRupiah(parseInt(val.total))}</td>
                        <td>Rp. ${convertRupiah(parseInt(val.total_pembayaran))}</td>
                        <td>${val.total_bpu}</td>
                        <td><a href="" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Detail</a></td>
                    </tr>
                `
            })
            bodyTableItemBudget.innerHTML = html
        } else {
            bodyTableItemBudget.innerHTML = noDataTable(totalColumn)
        }
    } else {
        bodyTableItemBudget.innerHTML = noDataTable(totalColumn)
    }
})