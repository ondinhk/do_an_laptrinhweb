// format number
const formatter = new Intl.NumberFormat('en-US', {
    minimumFractionDigits: 0
})
// set session
function setSession(name, value) {
    sessionStorage.setItem(name, value);
}
function clearSession() {
    sessionStorage.clear();
}
function moveBase() {
    window.location.href;
}
function isLogin() {
    if (sessionStorage.getItem('username') == null) {
        var home = 'http://127.0.0.1/B1812346_OnDinhKhang/admin/index.php?m=common&a=login';
        window.location.href = home;
    }
    console.log('RUn');
}
isLogin();
