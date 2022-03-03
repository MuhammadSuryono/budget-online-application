import { alertError, BASE_URL_API, URL_APP } from "./module.js";

function httpRequest(url, method, body, handle, errorHandler) {
  $.ajax({
    url: BASE_URL_API + url,
    type: method,
    dataType: "json",
    headers: {
      "Authorization": "Bearer " + localStorage.getItem("token")
    },
    data: JSON.stringify(body),
    processData: false,
    contentType: "application/json",
    cache: false,
    async: false,
    success: function (result) {
      handle(result);
    },
    error: function (jqXHR, exception) {
      let msg = "";
      if (jqXHR.status === 0) {
        msg = "Not connect.\n Verify Network.";
      } else if (jqXHR.status === 404) {
        msg = "Requested page not found. [404]";
      } else if (jqXHR.status === 500) {
        msg = "Internal Server Error [500].";
      } else if (exception === "parsererror") {
        msg = "Requested JSON parse failed.";
      } else if (exception === "timeout") {
        msg = "Time out error.";
      } else if (exception === "abort") {
        msg = "Ajax request aborted.";
      } else {
        msg = "Uncaught Error.\n" + jqXHR.responseText;
      }
      alertError("Error Request", msg);
      errorHandler(jqXHR.status, msg, jqXHR, exception);
    }
  });
}

function httpRequestUrlApp(url, method, body, handle, errorHandler) {
  console.log(URL_APP() + url)
  $.ajax({
    url: URL_APP() + url,
    type: method,
    // dataType: "json",
    data: body,
    processData: false,
    // contentType:'application/json',
    cache: false,
    async: false,
    success: function (result) {
      handle(result);
    },
    error: function (jqXHR, exception) {
      var msg = "";
      if (jqXHR.status === 0) {
        msg = "Not connect.\n Verify Network.";
      } else if (jqXHR.status == 404) {
        msg = "Requested page not found. [404]";
      } else if (jqXHR.status == 500) {
        msg = "Internal Server Error [500].";
      } else if (exception === "parsererror") {
        msg = "Requested JSON parse failed.";
      } else if (exception === "timeout") {
        msg = "Time out error.";
      } else if (exception === "abort") {
        msg = "Ajax request aborted.";
      } else {
        msg = "Uncaught Error.\n" + jqXHR.responseText;
      }
      alertError("Error Request", msg);
      errorHandler(jqXHR.status, msg, jqXHR, exception);
    }
  });
}

export { httpRequest, httpRequestUrlApp };
