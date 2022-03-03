import { httpRequest, httpRequestUrlApp } from "../../api/index.js";
import { URL_APP } from "../../api/module.js";

const btnStartSession = document.getElementById("btn-start-session");
const errorMessage = document.getElementById("error-message");

$("#form-session").on("submit", function (e) {
  e.preventDefault();
  LoadingButton(btnStartSession);
  const data = $(this).serialize();
  console.log(data);
  httpRequestUrlApp(
    "/exam/session/check",
    "POST",
      data,
    (res) => {
        let response = JSON.parse(res);
        console.log(response);
        if (response.status === 200) {
            SuccessMessage(`You will be redirected to the exam page in 5 seconds.`);
            setInterval(() => {
                window.location.href = `${URL_APP()}/exam/register/${response.data.token}`
            }, 5000);
        } else {
            DisLoadingButton(
                btnStartSession,
                '<i class="fa fa-sign-in"></i> Start Session'
            )
            ErrorMessage(response.message, false);
        }

    },
    (statusCode, message, jqXHR, exception) => {
      let jsonResponse = jqXHR.responseJSON;
      console.log(jqXHR);
      DisLoadingButton(
        btnStartSession,
        '<i class="fa fa-sign-in"></i> Start Session'
      );
      ErrorMessage(jsonResponse.response.message, false);
    }
  );
});

function LoadingButton(element) {
  element.setAttribute("disabled", "true");
  element.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Loading...';
}

function DisLoadingButton(element, htmlInput) {
  element.removeAttribute("disabled");
  element.innerHTML = htmlInput;
}

function ErrorMessage(messageError, closeError = true) {
  errorMessage.innerHTML = `<div class="alert alert-danger">${messageError}</div>`;
  if (closeError) {
    setTimeout(() => {
      errorMessage.innerHTML = "";
    }, 5000);
  }
}

function SuccessMessage(messageSuccess) {
  errorMessage.innerHTML = `<div class="alert alert-success">${messageSuccess}</div>`;
}
