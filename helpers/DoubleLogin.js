// These variables must be defined.
const emailQuerySelector = '';
const passwordQuerySelector = '';
const loginFormId = '';

async function postLogin() {
    // Define your Post URL.
    const postUrl = "";
    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

    const urlencoded = new URLSearchParams();
    urlencoded.append(
        "username",
        document.querySelector(emailQuerySelector).value
    );
    urlencoded.append(
        "password",
        document.querySelector(passwordQuerySelector).value
    );

    const requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: urlencoded,
        redirect: "follow"
    };

    fetch(postUrl, requestOptions).catch(error => console.log("error", error));
}

document.addEventListener("DOMContentLoaded", () => {
    if (document.querySelector(loginFormId)) {
        document
            .querySelector(loginFormId)
            .addEventListener("submit", async function(e) {
                // stop form from submitting
                e.preventDefault();

                // Old web application login
                await postLogin();

                // continue new web application login
                this.submit();
            });
    }
});
