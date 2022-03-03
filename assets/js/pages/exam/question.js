import {LoadingButton, URL_APP, DisLoadingButton} from "../../api/module.js";
import {httpRequestUrlApp} from "../../api/index.js";

$("#submit-finish").on("click", function () {
    LoadingButton($(this));

    httpRequestUrlApp(
        `/exam/finish`,
        "POST",
        null,
        (res) => {
            res = JSON.parse(res);
            DisLoadingButton($(this), "><i class=\"fa fa-check\"></i> Finish");

            if (res.status === 200) {
                toastr.success(res.message);
                window.location.href = `${URL_APP()}/exam/resume/${res.data.token}`;
                return;
            }

            if (res.status === 422) {
                JSON.parse(res.message).forEach((v) => {
                    toastr.error(Object.values(v));
                });
            }
        }
    );
});