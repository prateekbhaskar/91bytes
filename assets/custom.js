//when user check the term
function checkterm(x) {
    x.checked = true;
    x.value = 'accepted';
    x.setAttribute('onclick', 'uncheckterm(this)');
}
//when user uncheck the term
function uncheckterm(x) {
    x.checked = false;
    x.value = 'declined';
    x.setAttribute('onclick', 'checkterm(this)');
}
//seeing password in plain text
function showpassword(x) {
    var y = document.getElementById('password');
    y.setAttribute('type', 'text');
    x.setAttribute('onclick', 'hidepassword(this)');
    x.style.content = 'url(https://api.iconify.design/ant-design/eye-outlined.svg)';
}
//hiding password
function hidepassword(x) {
    var y = document.getElementById('password');
    y.setAttribute('type', 'password');
    x.setAttribute('onclick', 'showpassword(this)');
    x.style.content = 'url(https://api.iconify.design/ant-design/eye-invisible-filled.svg)';
}