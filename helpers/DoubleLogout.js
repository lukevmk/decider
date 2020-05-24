async function postLogout() {
    // Define your Post URL.
    const postUrl = '';

    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/x-www-form-urlencoded");

    const requestOptions = {
        method: "POST",
        headers: myHeaders,
        redirect: "follow"
    };

    fetch(postUrl, requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log("error", error));
}

async function doubleLogout() {
    const logoutFormId = '';
    // Old web application logout.
    await postLogout();

    // continue new web application login
    document.querySelector(logoutFormId).submit();
}
