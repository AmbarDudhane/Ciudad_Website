function setCookie(param) {
    console.log("Cookie name is "+param);
    console.log(document.getElementById(param).value);
    document.cookie = param+"="+document.getElementById(param).value;
}
