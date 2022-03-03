import {LoadingButton, URL_APP} from "../../api/module.js";
import { DisLoadingButton } from "../../api/module.js";
import {httpRequestUrlApp} from "../../api/index.js";

$(document).ready(function() {
    $('#user_form').attr('action', `/exam/register/participant/user`);
})

$("#user_form").on("submit", function(e) {
    e.preventDefault();
    let form = $(this);

    const formData = new FormData();
    $.each(form.serializeArray(), function (i, v) {
        formData.append(v.name, v.value)
    });

    const btnSubmit = $(this).find('button[type="submit"]');
    LoadingButton(btnSubmit);

    httpRequestUrlApp(
        form.attr("action"),
        "POST",
        form.serialize(),
        (res) => {
            res = JSON.parse(res);
            DisLoadingButton(btnSubmit, 'Submit');

            if (res.status === 200) {
                let token = res.data.userdata.sessionToken;
                toastr.success(res.message);
                window.location.href = URL_APP() + "/exam/register/resume/" + token
                return;
            }

            if (res.status === 422) {
                JSON.parse(res.message).forEach((v) => {
                    toastr.error(Object.values(v));
                });
            }
        },
        (statusCode, message, jqXHR, exception) => {
            toastr.error(message);
            DisLoadingButton(btnSubmit, "Submit");
        }
    );
});

$('#btn-next-resume').click(function () {
    const btn = $(this);
    LoadingButton(btn);

    httpRequestUrlApp(
        "/exam/register/finish/user/submit",
        "POST",
        {},
        (res) => {
            res = JSON.parse(res);
            DisLoadingButton(btn, '<i class="fa fa-sign-in"></i> Lanjutkan');

            if (res.status === 200) {
                toastr.success(res.message);
                window.location.href = URL_APP() + "/exam/section/" + res.data.token
                return;
            }

            if (res.status === 422) {
                JSON.parse(res.message).forEach((v) => {
                    toastr.error(Object.values(v));
                });
            }

            if (res.status == 400) {
                toastr.error(res.message);
                return;
            }
        },
        (statusCode, message, jqXHR, exception) => {
            toastr.error(message);
            DisLoadingButton(btn, "Next");
        }
    );
})